{include file="header.tpl"}
<h2>{$titulo}</h2>
<div class="btn btn-outline-secondary">
<a href="productos">Volver</a>
</div>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Aroma</th>
            <th>Precio</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$productos item=producto}
            <tr>
                <td>{$producto->aroma}</td>
                <td>{$producto->precio}</td>
                <td>{$producto->nombre}</td>
            </tr>
        {/foreach}
    </tbody>
</table>
{include file="footer.tpl"}