@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5" style="background-color: rgba(47, 46, 46, 0.358)">
                <div class="card-header  bg-dark text-center text-light"><i class="fas fa-user"></i> {{ __('Iniciar Sesión') }}</div>

                <div class="card-body">
                    <form class="text-light" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nombre_user" class="col-md-4 col-form-label text-md-end">{{ __('Nombre de Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="nombre_user" type="text" class="form-control @error('nombre_user') is-invalid @enderror" name="nombre_user" value="{{ old('nombre_user') }}" required autocomplete="nombre_user" autofocus>

                                @error('nombre_user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Aceptar') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
