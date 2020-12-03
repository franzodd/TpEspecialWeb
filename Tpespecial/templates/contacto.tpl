{include file="header.tpl"}
<main class="main-contacto">
    <article class="datos">
        <ul>
            <h3>Localidad</h3>
            <p>Buenos aires, Tandil</p>
            <li class="li-datos">
                <h4><span class="icon-zingat spanicono"></span>Dirección</h4>
                <p>La Movediza 1132</p>
            </li>
            <li class="li-datos">
                <h4><span class="icon-truck spanicono"></span>Teléfono:</h4>
                <p>(+54) 249 4431452</p>
            </li>
            <li class="li-datos">
                <h4><span class="icon-whatsapp spanicono"></span> Whatsapp:</h4>
                <p>(+54) 249 4467445</p>
            </li>
            <li class="li-datos">
                <h4><span class="icon-shop spanicono"></span>Horarios de Atención</h4>
                <p>Lunes a Viernes de 9 a 18 hs</p>
            </li>
        </ul>
    </article>
    <article class="contacto">
        <form>
            <h3>Contactenos!</h3>
            <div>
                <label for="nombre" class="label">Nombre y Apellido</label>
                <input type="text" id="nombre" name="nombre_apellido" class="info-input" />
            </div>
            <div>
                <label for="email" class="label">Correo Electrónico</label>
                <input type="email" name="email" class="info-input" />
            </div>
            <div>
                <label for="asunto" class="label">Asunto</label>
                <input type="text" name="asunto" class="info-input" />
            </div>
            <div>
                <label for="comentario" class="label">Comentarios</label>
                <textarea name="comentario" class="info-input"></textarea>
            </div>
            <div>
                <label for="captcha" class="label">Introduzca el Nº: <label id="label1"></label></label>
                <input type="text" name="captcha" class="info-input" id="captcha1">
            </div>
            <button type="submit" id="button1">Enviar</button>
            <div class="respuesta">
                <label for="respuestaform" id="form" class="label"></label>
            </div>
        </form>
    </article>
    <article class="google-maps">
        <h4>Encontranos todos los fines de semana en la feria artesanal de la plaza independencia. <span class="icon-periscope spanicono"></span></h4>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3172.5736033041485!2d-59.13943153794063!3d-37.328926756860575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95911f97114971c9%3A0xc9be92fa62930112!2sPlaza%20Independencia!5e0!3m2!1ses-419!2sar!4v1590707104402!5m2!1ses-419!2sar" width="320" height="240" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
        </iframe>
    </article>
</main>
{include file="footer.tpl"}