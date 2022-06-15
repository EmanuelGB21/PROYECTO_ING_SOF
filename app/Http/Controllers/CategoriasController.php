<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{

    public function index(){
        $categorias = Categoria::all();
        
        return view('admin_funciones.index_categorias', compact('categorias'));
    }

    public function store(Request $request)
    {
        $categoria = new Categoria();

        $categoria->nombre_categoria = $request->nombre_categoria;

        $categoria->save();

        return redirect()->back()->with('mensaje','Categoría registrada con éxito');
    }


    public function destroy($id)
    {
        Categoria::destroy($id);

        return redirect()->back()->with('mensaje','Categoría eliminada correctamente');
    
    }
}