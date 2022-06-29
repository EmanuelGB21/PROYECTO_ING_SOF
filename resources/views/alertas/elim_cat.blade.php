<div class="modal fade" id="cat{{$item->id_categoria}}"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <h2 class="text-warning"><i class="fas fa-exclamation-triangle"></i> </h2>
                    <h6 class="mt-4">
                        ¿Deseas eliminar la categoría: {{$item->nombre_categoria}}?
                    </h6>
                    <form action="{{url('categorias/'.$item->id_categoria)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm">Sí, Eliminar</button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>            
                </div>
            </div>
        </div>
    </div>
</div>