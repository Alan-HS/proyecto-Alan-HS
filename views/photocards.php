<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d5ef93086f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/style_category.css">
    <title>Photocards</title>
</head>
<body>
    <?php include("../views/layouts/header.php"); ?>
    <?php include("../views/layouts/menu.php"); ?>
    <div class="content">
        <div class="featured-photo">
            <img class="img-featured" src="../images/moonbyul_2.png" alt="Producto destacado">
        </div>
        <p class="featured-text">
        En la categoría de Photocards encontraras una gran variedad de fotografías que te ofrecerán una increíble vista al observar los detalles que tienen las photocards, así como el material de estas mismas. <br> El producto destacado de esta semana es nada más y nada menos que la photocard de Moonbyul gracias al gran éxito que tuvo en los últimos días con su nuevo álbum 6quence y los fanáticos estuvieron ansiosos de esperar su regreso.
        </p>
        <?php include("../views/layouts/ad.php"); ?>
    </div>
    <h2 class="title-products">PRODUCTOS</h2>
    <div class="list-products">
        
    </div>
    <!-- Formulario para base de datos -->
    <form action="../controllers/photocardsController.php" method="POST" id="form-product" class="form-container">
                    <!-- Se le puso text por el nombre de la columna de la db -->
                    <input type="hidden" name="_method" value="POST">
                    <label for="titulo">Titulo:</label>
                    <textarea name="titulo"></textarea>
                    <input type="hidden" name="_method" value="POST">
                    <label for="feature1">Caracteristíca 1:</label>
                    <textarea name="feature1"></textarea>
                    <input type="hidden" name="_method" value="POST">
                    <label for="feature2">Caracteristíca 2:</label>
                    <textarea name="feature2"></textarea>
                    <input type="hidden" name="_method" value="POST">
                    <label for="feature3">Caracteristíca 3:</label>
                    <textarea name="feature3"></textarea>
                    <input type="hidden" name="_method" value="POST">
                    <label for="price">Precio:</label>
                    <textarea name="price"></textarea>
                    <input type="hidden" name="_method" value="POST">
                    <label for="image">Imagen:</label>
                    <textarea name="image"></textarea>
                    <input type="hidden" name="_method" value="POST">
                    <label for="href">Href:</label>
                    <textarea name="href"></textarea>
                    <input type="submit" value="Agregar">
    </form>

    <div class="footer">
        <p class="methods-text">Aceptamos:</p>
        <img src="../images/11.png" alt="VISA">
        <img src="../images/12.png" alt="MASTERCARD">
        <img src="../images/13.png" alt="AMERICAN EXPRESS">
        <p class="contact-information">2022 DaebakGaming <br> <a class="email-webmaster" href="mailto:alanhernandezsand@gmail.com">Webmaster:alanhernandezsand@gmail.com</a></p>
    </div>
    
    <?php include("../views/layouts/modal_photocards.php"); include("../views/layouts/modal_delete_photocards.php");?>
    <script src="../assets/js/script_photocards.js"></script>
</body>
</html>