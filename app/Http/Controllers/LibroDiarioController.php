<?php

namespace App\Http\Controllers;

use App\Models\DetalleLibroDiario;
use App\Models\DetalleLibroMovimiento;
use App\Models\DetallePlanCuentaAuxiliar;
use App\Models\Empresa;
use App\Models\LibroDiario;
use App\Models\LibroMovimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class LibroDiarioController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $libroDiario = LibroDiario::all();
        return view('libroDiario.index', compact('libroDiario'));
    }


    public function create()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        // Se obtiene el número actual desde la base de datos
        $numeroActual = DB::table('libro_movimientos')->value('numero_actual');

        // Incrementa el número actual para la próxima vez
        $numeroSiguiente = $numeroActual + 1;


        $empresaAdmins = Empresa::all();
        $detallePlanCuentaAuxiliar = DetallePlanCuentaAuxiliar::select("*", DB::raw("CONCAT(detalle_plan_cuenta_auxiliars.codigo, ' ',  detalle_plan_cuenta_auxiliars.cuenta) AS cuentaContable"))//SIRVE PARA CONCATENAR
           ->get();//OBTIENE LOS DATOS


        return view('libroDiario.create',compact('numeroSiguiente', 'empresaAdmins', 'detallePlanCuentaAuxiliar'));
    }


    public function store(Request $request)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        //VALIDACION
        $request->validate([


            'idEmpresa'         => 'required',
            'descripcion'       => 'required',
            'codigo'            => 'required',
            'cuenta'            => 'required',
        ],

        [
            'idEmpresa.required'        => 'El campo Nombre entidad es requerido',
            'descripcion.required'      => 'El campo descripción es requerido',
            'codigo.required'           => 'El campo codigo es requerido',
            'cuenta.required'           => 'El campo cuenta es requerido',
        ]);

        // DECLARACION DE VARIABLE

        $cont = 0;
        $cont2 = 0;
        $sumaTotalDebito = 0;
        $sumaTotalCredito = 0;


        $codigo           = $request->get('codigo');
        $cuenta           = $request->get('cuenta');
        $debitosLD        = $request->get('debitosLD');
        $creditosLD       = $request->get('creditosLD');
        $numeroActual     = $request->get('numero_actual');

        // Calcular la suma total de débitos y créditos
        $sumaTotalDebito = array_sum($debitosLD);
        $sumaTotalCredito = array_sum($creditosLD);


        //SIRVE PARA GUARDAR EN LA BASE DE DATOS
        $libroDiario = new LibroDiario();
        $mytime = Carbon::now('America/Guatemala');
        $libroDiario->fecha_hora  = $mytime->toDateTimeString();
        $libroDiario->idEmpresa   = $request->get('idEmpresa');
        $libroDiario->descripcion = $request->get('descripcion');
        $libroDiario->impuesto    = '12%';
        $libroDiario->total       = $sumaTotalDebito;
        $libroDiario->estado      = 'ACTIVO';
        $libroDiario->save();


         // Guardar un nuevo registro en la tabla libro_movimientos
        $libroMovimientos = new LibroMovimiento();
        $libroMovimientos->numero_actual = $numeroActual; // Asigna el valor de numero_actual
        $libroMovimientos->save();

        // Incrementa el número actual para la próxima vez en la base de datos
        DB::table('libro_movimientos')->update(['numero_actual' => $numeroActual + 1]);



            while ($cont < count($codigo)) {
                $detalle = new DetalleLibroDiario();
                $detalle->idLibroDiarios      = $libroDiario->id;
                $detalle->codigo              = $codigo[$cont];
                $detalle->cuenta              = $cuenta[$cont];
                $detalle->debitosLD           = $debitosLD[$cont];
                $detalle->creditosLD          = $creditosLD[$cont];
                $detalle->totalDebitosLD      = $sumaTotalDebito;
                $detalle->totalCreditosLD     = $sumaTotalCredito;
                $detalle->save();
                $cont = $cont+1;
            }

            while ($cont2 < count($codigo)) {
                $detalleLibroMovimientos = new DetalleLibroMovimiento();
                $detalleLibroMovimientos->idLibroMovimiento = $libroMovimientos->id;
                $detalleLibroMovimientos->codigo = $codigo[$cont2];
                $detalleLibroMovimientos->cuenta = $cuenta[$cont2];
                $detalleLibroMovimientos->debitosLD = $debitosLD[$cont2];
                $detalleLibroMovimientos->creditosLD = $creditosLD[$cont2];
                $detalleLibroMovimientos->debitosSI = "";
                $detalleLibroMovimientos->creditosSI = "";
                $detalleLibroMovimientos->save();
                $cont2 = $cont2 + 1;
            }

    // Redireccionar a la página de índice con un mensaje de éxito
    return redirect()->route("libroDiario.index")->with("success", "Agregado con éxito!");
    }


    public function show($id)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $libroDiario=LibroDiario::select('libro_diarios.fecha_hora','libro_diarios.idEmpresa','libro_diarios.descripcion','libro_diarios.total')
        ->where('libro_diarios.id', '=', $id)
        ->first();//PARA OBTENER EL PRIMER INGRESO QUE SE CUMPLA CON RESPECTO AL WHERE

        $detallesLD=DetalleLibroDiario::select('detalle_libro_diarios.codigo','detalle_libro_diarios.cuenta', 'detalle_libro_diarios.debitosLD', 'detalle_libro_diarios.creditosLD','detalle_libro_diarios.totalDebitosLD','detalle_libro_diarios.totalCreditosLD')
        ->where('detalle_libro_diarios.idLibroDiarios', '=', $id)
        ->get();

        return view('libroDiario.show', compact('libroDiario','detallesLD'));
    }


    public function edit(LibroDiario $libroDiario)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');
    }


    public function update(Request $request, LibroDiario $libroDiario)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');
    }


    public function destroy($id)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        //CANCELA UN REGISTRO
        $libroDiario=LibroDiario::findOrFail($id);
        $libroDiario->estado='CANCELADO';
        $libroDiario->update();
        //SE HACE UNA REDIRECCION
        return redirect()->route('libroDiario.index')->with("success", "Cancelado con éxito!");
    }
}
