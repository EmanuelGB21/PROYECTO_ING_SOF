<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{

    public function index()
    {
        $clientes = User::where('id_tipo_cuenta','1') ->where('estado_cuenta','1')->get();

        return view('admin_funciones.index_mis_clientes', compact('clientes'));
    }

    public function show($id)
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

        /* BUSCAR TOTAL DE ARTICULOS PUBLICADOS POR X CLIENTE TANTO GENERAL COMO EN CATEGORIAS */
        return view('Gestionar_perfil.index_perfil', compact(['cliente','provincias']));

    }

    public function update(Request $request, $id){
        
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

    public function destroy($id){
        $borrar = User::findOrFail($id);
        $borrar->estado_cuenta = 0;
        $borrar->save();
         
        return redirect()->route('home')->with('mensaje','Tu cuenta se ha eliminado con éxito');

    }

}
