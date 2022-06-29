@extends('Plantillas_Generales.plantilla_general')


@section('CONTENIDO')
    <div class="container p-5 text-center">
        <h6 class="mb-3">No existe esta cuenta de usuario</h6>

        <button class="btn btn-primary btn-sm" href="{{ route('logout') }}"  onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="fas fa-arrow-left"></i> Regresar a la página principal</button>
            
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
@endsection