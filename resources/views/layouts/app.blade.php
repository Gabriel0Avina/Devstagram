<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')

        <title>Devstagram - @yield('titulo')</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        @livewireStyles

      
    </head>
    <body class="bg-gradient-to-t from-rose-50 to-teal-50">
     <header class="p-5 border-b  shadow-lg bg-[conic-gradient(at_top,_var(--tw-gradient-stops))] from-gray-200 via-gray-100 to-gray-200">
        <div class="container mx-auto flex justify-between items-center">
            
               <a class="text-3xl font-black" href="{{route('home')}}">DevStagram</a> 
            

           @auth
           <nav class="flex gap-2 items-center">

            <a href="{{route('posts.create')}}" class="relative inline-flex items-center justify-center p-4 px-5 py-3 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out rounded-full shadow-xl group hover:ring-1 hover:ring-purple-500">
                <span class="absolute inset-0 w-full h-full bg-gradient-to-br from-blue-600 via-purple-600 to-pink-700"></span>
                <span class="absolute bottom-0 right-0 block w-64 h-64 mb-32 mr-4 transition duration-500 origin-bottom-left transform rotate-45 translate-x-24 bg-pink-500 rounded-full opacity-30 group-hover:rotate-90 ease"></span>          
                <span class="relative text-white flex gap-2 ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
                Crear
                </span>
                </a>

            {{-- <a href="{{route('posts.create')}}" class="flex items-center gap-2 bg-white p-2 text-gray-600 uppercase text-sm font-bold cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
                  
                <p>Crear</p>  --}}
            </a>
           <a href="{{route('post.index',auth()->user()->username)}}" class="font-bold  text-gray-600 text-sm">Hola:  <span class="font-normal">{{auth()->user()->username}}</span> </a>
           <form action="{{route('logout')}}" method="POST">
            @csrf
               <button type="submit" class="font-bold uppercase text-gray-600 text-sm">Cerrar Sesion</button>
           </form>
           </nav>
           @endauth
           @guest
              
           <nav class="felx gap-2 items-center">
               <a href="{{route('login')}}" class="font-bold uppercase text-gray-600 text-sm">Login</a>
               <a href="{{route ('register')}}" class="font-bold uppercase text-gray-600 text-sm">Crear cuenta</a>
           </nav>
           @endguest
        </div>

     </header>
     <main class="container mx-auto mt-10">
        <h2 class="font-black text-3xl text-center mb-10">@yield('titulo')</h2>
        @yield('contenido')
     </main>
     <footer class="text-center font-bold text-gray-600 uppercase p-5">
        Devstagram - Todos los derechos reservados
        {{-- @php
         echo date ('Y')
        @endphp --}}
        {{now()->year}}
    </footer>
  @livewireScripts
    </body>
</html>