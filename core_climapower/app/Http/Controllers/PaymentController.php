<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Cart;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    private $urlApi;
    private $apiKey;
    private $secretKey;

    public function __construct()
    {
        $this->urlApi = env('FLOW_API_URL');
        $this->apiKey =  env('FLOW_API_KEY');
        $this->secretKey = env('FLOW_SECRET');
    }

    public function testFlow()
    {
        return view('flow_test');
    }

    public function pagoflow(Request $request)
    {
        $validated = $request->validate([
            'nombre'               => 'required|string|max:100',
            'apellidos'            => 'nullable|string|max:150',
            'email'                => 'required|email|max:150',
            'celular'              => 'nullable|string|max:20',
            'informacionadicional' => 'nullable|string|max:500',
        ]);

        //calcular monto a pagar
        $subtotal = Cart::getTotal();
        $nuevototal = $subtotal;

        $amount  = $nuevototal;
        $subject = "Planes TuLadoVIP";
        $optional = "TuLadoVIP";

        //añadir en el codigo orden el id del usuario logueado
        $tokenjwt = $request->cookie('jwt_token') ?? Session::get('jwt_token');
        $decoded = JWT::decode($tokenjwt, new Key(env('JWT_SECRET_SHARED'), env('JWT_ALGO', 'HS256')));

        $commerceOrder = $decoded->sub.'_'.uniqid();

        // Obtenemos los IDs de los planes en el carrito
        $cartItems = Cart::getContent()->map(function($item) {
            return $item->id;
        })->values()->toArray();

        // Guardar en BD como pendiente
        Payment::create([
            'commerce_order' => $commerceOrder,
            'email'          => $request->email,
            'amount'         => $amount,
            'jwttoken'       => $tokenjwt,
            'currency'       => 'CLP',
            'status'         => 1,
            'subject'        => $subject,
            'optional'       => $optional,
            'cart_content'   => json_encode($cartItems), // Guardamos el carrito
        ]);

        $params = [
            "apiKey"           => $this->apiKey,
            "commerceOrder"    => $commerceOrder,
            "subject"          => $subject,
            "amount"           => $amount,
            "currency"         => "CLP",
            "email"            => $request->email,
            "urlConfirmation" => route('flow.confirmation'),
            "urlReturn"       => route('flow.return'),
            "paymentMethod"    => 9,
            "optional"         => $optional,
            "timeout"          => 0,
            "payment_currency" => "CLP"
        ];

        ksort($params, SORT_STRING);
        $strToSign = '';
        foreach ($params as $k => $v) {
            $strToSign .= $k . strval($v);
        }
        $signature = hash_hmac('sha256', $strToSign, $this->secretKey, false);
        $params['s'] = $signature;

        // 5) Enviar request
        $ch = curl_init($this->urlApi . '/payment/create');
        curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_HTTPHEADER     => ['Content-Type: application/x-www-form-urlencoded'],
            CURLOPT_POSTFIELDS     => http_build_query($params, '', '&'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 30,
        ]);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error    = curl_error($ch);
        curl_close($ch);

        if ($httpCode == 200 && !$error) {
            $data = json_decode($response, true);

            if (isset($data['token'], $data['url'])) {
                return redirect()->away($data['url'] . '?token=' . $data['token']);
            }
        }

        return redirect('home');
    }

    public function flowReturn(Request $request)
    {
        if ($request->isMethod('get')) {
            $token = $request->query('token');  // Para solicitudes GET
        } else {
            $token = $request->input('token');  // Para solicitudes POST (en caso de que Flow lo haga)
        }

        if (!$token) {
            return response('Token no recibido', 400);
        }

        return view('cart.flowReturn', compact('token'));
    }

    public function confirmationUrl(Request $request)
    {
        $token = $request->input('token');

        if (!$token) {
            return response('Token no recibido', 400);
        }

        // Consultar estado del pago en Flow
        $params = [
            "apiKey" => $this->apiKey,
            "token"  => $token,
        ];
        $params["s"] = $this->sign($params);

        //Codifica los parámetros en formato URL y los agrega a la URL
        $url = $this->urlApi . "/payment/getStatus?" . http_build_query($params);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response === false) {
            return response('error');
        }

        $data = json_decode($response, true);

        // Aquí actualizas tu base de datos según el estado
        if (isset($data['status']) && $data['status'] == 2) { // 2 = pagado
            // Guardar o actualizar el pago en BD
            $getpago = Payment::where('commerce_order',$data['commerceOrder'])->first();

            if (!$getpago) {
                Log::error('No se encontró el pago para la commerceOrder: ' . $data['commerceOrder']);
                return response('error', 500);
            }

            Payment::updateOrCreate(
                ['commerce_order' => $data['commerceOrder']],
                [
                    'flow_order' => $data['flowOrder'] ?? null,
                    'amount'     => $data['amount'] ?? 0,
                    'currency'   => $data['currency'] ?? 'CLP',
                    'status'     => $data['status'],
                ]
            );

            //enviar al endpoints masajistas
            $plansBought = json_decode($getpago->cart_content, true) ?? [];
            $codigoordenexplode = explode('_',$data['commerceOrder']);

            // 1️⃣ Agrupar los planes por tipo (prefijo antes del _)
            $plansByType = [];
            foreach ($plansBought as $plan) {
                [$type, $id] = explode('_', $plan);
                $plansByType[$type][] = $id;
            }

            // 2️⃣ Mapeo de APIs según el tipo
            $apiTargets = [
                'Masajistas' => [
                    'url' => env('JWT_URL_TUMASAJISTAVIP'),
                ],
                'Escorts' => [
                    'url' => env('JWT_URL_TUESCORTVIP'),
                ],
                'Gigolos' => [
                    'url' => env('JWT_URL_TUGIGOLOVIP'),
                ],
                'Strippers' => [
                    'url' => env('JWT_URL_TUSTRIPPERVIP'),
                ],
                'Swingers' => [
                    'url' => env('JWT_URL_TUSWINGERVIP'),
                ],
                'Modelos' => [
                    'url' => env('JWT_URL_TUMODELOVIP'),
                ],
            ];

            // 3️⃣ Enviar a cada endpoint correspondiente
            foreach ($plansByType as $type => $planIds) {
                if (!isset($apiTargets[$type])) {
                    \Log::warning("Tipo de plan desconocido: $type");
                    continue;
                }

                $target = $apiTargets[$type];

                $payload = [
                    'id_user' => $codigoordenexplode[0],
                    'plan_ids' => $planIds,
                    'flow_order' => $data['flowOrder'] ?? null,
                    'amount' => $data['amount'] ?? 0,
                    'iat' => time() - 60,
                    'exp' => time() + 300,
                ];

                $jwt = JWT::encode($payload, env('JWT_SECRET_SHARED'), 'HS256');

                try {
                    $response = Http::withToken($jwt)->timeout(10)->post($target['url'] . "/api/purchases", $payload);

                    Session::forget('plans_in_cart');
                    Cart::clear();

                    if ($response->failed()) {
                        \Log::error("Error al enviar compra a {$type}: " . $response->body());
                    } else {
                        \Log::info("Compra enviada correctamente a {$type}");
                    }

                    return response('success');

                } catch (\Exception $e) {
                    \Log::error("Excepción al enviar a {$type}: " . $e->getMessage());

                    return response('error');
                }
            }
        } else {
            return response('error');
        }
    }

    private function sign($params)
    {
        ksort($params);
        $signString = http_build_query($params, '', '&');

        return hash_hmac('sha256', $signString, $this->secretKey);
    }

    public function cartSuccess()
    {
        return view('cart.success');
    }

    public function cartError()
    {
        return view('cart.caterror');
    }

}
