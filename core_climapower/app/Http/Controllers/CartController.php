<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function add(Request $request)
    {
        //trabajar para explotar el tipo
        $getRequestID = explode('_',$request->plan_id);
        $tipoPlan = $getRequestID[0];
        $idPlan = $getRequestID[1];

        if($tipoPlan === 'masajistas'){
            $nombretipo = 'Masajistas';
            $apiToken = config('services.tumasajista.token');
            $URLapiPlanes = config('services.tumasajista.base_url');
        }elseif($tipoPlan === 'escorts'){
            $nombretipo = 'Escorts';
            $apiToken = config('services.tuescort.token');
            $URLapiPlanes = config('services.tuescort.base_url');
        }elseif($tipoPlan === 'gigolos'){
            $nombretipo = 'Gigolos';
            $apiToken = config('services.tugigolo.token');
            $URLapiPlanes = config('services.tugigolo.base_url');
        }elseif($tipoPlan === 'strippers'){
            $nombretipo = 'Strippers';
            $apiToken = config('services.tustripper.token');
            $URLapiPlanes = config('services.tustripper.base_url');
        }elseif($tipoPlan === 'swingers'){
            $nombretipo = 'Swingers';
            $apiToken = config('services.tuswinger.token');
            $URLapiPlanes = config('services.tuswinger.base_url');
        }elseif($tipoPlan === 'modelos'){
            $nombretipo = 'Modelos';
            $apiToken = config('services.tumodelo.token');
            $URLapiPlanes = config('services.tumodelo.base_url');
        }else{
            return response()->json(['error' => 'No se logro acceder al sitio'], 400);
        }

        $getplan = Http::withToken($apiToken)->acceptJson()->get($URLapiPlanes.'/api/detalle_plan/'.$idPlan);

        if ($getplan->successful()) {
            $resultadocollecion = (object)collect($getplan->json())->toArray();

            //validar precio
            if($resultadocollecion->precio_oferta != '' && $resultadocollecion->precio_oferta != null){
                $valorplan = $resultadocollecion->precio_oferta;
            }else{
                $valorplan = $resultadocollecion->valor;
            }

            Cart::add(
                $nombretipo.'_'.$resultadocollecion->id,
                $nombretipo.' - '.$resultadocollecion->nombre_plan,
                $valorplan,
                1
            );

            // Actualizar sesión con IDs de planes en el carrito
            $planIds = Cart::getContent()->keys(); // todos los IDs que están actualmente en el carrito
            Session::put('plans_in_cart', $planIds->toArray());

            return back()->with('success',"$resultadocollecion->nombre_plan ¡se ha agregado con éxito al carrito!");
        }else{
            return back()->with('error',"¡Ocurrio un error al agregar el plan al carrito!");
        }
    }

    public function cart()
    {
        return view('cart.checkoutcart');
    }

    public function removeitem(Request $request)
    {
        Cart::remove([
            'id' => $request->id,
        ]);

        // Actualizar sesión
        $planIds = Cart::getContent()->keys();
        Session::put('plans_in_cart', $planIds->toArray());

        return back()->with('success',"Plan eliminado con éxito de su carrito.");
    }

    public function clear(){
        Cart::clear();

        // Actualizar sesión
        $planIds = Cart::getContent()->keys();
        Session::put('plans_in_cart', $planIds->toArray());

        return back()->with('success',"El carrito de compras a sido vaciado exitosamente!");
    }

    public function ConfirmCart()
    {
        $subtotal = Cart::getSubTotal();
        $nuevototal = $subtotal;

        return view('cart.confirmarcart',compact('nuevototal'));
    }

    public function updateQuantity(Request $request)
    {
        $itemId = $request->input('id');
        $action = $request->input('action'); // 'increase' o 'decrease'

        $item = Cart::get($itemId);

        if (!$item) {
            return back()->with('error', 'Producto no encontrado.');
        }

        $newQty = $item->quantity;

        if ($action === 'increase') {
            $newQty++;
        } elseif ($action === 'decrease' && $newQty > 1) {
            $newQty--;
        }

        Cart::update($itemId, [
            'quantity' => [
                'relative' => false,
                'value' => $newQty
            ]
        ]);

        return back()->with('success', 'Cantidad actualizada.');
    }

}
