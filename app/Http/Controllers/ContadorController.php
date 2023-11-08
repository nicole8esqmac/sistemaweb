<?php

namespace App\Http\Controllers;

use App\Models\LibroDiario;
use App\Models\DetalleLibroDiario;
use App\Models\DetalleLibroMovimiento;
use App\Models\PlanCuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ContadorController extends Controller
{

    public function index()
    {
        // //
        return view('layouts.vistaContador');
    }


    public function create()
    {
        //

    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function contador()
    {
        abort_if(Gate::denies('contador_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        return view('layouts.vistaContador');
    }

    public function libroMovimientos()
    {
        abort_if(Gate::denies('contador_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');
        // abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $detalleLibroMovimientos = DetalleLibroMovimiento::all();


    // Pasa la colección combinada a la vista
    return view('libroMovimientos.index', compact('detalleLibroMovimientos'));
    }

    public function libroMayor()
    {
        // abort_if(Gate::denies('contador_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $detalleLibroDiario = DetalleLibroDiario::all();

        return view('libroMayor.index', compact('detalleLibroDiario'));
    }

    public function balanceGeneral()
    {
        // abort_if(Gate::denies('contador_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        // abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $planCuentas = PlanCuenta::all();
        return view('balanceGeneral.index', compact( 'planCuentas'));
    }

    public function estadoResultados()
    {
        // abort_if(Gate::denies('contador_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        // abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $planCuentas = PlanCuenta::all();
        return view('estadoResultados.index', compact( 'planCuentas'));
    }


}
