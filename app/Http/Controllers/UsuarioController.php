<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UsuarioController extends Controller
{
    public function usuario()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        return view('layouts.vistaUsuario');
    }
}
