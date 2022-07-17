<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DireccionesController extends Controller
{

   
    public function store(Request $request)
    {
        $direccion = new Direccion();

        $direccion->id_user = Auth::user()->id_user;
        $direccion->codigo_postal = $request->codigo_postal;
        $direccion->pais=$request->pais;
        $direccion->provincia = $request->provincia;
        $direccion->ciudad = $request->ciudad;
        $direccion->direccion_actual = $request->direccion_actual;

        $direccion->save();

        return redirect()->back()->with('mensaje','Tu dirección fue agregada con éxito');
    }


    
    public function update(Request $request, $id)
    {
        DB::table('direcciones')
        ->where('id_user',$id)
        ->update([
                'codigo_postal'=>$request->codigo_postal,
                'pais'=>$request->pais,
                'provincia'=>$request->provincia,
                'ciudad'=>$request->ciudad,
                'direccion_actual'=>$request->direccion_actual
                ]);

        return redirect()->back()->with('mensaje','Tu dirección se ha actualizado con éxito');
    }
}