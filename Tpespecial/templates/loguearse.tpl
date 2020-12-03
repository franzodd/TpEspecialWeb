{include file="header.tpl"}
<div class="container">
    <form action="verificar_usuario" method="post">
      <div class="form-group">
            <label for="user">Ususario</label>
            <input type="text" class="form-control" id="user" name="input_usuario" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" class="form-control" id="pass" name="input_pass">
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
    <h2 class="msj_error">{$mensaje}</h2>
</div>

{include file="footer.tpl"}