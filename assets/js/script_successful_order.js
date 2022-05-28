
const keyPayment = "keyPayment";
const direccion_cliente = document.getElementsByClassName("address-client")[0];
document.addEventListener("DOMContentLoaded", function(){
    //Agregar evento al formulario
    getOrder();
    //paintOrder();
});

function getOrder(){
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

    for(var i = 0; i < list.length; i++) {
        html += 
            `Dirección de entrega <br>
            ${list[i].name} <br>
            ${list[i].address}, ${list[i].state}, ${list[i].city}, ${list[i].zipcode}`;
    }

    direccion_cliente.innerHTML = html;
}


function paintOrder(){
    client = JSON.parse(localStorage.getItem(keyPayment));
    let html = '';
    html += `Dirección de entrega <br>
    ${client.nombre} <br>
    ${client.direccion}, ${client.estado}, ${client.ciudad}, ${client.codigopostal}`;
    direccion_cliente.innerHTML = html;
}