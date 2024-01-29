<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user, Post $post){
        //validar
        $this->validate($request,[
            'comentario'=> 'required|max:255',
        ]);
        //almacenar
        Comentario::create([
            'user_id'=> auth()->user()->id, // al poner el auth usamos el helper para extraer el usuario que comenta y no el usuario propio 
            'post_id'=> $post->id,
            'comentario'=> $request->comentario 
        ]);

        //imprimir mensaje
        return back()->with('mensaje', 'Comentario hecho');
    }
}
