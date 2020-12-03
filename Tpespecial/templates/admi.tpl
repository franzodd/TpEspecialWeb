{include file="header.tpl"}
<h2>Lista de usuarios</h2>
{foreach from=$usuarios item=usuario}
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item">{$usuario->email}
        </li>
        <li class="list-group-item"><button class="btn btn-danger"><a href="borrar_usuario/{$usuario->id}" class="borrar_producto">Borrar</a></button>
        </li>
        <li class="list-group-item">
            <form action="convetir_administrador" method="POST">
                {if $usuario->administrador == 1}
                    <input type="checkbox" name="administrador" value="Boat" checked>
                {else}
                    <input type="checkbox" name="administrador">
                {/if}
                <input type="number" name="id" value="{$usuario->id}" class="ocultar">
                <label for="vehicle3"> Administrador </label><br><br>
                <input type="submit" value="Convertir">
            </form>
        </li>
    </ul>
{/foreach}
{include file="footer.tpl"}