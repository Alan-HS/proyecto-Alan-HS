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
            <img src="../images/check.png" alt="Imagen palomita">
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
            <form action="../controllers/detailController.php" class="list-detail">
                <input type="hidden" name="_method" value="POST">
                <input id="json" type="hidden" name="array_json" value="">
                <!-- <input type="submit" value="Aceptar y regresar"> -->
            </form>
            <button id="btnSend" onclick="envio()">Aceptar y regresar</button>
        </div>
    </div>
    <script>
        function envio(){

        let list = getJSON();
        console.log(list);

        function getJSON(){
            let list2 = JSON.parse(localStorage.getItem("cartList"));
            var a =[];
        if(list2 === null){
            return [];
        }
        else{
            for(var i = 0; i < list2.length; i++){
                var myObj = {
                "name" : list2[i].titulo,    //your artist variable
                "total" : list2[i].precio   //your title variable
                };
                a.push(myObj);
            }
            // console.log(a);
            return JSON.stringify(a);
        }
        }
        document.getElementById("json").value = list;
        let xhttp = new XMLHttpRequest();

        xhttp.open("POST", "../controllers/detailController.php", true);

        xhttp.setRequestHeader("Content-type", "application/json");

        xhttp.send(list);

        location.replace('http://localhost/Proyecto/index.php');
    }
        // console.log(document.getElementById("json").value);
    </script>
    <script src="../assets/js/script_successful_order.js"></script>
</body>
</html>