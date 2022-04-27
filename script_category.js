var boton = document.getElementById("boton");
const cartList = "cartList";
const listproducts = document.getElementsByClassName("product");

var band = 0; //Bandera para el menú
window.addEventListener("resize",ventana);


document.addEventListener("DOMContentLoaded", function(){
    //Agregar evento al formulario
    boton.addEventListener("click",despliega_menu);
    for (var i=0; i< listproducts.length; i++){
        listproducts[i].addEventListener("submit",submitProduct);
    }
});

function submitProduct(e){
    e.preventDefault();
    e.stopPropagation();
    let nameProduct;
    let feature1;
    let feature2;
    let feature3;
    let price;
    let image;
    // const hijos = this.children;
    nameProduct= this.getElementsByClassName("name-product")[0];
    feature1 = this.getElementsByClassName("featureitem")[0];
    feature2 = this.getElementsByClassName("featureitem")[1];
    feature3 = this.getElementsByClassName("featureitem")[2];
    price = this.getElementsByClassName("price")[0].getElementsByTagName("h1")[0];
    image = this.getElementsByClassName("img-product")[0];
    // console.log(nameProduct.textContent);
    // console.log(feature1.textContent);
    // console.log(feature2.textContent);
    // console.log(feature3.textContent);
    // console.log(price.textContent);
    // console.log(image.getAttribute("src"));
    // console.log(hijos[1].children[0].children[0].textContent);

    let product = {
        id: Date.now(),
        titulo: nameProduct.textContent,
        caracteristica1: feature1.textContent,
        caracteristica2: feature2.textContent,
        caracteristica3: feature3.textContent,
        precio: price.textContent,
        imagen: image.getAttribute("src")
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