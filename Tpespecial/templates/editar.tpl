{include file="header.tpl"}
<div>
    <h1>{$titulo}</h1>
    <h2>Edicion categoria</h2>
    {foreach from=$categorias item=categoria}
        <form class="form_producto" action="modificar_categoria" method="POST">
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item, ocultar">{$categoria->id}<input type="number" name="id" value="{$categoria->id}"></li>
                <li class="list-group-item">{$categoria->nombre}<input type="text" name="nombre" value="{$categoria->nombre}"></li>
                <input type="submit" value="Modificar">
            </ul>
        </form>
    {/foreach}
    <h2>Edicion productos</h2>
    {foreach from=$productos item=producto}
        <form class="form_producto" action="modificar_tabla" method="POST">
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item, ocultar">{$producto->id_producto}<input type="number" name="id_producto" value="{$producto->id_producto}"></li>
                <li class="list-group-item">{$producto->aroma}<input type="text" name="aroma" value="{$producto->aroma}"></li>
                <li class="list-group-item"><span>$</span>{$producto->precio}<input type="number" name="precio" step="any" value="{$producto->precio}"></li>
                <li class="list-group-item">{$producto->nombre}<select name="id_categoria">
                <option value="{$producto->id_categoria}">{$producto->nombre}</option>
                        {foreach from=$categorias item=categoria}
                            {if {$producto->id_categoria} != {$categoria->id}}
                                <option value="{$categoria->id}">{$categoria->nombre}</option>
                            {/if}
                        {/foreach}
                    </select>
                </li>
                <li class="list-group-item">{$producto->propiedad}<input type="text" name="propiedad" ></li>
                <li class="list-group-item"><span>Min</span>{$producto->duracion}<input type="number" name="duracion" step="any" value="{$producto->duracion}"></li>
                <input type="submit" value="Modificar">
            </ul>
        </form>
    {/foreach}

    {include file="footer.tpl"}