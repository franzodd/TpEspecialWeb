<?php
    require_once './Helper/HelperSession.php';
    require_once './smarty/libs/Smarty.class.php';
class View{
    private $titulo;
    private $smarty;
    function __construct(){
        $this->titulo = "Lista de productos";
        $this->smarty = new Smarty();
    }

    function mostrarHome($sesion = null){

        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', $this->titulo);
        $this->smarty->assign('sesion', $sesion);

        $this->smarty->display('templates/home.tpl');
    }
    function mostrarProducto($producto, $mensaje = null, $sesion = null){ 

        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', $this->titulo);
        $this->smarty->assign('productos', $producto);
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->assign('sesion', $sesion);

        $this->smarty->display('templates/productos.tpl'); 
    }
    function mostrarProductoPorCategoria($producto, $sesion = null){ 

        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', $this->titulo);
        $this->smarty->assign('productos', $producto);
        $this->smarty->assign('sesion', $sesion);

        $this->smarty->display('templates/categorias.tpl'); 
    }
    function mostrarUnproducto($producto = null,$mensaje = null,$imagenes = null, $sesion = null){ 

        $this->titulo = "Caracteristicas del producto";
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', $this->titulo);
        $this->smarty->assign('producto', $producto);
        $this->smarty->assign('imagenes', $imagenes);
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->assign('sesion', $sesion);
        
        $this->smarty->display('templates/ProductoIndividual.tpl'); 
    }
    function mostrarContacto($sesion = null){

        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('sesion', $sesion);

        $this->smarty->display('templates/contacto.tpl');
    }
    function mostrarUser($productos, $categorias,$usuarios, $sesion = null){

        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', $this->titulo);
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('usuarios', $usuarios);
        $this->smarty->assign('sesion', $sesion);

        $this->smarty->display('templates/user.tpl');
    }
    function mostrarAdmi($usuarios, $sesion = null){

        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', $this->titulo);
        $this->smarty->assign('usuarios', $usuarios);
        $this->smarty->assign('sesion', $sesion);

        $this->smarty->display('templates/admi.tpl');
    }
    function mostrarEditar($producto, $categoria, $sesion = null){

        $titulo = "Edicion de tabla";
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('productos', $producto);
        $this->smarty->assign('categorias', $categoria);
        $this->smarty->assign('sesion', $sesion);

        $this->smarty->display('templates/editar.tpl');
    }

    function mostrarHomeLocation(){
        header("Location: ".BASE_URL."home");
    }
    function mostrarAdmiLocation(){
        header("Location: ".BASE_URL."administracion");
    }
    function mostrarEditarLocation(){
        header("Location: ".BASE_URL."editar");
    }
    function mostrarUserLocation(){
        header("Location: ".BASE_URL."usuario");
    }
    function mostrarProductoLocation($id){
        header("Location: ".BASE_URL."un_producto/".$id);
    }
}