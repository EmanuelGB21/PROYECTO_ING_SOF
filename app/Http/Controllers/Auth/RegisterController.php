<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EnvioMails;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str; /* PARA USAR CONTRASEÑAS ALEATORIAS */

class RegisterController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id_tipo_cuenta' =>['int','max:3'],
            'nombre_user' =>['string','max:50','unique:users'],
            'nombre' => ['required', 'string', 'max:255'],
            'primer_apellido' => ['required', 'string', 'max:255'],
            'segundo_apellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',],
            'telefono' => ['required', 'int', 'min:8'],
            'estado_cuenta' =>['required','boolean','min:1'],
            'membresia' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        /* CREO UNA CONTRASEÑA ALEATORIA */

        $contra_temporal = Str::random(12);

        date_default_timezone_set("America/Costa_Rica");

        /* NOTIFICAR INICIO DE SESION EN LA PÁGINA CON USUARIO Y CONTRASEÑA */
        $datos=[
            
            'contenido'=>"Datos para iniciar sesión, no compartas esta información con nadie",
            'url'=>getcwd(),
            'nombre_user'=>$data['nombre_user'],
            'email'=>$data['email'],
            'password' =>$contra_temporal,
            'estado' =>'registrarse',
        ];

        $correoDestino = $data['email']; /* QUIEN RECIBE EL CORREO */
        $correoRemitente = "mercalinshop@gmail.com"; /* QUIEN LO ESTÁ ENVIANDO */

        $correo = new EnvioMails($datos);
        $correo->from($correoRemitente);

        Mail::to($correoDestino)->send($correo);
        

        /* LUEGO VA Y REGISTRA AL USUARIO */
        return User::create([
            'id_tipo_cuenta' =>$data['id_tipo_cuenta'],
            'nombre_user' => $data['nombre_user'],
            'nombre' => $data['nombre'],
            'primer_apellido' => $data['primer_apellido'],
            'segundo_apellido' => $data['segundo_apellido'],
            'email' => $data['email'],
            'fecha_registro' => date('Y-m-d'),
            'telefono' =>$data['telefono'],
            'estado_cuenta' =>$data['estado_cuenta'],
            'password' => Hash::make($contra_temporal),
            'membresia' => $data['membresia'],
            'ganancias' => 0,
        ]);

    }
}