<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
  </head>
  <body>
    <!-- Document body -->
    <nav  class="flex py-5 bg-purple-500 text-white" >
      <div class="w-1/2 px-12 mr-auto">
        <p class="text-2xl font-bold">SOCIAL TRIVIA</p>
      </div>

      <ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">
        @if(auth()->check())
        <li class="mx-4">
          <p class="text-xl">Bienvenido <b>{{auth()->user()->name}}</b> </p>
        </li>
        <li>
          <a href="{{route('login.destroy')}}" class="font-bold py-2 px-4 rounded-md bg-red-500 hover:bg-red-500 hover:bg-red-600 hover:text-purple-700">Cerrar Sesion</a>
        </li>
        @else
        <li class="mx-4">
          <a href="{{route('login.index')}}" class="font-semibold border-2 border-white py-2 px-4 rounded-md hover:bg-white hover:text-purple-700">Ingresar</a>
        </li>
        <li>
          <a href="{{route('register.index')}}" class="font-semibold border-2 border-white py-2 px-4 rounded-md hover:bg-white hover:text-purple-700">Registrarse</a>
        </li>

        @endif

      </ul>
    </nav>

    @yield('content2')



  </body>
</html>