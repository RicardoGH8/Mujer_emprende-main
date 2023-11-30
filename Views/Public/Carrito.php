<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Carrito </title>
    <script src="https://www.paypal.com/sdk/js?client-id=ARegbVrkpuXzS3Dwc0HXrmjy0iQtDxSDAUetEok2AbwDtiLvQ527SYE_l8uND4tbQs8xqc-q752sSL9u&currency=MXN"></script>
</head>
<body>
    <footer>#</footer>
    <div id="paypal-button-contenainer"></div>

    <!-- creacion de estilo y monto del boton de paypal -->
    <script>
        paypal.Buttons({
            style:{
                color:'blue',
                shape:'pill',
                label:'pay'
            },
            createOrder:function(data,actions){
                return actions.order.create({
                    purchase_units:[{
                        amount:{
                            value: 100
                        }
                    }]
                });
            },
            /*  id para meter el pago  */
            onApprove:function(data, actions){
                actions.order.capture().then(function(detalles){
                    /* para visualizar el codigo desde el console */
                    /*  console.log(detalles); */
                    /* direcciona al una pagina  */
                    window.location.href="completado.html"
                });
            },
            onCancel: function(data){
                alert("Pago cancelado");
                /* para meter id de cancelacion a la base */
                console.log(data);
            }
        }).render('#paypal-button-contenainer');
    </script>
</body>
</html>