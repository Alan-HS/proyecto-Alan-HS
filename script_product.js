var boton = document.getElementById("boton");
const cartList = "cartList";
const nameProduct = document.getElementById("name-product");
const feature1= document.getElementById("caracteristica1");
const feature2= document.getElementById("caracteristica2");
const feature3= document.getElementById("caracteristica3");
const price = document.getElementById("price-text");
const image = document.getElementById("srcimg");

const formPrice = document.getElementById("price-add");
var band = 0; //Bandera para el menú
window.addEventListener("resize",ventana);

document.addEventListener("DOMContentLoaded", function(){
    //Agregar evento al formulario
    boton.addEventListener("click",despliega_menu);
    formPrice.addEventListener("submit",submitProduct);
});


function submitProduct(e){
    e.preventDefault();
    e.stopPropagation();

    let product = {
        id: Date.now(),
        titulo: nameProduct.textContent,
        caracteristica1: feature1.textContent,
        caracteristica2: feature2.textContent,
        caracteristica3: feature3.textContent,
        precio: price.textContent,
        imagen: image.textContent
    };

    let list = getCart();

    list.push(product);

    // console.log(tweet);

    // let list = [ tweet ];

    localStorage.setItem(cartList,JSON.stringify(list));
    //paintTweet();
    // console.log("Enviando formulario");
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