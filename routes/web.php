<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\QuienesController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ColaboratorsController;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;

//inicio
Route::get('/', [InicioController::class,'index']);

Route::get('/quienes_somos', function (){
    return view('paginas.quienes.index');
        })->name('quienes.inicio');

Route::get('/proyecto/{proyecto}', [ProyectoController::class,'show'])->name('proyecto.show');
Auth::routes();
//administrador
Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('administrador.inicio');
        })->name('admin.inicio')->middleware('auth');
        Route::resource('/sliders', SliderController::class)->middleware('auth');
        Route::resource('/proyectos', ProyectoController::class)->middleware('auth');
	Route::resource('/quienes_somos', QuienesController::class)->middleware('auth');
	Route::resource('/colaborador', ColaboratorsController::class)->middleware('auth');
	Route::resource('/contacto', ContactsController::class)->middleware('auth');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Middlewares

//AUTH




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
