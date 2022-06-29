<div class="modal fade"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" id="agregar_categorias">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-dark text-light">
          <h6 class="modal-title">Agregar Nueva Categoria</h6>
          <button type="button" class="btn text-light" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
            <form action="{{url('categorias')}}" method="post">
              @csrf
              <div class="form-floating mb-3">
                  <input required name="nombre_categoria" type="text" class="form-control" id="floatingInput" placeholder="Nombre Categoria">
                  <label for="floatingInput">Nombre Categoria</label>
              </div>            

              <div class="text-end">
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Registrar</button>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>