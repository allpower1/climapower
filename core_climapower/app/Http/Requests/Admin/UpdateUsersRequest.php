<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersRequest extends FormRequest
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
            'name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'mothers_last_name' => 'max:191',
            'email' => 'required|email|max:191|unique:users,email,'.$this->route('user'),
            'phone' => 'max:191',
            'roles' => 'required',
        ];
    }
}
