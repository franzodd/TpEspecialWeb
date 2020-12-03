<?php
    require_once "controller/ControllerProducto.php";
    require_once "controller/ControllerUsuario.php";
    require_once 'controller/ControllerCategoria.php';
    require_once 'controller/ControllerImagen.php';
    require_once 'ruterclass.php';
    
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define('Iniciar_sesion', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/inicio_sesion');
    define('productos', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/productos');
    $ruter = new Router();


    $ruter->addRoute("home", "GET", "ControllerProducto", "viewHome");
    $ruter->addRoute("productos", "GET", "ControllerProducto", "viewProductos");
    $ruter->addRoute("categoria/:ID", "GET", "ControllerProducto", "viewProductosPorCategoria");
    $ruter->addRoute("un_producto/:ID", "GET", "ControllerProducto", "viewUnProducto");
    $ruter->addRoute("contacto", "GET", "ControllerProducto", "viewContacto");
    $ruter->addRoute("usuario", "GET", "ControllerProducto", "viewUsuario");
    $ruter->addRoute("administracion", "GET", "ControllerProducto", "viewAdministrador");
    $ruter->addRoute("editar", "GET", "ControllerProducto", "viewEditar");
    
    $ruter->addRoute("insertar_producto", "POST", "ControllerProducto", "datosDeProducto");
    $ruter->addRoute("insertar_categoria", "POST", "ControllerCategoria", "datosDeCategoria");
    $ruter->addRoute("insertar_imagenes", "POST", "ControllerImagen", "datosDeImagen");

    $ruter->addRoute("borrar_producto/:ID", "GET", "ControllerProducto", "borrarProductoPorParametro");
    $ruter->addRoute("borrar_categoria/:ID", "GET", "ControllerCategoria", "borrarCategoriaPorParametro");
    $ruter->addRoute("borrar_usuario/:ID", "GET", "ControllerUsuario", "borrarUsuarioPorParametro");
    $ruter->addRoute("borrar_imagen/:ID", "GET", "ControllerImagen", "borrarImagenPorParametro");
    
    $ruter->addRoute("modificar_tabla", "POST", "ControllerProducto", "modificarProductos");
    $ruter->addRoute("modificar_categoria", "POST", "ControllerCategoria", "modificarCategorias");
    $ruter->addRoute("convetir_administrador", "POST", "ControllerUsuario", "convertirAdministrador");
  
    $ruter->addRoute("verificar_usuario/", "POST", "ControllerUsuario", "VerificarUsuario");
    $ruter->addRoute("registrar_usuario/", "POST", "ControllerUsuario", "insertarUsuario");
    $ruter->addRoute("inicio_sesion/", "GET", "ControllerUsuario", "InicioSesion");
    $ruter->addRoute("registrar_sesion/", "GET", "ControllerUsuario", "registrarUsuario");
    $ruter->addRoute("cerrar_sesion/", "GET", "ControllerUsuario", "CerrarSesion");

    $ruter->setDefaultRoute("ControllerProducto", "viewHome");

    $ruter->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
