<div class="modal fade" id="reportar{{$articulo->id_articulo}}"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">  
                <div class="text-center">
                    <h2 class="text-warning"><i class="fas fa-exclamation-triangle"></i> </h2>
                    <h6 class="mt-4">
                        ¿Deseas reportar el artículo?
                    </h6>
                    <form action="{{route('reportar',$articulo->id_articulo)}}" method="POST">
                        @csrf
                        @method('GET')
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm">Sí, Reportar</button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>            
                </div>
            </div>
    </div>
</div>