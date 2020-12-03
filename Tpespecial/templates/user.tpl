{include file="header.tpl"}
<div>
    <div class="btn btn-outline-secondary">
        <a href="cerrar_sesion">Cerrar sesion</a>
    </div>
    <h2>Añadir nueva categoria</h2>
    <form action="insertar_categoria" method="POST">
        <label for="nombre">Nombre categoria nueva</label><input type="text" name="nombre">
        <input type="submit" value="Agregar categoria" class="btn btn-secondary">
    </form>
    <h2>Lista categorias</h2>
    {foreach from=$categorias item=categoria}
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item">{$categoria->nombre}
            </li>
            <li class="list-group-item"><button class="btn btn-danger"><a href="borrar_categoria/{$categoria->id}" class="borrar_producto">Borrar</a></button></li>
        </ul>
    {/foreach}
    <h2>Añadir producto a la lista</h2>
    <div class="formulariproducto">
        <form action="insertar_producto" method="POST" enctype="multipart/form-data">
            <label for="aroma">Aroma del producto</label><input type="text" name="aroma">
            <div class="input-group-prepend">
                <label for="precio">Precio</label>
                <span class="input-group-text">$</span>
                <input type="number" name="precio" step="any">
            </div>
            <label for="categoria">Categoria</label>
            <select id="categoria" name="id_categoria">
                {foreach from=$categorias item=categoria}
                    <option value="{$categoria->id}">{$categoria->nombre}</option>
                {/foreach}
            </select>
            <label for="propiedad">Propiedad</label>
            <input type="text" name="propiedad">
            <label for="duracion">Duracion en minutos</label>
            <input type="number" name="duracion">
            <input type="submit" value="Agregar producto" class="btn btn-secondary">
        </form>
    </div>
</div>
<h2>{$titulo}</h2>
<div>
    <h3>Editar lista</h3>
    <button class="btn btn-outline-secondary"><a href="editar">Editar</a></button>
</div>
<ul class="list-group list-group-horizontal">
    <li class="list-group-item">Aroma</li>
    <li class="list-group-item">Precio</li>
    <li class="list-group-item">Categoria</li>
</ul>
{foreach from=$productos item=producto}
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item">{$producto->aroma}
        </li>
        <li class="list-group-item"><span>$</span>{$producto->precio}
        </li>
        <li class="list-group-item">{$producto->nombre}
        </li>
        <li class="list-group-item"><button class="btn btn-danger"><a href="borrar_producto/{$producto->id_producto}" class="borrar_producto">Borrar</a></button></li>
    </ul>
{/foreach}
<h2>Lista de usuarios</h2>
<div class="btn btn-outline-secondary">
    <a href="administracion">Administrar usuarios</a>
</div>
{foreach from=$usuarios item=usuario}
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item">{$usuario->email}
        </li>
    </ul>
{/foreach}
{include file="footer.tpl"}