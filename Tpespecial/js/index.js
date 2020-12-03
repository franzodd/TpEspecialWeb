document.addEventListener("DOMContentLoaded", iniciar);

function iniciar() {
    "use strict"

  
    document.querySelector('.bt-menu').addEventListener("click", function (){
        document.querySelector('.navegador').classList.toggle("menu-left");
    });
}