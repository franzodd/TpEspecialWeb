document.addEventListener("DOMContentLoaded", iniciar);

function iniciar() {
    "use strict"

    document.getElementById("btn-agregarComentario").addEventListener("submit", e => {
        e.preventDefault();
        agregaComentario();
    });
    getComentariosDeUnProducto();
}

function getComentariosDeUnProducto() {
    let idProducto = document.getElementById("id-producto").innerHTML;
    fetch('API/comentariosDeProducto/' + idProducto)
        .then(response => response.json())
        .then(comentarios => renderisar(comentarios))
        .catch(error => console.log(error));
}

function renderisar(comentarios) {
    const contenedor = document.getElementById("lista-comentarios");
    contenedor.innerHTML = "";
    for (let comentario of comentarios) {
        contenedor.innerHTML += `<div class="alert alert-dark">
        <li>El usuario ${comentario.email} dice: <br>${comentario.comentario}<br> Puntuacion: ${comentario.puntaje}`;
        if (administrador() == 1) {
            contenedor.innerHTML += `<button value="${comentario.id_comentario}" class="btn-borrar btn btn-danger">Borrar</button></li>
      </div><br><br>`;
        }
        else {
            contenedor.innerHTML += "</li ></div>";
        }
    }
    let botonBorrar = document.querySelectorAll(".btn-borrar");
    for (let elemt of botonBorrar) {
        elemt.addEventListener("click", borrarComentario);
    }
}

function administrador() {
    let admi = document.getElementById('admin')
    if (admi != null) {
        return admi.value;
    }
}

function agregaComentario() {
    let radios = document.getElementsByName('puntaje');
    let puntaje;
    for (let i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            puntaje = radios[i].value;
            break;
        }
    }
    const comentario = {
        comentario: document.querySelector('input[name="comentario"]').value,
        puntaje: puntaje,
        id_usuario: document.querySelector('input[name="id_usuario"]').value,
        id_producto: document.querySelector('input[name="id_producto"]').value
    }
    fetch('API/comentarios/', {
        method: 'POST',
        headers: { "Content-Type": "application-json" },
        body: JSON.stringify(comentario)
    })
        .then(response => response.json())
        .then(comentario => getComentariosDeUnProducto())
        .catch(error => console.log(error));
}

function borrarComentario() {

    fetch('API/comentarios/' + this.value, {
        method: 'DELETE',
    })
        .then(comentario => getComentariosDeUnProducto())
        .catch(error => console.log(error));
}




