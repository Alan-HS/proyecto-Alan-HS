<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d5ef93086f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/style_product.css">
    <title>Twice Lightstick</title> <!-- Cambiar esto a cada una -->
</head>
<body>
    <?php include("../views/layouts/header.php"); ?>
    <?php include("../views/layouts/menu.php"); ?>
    <div class="content">
        <div class="product-photo">
            <img class="img-producto" src="../images/lighttwice_2.png" alt="Producto"> <!-- Cambiar esto a cada una -->
        </div>
        <div class="product-info">
            <h1 id="name-product">Twice Lightstick</h1> <!-- Cambiar esto a cada una -->
            <p class="product-text"> <!-- Cambiar esto a cada una -->
            Con el nuevo lightstick de Twice podrás tener una increíble experiencia en los conciertos gracias a su autonomía de batería, además de tener iluminación RGB con 4 modos de iluminación para poder apoyar a tu grupo favorito con estilo.
            </p>
            <!-- Esto es para llevar los datos al carrito de compras, por eso se considera con display none -->
            <!-- Caracteristicas --> <!-- Cambiar esto a cada una -->
            <span id="caracteristica1" style="display: none;">4 modos de iluminación</span>
            <span id="caracteristica2" style="display: none;">Conexión Bluetooth</span>
            <span id="caracteristica3" style="display: none;">Contiene 1 photocard</span>
            <!-- Imagen que va a llevar --> <!-- Cambiar esto a cada una con el _1-->
            <span id="srcimg" style="display: none;">lighttwice_1.png</span>

            <form action="#" id="price-add">
                <span id="price-text">1000</span> <!-- Cambiar esto a cada una -->
                <button class="add-to-cart">AGREGAR AL CARRITO</button>
            </form>
        </div>
        <?php include("../views/layouts/ad.php"); ?>
    </div>
    <h2 class="title-opinions">OPINIONES</h2>
    <div class="opinions">
        <!-- <div class="opinion-element">
            <h4 class="author-name">ALAN EDGARDO</h4>
            <p class="text-opinion"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio quod repellendus asperiores id, consequatur similique sit laudantium, numquam nobis doloremque molestiae consectetur vitae culpa minus sint dolorem, esse perspiciatis illo.</p>
        </div>
        <div class="opinion-element">
            <h4 class="author-name">ALAN EDGARDO</h4>
            <p class="text-opinion"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio quod repellendus asperiores id, consequatur similique sit laudantium, numquam nobis doloremque molestiae consectetur vitae culpa minus sint dolorem, esse perspiciatis illo.</p>
        </div> -->
    </div>
    <form class="insert_opinion" action="../controllers/opinionsController.php" method="POST" id="form-opinion" class="flow">
        <input type="hidden" name="_method" value="POST">
        <label for="text">Escribe tu opinión:</label>
        <textarea class="field-opinion" name="text" cols="80" rows="5" ></textarea>
        <input type="submit" value="Agregar opinión" class="submit-opinion">
    </form>
    <div class="footer">
        <p class="methods-text">Aceptamos:</p>
        <img src="../images/11.png" alt="VISA">
        <img src="../images/12.png" alt="MASTERCARD">
        <img src="../images/13.png" alt="AMERICAN EXPRESS">
        <p class="contact-information">2022 DaebakGaming <br> <a class="email-webmaster" href="mailto:alanhernandezsand@gmail.com">Webmaster:alanhernandezsand@gmail.com</a></p>
    </div>
    
    <?php include("../views/layouts/modal_opinions.php"); include("../views/layouts/modal_delete_opinions.php");?>
    <script src="../assets/js/script_product.js"></script>
</body>
</html>