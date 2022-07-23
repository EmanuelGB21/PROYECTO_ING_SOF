<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Direccion;
use App\Models\Factura;
use App\Models\User;
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

            $total_ventas = Factura::all()->count();
            $usuarios = User::all()->where('id_tipo_cuenta','!=',2);
            $total_publicados = Articulo::where('reportado',0)->count();
        
            return view('admin',compact(['total_ventas','usuarios','total_publicados'])); 

        }else if(Auth::user()->id_tipo_cuenta==1){ // SINO, ES UN VENDEDOR
        
            if(Auth::user()->estado_cuenta==1){ /* PREGUNTO SI CUENTA ESTÁ DISPONIBLE, SI LO ESTÁ HACE LAS COSAS, SINO ESTA PAGINA DE ERROR */
                
                $mis_art = Articulo::with('obtener_imagenes')
                ->with('obtener_categoria')
                ->with('obtener_estado_articulo')
                ->where('id_user',Auth::user()->id_user)
                ->where('reportado','0') // SINO HA SIDO REPORTADO, QUE LO VEA EL CLIENTE
                ->where('disponibilidad','1') // SIMULA ELIMINADO O NO
                ->get(); 
                
                return view('user',compact('mis_art'),['direccion'=>'no_falta']); 
                
            }else{
                return view('ERROR.error_acceso');
            }
        }else if(Auth::user()->id_tipo_cuenta==3){ /* SINO ES CUENTA DE COMPRADOR */

            if(Auth::user()->estado_cuenta==1){ /* PRIMERO PREGUNTA SI ESTÁ DISPONIBLE LA CUENTA, SI LO ESTÁ CONTINUA SINO MUESTRA ERROR DE ACCESO */

            $mis_compras = Factura::with('obtener_detalles')
            ->with('obtener_user')
            ->where('id_user', Auth::user()->id_user)
            ->get();

            if(Direccion::where('id_user',Auth::user()->id_user)->exists()){
                return view('user_comprador',compact('mis_compras'),['direccion'=>'no_falta']);
            }
            else{
                return view('user_comprador',compact(['mis_compras','provincias']),
                ['direccion'=>'falta']);
            }
        }else{
            return view('ERROR.error_acceso');
        }

        }/* CIERRA CUENTA COMPRADOR */

    }/* CIERRA METODO */

}
