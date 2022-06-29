<div class="modal fade" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" id="edit_direccion">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h6 class="modal-title">Estas editando tu dirección</h6>
        <button type="button" class="btn text-light" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
      </div>
      <div class="modal-body">
        
        <form action="{{url('direcciones/'.$cliente->id_user)}}" method="POST">
          @csrf
          @method('PUT')

          <div class="input-group mb-3">
            <span class="input-group-text">Código Postal: </span>
            <input type="number" name="codigo_postal" value="{{$cliente->obtener_direccion->codigo_postal}}" class="form-control">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">País: </span>
            <input type="text" name="pais" value="{{$cliente->obtener_direccion->pais}}" class="form-control">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">Provincia: </span>
            <select name="provincia" class="form-select">
              @foreach ($provincias as $prov)
                  <option value="{{$prov}}">{{$prov}}</option>
              @endforeach
            </select>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">Ciudad: </span>
            <input type="text" name="ciudad" value="{{$cliente->obtener_direccion->ciudad}}" class="form-control">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">Dirección Actual: </span>
            <input type="text" name="direccion_actual" value="{{$cliente->obtener_direccion->direccion_actual}}" class="form-control">
          </div>

          <div class="text-end">
            <button class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Actualizar</button>
            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>