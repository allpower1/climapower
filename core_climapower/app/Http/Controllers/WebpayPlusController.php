<?php

namespace App\Http\Controllers;

use Cart;
use App\Mail\ExitoCompraPlan;
use App\Models\AdminPlanes;
use App\Models\PagosTransbank;
use App\Models\UsersPlanes;
use DB;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Transbank\Webpay\WebpayPlus;
use Illuminate\Support\Facades\Mail;
use Transbank\Webpay\WebpayPlus\Transaction;

class WebpayPlusController extends Controller
{
    public function __construct()
    {
        if (env('WEBPAY_INTEGRACION') == 'produccion') {
            WebpayPlus::configureForProduction(config('services.transbank.webpay_plus_cc'), config('services.transbank.webpay_plus_api_key'));
        } else {
            WebpayPlus::configureForTesting();
        }
    }

    public function createdTransaction(Request $request)
    {
        $req = $request->except('_token');
        $resp = (new Transaction)->create($req["buy_order"], $req["session_id"], $req["amount"], $req["return_url"]);

        return view('webpayplus/transaction_created', ["params" => $req, "response" => $resp]);
    }

    public function commitTransaction(Request $request)
    {
        //Flujo normal
        if ($request->exists("token_ws")) {
            $req = $request->except('_token');
            $resp = (new Transaction)->commit($req["token_ws"]);

            if ($resp->isApproved()){
                //exitoso via transbank
                $newpago = new PagosTransbank();
                $newpago->usuario_id = '1111';
                $newpago->vci = $resp->vci;
                $newpago->monto = $resp->amount;
                $newpago->authorizationCode = $resp->authorizationCode;
                $newpago->paymentTypeCode = $resp->paymentTypeCode;
                $newpago->accountingDate = $resp->accountingDate;
                $newpago->installmentsNumber = $resp->installmentsNumber;
                $newpago->installmentsAmount = $resp->installmentsAmount;
                $newpago->sessionId = $resp->sessionId;
                $newpago->buyOrder = $resp->buyOrder;
                $newpago->cardNumber = $resp->cardNumber;
                $newpago->transactionDate = $resp->transactionDate;
                $newpago->save();

                //duracion plan
                /*
                $getplan = AdminPlanes::where('id',$resp->buyOrder)->first();

                if($getplan){
                    $fechaactual = Carbon::now();
                    $activodesde = $fechaactual;
                    $activohasta = null;

                    $idtipoduracion = $getplan->id_tipo_duracion;

                    if($idtipoduracion == 1){
                        //si es anual
                        if(date('Y') == 2025){
                            //si es el año inicial, regalar este año
                            $activohasta = '2026-12-31 23:59:59';
                        }else{
                            $activohasta = $fechaactual->addYear();
                        }
                    }else{
                        //si es mensual
                        $activohasta = $fechaactual->addMonth();
                    }

                    $newplanuser = new UsersPlanes();
                    $newplanuser->id_usuario = Auth::user()->id;
                    $newplanuser->id_plan = $resp->buyOrder;
                    $newplanuser->activo_desde = $activodesde;
                    $newplanuser->activo_hasta = $activohasta;
                    $newplanuser->estado = 1;
                    $newplanuser->save();

                    //enviar email compra exitosa plan
                    $objDemo = new \stdClass();
                    $objDemo->nombre_completo = Auth::user()->name;
                    $objDemo->email = Auth::user()->email;

                    Mail::to(Auth::user()->email)->bcc('contacto@tuladovip.cl')->send(new ExitoCompraPlan($objDemo));
                }
                */

                Cart::clear();

            }

            return view('webpayplus/transaction_committed', ["resp" => $resp, 'req' => $req]);
        }

        //Pago abortado
        if ($request->exists("TBK_TOKEN")) {
            return view('webpayplus/transaction_aborted', ["resp" => $request->all()]);
        }

        //Timeout
        return view('webpayplus/transaction_timeout', ["resp" => $request->all()]);
    }

    public function showRefund()
    {
        return view('webpayplus/refund');
    }

    public function refundTransaction(Request $request)
    {
        $error = false;
        try {
            $req = $request->except('_token');
            $resp = (new Transaction)->refund($req["token"], $req["amount"]);
        } catch (\Exception $e) {
            $resp = array(
                'msg' => $e->getMessage(),
                'code' => $e->getCode()
            );
            $error = true;
        }

        return view('webpayplus/refund_success', ["resp" => $resp, "error" => $error]);
    }

    public function getTransactionStatus(Request $request)
    {
        $req = $request->except('_token');
        $token = $req["token"];
        $resp = (new Transaction)->status($token);

        return view('webpayplus/transaction_status', ["resp" => $resp, "req" => $req]);
    }

}
