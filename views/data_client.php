<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style_data_client.css">
    <title>Datos del cliente</title>
</head>
<body>
    <?php include("../views/layouts/header.php"); ?>
    <form id="formpayment" action="../controllers/paymentController.php" method="POST">
    <!-- <input type="hidden" name="_method" value="POST">
    <div class="address">
        <h2 class="title-address-section">Dirección de envio</h2>
        <div class="renglon">
            <input id="name" type="text" name="nombre_cliente" placeholder="Nombre" autocomplete="off" required>
            <input id="last_name" type="text" name="apellidos_cliente" placeholder="Apellidos" autocomplete="off" required>
        </div>
        <div class="renglon">
            <input id="direction" type="text" name="direccion_cliente" placeholder="Direccion" autocomplete="off" required>
        </div>
        <div class="renglon">
            <input id="state" type="text" name="estado_usuario" placeholder="Estado" autocomplete="off" required>
            <input id="city" type="text" name="ciudad_usuario" placeholder="Ciudad" autocomplete="off" required>
            <input id="zip_code" type="number" name="codigo_postal_usuario" placeholder="Codigo postal" autocomplete="off" required>
        </div>
    </div>
    <div class="payment_method">
        <h2 class="title-payment-section">Método de pago</h2>
        <div class="renglon">
            <input id="number_card" type="number" name="numero_tarjeta" placeholder="Número de tarjeta" autocomplete="off" required>
        </div>
        <div class="renglon">
            <input id="cardholder_name" type="text" name="nombre_tarjeta" placeholder="NOMBRE" autocomplete="off" required>
            <input id="expiration_date" type="text" name="fecha_expiracion" placeholder="MM/YY" autocomplete="off" required>
            <input id="cvv" type="number" name="cvv_tarjeta" placeholder="CVV" autocomplete="off" required>
        </div>
    </div>
    <input type="submit" id="buttonpayment" value="Guardar información de pago"> -->
    </form>
    <!-- <form action="#" id="buttonpayment">
        <button>Guardar información de pago</button>
    </form> -->
    <form action="../controllers/compraController.php" class="order_summary" method="POST">
        <!-- <h2 class="title-summary-section">
            Resumen del pedido
        </h2>
        <div class="sub_container_summary">
            <div class="renglon_summary">
                <span>Subtotal</span>
                <span>$20.0000</span>
            </div>
            <div class="renglon_summary">
                <span>Total</span>
                <span>$20.00</span>
            </div>
        </div>
        <a href="successful_order.html"><button class="complete_order">Completar orden</button></a> -->
    </form>
    
    <script src="../assets/js/script_data_client.js"></script>
</body>
</html>