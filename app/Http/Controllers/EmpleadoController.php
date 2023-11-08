<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class EmpleadoController extends Controller
{

    public function index(Request $request)

    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');


        $empleado = Empleado:: all();

        // SIRVE PARA OBSERVAR LOS DATOS EN LA VISTA
        return view('empleados.index', compact('empleado'));

    }


    public function create()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');


        return view('empleados.create');

    }

    public function store(Request $request)
{
    $this->validate($request, [
        'dpi' => 'required|string|max:13',
        'nombre' => 'required',
        'apellido' => 'required',
        'fechadenacimiento' => 'required',
        'telefono' => 'required|string|max:8',
        'celular' => 'required|string|max:8',
        'direccion' => 'required',
        'salario' => 'required',
        'sexo' => 'required',
    ]);

    // Verificar si ya existe un empleado con el mismo DPI, teléfono o celular
    $existingEmployee = Empleado::where('dpi', $request->dpi)
        ->orWhere('telefono', $request->telefono)
        ->orWhere('celular', $request->celular)
        ->first();

    if ($existingEmployee) {
        // Manejar el caso de registro duplicado
        // Puedes mostrar un mensaje de error o permitir la actualización del registro existente
        // En este ejemplo, se mostrará un mensaje de error
        return redirect()->route('empleados.index')
            ->with('error', 'Ya existe un empleado con el mismo DPI, teléfono o celular.');
    }

    // Si no existe un empleado con los mismos valores, crea un nuevo registro
    Empleado::create($request->all());

    return redirect()->route('empleados.index')
        ->with('success', 'Agregado con éxito!');
}



    // public function store(Request $request)
    // {
    //     //SIRVE PARA GUARDAR INFROMACION EN LA BASE DE DATOS
    //     $this->validate($request,[
    //         'dpi' => 'required|string|max:13|unique:empleados,dpi',
    //         'nombre' => 'required',
    //         'apellido' => 'required',
    //         'fechadenacimiento' => 'required',
    //         'telefono' => 'required|string|max:8|unique:empleados,telefono',
    //         'celular' => 'required|string|max:8|unique:empleados,celular',
    //         'direccion' => 'required',
    //         'salario' => 'required',
    //         'sexo' => 'required',
    //     ]);

    //     Empleado::create($request->all());


    //      return redirect()->route("empleados.index")//SIRVE PARA HACER UNA REDIRECCION
    //      ->with("success", "Agregado con éxito!");//SIRVE PARA AGREGAR UN SUCESO = MENSAJE
    // }



    public function show(Empleado $empleado)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        return view('empleados.show', compact('empleado'));
    }


    public function edit($id)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        //SIRVE PARA TRAER LOS DATOS QUE SE VAN A EDITAR
        // Y LOS COLOCA EN UN FORMULARIO
        $empleados = Empleado::find($id);
        return view('empleados.edit' , compact('empleados'));
    }


    public function update(Request $request, $id)
    {
        //ACTUALIZA LOS DATOS EN LA BASE DE DATOS
        $empleado = Empleado::find($id);
        $empleado->dpi = $request->post('dpi');
        $empleado->nombre = $request->post('nombre');
        $empleado->apellido = $request->post('apellido');
        $empleado->fechadenacimiento = $request->post('fechadenacimiento');
        $empleado->telefono = $request->post('telefono');
        $empleado->celular = $request->post('celular');
        $empleado->salario = $request->post('salario');
        $empleado->sexo = $request->post('sexo');
        $empleado->save();


        return redirect()->route("empleados.index")//SE HACE UNA REDIRECCION
        ->with("success", "Actualizado con éxito!");//SIRVE PARA AGREGAR UN SUCESO = MENSAJE
    }


    public function destroy(Empleado $empleado)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        //ELIMINA UN REGISTRO
        $empleado->delete();

        return redirect()->route("empleados.index")//SE HACE UNA REDIRECCION
        ->with("success", "Eliminado con éxito!");//SIRVE PARA AGREGAR UN SUCESO = MENSAJE

    }
}
