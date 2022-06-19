<?php

use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/* RUTAS DE LA PÁGINA WEB */

Route::get('/Acerca-De', function () {
    return view('otras_paginas.acerca_de');
})->name('IR_ACERCA_DE');

Route::get('/Ayuda', function () {
    return view('otras_paginas.ayuda');
})->name('IR_AYUDA');


/* PARTE DEL LOGIN */
Auth::routes();
Route::get('/Home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* CONTROLADOR ARTICULOS */

Route::resource('articulos', ArticulosController::class);

Route::get('/', [ArticulosController::class, 'index'])->name('pagina_principal'); /* PAGINA PRINCIPAL 1, LA OTRA ES LA PÁGINA INFORMATIVA */

Route::get('/reportar/{id}', [ArticulosController::class, 'reportar'])->name('reportar');

Route::get('ficha-articulo-en-pdf', 'App\Http\Controllers\ArticulosController@ficha_articulo_pdf')->name('GENERAR_PDF');

Route::get('/articulos/descuentos', [ArticulosController::class, 'descuentos'])->name('descuentos');

/* CONTROLADOR DE CATEGORIAS */

Route::resource('categorias', CategoriasController::class);

Route::get('/Admin-categorias', [CategoriasController::class, 'index'])->name('admin_categorias');


/* CONTROLADOR DE USERS */
Route::resource('user', UsersController::class);
Route::get('/Mis-clientes', [UsersController::class, 'index'])->name('MIS_CLIENTES');