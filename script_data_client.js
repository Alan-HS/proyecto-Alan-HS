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

document.addEventListener("DOMContentLoaded", function(){
    //Agregar evento al formulario
    paintPrice();
    buttonpayment.addEventListener("submit",submitPayment);
});

function paintPrice(){
    price = JSON.parse(localStorage.getItem(keyPrice));
    let html = '';
    html += `<h2 class="title-summary-section">
            Resumen del pedido
        </h2>
        <div class="sub_container_summary">
            <div class="renglon_summary">
                <span>Subtotal</span>
                <span>$${price}</span>
            </div>
            <div class="renglon_summary">
                <span>Total</span>
                <span>$${price}</span>
            </div>
        </div>
        <a href="successful_order.html"><button class="complete_order">Completar orden</button></a>`;
    order_summ.innerHTML = html;
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