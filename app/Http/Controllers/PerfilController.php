<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
       return view('perfil.index');
    }
    public function store(Request $request){

        $request->request->add(['username'=>Str::slug($request->username)]);

        $this->validate($request,[
            'username' => ['required','unique:users,username,'.auth()->user()->id,'min:3','max:20'],
        ]);
        //obtener la imagen 
        if($request->imagen){

            $imagen = $request->file('imagen');
          
            //intervetion image
            $nombreImagen = Str::uuid(). ".".$imagen->extension();
            $imagenServidor = Image::make($imagen);
    
            $imagenServidor->fit(1000,1000);
          
            //Guardar la imagen en el servidor
            $imagenPath= public_path('perfiles'). '/' . $nombreImagen;
           
            $imagenServidor->save($imagenPath);
        }
        //guardar los cambios 
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null ;
        $usuario->save();

        //redireccionar al usuario 

        return redirect()->route('post.index', $usuario->username);
        
    }
}
