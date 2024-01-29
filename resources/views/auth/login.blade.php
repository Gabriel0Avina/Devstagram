@extends('layouts.app')
@section('titulo')
Inicia Sesion en Devstagram
@endsection
@section('contenido')

    <div class="md:flex justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12">
           <img src="{{ asset('img/login.jpg') }}" alt="Imagen login de usuarios " class="rounded-lg">
        </div>
        <div class="md:w-4/12 bg-white rounded-lg shadow-xl p-5">
            <form method="POST" action="{{route('login')}}">
                @csrf
                @if(session('mensaje'))
                <p class="bg-red-600 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">{{session('mensaje')}}</p>
                @endif
                {{-- EMAIL --}}
                <div class="mb-3">
                    <label for="email"  class=" block mb-2 uppercase text-gray-500 font-bold">Email </label>
                    <input type="email" value="{{old('email')}}" name="email" id="email" placeholder=" Tu email de registro" class="border p-3 w-full rounded-lg
                    @error('email')
                    border-red-500 border-2
                    @enderror">
                    @error('email')
                    <p class="bg-red-600 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">{{$message}}</p>
                     @enderror
                </div>
                {{-- PASSWORD --}}
                <div class="mb-3">                    
                    <label for="password"  class=" block mb-2 uppercase text-gray-500 font-bold">password </label>
                    <input type="password" name="password" id="password" placeholder=" Tu Password" class="border p-3 w-full rounded-lg 
                    @error('password')
                    border-red-500 border-2
                    @enderror">
                    @error('password')
                    <p class="bg-red-600 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">{{$message}}</p>
                    @enderror
                </div>
               <div class="mb-5">
                <input type="checkbox" name="remember" ><label class=" m-2 text-sm capitalize text-gray-500 font-bold" for="remember">mantener mi sesion abierta</label>
                <a href="{{route('register')}}" class="m-2 text-sm capitalize text-gray-500 font-bold hover:underline">No tienes cuenta Crea una aqui </a>
               </div>
                <input type="submit" value="Iniciar Sesión" class="bg-sky-600 hover:bg-sky-700 transition-all cursor-pointer uppercase font-bold  text-white w-full p-2 shadow-md  rounded-lg mt-3">
            </form>
        </div>
    </div>
@endsection