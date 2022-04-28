const keyPayment = "keyPayment";
const direccion_cliente = document.getElementsByClassName("address-client")[0];
document.addEventListener("DOMContentLoaded", function(){
    //Agregar evento al formulario
    paintOrder();
});

function paintOrder(){
    client = JSON.parse(localStorage.getItem(keyPayment));
    let html = '';
    html += `Dirección de entrega <br>
    ${client.nombre} <br>
    ${client.direccion}, ${client.estado}, ${client.ciudad}, ${client.codigopostal}`;
    direccion_cliente.innerHTML = html;
}