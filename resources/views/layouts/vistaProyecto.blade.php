<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PROYECTOS') }}
        </h2>
    </x-slot>

    <div>
        <div class="py-12">
            {{-- BORDES LATERALES GRISES --}}
            {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">  --}}
            <div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!doctype html>
    <html lang="es">

        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Bootstrap ver 5.3.1 CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

      <!-- Bootstrap ICONOS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

      <!-- FUENTES DE TEXTO -->
      <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300;700&display=swap" rel="=stylesheet">

      <!-- CDN bootstrap-select@1.13.14 -->
      <link rel="stylesheet" href="{{ asset('/bootstrap/select.min.css') }}">

      <!-- ESTILO PERSONALIZADO CSS -->
      <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

      <!--  DataTables-->
      <link  rel="stylesheet" href="{{ asset('/css/datatables.min.css')}}">

         <!-- - ICONO- -->
  <link rel="icon" href="{{ asset('/img/icono.ico')}}">



        <title>@yield('title')</title>

      </head>


      <body>

         <!-- Nav Lateral -->
            <div class="d-flex">
                <div id="sidebar-contrainer" class="bg-primary">
                    <nav class="navbar navbar-expand-lg">
                        <section class="nav-lateral">
                            <div class="nav-lateral-content" class="collapse navbar-collapse" id="navbarScroll">
                                <figure class="nav-lateral-avatar">
                                    <img src="{{ asset('/img/logo.jpg') }}" alt="CONIC">

                                    <figcaption class="roboto-medium text-center"> <h3 class="text-light font-weight-bold">CONIC</H3></figcaption>
                                </figure>

                                <div class="nav-lateral-bar"></div>

                               <section>
                                    <ul class="list-group">
                                      <a href="{{ route("manejoProyectos.index") }}" class="style-icono"><i class="bi bi-journals style-icono2"></i><h6 class="style-texto">Nombre Proyecto</h6></a>
                                      <a href="{{ route("responsableProyectos.index") }}" class="style-icono"><i class="bi bi-person-video style-icono2"></i><h6 class="style-texto">Responsable</h6></a>
                                      <a href="{{ route("manejoProyectos.fasesProyectos") }}" class="style-icono"><i class="bi bi-list-ol style-icono2"></i><h6 class="style-texto">Fases</h6></a>
                                      <a href="{{ route("admin.info") }}" class="style-icono"><i class="bi bi-info-circle-fill style-icono2"></i><h6 class="style-texto">Información</h6></a>
                                    </ul>
                                  </section>

                            </div>
                        </section>
                    </nav>
            </div>


        @yield('menuLateral')


<!-- jQuery  3.7.0.slim.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('/cdn-jq/jquery-3.7.0.slim.min.js')}}"></script>

@stack('scripts')

<!--    DataTables  -->
<script src="{{asset('/cdn-dataTables/pdfmake.min.js')}}"></script>
<script src="{{asset('/cdn-dataTables/vfs_fonts.js')}}"></script>
<script src="{{asset('/cdn-dataTables/datatables.min.js')}}"></script>

<!-- bootstrap ver 5.3.1 -->
<script src="{{asset('/cdn-b5/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/cdn-b5/popper.min.js')}}" ></script>
<script src="{{asset('/cdn-b5/bootstrap.min.js')}}"></script>

<!-- CDN PARA SELCT -->
<script src="{{asset('/cdn-select/popper.min.js')}}"></script>
<script src="{{asset('/cdn-select/bootstrap.min.js')}}"></script>
<script src="{{asset('/cdn-select/bootstrap-select.min.js')}}"></script>


<!--JAVASCRIPT -->
<script src="{{asset('/cdn-sweetalert/sweetalert2@11.js')}}"></script>
<script src="{{asset('/js/scriptSelect.js')}}"></script>
{{-- <script src="{{asset('/js/scriptBtnAgregar.js')}}"></script> --}}
<script src="{{asset('/js/scriptSplit.js')}}"></script>
{{-- <script src="/js/scriptDataTables.js"></script> --}}
{{-- <script src="{{asset('/js/app.js')}}"></script> --}}



</body>

</html>
            </div>
        </div>
    </div>

</x-app-layout>
