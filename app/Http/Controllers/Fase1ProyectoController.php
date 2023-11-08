<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFase1ProyectoRequest;
use App\Models\BancoFase1Proyecto;
use App\Models\Fase1Proyecto;
use App\Models\ManejoProyecto;
use App\Models\ResponsableProyecto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;


class Fase1ProyectoController extends Controller
{

    public function index()
    {
        //
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $fase1Proyectos = Fase1Proyecto::all();

        return view('fase1Proyectos.index', compact('fase1Proyectos'));
    }


    public function create()
    {

        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manejoProyectos = ManejoProyecto::all();
        $bancoFase1Proyectos = BancoFase1Proyecto::all();
        $responsableProyecto = ResponsableProyecto::all();
        return view('fase1Proyectos.create',compact('manejoProyectos', 'bancoFase1Proyectos', 'responsableProyecto'));

    }

    public function envioDatosBanco(Request $request)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //SIRVE PARA GUARDAR EN LA BASE DE DATOS
        $this->validate($request,[
            'nombre_banco' => 'required',
        ]);

        $banco=new BancoFase1Proyecto;
        $banco->nombre_banco = $request->input('nombre_banco');
        $banco->save();

        //SE HACE UNA REDIRECCION
       return redirect()->route("fase1Proyectos.create");

    }


    public function store(StoreFase1ProyectoRequest $request)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        //SIRVE PARA GUARDAR EN LA BASE DE DATOS
        $fase1Proyecto = new Fase1Proyecto();
        $mytime=Carbon::now('America/Guatemala');
        $fase1Proyecto->fecha_hora=$mytime->toDateTimeString();
        $fase1Proyecto->idResponsableProyecto =$request->get('idResponsableProyecto');
        $fase1Proyecto->tipo_banco=$request->get('tipo_banco');
        $fase1Proyecto->cantidad_por_persona=$request->get('cantidad_por_persona');
        $fase1Proyecto->monto=$request->get('monto');


        $request->validate([
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $carpetaDestino = 'storage/photoBoleta/';
            $nombreArchivo = time() . '-' . $file->getClientOriginalName();
            $subidaExitosa = $request->file('photo')->move($carpetaDestino, $nombreArchivo);
            $fase1Proyecto->photo = $carpetaDestino . $nombreArchivo;
        }


        $fase1Proyecto->direccion_area=$request->get('direccion_area');
        $fase1Proyecto->observacion=$request->get('observacion');
        $fase1Proyecto->save();


        //SE HACE UNA REDIRECCION
       return redirect()->route("fase1Proyectos.index")->with("success", "Agregado con éxito!");

    }


    public function show(Fase1Proyecto $fase1Proyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('fase1Proyectos.show', compact('fase1Proyecto'));

    }


    public function edit(Fase1Proyecto $fase1Proyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsableProyecto = ResponsableProyecto::all();
        $bancoFase1Proyectos = BancoFase1Proyecto::all();

        return view('fase1Proyectos.edit', compact('fase1Proyecto', 'responsableProyecto', 'bancoFase1Proyectos'));

    }


    // public function update(Request $request, $id)
    // {
    //     abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $fase1Proyecto = Fase1Proyecto::find($id);
    //     $fase1Proyecto->fill($request->all());

    //     if ($request->hasFile('photo')) {
    //         $file = $request->file('photo');
    //         $carpetaDestino = 'storage/photoBoleta/';
    //         $nombreArchivo = time() . '-' . $file->getClientOriginalName();

    //         // Verifica si la subida de la imagen fue exitosa
    //         if ($request->file('photo')->move($carpetaDestino, $nombreArchivo)) {
    //             // Elimina la imagen anterior si existe
    //             if ($fase1Proyecto->photo) {
    //                 Storage::delete($fase1Proyecto->photo);
    //             }

    //             $fase1Proyecto->photo = $carpetaDestino . $nombreArchivo;
    //         }
    //     }

    //     $fase1Proyecto->save();

    //     return redirect()->route('fase1Proyectos.index')
    //         ->with("success", "Actualizado con éxito!");
    // }


    public function update(Request $request, $id)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fase1Proyecto = Fase1Proyecto::find($id);
        $fase1Proyecto->fill($request->all());

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            // Validar que el archivo sea una imagen y tenga una extensión permitida
            $validoExtension = ['jpg', 'jpeg', 'png'];
            if ($file->isValid() && in_array($file->getClientOriginalExtension(), $validoExtension)) {
                $carpetaDestino = 'storage/photoBoleta/';
                $nombreArchivo = time() . '-' . $file->getClientOriginalName();

                // Verifica si la subida de la imagen fue exitosa
                if ($request->file('photo')->move($carpetaDestino, $nombreArchivo)) {
                    // Elimina la imagen anterior si existe
                    if ($fase1Proyecto->photo) {
                        Storage::delete($fase1Proyecto->photo);
                    }

                    $fase1Proyecto->photo = $carpetaDestino . $nombreArchivo;
                }
            } else {
                // La extensión del archivo no es válida
                return redirect()->back()->with("error", "Solo se permiten archivos .jpg, .jpeg, o .png.");
            }
        }

        $fase1Proyecto->save();

        return redirect()->route('fase1Proyectos.index')->with("success", "Actualizado con éxito!");
    }




    public function destroy($id)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //
    }
}
