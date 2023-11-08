<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administración') }}
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

         <!-- Bootstrap CSS -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap ICONOS -->
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <!-- FUENTES DE TEXTO -->
        <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300;700&display=swap" rel="=stylesheet">
        <!-- ESTILO PERSONALIZADO -->
        {{-- <link rel="stylesheet" href="/css/style.css"> --}}
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">


        <title>@yield('title')</title>

      </head>


      <body>

         <!-- Nav Lateral -->
            <div class="d-flex">
                <div id="sidebar-contrainer" class="bg-primary" >
                    <nav class="navbar navbar-expand-lg">
                        <section class="nav-lateral">
                            <div class="nav-lateral-content" class="collapse navbar-collapse" id="navbarScroll">
                                <figure class="nav-lateral-avatar">
                                    <img src="{{ asset('/img/logo.jpg') }}" alt="CONIC" >

                                    <figcaption class="roboto-medium text-center"> <h3 class="text-light font-weight-bold">CONIC</H3></figcaption>
                                </figure>

                                <div class="nav-lateral-bar"></div>

                               <section >
                                    <ul class="list-group">
                                      <a href="{{ route("admin.index") }}" class="style-icono"><i class="bi bi-people-fill style-icono2"></i><h6 class="style-texto">Admin</h6></a>
                                      <a href="{{ route("registroCuentas.create") }}" class="style-icono"><i class="bi bi-journals style-icono2"></i><h6 class="style-texto">Plan de Cuentas</h6></a>
                                      <a href="{{ route("registroComprobantes.index") }}" class="style-icono"><i class="bi bi-journals style-icono2"></i><h6 class="style-texto">Comprobante</h6></a>

                                      <a href="libroDiario" class="style-icono"><i class="bi bi-journals style-icono2"></i><h6 class="style-texto">Libro Diario</h6></a>
                                      <a href="libroMayor" class="style-icono"><i class="bi bi-journal-text style-icono2"></i><h6 class="style-texto">Libro Mayor</h6></a>
                                      <a href="balanceGeneral" class="style-icono"><i class="bi bi-file-post style-icono2"></i><h6 class="style-texto">Balance General</h6></a>
                                      <a href="estadoResultado" class="style-icono"><i class="bi bi-file-text-fill style-icono2"></i><h6 class="style-texto">Estado de Resultados</h6>
                                      <a href="libroInventario" class="style-icono"><i class="bi bi-file-earmark-spreadsheet style-icono2"></i><h6 class="style-texto">Libro de Inventario</h6></a>
                                      <a href="reportes" class="style-icono"><i class="bi bi-file-earmark-medical style-icono2"></i><h6 class="style-texto">Reportes</h6></a>
                                      <a href="plantillaPersonal" class="style-icono"><i class="bi bi-file-earmark-spreadsheet-fill style-icono2"></i><h6 class="style-texto">Plantilla Personal</h6></a>
                                    </ul>
                                  </section>

                            </div>
                        </section>
                    </nav>
            </div>


        @yield('menuLateral')






    <!-- Bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Scripts -->
    {{-- <script src="/js/app.js" defer></script> --}}
    <!-- jquery  -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>



</body>

</html>
            </div>
        </div>
    </div>

</x-app-layout>
