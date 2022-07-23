<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(Imagen::where('id_articulo', $request->id_articulo)->count()<4){

            $imagen_nueva = $request->file('ruta_imagen')->store('IMAGENES_SUBIDAS','public');

            /* A LA BASE DE DATOS */
            $imagen = new Imagen();

            $imagen->ruta_imagen = $imagen_nueva;
            $imagen->id_articulo = $request->id_articulo;

            $imagen->save();  

            return redirect()->back()->with('mensaje','Se ha agregado la imagen correctamente');
        
        }else{

            return redirect()->back()->with('mensaje','Se llegó al límite de imagenes, no puedes insertar más');    
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $url = $request->ruta_imagen;
        
        Storage::delete('public/'.$url);        
        
        Imagen::destroy($id);

        return redirect()->back()->with('mensaje','Se eliminó la imagen correctamente');
    }
}
