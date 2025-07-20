<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    //return "index";
    //return view('welcome');
    return ["aprendible" => ".com"];
});
*/

Route::get('/login', function () {
    return view('auth.login'); // Asegúrate de tener una vista auth/login.blade.php
})->name('login');


Route::view('/', 'welcome')->name('home');

Route::view("contacto","contact")->name('contact');

/*
Route::get("blog", [PostController::class,'index'])->name('posts.index'); //name('blog')

Route::get('/blog/create',[PostController::class, "create"])->name('posts.create');

Route::post('/blog',[PostController::class, "store"])->name('posts.store');

Route::get("/blog/{post}", [PostController::class, "show"])->name('posts.show');

Route::get("/blog/{post}/edit", [PostController::class, "edit"])->name('posts.edit');

Route::patch("/blog/{post}", [PostController::class, "update"])->name('posts.update');

Route::delete("/blog/{post}", [PostController::class, "destroy"])->name('posts.destroy');
*/

//Route::resource('posts', PostController::class);

Route::resource("blog", PostController::class, ['names' => 'posts', 'parameters' => ['blog' => 'post']]);

Route::view("nosotros","about")->name('about')->middleware("auth");

Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'password.confirm'])->group(function(){
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*
Route::match(['put','parch'],'/',function(){

});

Route::any('/', function(){

});
*/
