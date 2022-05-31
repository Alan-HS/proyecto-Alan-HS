<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d5ef93086f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/style_product.css">
    <title>Producto</title> <!-- Cambiar esto a cada una -->
</head>
<body>
    <?php include("../views/layouts/header.php"); ?>
    <?php include("../views/layouts/menu.php"); ?>
    <div class="content">
        
        
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
    <form class="insert_opinion" action="../controllers/opinionsController.php?id=<?php echo $_GET["id"];?>" method="POST" id="form-opinion" class="flow">
        <input type="hidden" name="_method" value="POST">
        <label for="text">Escribe tu opinión:</label>
        <textarea class="field-opinion" name="text" cols="80" rows="5" required></textarea>
        <input type="submit" value="Agregar opinión" class="submit-opinion">
    </form>
    <div class="footer">
        <p class="methods-text">Aceptamos:</p>
        <img src="../images/11.png" alt="VISA">
        <img src="../images/12.png" alt="MASTERCARD">
        <img src="../images/13.png" alt="AMERICAN EXPRESS">
        <p class="contact-information">2022 DaebakGaming <br> <a class="email-webmaster" href="mailto:alanhernandezsand@gmail.com">Webmaster:alanhernandezsand@gmail.com</a></p>
    </div>
    <script>
        var list;
        // console.log(list);
        getProduct();
        
        function getProduct(){
            
            let xhttp = new XMLHttpRequest();

            xhttp.open("GET","../controllers/productController.php?id=<?php echo $_GET["id"];?>",true);//Se le puso esto

            xhttp.onreadystatechange = function(){
                
                if(this.readyState === 4){
                    
                    if(this.status === 200){
                    // console.log(this.responseText);
                    list = JSON.parse(this.responseText);
                    // console.log(list);
                    paintProduct(list);
                    }
                    else{
                        console.log("Error");
                    }
                }
            };

        xhttp.send();

        return [];
        }

        function paintProduct(list) {
    // let list = getTweets();
        let html = '';
        // console.log(list);
        // console.log(name);
            html += 
            `<div class="product-photo">
            <img class="img-producto" src="data:image/jpg;base64,${list.image}" alt="Producto">
        </div>
        <div class="product-info">
            <h1 id="name-product">${list.titulo}</h1>
            <p class="product-text">
            ${list.feature1} <br> ${list.feature2} <br> ${list.feature3}
            </p>
            <span id="caracteristica1" style="display: none;">${list.feature1}</span>
            <span id="caracteristica2" style="display: none;">${list.feature2}</span>
            <span id="caracteristica3" style="display: none;">${list.feature3}</span>
            <span id="srcimg" style="display: none;">${list.image}</span>

            <form action="#" id="price-add">
                <span id="price-text">${list.price}</span>
                <button class="add-to-cart">AGREGAR AL CARRITO</button>
            </form>
        </div>
        <div class="ad">
            <a href="https://los-taroleros.tebex.io/"><img class="img-ad" src="../images/14.png" alt="Anuncio de LosTaroleros"></a>
</div>`;
            // console.log(html);
        const productInfo = document.getElementsByClassName("content")[0];
        productInfo.innerHTML = html;
        }


    </script>
    <?php 
    include("../views/layouts/modal_opinions.php"); 
    include("../views/layouts/modal_delete_opinions.php");
    include("../assets/js/script_product.php");
    ?>
</body>
</html>

<?php
    // echo $_GET["id"];
    // echo $_GET["type"];
?>