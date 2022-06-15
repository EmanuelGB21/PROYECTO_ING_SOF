<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Estado_Articulo;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class ArticulosController extends Controller
{

    public function index() 
    {
        $categorias = Categoria::all();

        $articulos = Articulo::with('obtener_imagenes')
        ->with('obtener_categoria')
        ->with('obtener_estado_articulo')
        ->where('reportado','0')
        ->where('disponibilidad','1')
        ->paginate(12);
       
        return view('pagina_principal.index', compact(['categorias','articulos']));
    }

 
    public function create() /* ME LLEVA AL FORMULARIO PARA INSERTAR UN ARTICULO*/
    {
        $estado_articulo = Estado_Articulo::all();
        $categorias = Categoria::all();

        return view('Gestionar_articulos.registrar_articulo', compact(['categorias','estado_articulo']));
    }

    public function store(Request $request) /* METODO PARA REGISTRAR EN LA DB EL ARTICULO */
    {

        if(sizeof($request->imagenes)>=5){
            return redirect()->back()->with('mensaje','Debes insertar máximo 4 imagenes');
        }else{

            date_default_timezone_set('America/Costa_Rica');

            $articulo = new Articulo();

            $articulo->id_user = Auth::user()->id_user;

            $articulo->id_categoria = $request->id_categoria;
            $articulo->id_estado_articulo = $request->id_estado_articulo;

            $articulo->nombre_articulo = $request->nombre_articulo;
            $articulo->precio = $request->precio;
            $articulo->cantidad = $request->cantidad;
            $articulo->descripcion = $request->descripcion;
            $articulo->disponibilidad = 1;
            $articulo->descuento = 0;
            $articulo->reportado = 0;
            $articulo->fecha_publicacion_articulo = date('Y-m-d');

            $articulo->save();

            return redirect()->back()->with('mensaje','Artículo Registrado con éxito');
           /*  return redirect()->route('home'); */
        }

    }


    public function show($id) // VER MÁS DEL ARTÍCULO
    {
        $articulo = Articulo::findOrFail($id);
        
        return view('pagina_principal.ver_mas', compact('articulo'));
    }
    

    public function edit($id) // ME MANDA A LA VISTA PARA ACTUALIZAR X ARTICULO
    {
        $articulo = Articulo::findOrFail($id);
        $categorias = Categoria::all();
        $estado_articulo = Estado_Articulo::all();

        return view('Gestionar_articulos.editar_articulo', 
        compact(['articulo','categorias','estado_articulo']));
    }


    public function update(Request $request, $id) // ME ACTUALIZA EL ARTÍCULO
    {
        $articulo = Articulo::findOrFail($id);

        $articulo->id_user = Auth::user()->id_user;

        $articulo->id_categoria = $request->id_categoria;
        $articulo->id_estado_articulo = $request->id_estado_articulo;

        $articulo->nombre_articulo = $request->nombre_articulo;
        $articulo->precio = $request->precio;
        $articulo->cantidad = $request->cantidad;
        $articulo->descripcion = $request->descripcion;
        $articulo->descuento = 0;
       
        $articulo->save();

        return redirect()->back()->with('mensaje','Artículo Actualizado con éxito');
    }


    public function destroy($id) // con disponibilidad, lo oculto totalmente ->ELIMINAR
    {
        $articulo = Articulo::findOrFail($id);
        $articulo->disponibilidad = 0;
        $articulo->save();

       /*  Articulo::destroy($id); */
       return redirect()->back()->with('mensaje','Artículo Eliminado con éxito');
    }

    public function reportar($id) // REPORTA EL ARTÍCULO
    {
        $articulo = Articulo::findOrFail($id);
        $articulo->reportado = 1; 
        $articulo->save();

        /* Notifica al usuario que su publicación fue reportada */
       /*  $datos=[
            'contenido'=>"Ponte en contacto con nosotros a este correo para tomar las medidas necesarias en un lapso de 15 días sino será borrada definitivamente",
            'correo'=>$actualizar->obtener_user->correo,
            'nombre_user'=>$actualizar->obtener_user->nombre_user,
            'nombre_articulo'=>$actualizar->nombre_articulo,
            'estado'=>'reportada',
        ];

        $correoDestino = $actualizar->obtener_user->correo;
        $correoRemitente = "ntfnotificaciones@gmail.com";

        $correo = new Send_Mail($datos);
        $correo->from($correoRemitente);

        Mail::to($correoDestino)->send($correo); */

        return redirect()->route('pagina_principal')->with('mensaje','Publicación reportada con éxito');
    }

    /* FICHA DEL ARTÍCULO */

    public function ficha_articulo_pdf(Request $request){
        
        $data="FICHA DEL ARTICULO".$request->id_articulo;

        $pdf = PDF::loadView('PDF.ficha_articulo',compact(['data']));
        
        return $pdf->stream('');
    }

    public function descuentos(Request $request){

        $tipo_descuento = $request->tipo_descuento; // ALL, IND, CAT
        
        if ($tipo_descuento=="ALL") { /* APLICA A TODO */

            return "aplico descuento A TODO";

        }

        if ($tipo_descuento=="IND") { /* INDIVIDUAL */

            return "aplico descuento por INDIVIDUAL";

        }

        if ($tipo_descuento=="CAT") { /* POR CATEGORIAS */ 

        return "aplico descuento por CATEGORIA"; 

        }
    }
    
}
