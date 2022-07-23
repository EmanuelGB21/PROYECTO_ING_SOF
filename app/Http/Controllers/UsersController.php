<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Detalle_Factura;
use App\Models\Factura;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{

    public function index() // RETORNA LA VISTA AL ADMIN CON LOS CLIENTES QUE TIENE REGISTRADA LA PÁGINA
    {

        $clientes = User::where('id_tipo_cuenta','!=',2) ->where('estado_cuenta','1')->get();

        return view('admin_funciones.index_mis_clientes', compact('clientes'));
    }

    public function show($id) /* RELACIONADO CON EL PERFIL DE USUARIO VENDEDOR O COMPRADOR */
    {

        $cliente = User::findOrFail($id);
        $provincias = array('0' => 'Alajuela', 
        '1' => 'Cartago',
        '2' => 'Guanacaste',
        '3' => 'Heredia',
        '4' => 'Limón',
        '5' => 'Puntarenas',
        '6' => 'San José',
    );
        $total_mis_art_publicados = $cliente->obtener_articulos->count();
      
        $vendidos = Detalle_Factura::with('obtener_factura')
        ->where('dueño_articulo',$id)
        ->get();

        $total_vendidos = Detalle_Factura::where('dueño_articulo',$id)
        ->distinct()->count('nombre_articulo');

        /* BUSCAR TOTAL DE ARTICULOS PUBLICADOS POR X CLIENTE TANTO GENERAL COMO EN CATEGORIAS */
        return view('Gestionar_perfil.index_perfil', 
        compact(['cliente','provincias','total_mis_art_publicados','vendidos','total_vendidos']));

    }

    public function update(Request $request, $id){ /* VENDEDOR O COMPRADOR ACTUALIZA SU INFO */
        
        $user = User::findOrFail($id);

        $user->nombre = $request->nombre;
        $user->primer_apellido = $request->primer_apellido;
        $user->segundo_apellido = $request->segundo_apellido;
        $user->telefono = $request->telefono;
        $user->email = $request->email;

        if($request->hasFile('foto_perfil')){
            $data = User::findOrFail($id);
                
            Storage::delete('public/'.$data->foto_de_perfil);
            
            $user['foto_perfil']=request()->file('foto_perfil')->store('uploads', 'public');
        }
        $user->save();
        
        return redirect()->back()->with('mensaje','Tus datos se han actualizado con éxito');
    }

    public function destroy($id){ /* ELIMINO LA CUENTA DE USUARIO DE MENTIRA PARA HISTORICOS */
        $borrar = User::findOrFail($id);
        $borrar->estado_cuenta = 0;
        $borrar->save();
         
        return redirect()->route('home')->with('mensaje','Tu cuenta se ha eliminado con éxito');

    }


    /* GENERO UN PDF DE LAS GANANCIAS EN LA PÁGINA */
    public function get_pdf_ganancias(Request $request){
        
        date_default_timezone_set('America/Costa_Rica');
        $fecha_actual = date('Y-m-d');
        $total_publicados = $request->total_publicados;
        $total_ventas = $request->total_ventas;
        $array_usuarios = json_decode($request->usuarios);
        $total_users=0;

        foreach($array_usuarios as $num=>$item){
            $total_users=$num;
        }

        $ganancias = $request->ganancias;


        $pdf = PDF::loadView('PDF.ganancias_pdf',
        compact(['fecha_actual','total_publicados','total_ventas','array_usuarios','total_users','ganancias']));

        return $pdf->stream('Reporte de ganancias realizado el '.$fecha_actual);
    }

    /* ADMIN LE CAMBIO LA VISIBILIDAD AL PRODUCTO Y NOTIFICA*/
    public function cambiar_reporte(Request $request){

        $estado = $request->habilitar;

        $actualizar_reportado = Articulo::findOrFail($request->id_articulo);

        if($estado=="S"){
            $actualizar_reportado->reportado = 0;
            $actualizar_reportado->save();
            return back()->with('mensaje','Se ha habilitado nuevamente el artículo');
        
        }else if($estado=='N'){
            $actualizar_reportado->reportado = 2;
            $actualizar_reportado->save();
            return redirect()->back()->with('mensaje','No se habilitará');
        }

    }


    /* CREO UN PDF CON LA LISTA DE MIS GANANCIAS EN LA PÁGINA */
    public function getMisArtVendidos(Request $request){
       
        date_default_timezone_set('America/Costa_Rica');
        $fecha_actual = date('Y-m-d');

        $array = json_decode($request->array_art_vendidos);
        $total_vendidos = $request->total_vendidos;
        
        $pdf = PDF::loadView('PDF.user_ganancias',compact(['array','fecha_actual','total_vendidos']));

        return $pdf->stream('Reporte de ventas');
    }


    /* LOS OTROS DOS METODOS EL PRIMERO ES PARA MIS COMPRAS Y EL OTRO DE ENTREGAS */

    public function getComprasMias(){

        $mis_compras = Factura::with('obtener_detalles')
        ->with('obtener_user')
        ->where('id_user', Auth::user()->id_user)
        ->get();

        return view('Gestionar_articulos.index_mis_compras', compact('mis_compras'));
    }

    

    public function getEntregas(){
        
        $mis_entregas = Detalle_Factura::with('obtener_factura')
        ->where('dueño_articulo', Auth::user()->id_user)
        ->get();

        return view('Gestionar_articulos.index_entregas', compact('mis_entregas'));
    }

}
