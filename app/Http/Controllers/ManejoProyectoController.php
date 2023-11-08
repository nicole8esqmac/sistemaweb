<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreManejoProyectoRequest;
use App\Http\Requests\UpdateManejoProyectoRequest;
use App\Models\ManejoProyecto;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ManejoProyectoController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $manejoProyectos = ManejoProyecto::all();

        return view('manejoProyectos.index', compact('manejoProyectos'));
    }


    public function create()
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('manejoProyectos.create');
    }


    public function store(StoreManejoProyectoRequest $request)
    {
        //
        ManejoProyecto::create($request->validated());

        return redirect()->route('manejoProyectos.index');
    }


    public function show(ManejoProyecto $manejoProyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('manejoProyectos.show', compact('manejoProyecto'));
    }


    public function edit(ManejoProyecto $manejoProyecto,)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('manejoProyectos.edit', compact('manejoProyecto'));
    }


    public function update(UpdateManejoProyectoRequest $request, ManejoProyecto $manejoProyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        


        $manejoProyecto->update($request->validated());

        return redirect()->route('manejoProyectos.index')
        ->with("success", "Actualizado con éxito!");
    }


    public function destroy(ManejoProyecto $manejoProyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manejoProyecto->delete();

        return redirect()->route('manejoProyectos.index');


    }

    public function fasesProyectos(ManejoProyecto $manejoProyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('fases');


    }
}
