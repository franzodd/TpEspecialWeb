{include file="header.tpl"}
<div class="container">
    <form action="registrar_usuario" method="post">
        <div class="form-group">
            <label for="user">Ingrese su email</label>
            <input type="text" class="form-control" id="user" name="email" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="pass">Elija contraseña</label>
            <input type="password" class="form-control" id="pass" name="password">
        </div>
        <div class="form-group">
            <label for="pass">Verifique contraseña</label>
            <input type="password" class="form-control" id="pass" name="verificacion">
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
    <h2 class="msj_error">{$mensaje}</h2>
</div>

{include file="footer.tpl"}