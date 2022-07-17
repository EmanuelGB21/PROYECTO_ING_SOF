 function initPayPalButton() {
  var orderDescription = 'Compra de membresía de la página Merca-Lín';
  var shipping = 0;
  var quantity = 1;
  var quantitySelect = 0;//document.querySelector("#smart-button-container #quantitySelect");

  paypal.Buttons({
  style: {
    shape: 'pill',
    color: 'gold',
    layout: 'horizontal',
    label: 'buynow',
    
  },

  createOrder: function(data, actions) {
    var selectedItemDescription = orderDescription;
    var selectedItemPrice = 12.00; // PRECIO DE LA MEMBRESÍA

    var tax = (0 === 0 || false) ? 0 : (selectedItemPrice * (parseFloat(0)/100));
    
    if(quantitySelect > 0) {
      quantity = 1; 
    } else {
      quantity = 1;
    }

    tax *= quantity;
    tax = Math.round(tax * 100) / 100;
    var priceTotal = quantity * selectedItemPrice + parseFloat(shipping) + tax;
    priceTotal = Math.round(priceTotal * 100) / 100;
    var itemTotalValue = Math.round((selectedItemPrice * quantity) * 100) / 100;

    return actions.order.create({
      purchase_units: [{
        description: orderDescription,
        amount: {
          currency_code: 'USD',
          value: priceTotal,
          breakdown: {
            item_total: {
              currency_code: 'USD',
              value: itemTotalValue,
            },
            shipping: {
              currency_code: 'USD',
              value: shipping,
            },
            tax_total: {
              currency_code: 'USD',
              value: tax,
            }
          }
        },
        items: [{
          name: selectedItemDescription,
          unit_amount: {
            currency_code: 'USD',
            value: selectedItemPrice,
          },
          quantity: quantity
        }]
      }]
    });
  },

  onApprove: function(data, actions) {
    return actions.order.capture().then(function(orderData) {
     
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'La compra se ha efectuado correctamente!',
        text: 'Ahora puedes publicar en nuestro sitio web tus artículos',
        showConfirmButton: true,
        /* timer: 1500 */
      }).then(function(isConfirm){

        if (isConfirm) {
           window.location.href ="/Factura-Membresia"; /* REDIRIGO A LA VISTA DONDE GENERO CORREO Y MANDO FACTURA */
        }

      });
     
    });
  },
  onError: function(err) {
    console.log(err);
  },
  }).render('#paypal-button-container');
  }//close function

  initPayPalButton();//nombre del método se llama acá para que se ejecute