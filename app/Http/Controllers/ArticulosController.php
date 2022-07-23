<?php

namespace App\Http\Controllers;

use App\Mail\EnvioMails;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Estado_Articulo;
use App\Models\Imagen;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ArticulosController extends Controller
{

    /* 
        Si el usuario ha iniciado sesión se muestran los articulos excepto los de el
    */
    public function index() 
    {
        $categorias = Categoria::all();

       if(Auth::guest()){
        $articulos = Articulo::with('obtener_imagenes')
        ->with('obtener_categoria')
        ->with('obtener_estado_articulo')
        ->where('reportado','0')
        ->where('disponibilidad','1')
        ->where('cantidad','!=',0)
        ->paginate(9);
       
        return view('pagina_principal.index', compact(['categorias','articulos']));

       }else{
        $articulos = Articulo::with('obtener_imagenes')
        ->with('obtener_categoria')
        ->with('obtener_estado_articulo')
        ->where('reportado','0')
        ->where('disponibilidad','1')
        ->where('cantidad','!=',0)
        ->where('id_user','!=',Auth::user()->id_user)
        ->paginate(9);
       
        return view('pagina_principal.index', compact(['categorias','articulos']));
       }
    }


    /* BUSQUEDA DE ARTICULOS */

    public function busquedas(Request $request,$id,$tipo_busqueda){

        $categorias = Categoria::all();

        if($tipo_busqueda=="CT" && $id==0){ //NO TRAE ID Y ES CT BUSCA POR CAMPO DE TEXTO

            $articulos = Articulo::join('users as u', 'articulos.id_user', '=', 'u.id_user')
            ->with('obtener_imagenes')
            ->with('obtener_categoria')
            ->with('obtener_estado_articulo')

            ->where([['u.nombre','like','%'.$request->campo_busqueda.'%'],
            ['reportado','0'], ['disponibilidad','1'],['cantidad','!=',0]])

            ->orwhere([['articulos.nombre_articulo','like','%'.$request->campo_busqueda.'%'],
            ['reportado','0'], ['disponibilidad','1'],['cantidad','!=',0]])
            
            ->paginate(9);

            if($articulos->isEmpty()){
                return view('ERROR.error_busqueda', compact('categorias'),
                ['mensaje'=>'La busqueda no ha podido ser encontrada']);
            }else{
                return view('pagina_principal.index', compact(['categorias','articulos']));
            }

        }else if($tipo_busqueda=="C" && $id!=0){ 
            
            if (Articulo::where('id_categoria', '=',$id)->exists()) {
            $articulos = Articulo::with('obtener_imagenes')
            ->with('obtener_categoria')
            ->with('obtener_estado_articulo')
            ->where('reportado','0')
            ->where('cantidad','!=',0)
            ->where('disponibilidad','1')
            ->where('id_categoria',$id)
            ->paginate(9);

            if($articulos->isEmpty()){
                return view('ERROR.error_busqueda', compact('categorias'),
                ['mensaje'=>'La categoría no tiene artículos actualmente']);
            }else{
            return view('pagina_principal.index', compact(['categorias','articulos']));
            }
        }
        else{
            return view('ERROR.error_busqueda', compact('categorias'),
                ['mensaje'=>'La categoría no tiene artículos actualmente']);
        }  

        }
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

            /* GUARDA LAS IMAGENES DE DICHO ARTÍCULO */
            if($request->hasFile('imagenes')){

                $imagenes = $request->file('imagenes');
                
               foreach ($imagenes as $item){
    
                $ruta= $item->store('IMAGENES_SUBIDAS','public');
                
               
                /* A LA BASE DE DATOS */
                $imagen = new Imagen();
    
                $imagen->ruta_imagen = $ruta;
                $imagen->id_articulo = $articulo->id_articulo;
        
                $imagen->save();
                $imagen = new Imagen();
               }     
            }

            return redirect()->back()->with('mensaje','Artículo Registrado con éxito');
           
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
        $datos=[
            'contenido'=>"Ponte en contacto con nosotros a este correo para tomar las medidas necesarias en un lapso de 8 días sino será ocultada definitivamente",
            'correo'=>$articulo->obtener_user->email,
            'nombre'=>$articulo->obtener_user->nombre,
            'primer_apellido'=>$articulo->obtener_user->primer_apellido,
            'segundo_apellido'=>$articulo->obtener_user->segundo_apellido,
            'nombre_articulo'=>$articulo->nombre_articulo,
            'estado'=>'reportada',
        ];

        $correoDestino = $articulo->obtener_user->email;
        $correoRemitente = "mercalinshop@gmail.com";

        $correo = new EnvioMails($datos);
        $correo->from($correoRemitente);

        Mail::to($correoDestino)->send($correo);

        return redirect()->route('pagina_principal')->with('mensaje','Publicación reportada con éxito');
    }

    /* OBTENGO LA FICHA DE UN ARTÍCULO EN PDF (VER MÁS ART)*/
    public function ficha_articulo_pdf($id){ 
        
        date_default_timezone_set('America/Costa_Rica');
        $fecha_actual=date('Y-m-d');
        $ficha_articulo = Articulo::findOrFail($id);

        $pdf = PDF::loadView('PDF.ficha_articulo',compact(['ficha_articulo','fecha_actual']));
        
        return $pdf->stream('Ficha del Articulo '.$ficha_articulo->nombre_articulo);
    }

    /* LISTA DE ARTÍCULOS DE X DUEÑO EN PDF */
    public function lista_articulos_pdf(Request $request){

        date_default_timezone_set('America/Costa_Rica');
        $fecha_actual=date('Y-m-d');

        //$lista = Articulo::where('id_user',$dato)->get();

        $lista = json_decode($request->mis_articulos);

        $pdf = PDF::loadView('PDF.lista_articulos',compact(['lista','fecha_actual']));
        
        return $pdf->stream('');
    }

    
    /* APLICADOR DE DESCUENTOS DEPENDIENDO DE LA ELECCIÓN DEL USUARIO */
    public function descuentos(Request $request){

        $tipo_descuento = $request->tipo_descuento; // ALL, IND, CAT
        
        if ($tipo_descuento=="ALL") { /* APLICA A TODO */

                DB::table('articulos')
                ->where('id_user', Auth::user()->id_user)
                ->update(['descuento' => $request->descuento]);

            return redirect()->back()->with('mensaje','Se ha agregado el descuento a todos tus artículos correctamente');

        }

        if ($tipo_descuento=="IND") { /* INDIVIDUAL */

            $descuento_IND = Articulo::findOrFail($request->id_articulo);

            $descuento_IND->descuento = $request->descuento;
            $descuento_IND->save();
            return redirect()->back()->with('mensaje','se ha agregado el descuento a tu artículo correctamente');
        }

        if ($tipo_descuento=="CAT") { /* POR CATEGORIAS */ 

            DB::table('articulos')
            ->where('id_user', Auth::user()->id_user)
            ->where('id_categoria', $request->id_categoria)
            ->update(['descuento' => $request->descuento]);

        return redirect()->back()
        ->with('mensaje','Se ha agregado el descuento por categoría a tus artículos correctamente');

        }
    }


    /* MUESTRO AL ADMIN ARTICULOS REPORTADOS */

    public function get_reportados(){
        $articulos = Articulo::with('obtener_user')
            ->where('reportado','1')
            ->orWhere('reportado','2')
            ->where('disponibilidad','1')
            ->get();
        return view('admin_funciones.index_reportados',compact('articulos')); 
    }
    
}
