var order_summ = document.getElementsByClassName("order_summary")[0];
const keyPrice = "keyPrice";
const keyPayment = "keyPayment";
const buttonpayment = document.getElementById("buttonpayment");
var name_client = document.getElementById("name");
var last_name = document.getElementById("last_name");
var direction = document.getElementById("direction");
var state = document.getElementById("state");
var city = document.getElementById("city");
var zip_code = document.getElementById("zip_code");
var number_card = document.getElementById("number_card");
var cardholder_name = document.getElementById("cardholder_name");
var expiration_date = document.getElementById("expiration_date");
var security_numbers = document.getElementById("cvv");
var formpay = document.getElementById("formpayment");

document.addEventListener("DOMContentLoaded", function(){
    //Agregar evento al formulario
    paintPrice();
    getPayments();
    // buttonpayment.addEventListener("submit",submitPayment);
});

function paintPrice(){
    price = JSON.parse(localStorage.getItem(keyPrice));
    let html = '';
    html += `<h2 class="title-summary-section">
            Resumen del pedido
        </h2>
        <div class="sub_container_summary">
            <div class="renglon_summary">
                <span>Total</span>
                <span>$${price}</span>
            </div>
        </div>
        <a href="../views/successful_order.php"><button class="complete_order">Completar orden</button></a>`;
    order_summ.innerHTML = html;
}


function getPayments(){
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET","../controllers/paymentController.php",true);//Se le puso esto

    xhttp.onreadystatechange = function(){
        if(this.readyState === 4){
            if(this.status === 200){
                // console.log(this.responseText);
                let list = JSON.parse(this.responseText);
                paintPayment(list);
                // console.log(list);
            }
            else{
                console.log("Error");
            }
        }
    };

    xhttp.send();

    return [];
}

function paintPayment(list){
    let html = '';
    
    if(list.length === 0){
        html += 
            `<input type="hidden" name="_method" value="POST">
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
            <input type="submit" id="buttonpayment" value="Guardar información de pago">`;
    }
    else{
        for(var i = 0; i < list.length; i++) {
            html += 
                `<input type="hidden" name="_method" value="POST">
                <div class="address">
                    <h2 class="title-address-section">Dirección de envio</h2>
                    <div class="renglon">
                        <input id="name" type="text" name="nombre_cliente" placeholder="Nombre" autocomplete="off" value="${list[i].name}" required>
                        <input id="last_name" type="text" name="apellidos_cliente" placeholder="Apellidos" autocomplete="off" value="${list[i].lastname}" required>
                    </div>
                    <div class="renglon">
                        <input id="direction" type="text" name="direccion_cliente" placeholder="Direccion" autocomplete="off" value="${list[i].address}" required>
                    </div>
                    <div class="renglon">
                        <input id="state" type="text" name="estado_usuario" placeholder="Estado" autocomplete="off" value="${list[i].state}" required>
                        <input id="city" type="text" name="ciudad_usuario" placeholder="Ciudad" autocomplete="off" value="${list[i].city}" required>
                        <input id="zip_code" type="number" name="codigo_postal_usuario" placeholder="Codigo postal" autocomplete="off" value="${list[i].zipcode}" required>
                    </div>
                </div>
                <div class="payment_method">
                    <h2 class="title-payment-section">Método de pago</h2>
                    <div class="renglon">
                        <input id="number_card" type="number" name="numero_tarjeta" placeholder="Número de tarjeta" autocomplete="off" value="${list[i].cardnumber}" required>
                    </div>
                    <div class="renglon">
                        <input id="cardholder_name" type="text" name="nombre_tarjeta" placeholder="NOMBRE" autocomplete="off" value="${list[i].cardname}" required>
                        <input id="expiration_date" type="text" name="fecha_expiracion" placeholder="MM/YY" autocomplete="off" value="${list[i].expire}" required>
                        <input id="cvv" type="number" name="cvv_tarjeta" placeholder="CVV" autocomplete="off" value="${list[i].cvv}" required>
                    </div>
                </div>
                <input type="submit" id="buttonpayment" value="Guardar información de pago">`;
        }
    }
    

    formpay.innerHTML = html;
}

function submitPayment(){
    let payment = {
        id: Date.now(),
        nombre: name_client.value,
        apellido: last_name.value,
        direccion: direction.value,
        estado: state.value,
        ciudad: city.value,
        codigopostal: zip_code.value,
        numtarjeta:number_card.value,
        nombretarjeta: cardholder_name.value,
        vencimiento: expiration_date.value,
        cvv: security_numbers.value
    };

    localStorage.setItem(keyPayment,JSON.stringify(payment));
}