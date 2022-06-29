<div class="modal fade"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" id="eliminar_perfil">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">  
                <div class="text-center">
                    <h2 class="text-warning"><i class="fas fa-exclamation-triangle"></i> </h2>
                    <h6 class="mt-4">
                        ¿Deseas eliminar tu perfil?
                    </h6>
                    <form action="{{url('user/'.$cliente->id_user)}}" method="POST">
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