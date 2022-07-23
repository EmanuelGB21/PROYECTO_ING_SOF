<?php

namespace App\Http\Controllers;

use App\Mail\EnvioMails;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PayPalController extends Controller
{
    
    public function getFacturaMembresia(){ /* CUANDO EL USUARIO PAGA LA MEMBRESÍA */
        date_default_timezone_set('America/Costa_Rica');
        $fecha_actual = date("Y-m-d"); 
        
        /* IR A LA BASE DE DATOS Y ACTUALIZAR EL PAGO DE LA MEMEBRESÍA */
        $actualizar_membresia = User::findOrFail(Auth::user()->id_user);
        $actualizar_membresia->membresia = "si";
        $actualizar_membresia->id_tipo_cuenta = 1;
        $actualizar_membresia->fecha_renovacion = date('Y-m-d',strtotime($fecha_actual."+ 1 month")); 
        $actualizar_membresia->save();

        $actualizar_ganancia_admin = User::findOrFail(2);
        $actualizar_ganancia_admin->ganancias=$actualizar_ganancia_admin->ganancias+12.00;
        $actualizar_ganancia_admin->save();

        date_default_timezone_set("America/Costa_Rica");
        $email = Auth::user()->email;
        $nombre_completo = Auth::user()->nombre.' '.Auth::user()->primer_apellido.' '.
        Auth::user()->segundo_apellido;
        /* NOTIFICAR AL USUARIO LA COMPRA QUE HA REALIZADO */
        $datos=[
            
            'contenido'=>"Has realizado la compra de la membresía en nuestro sitio Merca-Lín",
            'fecha_de_pago_inicial'=>date('Y-m-d'),
            'nombre_completo'=>$nombre_completo,
            'email'=>$email,
            'contenido_2'=>"Por un precio de 12 Dólares, ahora podés publicar artículos en nuestro sitio web",
            'estado' =>'membresia',
        ];

        $correoDestino = $email; /* QUIEN RECIBE EL CORREO */
        $correoRemitente = "mercalinshop@gmail.com"; /* QUIEN LO ESTÁ ENVIANDO */

        $correo = new EnvioMails($datos);
        $correo->from($correoRemitente);

        Mail::to($correoDestino)->send($correo);

    return redirect()->back()->with('mensaje','Se ha enviado la factura de compra a tu correo electrónico');
    
}

}
