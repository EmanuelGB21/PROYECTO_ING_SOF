<?php

use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\CategoriasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/* RUTAS DE LA PÁGINA WEB */

Route::get('/ACERCA-DE', function () {
    return view('otras_paginas.acerca_de');
})->name('IR_ACERCA_DE');

Route::get('/AYUDA', function () {
    return view('otras_paginas.ayuda');
})->name('IR_AYUDA');

Route::get('/VER-MAS', function () {
    return view('pagina_principal.ver_mas');
})->name('VER_MAS_PRODUCTO');


/* PARTE DEL LOGIN */
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* CONTROLADOR ARTICULOS */

Route::resource('articulos', ArticulosController::class);

Route::get('/', [ArticulosController::class, 'index'])->name('pagina_principal'); /* PAGINA PRINCIPAL 1, LA OTRA ES LA PÁGINA INFORMATIVA */

Route::get('/reportar/{id}', [ArticulosController::class, 'reportar'])->name('reportar');

Route::get('FICHA-ARTICULO-PDF', 'App\Http\Controllers\ArticulosController@ficha_articulo_pdf')->name('GENERAR_PDF');

Route::get('/articulos/descuentos', [ArticulosController::class, 'descuentos'])->name('descuentos');

/* CONTROLADOR DE CATEGORIAS */

Route::resource('categorias', CategoriasController::class);

Route::get('/admin-categorias', [CategoriasController::class, 'index'])->name('admin_categorias');