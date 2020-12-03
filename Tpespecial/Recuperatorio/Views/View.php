<?php
    require_once './smarty/libs/Smarty.class.php';
class View{
  
    
    private $titulo;
    private $smarty;
    function __construct(){
        $this->titulo;
        $this->smarty = new Smarty();
    }

    function mostrarTurno($turno, $cantTurnos){
        $this->titulo = $turno->nombre . $cantTurnos;
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', $this->titulo);
        $this->smarty->assign('turnos', $turno);

        $this->smarty->display('templates/turnos.tpl'); 
    }
}