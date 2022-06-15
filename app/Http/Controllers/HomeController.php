<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categorias = Categoria::all();
        
        if(Auth::user()->id_tipo_cuenta==2){ // ES ADMIN

            $articulos = Articulo::with('obtener_user')
            ->where('reportado','1')
            ->get();
            
            return view('admin',compact('articulos')); 

        }else{ // SINO, ES UN VENDEDOR

        $mis_art = Articulo::with('obtener_imagenes')
        ->where('id_user',Auth::user()->id_user)
        ->where('reportado','0') // SINO HA SIDO REPORTADO, QUE LO VEA EL CLIENTE
        ->where('disponibilidad','1') // SIMULA ELIMINADO O NO
        ->get();
        
        return view('user',compact(['categorias','mis_art']));
        }
        
    }
}
