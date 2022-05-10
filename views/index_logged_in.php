<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_home.css">
    <title>Inicio</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="index_logged_in.html"><img class="img-logo" src="10.png" alt="LOGO"></a>
        </div>
        <div class="cart-icon">
            <a href="cart.html"><img class="img-cart" src="8.png" alt="Imagen carrito"></a>
        </div>
        <!-- <div class="profile-icon">
            <a href="login.html"><img class="img-profile" src="9.png" alt="Imagen perfil"></a>
        </div> -->
        <div class="logout-icon">
            <a href="index.html"><img class="img-logout" src="salida.png" alt="Imagen cierre sesion"></a>
        </div>
    </div>
    <div class="navigation-bar">
        <div class="boton-menu">
            <button id="boton">Menú</button>
        </div>
        <ul class="navigation-list">
            <li class="nav-item"> <a class="nav-link" href="index.html">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" href="headsets.html">Headsets</a></li>
            <li class="nav-item"><a class="nav-link" href="mouse_teclados.html">Mouse y teclados</a></li>
            <li class="nav-item"><a class="nav-link" href="microfonos.html">Microfonos</a></li>
            <li class="nav-item"><a class="nav-link" href="lightstick.html">Lightstick</a></li>
            <li class="nav-item"><a class="nav-link" href="discos.html">CD's</a></li>
            <li class="nav-item"><a class="nav-link" href="photocards.html">Photocards</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="featured-photo">
            <img class="img-featured" src="1.png" alt="Producto destacado">
        </div>
        <p class="featured-text">
            ¡Bienvenido a DaebakGaming, la mejor tienda donde puedes comprar tecnología para los amantes del gaming y productos relacionados con la música tanto coreana como en inglés!
            <br> <br>
            En esta ocasión te presentamos el producto destacado de toda la página el cual es el último álbum reciente del grupo femenino "TWICE" donde nos impresiona tener sus canciones nuevas que serán de un gran agrado para el público que tenga una adoración hacia las chicas.
            <br> <br>
            ¡En DaebakGaming estamos orgullosos de poder tener los productos que te encantan y por eso seguiremos así por siempre, que disfrutes tu estancia por la página!    
        </p>
        <div class="ad">
            <a href="https://los-taroleros.tebex.io/"><img class="img-ad" src="14.png" alt="Anuncio de LosTaroleros"></a>
        </div>
    </div>
    <!-- <div class="admin-home">
        <form class="form-admin" type="text-featured">
            <textarea class="field-text" name="change-text" cols="80" rows="5" placeholder="Escribe el nuevo texto destacado"></textarea>
            <button class="button-admin" type="submit">Cambiar texto principal</button>
        </form>
        <form class="form-admin" type="img-src">
            <textarea class="field-src" name="img-src" cols="80" rows="5" placeholder="Escribe la ruta de la imagen"></textarea>
            <button class="button-admin" type="submit">Cambiar imagen</button>
        </form>
    </div> -->
    <h2 class="title-best-sellers">LOS MÁS VENDIDOS</h2>
    <div class="best-sellers">
        <div class="product">
            <a href="product_logged_in.html"><img class="img-product" src="2.png" alt="Imagen producto mejor vendido"></a>
            <h2 class="name-product">Logitech G300s</h2>
        </div>
        <div class="product">
            <a href="product_logged_in.html"><img class="img-product" src="3.png" alt="Imagen producto mejor vendido"></a>
            <h2 class="name-product">Formula of Love: O+T=&lt3</h2>
        </div>
        <div class="product">
            <a href="product_logged_in.html"><img class="img-product" src="4.png" alt="Imagen producto mejor vendido"></a>
            <h2 class="name-product">Razer Seiren Mini</h2>
        </div>
        <div class="product">
            <a href="product_logged_in.html"><img class="img-product" src="5.png" alt="Imagen producto mejor vendido"></a>
            <h2 class="name-product">Lightstick Dreamcatcher</h2>
        </div>
        <div class="product">
            <a href="product_logged_in.html"><img class="img-product" src="6.png" alt="Imagen producto mejor vendido"></a>
            <h2 class="name-product">Photocard Moonbyul</h2>
        </div>
        <div class="product">
            <a href="product_logged_in.html"><img class="img-product" src="7.png" alt="Imagen producto mejor vendido"></a>
            <h2 class="name-product">HyperX Cloud Flight II</h2>
        </div>
    </div>
    <div class="footer">
        <p class="methods-text">Aceptamos:</p>
        <img src="11.png" alt="VISA">
        <img src="12.png" alt="MASTERCARD">
        <img src="13.png" alt="AMERICAN EXPRESS">
        <p class="contact-information">2022 DaebakGaming <br> <a class="email-webmaster" href="mailto:alanhernandezsand@gmail.com">Webmaster:alanhernandezsand@gmail.com</a></p>
    </div>
    <script src="script_home.js"></script>
</body>
</html>