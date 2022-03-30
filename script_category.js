//SCRIPT MENU -------------------------------------------

var boton = document.getElementById("boton");
// var menu = document.getElementsByClassName("navigation-list");
// console.log(menu);
var band = 0; //Bandera para el menú
// console.log(boton);
boton.addEventListener("click",despliega_menu);

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