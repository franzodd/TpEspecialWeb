<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Padma Hana</title>
    <base href="{$base_url}">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="./css/fonts/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="./js/index.js"></script>
</head>

<body>
    <header class="encabezado">
        <figure class="fig-header">
            <img src="img/logo.jpg" alt="Logo" class="logo">
            <figure class="redes-sociales">
                <a href="https://www.facebook.com/Ramas-Arom%C3%A1ticas-Padma-Hana-1540280592886262/" target="_blank»">
                    <img src="img/fb.png" alt="facebook" class="iconos"></a>
                <a href="https://www.instagram.com/inciensospadmahana/?hl=es-la" target="_blank»">
                    <img src="img/ig.png" alt="instagram" class="iconos"></a>
                <img src="img/wp.png" alt="whatsapp" class="iconos">
            </figure>
        </figure>
        <hgroup class="h-header">
            <h1>Padma Hana</h1>
            <h2>Inciensos Puros</h2>
        </hgroup>
    </header>
    <nav class="menu">
        <div class="menu-bar">
            <a href="#" class="bt-menu"><span class="icon-menu spanicono"></span>Menu</a>
        </div>
        <nav class="navegador" class="menu-left">
            <ul class="nav">
                {if $sesion != false}
                    <li><a href="home"><span class="icon-home spanicono"></span>Home</a></li>
                    <li><a href="productos"><span class="icon-shop spanicono"></span>Productos</a></li>
                    <li><a href="contacto"><span class="icon-envelope spanicono"></span>Contacto</a></li>
                    <li><a href="usuario"></span>Usuarios</a></li>
                {else}
                    <li><a href="home"><span class="icon-home spanicono"></span>Home</a></li>
                    <li><a href="productos"><span class="icon-shop spanicono"></span>Productos</a></li>
                    <li><a href="contacto"><span class="icon-envelope spanicono"></span>Contacto</a></li>
                    <li><a class="nav-link active" href="registrar_sesion">Registrarte</a></li>
                    <li><a class="nav-link active" href="inicio_sesion">Iniciar sesion</a></li>
                    <li><a href="usuario"></span>Usuarios</a></li>
                {/if}
            </ul>
        </nav>
    </nav>