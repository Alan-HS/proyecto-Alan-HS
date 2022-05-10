<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style_cart.css">
    <title>Carrito</title>
</head>
<body>
    <?php include("../views/layouts/header.php"); ?>
    <?php include("../views/layouts/menu.php"); ?>
    <h1 class="title-cart">CARRITO</h1>
    <div id="list-products">
        <!-- <div class="product">
            <img class="img-product" src="https://picsum.photos/300/150" alt="Imagen producto lista">
            <div class="product-description">
                <h2 class="name-product">Titulo del producto 1</h2>
                <ul class="list-feature">
                    <li>Caracteristíca 1</li>
                    <li>Caracteristíca 2</li>
                    <li>Caracteristíca 3</li>
                </ul>
            </div>
            <div class="price">
                <h1>12000</h1>
                <button class="delete-product">Eliminar producto</button>
            </div>
        </div> -->
    </div>
    <div id="checkout">
        <!-- <h3 class="subtotal">TOTAL = $5000</h3> -->
        <a id="btncheckout" href="../views/data_client.php"><button class="proceed-checkout"><h3>PROCEDER AL PAGO</h3></button></a>
    </div>
    <div class="footer">
        <p class="methods-text">Aceptamos:</p>
        <img src="../11.png" alt="VISA">
        <img src="../12.png" alt="MASTERCARD">
        <img src="../13.png" alt="AMERICAN EXPRESS">
        <p class="contact-information">2022 DaebakGaming <br> <a class="email-webmaster" href="mailto:alanhernandezsand@gmail.com">Webmaster:alanhernandezsand@gmail.com</a></p>
    </div>
    <script src="../assets/js/script_cart.js"></script>
</body>
</html>