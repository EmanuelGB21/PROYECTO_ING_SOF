<?php

namespace App\Http\Controllers;

use App\Mail\EnvioMails;
use App\Models\Articulo;
use App\Models\Detalle_Factura;
use App\Models\Factura;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FacturasController extends Controller
{

    /*  HAGO LA VALIDACIÓN SI PUEDO COMPRAR ESA CANTIDAD
        SI, SI ACTUALIZO Y ME VOY A LA VISTA DE PAGAR CON PAYPAL
        SINO DEVUELVO A LA ACTUAL PARA CAMBIAR CANTIDADES
        TAMBIEN OBTENGO A QUIEN DEBO PAGARLE CADA COSA
    */
    public function index(Request $request) 
    {
        $Mi_compra = $request->array_de_compra;
        $array = json_decode($request->array_de_compra);

            /* CON ESTE FOREACH RECORRO TODOS LOS ARTICULOS Y LES QUITO LA CANTIDAD QUE SE COMPRAN */
            foreach ($array as $item_act) {
    
                $actualizar_cantidades = Articulo::findOrFail($item_act->id);

                if($item_act->quantity>$actualizar_cantidades->cantidad){
                    return view('vista_de_compra.ver_validacion', compact('Mi_compra'),
                ['estado'=>'error']);

                }else{
                    $actualizar_cantidades->cantidad = $actualizar_cantidades->cantidad - $item_act->quantity;
                    $actualizar_cantidades->save();
                }
            }
            return view('vista_de_compra.ver_validacion', compact('Mi_compra'),
            ['estado'=>'pagar']); 
    }



    /*  UNA VEZ HECHA LA COMPRA 
        GUARDO LA FACTURA EN LA BASE DE DATOS
        ENVIO FACTURA AL CLIENTE POR CORREO EN PDF 
    */
    public function store(Request $request)
    {
        date_default_timezone_set('America/Costa_Rica');
        $fecha_actual = date('Y-m-d');
        $array = json_decode($request->array_de_compra);
 
        $factura = new Factura();
        $factura->fecha_factura= $fecha_actual;
        $factura->id_user=Auth::user()->id_user;
        $factura->save();

        /* SEGUIDAMENTE GUARDAMOS LOS ARTÍCULOS */
        foreach ($array as $data) {

            $cargar_ganancias_usuarios = User::findOrFail($data->owner);
            $cargar_ganancias_usuarios->ganancias=
            $cargar_ganancias_usuarios->ganancias+$data->quantity*$data->price;
            $cargar_ganancias_usuarios->save();
            
        
            $detalle_factura = new Detalle_Factura();

            $detalle_factura->id_factura = $factura->id_factura;

            $detalle_factura->nombre_articulo = $data->name;
            $detalle_factura->categoria_articulo = $data->attributes->slug;
            $detalle_factura->precio_articulo = $data->price;
            $detalle_factura->cantidad_comprada = $data->quantity;
            $detalle_factura->dueño_articulo = $data->owner;
            $detalle_factura->estado_entrega=0;

            $detalle_factura->save();

            $detalle_factura = new Detalle_Factura();
        }

        $numero_factura = $factura->id_factura;
        /* GENERA EL PDF */
        $pdf = PDF::loadView('PDF.factura_compra_articulos',compact(['array','fecha_actual','numero_factura']));
        

         /* NOTIFICAR AL USUARIO LA COMPRA QUE HA REALIZADO */
         $datos=[
            'contenido'=>"¡Hola! Has realizado la compra de uno o varios artículos",
            'estado' =>'compra_articulos',
        ];

        $correoDestino = Auth::user()->email; /* QUIEN RECIBE EL CORREO */
        $correoRemitente = "mercalinshop@gmail.com"; /* QUIEN LO ESTÁ ENVIANDO */

        $correo = new EnvioMails($datos);
        $correo->from($correoRemitente);

        $correo->attachData($pdf->output(), "factura_compra_en_merca_lin.pdf");

        Mail::to($correoDestino)->send($correo);

        Cart::clear();

        return redirect()->route('pagina_principal');
    }


    /* ADMIN VISTA DE FACTURAS Y ESTADO DE PAGOS */
    public function getFacturas(){
        
        $facturas = Factura::with('obtener_detalles')
        ->with('obtener_user')
        ->get();

        return view('admin_funciones.index_facturas', compact('facturas'));
    }


    /* PDF DE COMPRAS DEL USUARIO COMPRADOR O VENDEDOR */

    public function getPDFMisCompras(Request $request){

        date_default_timezone_set('America/Costa_Rica');
        $fecha_actual = date('Y-m-d');

        $mis_compras = json_decode($request->array_mis_compras);

        $pdf = PDF::loadView('PDF.lista_comprados',compact(['mis_compras','fecha_actual']));
        
        return $pdf->stream('Articulos Comprados');
    }



    /* ACTUALIZAR ESTADO DEL ENVIO DE LA FACTURA */

    public function update(Request $request, $id){

        $actualiar_estado = Detalle_Factura::findOrFail($id);
        $actualiar_estado->estado_entrega = $request->estado_entrega;
        $actualiar_estado->save();
        
        return redirect()->back()->with('mensaje','Se actualizó el estado con éxito');
   
    }

    
}
