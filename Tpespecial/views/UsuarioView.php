<?php
require_once "./smarty/libs/Smarty.class.php";
class UserusarioView{
    private $title;
    private $smarty;
    function __construct(){
        $this->title = "Loguearse";
        $this->smarty = new Smarty();
    }
    function MostrarInicioSesion($mensaje = "",$sesion = null){

        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->assign('sesion', $sesion);

        $this->smarty->display('templates/loguearse.tpl');
    }
    function mostrarRegistrarUsuario($mensaje = "",$sesion = null){

        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', $this->title);
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->assign('sesion', $sesion);

        $this->smarty->display('templates/registrarse.tpl');
    }
    function mostrarLoguearse(){
        header("Location: ".BASE_URL."inicio_sesion");
    }
}