<?php

namespace App\Http\Controllers;



use App\Models\ClaseCuenta;
use App\Models\DetallePlanCuentaAuxiliar;
use App\Models\EstadoFinanciero;
use App\Models\GrupoCuenta;
use App\Models\PlanCuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;

class PlanCuentaController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');


        $planCuentas = PlanCuenta::all();
        $detallePlanCuentas = DetallePlanCuentaAuxiliar::all();

        return view('planCuentas.index', compact( 'planCuentas','detallePlanCuentas'));
    }


    public function create()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $claseCuentas=ClaseCuenta::all();

        $grupoCuentas=GrupoCuenta::all();

        $estadoFinanciero=EstadoFinanciero::all();

        return view('planCuentas.create', compact('claseCuentas', 'grupoCuentas', 'estadoFinanciero'));

    }


    public function store(Request $request)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $request->validate([
            'codigoPC' => [
                'required',
                Rule::unique('plan_cuentas', 'codigoPC'),
            ],
            'idClaseCuenta' => 'required',
            'idGrupoCuenta' => 'required',
            'idEstadoFinanciero' => 'required',
            'cuentaPC' => 'required',
        ], [
            'codigoPC.required' => 'El campo codigo cuenta es requerido',
            'codigoPC.unique' => 'El campo código cuenta ya está en uso',
            'idClaseCuenta.required' => 'El campo id de la clase de cuenta es requerido',
            'idGrupoCuenta.required' => 'El campo id del grupo de cuenta es requerido',
            'idEstadoFinanciero.required' => 'El campo id del estado financiero es requerido',
            'cuentaPC.required' => 'El campo nombre cuenta es requerido',
        ]);

        $planCuenta = new PlanCuenta();
        $planCuenta->idClaseCuenta = $request->get('idClaseCuenta');
        $planCuenta->idGrupoCuenta = $request->get('idGrupoCuenta');
        $planCuenta->idEstadoFinanciero = $request->get('idEstadoFinanciero');
        $planCuenta->codigoPC = $request->get('codigoPC');
        $planCuenta->cuentaPC = $request->get('cuentaPC');
        $planCuenta->save();

        // Verificar la opción seleccionada
        $opcion = $request->get('selectAuxiliar');

        if ($opcion == 1) {
            if ($request->has('inputs')) {
                $idPlanCuentas = $planCuenta;

                $reglas = [
                    'inputs.*.codigo' => 'required|unique:detalle_plan_cuenta_auxiliars,codigo',
                    'inputs.*.cuenta' => 'required',
                ];

                $validacion = [
                    'inputs.*.codigo' => 'El campo codigo auxiliar es requerido',
                    'inputs.*.cuenta' => 'El campo cuenta auxiliar es requerida',
                ];

                $request->validate($reglas, $validacion);

                foreach ($request->inputs as $key => $value) {
                    DetallePlanCuentaAuxiliar::create([
                        'idPlanCuentas' => $idPlanCuentas->id,
                        'codigo' => $value['codigo'],
                        'cuenta' => $value['cuenta'],
                    ]);
                }
            }
        }

        return back()->with('success', 'Agregado a la tabla');
    }


    public function show(PlanCuenta $planCuenta)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');


        return view('planCuentas.show', compact('panCuenta'));
    }


    public function edit(PlanCuenta $planCuenta)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        //
    }


    public function update(Request $request, PlanCuenta $planCuenta)
    {
        //
    }


    public function destroy(PlanCuenta $registroCuenta)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        //
    }
}
