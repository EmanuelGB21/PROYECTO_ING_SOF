<div class="modal fade" id="det{{$item->id_factura}}"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      
      <div class="modal-header bg-dark text-light px-0 py-0">
        <p class="modal-title w-100 text-center"> 
          <i class="fas fa-receipt"></i> Detalles de la factura {{$item->id_factura}}
        </p>
        <button type="button" class="btn text-light" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
      </div>
      
      <div class="modal-body">
        @php
            $cont=1;
            $total=0;
        @endphp
        @foreach ($item->obtener_detalles as $detalles_factura)
        <div class="w-100 text-start">
          <p style="font-size: 14px">
            <span class="badge bg-secondary rounded-circle">{{$cont}}</span> 
            Pertenece a la categoria {{$detalles_factura->categoria_articulo}}
            -> {{$detalles_factura->nombre_articulo}}
            $ {{$detalles_factura->precio_articulo}}
            cantidad: {{$detalles_factura->cantidad_comprada}}
          </p>
          @php
              $cont++;
              $total += $detalles_factura->cantidad_comprada*$detalles_factura->precio_articulo;
          @endphp
        </div>
        @endforeach
        <div class="card-footer text-end border-dark border-1">
          <p style="font-size: 15px" ><b>Total:</b> <span style="font-size: 15px" class="badge bg-success">$ {{$total}}</span></p>
        </div>
      </div>
    </div>
  </div>
</div>