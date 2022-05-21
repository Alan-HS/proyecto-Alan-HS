var boton = document.getElementById("boton");
const cartList = "cartList";
const keyPrice = "keyPrice";
const cart = document.getElementById("list-products");
const btncheckout = document.getElementById("btncheckout");
const checkout = document.getElementById("checkout");
var band = 0; //Bandera para el menú
var total = 0;
window.addEventListener("resize",ventana);

document.addEventListener("DOMContentLoaded", function(){
    //Agregar evento al formulario
    boton.addEventListener("click",despliega_menu);
    paintCart();
    paintPrice();
});


function paintCart(){
    let list = getCart();

    let html = '';

    for(var i = 0; i < list.length; i++){
        var acum;
        //Solo entra cuando hay elementos en el arreglo de tweets
        //NOTA: PARA QUE FUNCIONE EL ../ YA TENGO QUE TENER LAS IMAGENES DEFINIDAS
        html += `<div class="product" id="${list[i].id}">
        <img class="img-product" src="../images/${list[i].imagen}" alt="Imagen producto lista">
        <div class="product-description">
            <h2 class="name-product">${list[i].titulo}</h2>
            <ul class="list-feature">
                <li>${list[i].caracteristica1}</li>
                <li>${list[i].caracteristica2}</li>
                <li>${list[i].caracteristica3}</li>
            </ul>
        </div>
        <div class="price">
            <h1>${list[i].precio}</h1>
            <button class="delete-product" onclick="deleteProduct(${list[i].id})">Eliminar producto</button>
        </div>
    </div>`;
        acum=parseFloat(list[i].precio);
        total+=acum;
    }

    cart.innerHTML = html;
}

function paintPrice(){
    var precio = document.createElement("h3");
    var text = document.createTextNode("TOTAL = $"+total);
    precio.classList.add("subtotal");
    precio.appendChild(text);
    checkout.insertBefore(precio,btncheckout);

    let totalprice = total;
    localStorage.setItem(keyPrice,JSON.stringify(totalprice));

}

function updatePrice(){
    let price = document.getElementsByClassName("subtotal")[0];
    price.remove();
    paintPrice();
}

function getCart(){
    let list = JSON.parse(localStorage.getItem(cartList));

    if(list === null){
        return [];
    }
    else{
        return list;
    }
}

function deleteProduct(id){
    var acum = 0;
    let list = getCart();

    list = list.filter(i => i.id !== id); //Regresa todos menos el que se va a eliminar

    localStorage.setItem(cartList,JSON.stringify(list));    

    let product = document.getElementById(id);

    product.className +=' hide';
    // console.log(tweet.className); // Regresa card

    setTimeout(()=>{
        product.remove();
    },300)
    if(list.length===0){
        total = 0;
    }
    for(var i = 0; i < list.length; i++){
        acum+=parseFloat(list[i].precio);
        total=acum;
    }
    updatePrice();
    // tweet.remove();
    // console.log("Eliminando " + id);
}

//SCRIPT MENU -------------------------------------------
// var menu = document.getElementsByClassName("navigation-list");
// console.log(menu);
// console.log(boton);

function despliega_menu(){
    if(window.matchMedia("(max-width: 780px)").matches){
        if(band == 0){
            document.getElementsByClassName("navigation-list")[0].style.display = "block";
            band = 1;
        }
        else{
            document.getElementsByClassName("navigation-list")[0].style.display = "none";
            band = 0;
        }
    }
}

window.addEventListener("resize",ventana);

function ventana(){
    if(window.matchMedia("(min-width: 780px)").matches){
        document.getElementsByClassName("navigation-list")[0].style.display = "flex";
    }
    else{
        band = 0;
        document.getElementsByClassName("navigation-list")[0].style.display = "none";
    }
}

//----------------------------------------------------------