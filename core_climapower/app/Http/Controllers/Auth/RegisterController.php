<?php

namespace App\Http\Controllers\Auth;

use Malahierba\ChileRut\ChileRut;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserMasajistasDetalle;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:191'],
                'email' => ['required', 'string', 'email', 'max:191', 'unique:users,email'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'terminos_y_condiciones' => 'accepted',
            ]);

            if($validator->fails())
            {
                $errors = $validator->errors();

                return response()->json([
                    'estatus' => 'errorvalidacion',
                    'mensaje' => $errors->first()
                ]);
            }

            $referredBy = null;
            $idref = Session::get('ref');

            if ($idref) {
                $refUser = User::where('referido_code', $idref)->first();
                if ($refUser) {
                    $referredBy = $refUser->id;
                }
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->get('telefono',null),
                'password' => Hash::make($request->password),
                'referido_por' => $referredBy,
                'referido_code' => strtoupper(Str::random(8)),
                'ultima_actividad' => now()->getTimestamp(),
            ]);

            $userdeta = new UserMasajistasDetalle();
            $userdeta->id_user_masajista = $user->id;
            $userdeta->comuna_servicio = $request->get('comuna');
            $userdeta->region_servicio = $request->get('region');
            $userdeta->save();

            $user->assignRole('Usuario General');

            $this->guard()->login($user);

            //eliminar session de referido
            Session::forget('ref');

            return response()->json(['estatus' => 'success']);

        } catch (\Throwable $th) {
            Log::info(print_r($th->getMessage(),true));
            return response()->json(['estatus' => false]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['telefono'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function guard()
    {
        return Auth::guard();
    }

}
