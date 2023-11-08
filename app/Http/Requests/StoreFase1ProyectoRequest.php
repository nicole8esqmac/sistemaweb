<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreFase1ProyectoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('proyectos_access');
        // return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'idResponsableProyecto' =>'required',
            'tipo_banco'            =>'required',
            'cantidad_por_persona'  =>'required',
            'monto'                 =>'required',
            'photo'                 =>'required'
        ];
    }
}
