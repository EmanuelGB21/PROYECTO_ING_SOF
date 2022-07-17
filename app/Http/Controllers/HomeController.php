<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Direccion;
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

        $provincias = array('0' => 'Alajuela', 
        '1' => 'Cartago',
        '2' => 'Guanacaste',
        '3' => 'Heredia',
        '4' => 'Limón',
        '5' => 'Puntarenas',
        '6' => 'San José',
        );
        
        if(Auth::user()->id_tipo_cuenta==2){ // ES ADMIN

            $articulos = Articulo::with('obtener_user')
            ->where('reportado','1')
            ->where('disponibilidad','1')
            ->get();
            
            return view('admin',compact('articulos')); 

        }else if(Auth::user()->id_tipo_cuenta==1){ // SINO, ES UN VENDEDOR
        
            if(Auth::user()->estado_cuenta==1){
                $mis_art = Articulo::with('obtener_imagenes')
                ->where('id_user',Auth::user()->id_user)
                ->where('reportado','0') // SINO HA SIDO REPORTADO, QUE LO VEA EL CLIENTE
                ->where('disponibilidad','1') // SIMULA ELIMINADO O NO
                ->get();
                
                if(Direccion::where('id_user',Auth::user()->id_user)->exists()){
                    return view('user',compact('mis_art'),['direccion'=>'no_falta']); 
                }
                else{
                    return view('user',compact(['mis_art','provincias']),
                    ['direccion'=>'falta']);
                }
                
            }else{
                return view('ERROR.error_acceso');
            }
        }
    }
}
