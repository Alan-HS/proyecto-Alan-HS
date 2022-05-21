var boton = document.getElementById("boton");
const cartList = "cartList";
const productList = document.getElementsByClassName("list-products")[0];
const idEdit = document.getElementById("form-edit-id");
const tituloAreaEdit = document.getElementById("form-edit-titulo");
const feature1AreaEdit = document.getElementById("form-edit-feature1");
const feature2AreaEdit = document.getElementById("form-edit-feature2");
const feature3AreaEdit = document.getElementById("form-edit-feature3");
const priceAreaEdit = document.getElementById("form-edit-price");
const imageAreaEdit = document.getElementById("form-edit-image");
const hrefAreaEdit = document.getElementById("form-edit-href");
const idDelete = document.getElementById("form-delete-id");//AGREGO ESTO
const modalDeleteProduct = document.getElementById("modalDeleteProduct");//AGREGO ESTO
const modalProduct = document.getElementById("modalProduct");
var band = 0; //Bandera para el menú
window.addEventListener("resize",ventana);



document.addEventListener("DOMContentLoaded", function(){
    //Agregar evento al formulario
    getProducts();
    boton.addEventListener("click",despliega_menu);
    
    let modals = document.getElementsByClassName("modal");

    for(var i = 0; i < modals.length; i++) {
        modals[i].addEventListener("click", function(e) {
            if(e.target === this){
                this.classList.remove("show");
            }
        });
    }
    // const listproducts = document.getElementsByClassName("product");
    // console.log(listproducts);
    // for (var i=0; i< listproducts.length; i++){
    //     listproducts[i].addEventListener("submit",submitProduct);
    //     listproducts[i].classList.add("show");
    // }
});

//Ya no se requiere una funcion que se llame submitProductdatabase

function getProducts() {

    let xhttp = new XMLHttpRequest();

    xhttp.open("GET","../controllers/mouse_tecladosController.php",true);//Se le puso esto

    xhttp.onreadystatechange = function(){
        if(this.readyState === 4){
            if(this.status === 200){
                console.log(this.responseText);
                let list = JSON.parse(this.responseText);
                paintProducts(list);
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

function paintProducts(list) {
    // let list = getTweets();

    let html = '';

    for(var i = 0; i < list.length; i++) {
        html += 
            `<form class="product" id="${list[i].id}">
            <a href="../views/${list[i].href}"><img class="img-product" src="../images/${list[i].image}" alt="Imagen producto lista"></a>
            <div class="product-description">
                <a href="../views/${list[i].href}"><h2 class="name-product">${list[i].titulo}</h2></a>
                <ul class="list-feature">
                    <li class="featureitem">${list[i].feature1}</li>
                    <li class="featureitem">${list[i].feature2}</li>
                    <li class="featureitem">${list[i].feature3}</li>
                </ul>
            </div>
            <div class="price">
                <h1>${list[i].price}</h1>
                <button><h3>AGREGAR AL CARRITO</h3></button>
            </div>
            <div class="options">
                    <button class="btn-option" onclick="editProduct(${list[i].id})">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="btn-option" onclick="deleteProduct(${list[i].id})">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
        </form>`;
    }

    productList.innerHTML = html;

    const listproducts = document.getElementsByClassName("product");
    console.log(listproducts);
    for (var i=0; i< listproducts.length; i++){
        listproducts[i].addEventListener("submit",submitProduct);
    }
}

//Esto es para obtener el texto y empezar a editarlo
function editProduct(id) {
    // console.log(id);
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET","../controllers/mouse_tecladosController.php?id=" + id,true);//Se le cambia el nombre dependiendo de la categoria

    xhttp.onreadystatechange = function(){
        if(this.readyState === 4){
            if(this.status === 200){
                // console.log(this.responseText);
                let product = JSON.parse(this.responseText);
                idEdit.value = product.id;
                tituloAreaEdit.value = product.titulo;
                feature1AreaEdit.value = product.feature1;
                feature2AreaEdit.value = product.feature2;
                feature3AreaEdit.value = product.feature3;
                priceAreaEdit.value = product.price;
                imageAreaEdit.value = product.image;
                hrefAreaEdit.value = product.href;

                // btnSaveEdit.setAttribute("onclick", "saveEdit(" + product.id + ")"); ESTO ES POR AJAX
                modalProduct.classList.add("show");
                // console.log(list);
            }
            else{
                console.log("Error");
            }
        }
    };

    xhttp.send();
}

function deleteProduct(id) {
    // let list = getTweets();

    // list = list.filter(i => i.id !== id);

    // localStorage.setItem(keyList, JSON.stringify(list));

    // let tweet = document.getElementById(id);

    // tweet.className += ' hide';

    // setTimeout(() => {
    //     tweet.remove();
    // }, 300);
    idDelete.value = id;
    modalDeleteProduct.classList.add("show");//AGREGO ESTO

}

// ------------------ FUNCIONES PARA LOCAL STORAGE ---------

//Funcion para local storage
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


//----------------------------------------------------------

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