<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanCuentaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    //REGLAS REQUERIDAS PARA LA VALIDAR
    public function rules()
    {
        return [
            'idClaseCuenta' => 'required',
            'idGrupoCuenta' => 'required',
            'codigo' => 'required',
            'cuenta' => 'required'
        ];
    }
}
