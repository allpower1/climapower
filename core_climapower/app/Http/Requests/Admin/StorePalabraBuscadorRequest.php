<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePalabraBuscadorRequest extends FormRequest
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
            'palabra'    => 'required'
        ];
    }

    public function messages()
    {
        return [
            'pregunta.required' => 'El campo palabra es requerido.',
        ];
    }
}
