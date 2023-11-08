
@extends('layouts.vistaProyecto')

@section('title','Saldo Inicial')

@section('menuLateral')


<!-- Content -->
    {{-- <div id="content"> --}}
      <div class="container">
          <section class="py-5">
            <h2 class="font-weight-bold mb-0"><i class="bi bi-file-earmark-text-fill"></i>&nbsp; Detalle Libro Diario</h2>
            <p class="lead text-muted">Revisa el contenido</p>
          </section>


    <br>



     <!-- Contenido Tabla -->
     <div class="container-fluid">
        <div class="block mb-8">
            <a href="{{ route('fase2Proyectos.index') }}" class="btn btn-secondary">Regresar</a>
        </div>
        <br>

        <fieldset  autocomplete="off">
            {{-- <legend class="form-neon"><i class="bi bi-journal-text"></i>&nbsp; Detalle libro diario</legend> --}}
            <br>

            <br>

            <div class="card">
            <div class="card-body" style="background: #F0F0F0">
            <div class="container-fluid">
                {{-- 1ra fila --}}

                <div class="row" >

                    <div class="col-12 col-md-4" >
                        <div class="form-group">
                            <label style="font-weight: 600; font-size: 20px" for="fecha">NOMBRE DEL RESPONSABLE</label>
                            <p>{{ $fase2Proyecto->responsable_proyecto->nombre }} {{ $fase2Proyecto->responsable_proyecto->apellido }}</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label style="font-weight: 600; font-size: 20px" for="comprobante">NOMBRE DEL PROYECTO</label>
                            {{-- SE AGREGA EL 1RO NOMBRE DECLARADO 2DO NOMBRE DE LA TABLA 3RO NOMBRE LA TABLA ROREING 4TO EL COLUMNA QUE DESEA --}}
                            <p>{{ $fase2Proyecto->responsable_proyecto->manejo_proyecto->titulo}}</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label style=" font-weight: 600; font-size:20px" for="descripcion">OBSERVACION</label>
                            <p>{{ $fase2Proyecto->observacion }}</p>
                        </div>
                    </div>

                </div>

                <br>

            </div>
        </div>
        </div>
        </fieldset>



      <section>

        <BR>

        {{-- TABLAS 2 --}}
        <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                <thead class="table-dark" class="cabecera-tabla">
                    <th>DPI</th>
                    <th>NOMBRE DEL BENEFICIARIO</th>
                    <th>DIRECCION</th>
                </thead>
                <tfoot class="tbody">

                </tfoot>
                <tbody>
                    @foreach ($detalleFase2Proyecto as $dato)

                        <tr>
                            <td>{{ $dato->dpi}}</td>
                            <td>{{ $dato->nombre}} {{ $dato->apellido}}</td>
                            <td>{{ $dato->direccion}}</td>

                        </tr>

                    @endforeach
                </tbody>
            </table>
          </div>

        </div>
    </div>

      </section>
  </div>
</div>
</div>

@endsection

