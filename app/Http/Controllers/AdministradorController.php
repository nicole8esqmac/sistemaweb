<?php

namespace App\Http\Controllers;


use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AdministradorController extends Controller
{

    public function index()
    {
        //
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        return view('administrador.admin');
    }


    public function create()
    {
        //
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        return view('administrador.empresa');
    }


    public function store(Request $request)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        //SIRVE PARA GUARDAR INFROMACION EN LA BASE DE DATOS
        $this->validate($request,[
            'nit'               => 'required|string|max:9|unique:empresa_admins,nit',
            'nombre_empresa'    => 'required',
            'direccion'         => 'required',
            'ciudad'            => 'required'
        ],

        [
            'nombre_empresa' => 'El campo Nombre Entidad es requerido',
            'direccion' => 'El campo Dirección es requerido',
            'ciudad' => 'El campo Ciudad es requerido'
        ]
    );

        Empresa::create($request->all());


         return redirect()->route("admin.index")//SIRVE PARA HACER UNA REDIRECCION
         ->with("success", "Agregado con éxito!");//SIRVE PARA AGREGAR UN SUCESO = MENSAJE
    }


    public function show()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

    }


    public function edit()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');
    }


    public function update()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');
    }


    public function destroy()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');
    }

    public function info()
    {
        //abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');
        return view('welcome');
    }

}
