<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminContactoOtrosRequest extends FormRequest
{
    /**
     * Determine si el usuario está autorizado para hacer esta solicitud.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Obtenga las reglas de validación que se aplican a la solicitud.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'telefono'          => 'required',
            'email'             => 'required',
            'nuestra_ubicacion' => 'required',
            'titulo_parte_uno'  => 'required',
            'titulo_parte_dos'  => 'required',
            'subtitulo'         => 'required',
        ];
    }
}
