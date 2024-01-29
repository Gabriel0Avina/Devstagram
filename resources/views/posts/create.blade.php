@extends('layouts.app')
@section('titulo')
Crea una nueva publicacion 
@endsection
@push('styles')
    
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center " >
        <div class="md:w-1/2 px-10 mt-10 md:mt-0">
            <form action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded-lg flex flex-col  justify-center items-center">
            @csrf
            </form>
        </div>
        <div class="md:w-1/2 px-10 bg-white rounded-lg shadow-xl p-5">
            <form action="{{route('posts.store')}}" method="POST">
                @csrf
                {{-- NOMBRE --}}
                <div class="mb-3">
                    <label for="titulo"  class="block mb-2 uppercase text-gray-500 font-bold">Titulo </label>
                    <input type="text" value="{{old('titulo')}}" name="titulo" id="titulo" placeholder="titulo de la descripcion" class="border p-3 w-full rounded-lg 
                     @error('titulo')
                        border-red-500 border-2
                    @enderror ">
                    @error('titulo')
                        <p class="bg-red-600 text-white my-2 rounded-lg text-sm p-2 text-center uppercase 
                        @error('titulo')
                        border-red-500 border-2
                    @enderror">{{$message}}</p>
                    @enderror
                </div>
                {{-- Descripcion  --}}
                <div class="mb-3">
                    <label for="descripcion"  class="block mb-2 uppercase text-gray-500 font-bold">descripcion </label>
                    <textarea  name="descripcion" id="descripcion"  placeholder="Descripcion de la publicacion"
                    class="border p-3 w-full rounded-lg 
                     @error('descripcion')
                        border-red-500 border-2
                    @enderror "> 
                    {{old('descripcion')}}
                    </textarea>
                    @error('descripcion')
                        <p class="bg-red-600 text-white my-2 rounded-lg text-sm p-2 text-center uppercase 
                        @error('descripcion')
                        border-red-500 border-2
                    @enderror">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input 
                        type="hidden" 
                        name="imagen"   
                        value="{{old('imagen')}}"                   
                    >
                    @error('imagen')
                        <p class="bg-red-600 text-white my-2 rounded-lg text-sm p-2 text-center uppercase 
                    @error('descripcion')
                    border-red-500 border-2
                    @enderror">{{$message}}</p>
                    @enderror

                </div>

                <input type="submit" value="Crear publicacion" class="bg-sky-600 hover:bg-sky-700 transition-all cursor-pointer uppercase font-bold  text-white w-full p-2 shadow-md  rounded-lg mt-3">
            </form>
        </div>
    </div>
@endsection