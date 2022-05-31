
<script>
var boton = document.getElementById("boton");
// const cartList = "cartList";
// const nameProduct = document.getElementById("name-product");
// const feature1= document.getElementById("caracteristica1");
// const feature2= document.getElementById("caracteristica2");
// const feature3= document.getElementById("caracteristica3");
// const price = document.getElementById("price-text");
// const image = document.getElementById("srcimg");
const opinionList = document.getElementsByClassName("opinions")[0];
const formPrice = document.getElementById("price-add");
const textAreaEdit = document.getElementById("form-edit-texto");
const modalText = document.getElementById("modalText");
const idDelete = document.getElementById("form-delete-id");//AGREGO ESTO
const modalDeleteText = document.getElementById("modalDeleteText");//AGREGO ESTO
const idEdit = document.getElementById("form-edit-id");
var band = 0; //Bandera para el menú
window.addEventListener("resize",ventana);

document.addEventListener("DOMContentLoaded", function(){
    // console.log("hola 2");
    //Agregar evento al formulario
    boton.addEventListener("click",despliega_menu);
    // formPrice.addEventListener("submit",submitProduct);
    getOpinions();
    let modals = document.getElementsByClassName("modal");

    for(var i = 0; i < modals.length; i++) {
        modals[i].addEventListener("click", function(e) {
            if(e.target === this){
                this.classList.remove("show");
            }
        });
    }
});

function getOpinions() {

    let xhttp = new XMLHttpRequest();
    <?php 
    // echo $_GET["id"];
    ?>
    xhttp.open("GET","../controllers/opinionsController.php?idProduct=<?php echo $_GET["id"];?>",true);//Se le puso esto

    xhttp.onreadystatechange = function(){
        if(this.readyState === 4){
            if(this.status === 200){
                // console.log(this.responseText);
                let list = JSON.parse(this.responseText);
                paintOpinions(list);
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

function paintOpinions(list) {
    // console.log("Hola");
    // let list = getTweets();
    let html = '';

    var name = <?php echo json_encode($_SESSION, JSON_HEX_TAG); ?>;
    for(var i = 0; i < list.length; i++) {
        // console.log(name);
        if(name.type === "normal"){
            if(name.username === list[i].name){
            html += 
            `<div class="opinion-element" id="${list[i].id}">
            <h4 class="author-name">${list[i].name}</h4>
            <p class="text-opinion">${list[i].text}</p>
            <div class="options">
                    <button class="btn-option" onclick="editOpinion(${list[i].id})">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="btn-option" onclick="deleteOpinion(${list[i].id})">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
        </div>`;
        }
        else{
            html += 
            `<div class="opinion-element" id="${list[i].id}">
            <h4 class="author-name">${list[i].name}</h4>
            <p class="text-opinion">${list[i].text}</p>
            
        </div>`;
        }
        }
        else{
            if(name.username === list[i].name){
            html += 
            `<div class="opinion-element" id="${list[i].id}">
            <h4 class="author-name">${list[i].name}</h4>
            <p class="text-opinion">${list[i].text}</p>
            <div class="options">
                    <button class="btn-option" onclick="editOpinion(${list[i].id})">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="btn-option" onclick="deleteOpinion(${list[i].id})">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
        </div>`;
        }
        else{
            html += 
            `<div class="opinion-element" id="${list[i].id}">
            <h4 class="author-name">${list[i].name}</h4>
            <p class="text-opinion">${list[i].text}</p>
            <div class="options">
                    <button class="btn-option" onclick="deleteOpinion(${list[i].id})">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
        </div>`;
        }
            
        }
        
        
    }

    opinionList.innerHTML = html;
    // <?php
    //     if($_SESSION["type"] !== "normal") {
    //         echo  "hideEdit();";                
    //     }
    // ?>

}

function hideEdit(){
    let btnEdit = document.querySelectorAll("button[onclick^='editOpinion']");

    btnEdit.forEach(btn => btn.remove());
}

function editOpinion(id) {
    // console.log(id);
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET","../controllers/opinionsController.php?id=" + id,true);//Se le cambia el nombre dependiendo de la categoria

    xhttp.onreadystatechange = function(){
        if(this.readyState === 4){
            if(this.status === 200){
                // console.log(this.responseText);
                let opinion = JSON.parse(this.responseText);
                idEdit.value = opinion.id;
                textAreaEdit.value = opinion.text;

                // btnSaveEdit.setAttribute("onclick", "saveEdit(" + product.id + ")"); ESTO ES POR AJAX
                modalText.classList.add("show");
                // console.log(list);
            }
            else{
                console.log("Error");
            }
        }
    };

    xhttp.send();
}

function deleteOpinion(id) {
    // let list = getTweets();

    // list = list.filter(i => i.id !== id);

    // localStorage.setItem(keyList, JSON.stringify(list));

    // let tweet = document.getElementById(id);

    // tweet.className += ' hide';

    // setTimeout(() => {
    //     tweet.remove();
    // }, 300);
    idDelete.value = id;
    modalDeleteText.classList.add("show");//AGREGO ESTO

}

//FUNCIONES LOCAL STORAGE -----------------------------
function submitProduct(){
    // e.preventDefault();
    // e.stopPropagation();
    const cartList = "cartList";
    const nameProduct = document.getElementById("name-product");
    const feature1= document.getElementById("caracteristica1");
    const feature2= document.getElementById("caracteristica2");
    const feature3= document.getElementById("caracteristica3");
    const price = document.getElementById("price-text");
    const image = document.getElementById("srcimg");
    let product = {
        id: Date.now(),
        titulo: nameProduct.textContent,
        caracteristica1: feature1.textContent,
        caracteristica2: feature2.textContent,
        caracteristica3: feature3.textContent,
        precio: price.textContent,
        imagen: 'data:image/jpg;base64,' + image.textContent
    };

    let list = getCart();

    list.push(product);

    // console.log(tweet);

    // let list = [ tweet ];

    localStorage.setItem(cartList,JSON.stringify(list));
    alert("Producto agregado al carrito!!!");
    //paintTweet();
    // console.log("Enviando formulario");
}


function getCart(){
    const cartList = "cartList";
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
</script>