<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{

    public function cart()  {
        $cartCollection = Cart::getContent();
        return view('carrito.cart')->with(['cartCollection' => $cartCollection]);;
    }
    
    public function remove(Request $request){
        Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Se ha removido con éxito!');
    }

    public function add(Request $request){

        if (Auth::guest()){
            return redirect()->route('home');                 
        }else{
        Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'owner' => $request->owner,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug,
            ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Se agregó con éxito!');
        }
    }

    public function update(Request $request){
        $valorar = Articulo::findOrFail($request->id);
        if ($request->quantity<=$valorar->cantidad) {
            
            Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Se ha actualizado con éxito!');
       }else{
        return redirect()->route('cart.index')->with('success_msg', 'La cantidad solicitada sobrepasa la cantidad disponible!');
       } 
    }

    public function clear(){
        Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Se borró tu carrito con éxito!');
    }


    /* DEVUELVO A LA VISTA FACTURA LOS DATOS PARA CARGARLOS */

    public function invoice(){
        
        date_default_timezone_set('America/Costa_Rica');
        $fecha_actual = date('Y-m-d');

        $compra = Cart::getContent();
        
        return view("vista_de_compra.factura_compra", compact('fecha_actual'))
        ->with(['Mi_compra' => $compra]);
    }

}
