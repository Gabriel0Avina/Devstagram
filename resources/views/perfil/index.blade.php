@extends('layouts.app')

@section('titulo')
    Editar perfil: {{auth()->user()->username}}
@endsection

@section('contenido')

    <div class="md:flex md:justify-center">
        <div class="bg-white md:w-1/2 shadow p-6 ">
            <form action="{{route('perfil.store')}}" method="POST" class="mt-10 md:mt-0" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="username"  class="block mb-2 uppercase text-gray-500 font-bold">Username </label>
                    <input type="text" value="{{auth()->user()->username}}" name="username" id="username" placeholder="Tu nombre de usuario" class="border p-3 w-full rounded-lg 
                     @error('username')
                        border-red-500 border-2
                    @enderror ">
                    @error('username')
                        <p class="bg-red-600 text-white my-2 rounded-lg text-sm p-2 text-center uppercase 
                        @error('username')
                        border-red-500 border-2
                    @enderror">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="imagen"  class="block mb-2 uppercase text-gray-500 font-bold">Cambiar Imagen perfil </label>
                    <input type="file" accept=".jpg, .jpeg, .png" value="" name="imagen" id="imagen"  class="border p-3 w-full ">
                   
                </div>
                <input type="submit" value="Guardar Cambios" class="bg-sky-600 hover:bg-sky-700 transition-all cursor-pointer uppercase font-bold  text-white w-full p-2 shadow-md  rounded-lg mt-3">
            </form>
        </div>
    </div>

@endsection