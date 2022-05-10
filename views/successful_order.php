<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style_successful.css">
    <title>Orden completada</title>
</head>
<body>
    <?php include("../views/layouts/header.php"); ?>
    <div class="content">
        <div class="thanks">
            <img src="https://picsum.photos/60/60" alt="Imagen palomita">
            <h2 class="title-thanks">Gracias por tu compra!</h2>
        </div>
        <div class="text_information">
            <p class="text">Tu orden esta confirmada. <br>
            Hemos aceptado tu orden y todo estará listo!
            </p>
        </div>
        <div class="about_client">
            <div class="sub_container_about">
                <h2 class="title-about">Información del cliente</h2>
                <p class="address-client">
                    <!-- Dirección de entrega <br>
                    Alan Edgardo <br>
                    Pápiros 132, Valle de Dalias, SLP, SLP, 78399 -->
                </p>
            </div>
            <div class="sub_container_about">
                <p class="payment_method">
                    Método de pago <br>
                    Tarjeta de debito
                </p>
            </div>
        </div>
    </div>
    
    <script src="../assets/js/script_successful_order.js"></script>
</body>
</html>