<?php

use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DireccionesController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\ImagenesController;
use App\Http\Controllers\PayPalController;
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


/* PARTE DEL LOGIN DEJAR TAL CUAL ESTÁN*/
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* CONTROLADOR ARTICULOS */

Route::resource('articulos', ArticulosController::class);

Route::get('/', [ArticulosController::class, 'index'])->name('pagina_principal'); /* PAGINA PRINCIPAL 1, LA OTRA ES LA PÁGINA INFORMATIVA */

Route::get('/reportar/{id}', [ArticulosController::class, 'reportar'])->name('reportar');

Route::get('ficha-articulo-en-pdf/{id}', 'App\Http\Controllers\ArticulosController@ficha_articulo_pdf')->name('GENERAR_PDF');

Route::get('Lista-articulos', 'App\Http\Controllers\ArticulosController@lista_articulos_pdf')->name('LISTA_ART_PDF_USER');

Route::get('/descuentos', [ArticulosController::class, 'descuentos'])->name('descuentos');

Route::get('/busquedas/{id}/{tipo_busqueda}', [ArticulosController::class, 'busquedas'])->name('buscar');

/* CONTROLADOR DE CATEGORIAS */

Route::resource('categorias', CategoriasController::class);

Route::get('/Admin-categorias', [CategoriasController::class, 'index'])->name('admin_categorias');


/* CONTROLADOR DE USERS */
Route::resource('user', UsersController::class);
Route::get('/Clientes-Registrados', [UsersController::class, 'index'])->name('MIS_CLIENTES');
Route::get('Mis-articulos-vendidos', [UsersController::class, 'getMisArtVendidos'])->name('MIS_ART_VENDIDOS');

/* seccion mis compras y entregas */
Route::get('Tus-Compras', [UsersController::class, 'getComprasMias'])->name('MIS_COMPRAS');
Route::get('Tus-Entregas', [UsersController::class, 'getEntregas'])->name('ENTREGAS');

/* DIRECCIONES */
Route::resource('direcciones',DireccionesController::class);

/* IMAGENES */
Route::resource('imagenes_ruta',ImagenesController::class);


/* CUANDO PAGA CON PAYPAL GENERA FACTURA */
Route::get('/Factura-Membresia',[PayPalController::class,'getFacturaMembresia'])->name('paypal');


/* PAGINA DE CONTACTO */
Route::resource('contacto-pagina', ContactoController::class);


/* ESTA SECCION ES LAS RUTAS AL CARRITO CONTROLLER */
Route::get('/cart', [CarritoController::class, 'cart'])->name('cart.index');
Route::post('/add', [CarritoController::class, 'add'])->name('cart.store');
Route::post('/update', [CarritoController::class, 'update'])->name('cart.update');
Route::post('/remove', [CarritoController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CarritoController::class, 'clear'])->name('cart.clear');

Route::get('/Tu-Factura', [CarritoController::class, 'invoice'])->name('mi_factura');


/* MOVIMIENTOS CON LA FACTURA */
Route::resource('facturas', FacturasController::class);
Route::get('Giros-y-Facturas', [FacturasController::class, 'getFacturas'])->name('SECC_FACT');
Route::get('PDF-De-Tus-Compras', [FacturasController::class, 'getPDFMisCompras'])->name('PDF_COMPRAS_USER');

/* PARTE DE LAS RUTAS HACIA LA VISTA ADMIN */
Route::get('Productos-Reportados', [ArticulosController::class,'get_reportados'])->name('ver_reportados');
Route::get('Reporte-de-ganacias', [UsersController::class,'get_pdf_ganancias'])->name('get_ganacias_pdf');


/* CAMBIAR ESTADO DEL ARTÍCULO UNA VEZ REPORTADO */
Route::get('Estado_Cambiar',[UsersController::class, 'cambiar_reporte'])->name('devolver_producto_o_no');