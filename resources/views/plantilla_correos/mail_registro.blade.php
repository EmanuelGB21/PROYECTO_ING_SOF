<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Document</title>
    </head>
    <body>

        @if ($mensaje['estado']=="registrarse")

        <p>BIENVENIDO A NUESTRA PÁGINA WEB, ESPERAMOS QUE TU ESTADÍA SEA LA MEJOR</p>
        <h4>....</h4>
        <p> Tu nombre de usuario es: {{$mensaje['nombre_user']}}</p>

        <p> Tu contraseña para acceder a tu perfil es: {{$mensaje['password']}}</p>

        <p>* Puedes cambiar tu contraseña cuando quieras.</p>

        <p>No compartas con nadie esta información, es solo para uso personal</p>
        @endif

        @if ($mensaje['estado']=="reportada")
            <p>Hola, {{$mensaje['nombre']}} {{$mensaje['primer_apellido']}} {{$mensaje['segundo_apellido']}}</p>
            <p>El artículo {{$mensaje['nombre_articulo']}} fue reportado como posible estafa</p>
            <p>{{$mensaje['contenido']}}</p>
        @endif

        @if ($mensaje['estado']=="membresia")
        <p>Hola, {{$mensaje['nombre_completo']}}</p>    
        <p>{{$mensaje['contenido']}}</p>
        <p>{{$mensaje['contenido_2']}}</p>
        <p>La compra fue realizada el {{$mensaje['fecha_de_pago_inicial']}}</p>
        <p>*<b>Recuerda que la membresía la tienes que renovar cada mes por el mismo monto</b></p>
        
        @endif

        @if ($mensaje['estado']=="contactar")
            <p>{{$mensaje['contenido']}}</p>  
        @endif

        @if ($mensaje['estado']=="compra_articulos")

        <p>{{$mensaje['contenido']}}</p>  
        <p>Gracias por utlizar nuestro servicios</p>
    @endif
    
        
    </body>
</html>