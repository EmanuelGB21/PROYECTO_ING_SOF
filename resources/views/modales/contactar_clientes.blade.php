<div class="modal fade"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" id="contactar{{$item->id_user}}">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-dark text-light px-2 py-0">
          <h6 class="modal-title w-100 text-center">Contactar vía correo a {{$item->nombre}} {{$item->primer_apellido}}</h6>
          <button type="button" class="btn text-light" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
            
            <form method="POST" action="{{url('contacto-pagina')}}">
                @csrf
                @method('GET')
  
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Correo Electrónico:</label>
                  <input style="border-radius: 20px;" required type="email" class="form-control" readonly name="email" value="{{$item->email}}">
                </div>

                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Asunto:</label>
                  <textarea style="border-radius: 20px;" required class="form-control" name="contenido" placeholder="Ingresar mensaje ..." rows="5"></textarea>
                </div>

                <div class="text-end mt-3">
                    <button class="btn btn-sm btn-primary rounded-pill"><i class="fas fa-envelope"></i> Enviar</button>
                </div>
                
            </form>
            </div>
      </div>
    </div>
  </div>