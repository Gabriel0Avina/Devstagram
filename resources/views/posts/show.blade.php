@extends('layouts.app')
@section('titulo')
{{$post->titulo}}
@endsection

@section('contenido')
<div class="container mx-auto md:flex">



    <div class="md:w-1/2">
        <img src="{{asset('uploads').'/'.$post->imagen}}" alt="imagen del post{{$post->titulo}}">
        <div class="gap-4 md:p-2 flex items-center p-3">
            @auth            
            <livewire:lik :post="$post" />
            @endauth
            
        </div>
        <div class="p-5 md:p-0">
            <a href="{{route('post.index',$user)}}">
                <p class=" font-bold">{{$post->user->username}}</p>
            </a>
            <p class="text-sm text-gray-500">{{$post->created_at->diffForHumans()}}</p>
            <p class="mt-5">{{$post->descripcion}}</p>
        </div>
        {{-- Mostrar el boton de eliminar solo si es tu publicacion --}}
        @auth
        @if ($post->user_id == auth()->user()->id)
        <form action="{{route('post.destroy', $post)}}" method="POST">
            @method('DELETE')
            @csrf
            <input type="submit" value="Eliminar publicacion"
                class=" bg-red-600 transition-all text-white mt-3 font-bold cursor-pointer p-2 rounded-md hover:bg-red-700">
        </form>
        @endif
        @endauth
    </div>
    <div class="md:w-1/2 p-5">
        <div class="shadow bg-white p-5 m-5">
            @auth
            <p class="text-xl font-bold text-center mb-4  ">Agrega un nuevo comentario</p>

            @if (session('mensaje'))
            <div
                class="relative block text-center font-bold w-full p-4 mb-4 text-base leading-5 text-white bg-green-500 rounded-lg opacity-100 font-regular">
                <p>{{session('mensaje')}}</p>
            </div>
            @endif

            <form action="{{route('comentarios.store',['post'=>$post, 'user'=>$user])}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="comentario" class="block mb-2  text-gray-500 font-bold"> Añade un comentario </label>
                    <textarea name="comentario" id="comentario" class="border p-3 w-full rounded-lg 
                     @error('comentario')
                        border-red-500 border-2
                    @enderror ">

                    </textarea>
                    @error('comentario')
                    <p class="bg-red-600 text-white my-2 rounded-lg text-sm p-2 text-center uppercase 
                        @error('comentario')
                        border-red-500 border-2
                    @enderror">{{$message}}</p>
                    @enderror

                    <input type="submit" value="Comentar"
                        class="bg-sky-600 hover:bg-sky-700 transition-all cursor-pointer uppercase font-bold  text-white w-full p-2 shadow-md  rounded-lg mt-3">
                </div>
            </form>
            @endauth
            <div
                class=" border p-5 rounded-lg shadow-[5px_5px_rgba(0,_98,_90,_0.4),_10px_10px_rgba(0,_98,_90,_0.3),_15px_15px_rgba(0,_98,_90,_0.2),_20px_20px_rgba(0,_98,_90,_0.1),_25px_25px_rgba(0,_98,_90,_0.05)]">
                @if ($post->comentarios->count())
                @foreach ($post->comentarios as $comentario )
                <div class="p-5 border-gray-300 border-b">
                    <a href="{{route('post.index',$comentario->user)}}"
                        class="font-bold text-indigo-500 ">{{$comentario->user->username}}</a>
                    <p class="mt-2">{{$comentario->comentario}}</p>
                    <p class="text-gray-500 text-sm">{{$comentario->created_at->diffForHumans()}}</p>
                </div>
                @endforeach
                @else()
                <p class="text-gray-500 ">no hay comentarios </p>

                @endif

            </div>
        </div>


    </div>


</div>
@endsection