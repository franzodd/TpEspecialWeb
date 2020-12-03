{include file="header.tpl"}
<h2>{$titulo}</h2>
<div class="btn btn-outline-secondary">
    <a href="productos">Volver</a>
</div>
<h2>{$mensaje}</h2>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Aroma</th>
            <th>Precio</th>
            <th>Categoria</th>
            <th>Propiedad</th>
            <th>Duracion</th>
            {if $imagenes != null}
                <th>Imagenes</th>
            {/if}
        </tr>
    </thead>
</table>
<ul class="list-group">
    <li class="ocultar" id="id-producto">{$producto->id_producto}</li>
    <li class="list-group-item">{$producto->aroma}</li>
    <li class="list-group-item">{$producto->precio}</li>
    <li class="list-group-item">{$producto->nombre}</li>
    <li class="list-group-item">{$producto->propiedad}</li>
    <li class="list-group-item">{$producto->duracion}</li>
    {foreach from=$imagenes item=imagen}
        <li class="list-group-item"><img src="{$imagen->path}" width="75" height="75">{if $sesion != false && $sesion['ADMI'] == 1}<button class="btn btn-danger"><a href="borrar_imagen/{$imagen->id}" class="borrar_producto">Borrar</a></button>{/if}</li>
    {/foreach}
</ul>
{if $sesion != false && $sesion['ADMI'] == 1}
    <form action="insertar_imagenes" method="POST" enctype="multipart/form-data">
        <input type="file" name="imagesToUpload[]" id="imagesToUpload" multiple>
        <input type="namber" name="fk_id_producto" value="{$producto->id_producto}" class="ocultar">
        <input type="submit" value="Agregar imagenes" class="btn btn-secondary">
    </form>
{/if}

<div id="comentarios">
    <ul id="lista-comentarios">

    </ul>
</div>
{if $sesion != false}
    <input type="hidden" id="admin" value="{$sesion["ADMI"]}">
    <h3>Dejenos su comentario</h3>
    <form id="btn-agregarComentario" action="insertar_comentario" method="POST">
        <label>¿Que opina del producto?</label><input type="text" name="comentario"><br>
        <label>¿Que puntuacion le daria?</label><br>
        <label><input type="radio" name="puntaje" value="1"> 1</label>
        <label><input type="radio" name="puntaje" value="2"> 2</label>
        <label><input type="radio" name="puntaje" value="3"> 3</label>
        <label><input type="radio" name="puntaje" value="4"> 4</label>
        <label><input type="radio" name="puntaje" value="5"> 5</label>
        <input type="namber" name="id_usuario" value="{$sesion['ID']}" class="ocultar">
        <input type="namber" name="id_producto" value="{$producto->id_producto}" class="ocultar"><br>
        <input type="submit" value="Comentar" class="btn btn-secondary" id="btn-agregarComentario">
    </form>
{else}
    <div class="ocultar">
        <h3>Dejenos su comentario</h3>
        <form id="btn-agregarComentario" action="insertar_comentario" method="POST">
            <label>¿Que opina del producto?</label><input type="text" name="comentario"><br>
            <label>¿Que puntuacion le daria?</label><br>
            <label><input type="radio" name="puntaje" value="1"> 1</label>
            <label><input type="radio" name="puntaje" value="2"> 2</label>
            <label><input type="radio" name="puntaje" value="3"> 3</label>
            <label><input type="radio" name="puntaje" value="4"> 4</label>
            <label><input type="radio" name="puntaje" value="5"> 5</label>
            <input type="namber" name="id_usuario" value="{$sesion['ID']}" class="ocultar">
            <input type="namber" name="id_producto" value="{$producto->id_producto}" class="ocultar"><br>
            <input type="submit" value="Comentar" class="btn btn-secondary" id="btn-agregarComentario">
        </form>
    </div>
{/if}
<script src="js/jsComentario.js"></script>
{include file="footer.tpl"}