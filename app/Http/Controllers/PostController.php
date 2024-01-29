<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Auth\Events\Validated;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show','index']);
    }
    //
    public function index(User $user){
      
        $posts = Post::where('user_id', $user->id)->latest()->paginate(5);

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
    public function create(){
       return (view('posts.create'));   
    }
    public function store(Request $request){
        $this->validate($request,[
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);
        // Post::create([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $request->imagen,           
        //     'user_id' => auth()->user()->id
        // ]);
            /* Otra forma de crear y guardar en laravel*/
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,            
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('post.index', auth()->user()->username);
    }

    public function show(User $user, Post $post){
        return view('posts.show',[
            'post' => $post,
            'user' => $user
        ]);
    }
    public function destroy(Post $post){
        //Con esto utilizamos el metodo que creamos en el PostPolicy para asegurarnos que el post del usuario y el usuario sea el mismo
        $this->authorize('delete', $post);
        //si son lo mismo lo eliminamos 
        $post->delete();
        //eliminar la imagen 
        $imagen_path = public_path('uploads/'. $post->imagen);
        if(File::exists($imagen_path)){
            unlink($imagen_path);
        }
        return redirect()->route('post.index',auth()->user()->username);
    }

    
}
