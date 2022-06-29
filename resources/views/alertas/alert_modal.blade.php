<div class="modal fade"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" id="confirmar{{$item->id_articulo}}">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-body">

        <h2 class="text-warning"><i class="fas fa-exclamation-triangle"></i> </h2>
        <h6 class="mt-4">
            ¿Deseas eliminar el artículo: {{$item->nombre_articulo}}?
        </h6>
        <form action="{{url('articulos/'.$item->id_articulo)}}}" method="post">
          @csrf
          @method('DELETE')

          <div class="text-center mt-4">
              <button class="btn btn-primary btn-sm">Sí, eliminar !</button>
              <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
          
      </div>
    </div>
  </div>
</div>