<div class="modal fade" id="mem{{Auth::user()->id_user}}"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-dark text-light">
            <h6 class="modal-title">
                <img src="{{asset('imagenes/iconos/icono_pagina.ico')}}" style="width: 55px">
                Membresía página Merca-Lín $12.00
            </h6>
          <button type="button" class="btn text-light" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
            <div class="mb-5 text-center mt-3">
                <h6><i class="fas fa-coins"></i> {{Auth::user()->nombre}} debes pagar para poder publicar artículos</h6>
            </div>
            {{--  BOTON DE PAYPAL  --}}
            <div id="smart-button-container">
              {{--  <input type="hidden" value="{{Auth::user()->email}}" id="correo">  --}}
                <div class="mt-2" id="paypal-button-container"></div>
            </div>
            {{--  TERMINA PARTE DEL BOTON PAYPAL  --}}
        </div>
      </div>
    </div>
  </div>