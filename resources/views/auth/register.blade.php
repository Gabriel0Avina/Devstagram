@extends('layouts.app')
@section('titulo')
Registrate en Devstagram
@endsection
@section('contenido')
    <div class="md:flex justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12">
           <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen registro de usuarios " class="rounded-lg">
        </div>
        <div class="md:w-4/12 bg-white rounded-lg shadow-xl p-5">
            <form action="{{route ('register')}}" method="POST">
                @csrf
                {{-- NOMBRE --}}
                <div class="mb-3">
                    <label for="name"  class="block mb-2 uppercase text-gray-500 font-bold">Nombre </label>
                    <input type="text" value="{{old('name')}}" name="name" id="name" placeholder="Tu nombre" class="border p-3 w-full rounded-lg 
                     @error('name')
                        border-red-500 border-2
                    @enderror ">
                    @error('name')
                        <p class="bg-red-600 text-white my-2 rounded-lg text-sm p-2 text-center uppercase 
                        @error('name')
                        border-red-500 border-2
                    @enderror">{{$message}}</p>
                    @enderror
                </div>
                {{-- username --}}
                <div class="mb-3">
                    <label for="username"  class=" block mb-2 uppercase text-gray-500 font-bold">Usermane </label>
                    <input type="text" value="{{old('username')}}" name="username" id="username" placeholder=" Tu nombre de usuario" class="border p-3 w-full rounded-lg 
                     @error('username')
                    border-red-500 border-2
                     @enderror ">
                    @error('username')
                    <p class="bg-red-600 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">{{$message}}</p>
                    @enderror
                </div>
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
                 {{-- PASSWORD_CONFIRMATION --}}
                <div class="mb-3">                    
                    <label for="password_confirmation"  class=" block mb-2 uppercase text-gray-500 font-bold">Repetir tu password </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder=" Repite tu Password" class="border p-3 w-full rounded-lg ">
                </div>
                <input type="submit" value="Crear cuenta" class="bg-sky-600 hover:bg-sky-700 transition-all cursor-pointer uppercase font-bold  text-white w-full p-2 shadow-md  rounded-lg mt-3">
            </form>
        </div>
    </div>
@endsection