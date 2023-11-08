<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateManejoProyectoRequest extends FormRequest
{
    public function rules()
    {
        return [
            'titulo' => [
                'required', 'string',
            ],
            'descripcion' => [
                'required', 'string',
            ]
        ];
    }

    public function authorize()
    {
        return Gate::allows('proyectos_access');

    }
}
