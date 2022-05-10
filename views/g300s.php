<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style_product.css">
    <title>G300s</title>
</head>
<body>
    <?php include("../views/layouts/header.php"); ?>
    <?php include("../views/layouts/menu.php"); ?>
    <div class="content">
        <div class="product-photo">
            <img class="img-producto" src="https://picsum.photos/550/350" alt="Producto">
        </div>
        <div class="product-info">
            <h1 id="name-product">G300s</h1>
            <p class="product-text">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste, quis aperiam quos, magnam totam aut quia explicabo minus laborum perferendis expedita vero! Quia earum, debitis impedit atque maxime vero ipsum?
                <br> <br>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione nulla distinctio eaque doloremque aut eius neque eligendi sapiente dicta, cupiditate, quia beatae ullam pariatur in amet aliquid tempora! Possimus, vel!
            </p>
            <!-- Esto es para llevar los datos al carrito de compras, por eso se considera con display none -->
            <!-- Caracteristicas -->
            <span id="caracteristica1" style="display: none;">Caracteristica XD</span>
            <span id="caracteristica2" style="display: none;">Caracteristica 2</span>
            <span id="caracteristica3" style="display: none;">Caracteristica 3</span>
            <!-- Imagen que va a llevar -->
            <span id="srcimg" style="display: none;">2.png</span>

            <form action="#" id="price-add">
                <span id="price-text">1000.00</span>
                <button class="add-to-cart">AGREGAR AL CARRITO</button>
            </form>
        </div>
        <?php include("../views/layouts/ad.php"); ?>
    </div>
    <h2 class="title-opinions">OPINIONES</h2>
    <div class="opinions">
        <div class="opinion-element">
            <h4 class="author-name">ALAN EDGARDO</h4>
            <p class="text-opinion"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio quod repellendus asperiores id, consequatur similique sit laudantium, numquam nobis doloremque molestiae consectetur vitae culpa minus sint dolorem, esse perspiciatis illo.</p>
            <!-- <button class="delete-opinion">Eliminar opinión como administrador</button> -->
        </div>
        <div class="opinion-element">
            <h4 class="author-name">ALAN EDGARDO</h4>
            <p class="text-opinion"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio quod repellendus asperiores id, consequatur similique sit laudantium, numquam nobis doloremque molestiae consectetur vitae culpa minus sint dolorem, esse perspiciatis illo.</p>
            <!-- <button class="delete-opinion">Eliminar opinión como administrador</button> -->
        </div>
    </div>
    <div class="insert_opinion">
        <textarea class="field-opinion" name="comment" cols="80" rows="5" placeholder="Escribe tu opinión" disabled></textarea>
        <button class="submit-opinion">PUBLICAR OPINIÓN</button>
    </div>
    <div class="footer">
        <p class="methods-text">Aceptamos:</p>
        <img src="../11.png" alt="VISA">
        <img src="../12.png" alt="MASTERCARD">
        <img src="../13.png" alt="AMERICAN EXPRESS">
        <p class="contact-information">2022 DaebakGaming <br> <a class="email-webmaster" href="mailto:alanhernandezsand@gmail.com">Webmaster:alanhernandezsand@gmail.com</a></p>
    </div>
    <script src="../assets/js/script_product.js"></script>
</body>
</html>