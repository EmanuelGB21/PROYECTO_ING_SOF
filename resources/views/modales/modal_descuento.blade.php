<div class="modal fade"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" id="h{{$item->id_articulo}}">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-dark text-light">
          <h6 class="modal-title">Aplicar descuento al artículo: {{$item->nombre_articulo}}</h6>
          <button type="button" class="btn text-light" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
          <form action="{{route('descuentos')}}" method="POST">
            @csrf
            @method('GET')
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Cantidad de descuento:</span>
              <input type="hidden" value="IND" name="tipo_descuento">
              <input type="hidden" value="{{$item->id_articulo}}" name="id_articulo">
              <input type="number" name="descuento" min="0" max="100" class="form-control" placeholder="Descuento %" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="text-end">
              <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
              <button class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Aplicar %</button>  
            </div>  
          </form>
        </div>
      </div>
    </div>
  </div>