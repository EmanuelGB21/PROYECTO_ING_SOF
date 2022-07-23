<div class="modal fade" id="car_del{{$item->id}}"  data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <h2 class="text-warning"><i class="fa fa-exclamation-triangle"></i> </h2>
                    <h6 class="mt-4">
                        ¿Deseas eliminar tu carrito de compras?
                    </h6>
                    <form action="{{ route('cart.clear') }}" method="POST">
                        {{ csrf_field() }}
                       
                        <div class="text-end mt-4">
                            <button class="btn btn-primary btn-sm">Sí, eliminar</button> 
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>       
                </div>
            </div>
        </div>
    </div>
</div>