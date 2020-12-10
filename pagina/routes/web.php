<?php

use App\Http\Controllers\PublicacionController;
use Illuminate\Support\Facades\Route;


Route::get('/',function (){
    return Inertia\Inertia::render('PaginaPrincipal');
 });

 Route::get('/contacto',function (){
    return Inertia\Inertia::render('Inicio/Contacto');
 });

Route::group(["middleware" =>['auth:sanctum', 'verified']], function(){
   Route::get("/dashboard", function (){
       return Inertia\Inertia::render('Dashboard');
   })->name('dashboard');

   Route::resource("publicaciones", PublicacionController::class);
});
