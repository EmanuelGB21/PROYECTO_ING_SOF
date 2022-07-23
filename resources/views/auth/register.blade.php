@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgba(47, 46, 46, 0.358)">
                <div class="card-header bg-dark text-center text-light"><i class="fas fa-warning"></i> {{ __('Por favor llena los campos con los datos solicitados') }} <i class="fas fa-warning"></i></div>

                <div class="card-body">
                    <form class="text-light" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="parte_1_registro">

                            <input type="hidden" name="estado_cuenta" value="1">
                            <input type="hidden" name="id_tipo_cuenta" value="3">
                            <input type="hidden" name="membresia" value="no">

                            <input type="hidden" name="nombre_user" id="nombre_user">


                            {{--  NOMBRE  --}}
                            <div class="row mb-3 mt-2">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" placeholder="Ingresa tu Nombre" class="form-control @error('name') is-invalid @enderror" name="nombre" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{--  PRIMER APELLIDO  --}}
                            <div class="row mb-3">
                                <label for="primer_apellido" class="col-md-4 col-form-label text-md-end">{{ __('Primer Apellido') }}</label>

                                <div class="col-md-6">
                                    <input id="primer_apellido" type="text" placeholder="Ingresa tu Primer Apellido" class="form-control @error('primer_apellido') is-invalid @enderror" name="primer_apellido" value="{{ old('primer_apellido') }}" required autocomplete="primer_apellido" autofocus>

                                    @error('primer_apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            {{--  SEGUNDO APELLIDO  --}}

                            <div class="row mb-3">
                                <label for="segundo_apellido" class="col-md-4 col-form-label text-md-end">{{ __('Segundo Apellido') }}</label>

                                <div class="col-md-6">
                                    <input id="segundo_apellido" type="text" placeholder="Ingresa tu Segundo Apellido" class="form-control @error('segundo_apellido') is-invalid @enderror" name="segundo_apellido" value="{{ old('segundo_apellido') }}" required autocomplete="segundo_apellido" autofocus>

                                    @error('segundo_apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{--  correo  --}}
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="Ingresa tu correo con formato: @gmail.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{--  telefono  --}}
                            <div class="row mb-3">
                                <label for="telefono" class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="number" placeholder="Ingresa tu Número Telefónico" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono">

                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <div class="text-center">
                                    <button class="btn btn-primary" onclick="getNameUser()">
                                        <i class="fas fa-save"></i> {{ __('Registrarse') }}
                                    </button>
                                </div>
                            </div>

                        </div>
                       
                    </form>
                </div>
            </div>         
        </div>
    </div> 
</div>
@endsection


@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('.parte_1_registro').show();
        $('.parte_2_registro').hide();

        $("#btn_siguiente_paso").on('click', function(){
            $('.parte_1_registro').hide();
            $('.parte_2_registro').show();
        });

        $("#btn_volver").on('click', function(){
            $('.parte_1_registro').show();
            $('.parte_2_registro').hide();
        });
          
        function getNameUser(){
        var cadena0 = document.getElementById('name').value;
        var cadena1 = document.getElementById('primer_apellido').value;
        var cadena2 = document.getElementById('segundo_apellido').value;

        $("#nombre_user").val(cadena0.substr(0,3)+cadena1.substr(0,4)+cadena2);
        }
        
        /** document.form.nombre_input.value = lo que quiero que vaya */

    </script>
@endsection
