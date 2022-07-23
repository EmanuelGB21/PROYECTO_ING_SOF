<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('imagenes/iconos/icono_pagina.ico')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="https://www.paypal.com/sdk/js?client-id=AdvdZJU9Em6o3frzXiO13CQmP7EQL0ycsdEBqJ18IWJf-KuXjDLxr5aXaAi8cmIfyo69Lu6I_froOYs9&currency=USD"></script>
    <title>Merca-Lín</title>
</head>
<body>

    @if ($estado=="pagar")
    <div class="container p-5">
        <div class="row p-5">
            <div class="col"></div>
            <div class="col-8 p-5">
              <div class="card shadow">
                <div class="card-header bg-dark text-light p-2">
                   <i class="fas fa-check text-success"></i> 
                   Realiza tu pago de $ {{ Cart::getTotal() }} dólares
                </div>
                <div class="card-body">
                     {{--  BOTON DE PAYPAL  --}}
                <div id="smart-button-container">
                    <input type="hidden" id="TOTAL_PRICE" value="{{Cart::getTotal()}}">
                    <div class="mt-2" id="paypal-button-container"></div>
                </div>
                {{--  TERMINA PARTE DEL BOTON PAYPAL  --}}
                </div>
              </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    @endif

    @if ($estado=="error")
    <div class="container p-5">
        <div class="row p-5">
            <div class="col"></div>
            <div class="col-8 p-5">
              <div class="card shadow">
                <div class="card-header bg-dark text-light">
                    Algo salió mal
                </div>
                <div class="card-body">
                  <i class="fas fa-info-circle"></i> Las cantidades insertadas no coinciden con las disponibles</p>
                  <div class="text-center mt-3">
                    <a href="{{route('cart.index')}}" class="btn btn-primary">Corregir cantidades</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    @endif
    
    {{--  una vez se paga dispara este formulario  --}}
    <form id="form_factura" action="{{url('facturas')}}" method="POST">
        @csrf
        <input type="hidden" name="array_de_compra" value="{{$Mi_compra}}">
    </form>

    <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('js/paypal_compra_general.js')}}"></script>
</body>
</html>