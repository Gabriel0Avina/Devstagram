<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\HomeController;
use App\Livewire\Like;

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);

Route::post('/logout',[LogoutController::class, 'store'])->name('logout');


//rutas para editar el perfil
Route::get('/editar-perfil',[PerfilController::class,'index'])->name('perfil.index');
Route::post('/editar-perfil',[PerfilController::class,'store'])->name('perfil.store');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/{user:username}', [PostController::class, 'index'])->name('post.index');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Comentarios
Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');;

//likes
Route::post('/post/{post}/likes', [LikeController::class, 'store'])->name('post.likes.store');
Route::delete('/post/{post}/likes', [LikeController::class, 'destroy'])->name('post.likes.destroy');

Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');

//Followers
Route::post('/{user:username}/follower',[FollowerController::class,'store'])->name('users.follower');
Route::delete('/{user:username}/unfollow',[FollowerController::class,'destroy'])->name('users.unfollow');