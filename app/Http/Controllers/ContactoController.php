<?php

namespace App\Http\Controllers;

use App\Mail\EnvioMails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
 
    public function store(Request $request)
    {
        $datos=[
            
            'contenido'=>$request->contenido,
            'estado' =>'contactar',
        ];

        $correoDestino = "mercalinshop@gmail.com"; /* QUIEN RECIBE EL CORREO */
        $correoRemitente = $request->email; /* QUIEN LO ESTÁ ENVIANDO */

        $correo = new EnvioMails($datos);
        $correo->from($correoRemitente);

        Mail::to($correoDestino)->send($correo);

        return redirect()->back()->with('mensaje','Se ha enviado el correo electrónico con éxito, pronto recibirás respuesta');
    }
}
