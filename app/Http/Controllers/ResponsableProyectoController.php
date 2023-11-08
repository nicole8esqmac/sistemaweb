<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreResponsableProyectoRequest;
use App\Http\Requests\UpdateResponsableProyectoRequest;
use App\Models\ManejoProyecto;
use App\Models\ResponsableProyecto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ResponsableProyectoController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');



        $responsableProyectos=ResponsableProyecto::all();


        return view('responsableProyectos.index', compact('responsableProyectos'));


    }


    public function create()
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        //
        $manejo_proyectos = ManejoProyecto::select("*", DB::raw("CONCAT(manejo_proyectos.id, ' ', manejo_proyectos.descripcion) AS idProyecto"))//SIRVE PARA CONCATENAR
          ->get();//OBTIENE LOS DATOS

        $manejoProyectos= ManejoProyecto::all();
        return view('responsableProyectos.create', compact('manejoProyectos','manejo_proyectos'));
    }


    public function store(StoreResponsableProyectoRequest $request)
    {
        //SIRVE PARA GUARDAR EN LA BASE DE DATOS
        $responsableProyecto = new ResponsableProyecto();
        $responsableProyecto->idProyecto=$request->get('idProyecto');
        $responsableProyecto->tipoDocumento=$request->get('tipoDocumento');
        $responsableProyecto->documento=$request->get('documento');
        $responsableProyecto->nombre=$request->get('nombre');
        $responsableProyecto->apellido=$request->get('apellido');
        $responsableProyecto->edad=$request->get('edad');
        $responsableProyecto->sexo=$request->get('sexo');
        $responsableProyecto->telefono=$request->get('telefono');
        $responsableProyecto->celular=$request->get('celular');
        $responsableProyecto->estado=$request->get('estado');
        $mytime=Carbon::now('America/Guatemala');
        $responsableProyecto->fecha_hora=$mytime->toDateTimeString();
        $responsableProyecto->direccion=$request->get('direccion');
        $responsableProyecto->observacion=$request->get('observacion');
        $responsableProyecto->save();


        //SE HACE UNA REDIRECCION
       return redirect()->route("responsableProyectos.index")->with("success", "Agregado con éxito!");

    }


    public function show(ResponsableProyecto $responsableProyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        return view('responsableProyectos.show', compact('responsableProyecto'));
    }


    public function edit(ResponsableProyecto $responsableProyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $manejo_proyectos = ManejoProyecto::all();
        return view('responsableProyectos.edit', compact('responsableProyecto', 'manejo_proyectos'));
    }


    public function update(UpdateResponsableProyectoRequest $request, ResponsableProyecto $responsableProyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $responsableProyecto->update($request->validated());

        return redirect()->route('responsableProyectos.index')
        ->with("success", "Actualizado con éxito!");
    }


    public function destroy(ResponsableProyecto $responsableProyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $responsableProyecto->delete();

        return redirect()->route('responsableProyectos.index');

        //
    }
}
