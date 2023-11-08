<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PENDIENTE') }}
        </h2> --}}
    </x-slot>

    <div>
    <div class="py-12">
        {{-- BORDES LATERALES GRISES --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <!-- FUENTES DE TEXTO -->
        <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300;700&display=swap" rel="=stylesheet">
        <!-- ESTILO PERSONALIZADO -->
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

        <title>@yield('title')</title>

      </head>

      <style>
        .centered {
          text-align: center;
        }

        .color{
            color: rgb(199, 40, 40);
        }

        .justified {
            text-align: justify;
        }
      </style>


      <body>

         <!-- Nav Lateral -->
            <div class="d-flex">



            <div>
                <h1>BIENVENIDO</h1>
                <h2 class="centered">CORDINADORA NACIONAL INDIGENA Y CAMPESINA -CONIC-</h2>
                <br>
                <h2 class="color">Visión y misión</h2>
                <br>

                <h3>Misión</h3>
                <h5 class="justified">La misión de la CONIC se define como un grupo de mujeres y hombres de comunidades mayas y campesinos que trabajan organizados solidariamente y hermanados desde su cosmovisión, tejiendo el buen vivir en equilibrio y armonía con ellos mismos, los otros y la madre naturaleza. Luchan, además, para cambiar el modelo dominante, exigiendo y haciendo valer sus derechos como pueblos ante el Estado. </h5>

                <br>

                <h3>Visión</h3>
                <h5 class="justified">La visión de la CONIC es ser un movimiento fortalecido desde la cosmovisión maya. Tiene impacto por su capacidad propositiva y cualitativa para el buen vivir de las personas, comunidades y naturaleza, y cuenta con la participación equitativa y armónica entre mujeres y hombres de diferentes edades en las áreas territoriales de interacción.</h5>

                <br>
                <h5 class="justified">La CONIC, además, considera el poder comunitario como una fuerza importante que incide en la formulación e implementación de políticas públicas para el cumplimiento de los derechos de los pueblos indígenas y que genera procesos encaminados a la refundación del Estado actual.</h5>
            </div>


        @yield('menuLateral')






    <!-- Bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="/js/app.js" defer></script>
    <!-- jquery  -->
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>


</body>

</html>
            </div>
        </div>
    </div>

</x-app-layout>
