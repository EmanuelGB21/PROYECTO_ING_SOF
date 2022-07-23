<div class="modal fade"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" id="estado{{$item->id_detalle_factura}}">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-dark text-light px-2 py-0">
          <h6 class="modal-title w-100 text-center">Estado Envío del artículo {{$item->nombre_articulo}}</h6>
          <button type="button" class="btn text-light" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
            
            <form method="POST" action="{{url('facturas/'.$item->id_detalle_factura)}}">
                @csrf
                @method('PUT')

                <select class="form-select" name="estado_entrega">
                    <option value="1">Enviado</option>
                    <option value="2">Entregado</option>
                </select>

                <div class="text-end mt-3">
                    <button class="btn btn-sm btn-primary">Aceptar</button>
                </div>
                
            </form>
            </div>
      </div>
    </div>
  </div>