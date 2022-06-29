<div class="modal fade" id="edit_user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-dark text-light">
          <h6 class="modal-title">Estas editando tu Usuario</h6>
          <button type="button" class="btn text-light" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">

          <form action="{{url('user/'.$cliente->id_user)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-group mb-3">
              <span class="input-group-text">Nombre</span>
              <input type="text" name="nombre" value="{{$cliente->nombre}}" aria-label="Nombre" class="form-control">
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text">Primer y Segundo Apellido</span>
              <input type="text" name="primer_apellido" value="{{$cliente->primer_apellido}}" aria-label="Primer Apellido" class="form-control">
              <input type="text" name="segundo_apellido" value="{{$cliente->segundo_apellido}}" aria-label="Segundo Apellido" class="form-control">
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text">Teléfono</span>
              <input type="text" name="telefono" value="{{$cliente->telefono}}" aria-label="Telefono" class="form-control">
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text">Correo</span>
              <input type="text" name="correo" value="{{$cliente->correo}}" aria-label="Correo" class="form-control">
            </div>
            
            <div class="text-end">
              <button class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Actualizar</button>
              <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
            </div>
          </form>
  
      </div>
    </div>
  </div>