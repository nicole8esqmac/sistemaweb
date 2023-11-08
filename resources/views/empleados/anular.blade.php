@extends('layouts.vistapadre')

@section('title','Admin-Usuarios')

@section('menuLateral')

@if(Session::has('mensaje'))
  {{ Session::get('mensaje')}}
 @endif

{{-- <div id="content"> --}}
	<div class="container">
		  <section class="py-5">
				<h2 class="font-weight-bold mb-0"><i class="bi bi-person-plus-fill"></i>&nbsp; ELIMINAR USUARIO</h2>
				<p class="lead text-muted">Revisa el contenido</p>
			</section>


	   <!-- Content FORMULARIO CANCELAR-->
       <div class="container-fluid ">
                    <div class="card">
                        <h5 class="card-header bg-light font-weight-bold mb-0">Eliminar dato Usuarios</h5>
                        <div class="card-body">
                          <p class="card-text">
                              <div class="alert alert-danger" role="alert">
                                  Esta seguro de eliminar este registro!!!

                                  <br><br>

                                  <div class="table-responsive">
                                    <table class="table table-sm table-dark">
                                          <thead>
                                              <tr class="text-center roboto-medium">
                                                  <th>DPI</th>
                                                  <th>NOMBRE Y APELLIDO</th>
                                                  <th>FECHA DE NACIMIENTO</th>
                                                  <th>TELEFONO</th>
                                                  <th>CELULAR</th>
                                                  <th>DIRECCIÓN</th>
                                                  <th>SALARIO</th>
                                                  <th>SEXO</th>
                                              </tr>
                                          </thead>
                                          <tbody>

                                                <tr class="table-secondary text-center">
                                                    <td>{{ $empleados->dpi }}</td>
                                                    <td>{{ $empleados->nombre }} {{ $empleados->apellido }} </td>
                                                    <td>{{ $empleados->fechadenacimiento }}</td>
                                                    <td>{{ $empleados->telefono }}</td>
                                                    <td>{{ $empleados->celular }}</td>
                                                    <td>{{ $empleados->direccion }}</td>
                                                    <td>{{ $empleados->salario }}</td>
                                                    <td>{{ $empleados->sexo }}</td>
                                                </tr>
                                          </tbody>
                                      </table>
                                      <hr>
                                      {{-- <form action="{{ route("empleados.destroy", $empleados->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                          <a href="{{ route("empleados.index")}}"></a>
                                          <button class="btn bg-danger"><i class="bi bi-trash-fill"></i> Eliminar</button>
                                      </form> --}}
                                      <form action="{{ route("empleados.destroy", $empleados->id) }}" method="POST" onsubmit="return confirm('Esta seguro?');">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn bg-danger" value="Delete"><i class="bi bi-trash-fill"></i> Eliminar</button>
                                    </form>
                                </div>
                              </div>
                          </p>
                        </div>
                    </div>
            </section>

    </div>


@endsection
