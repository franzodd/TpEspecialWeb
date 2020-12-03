<?php
require_once './models/ModelMedico.php';
require_once './Views/view.php';

class ControllerMedico
{

    private $view;
    private $modelMedico;


    function __construct()
    {
        $this->view = new View();
        $this->modelMedico = new ModelMedico();
    }
 
    function mostrarTurnosPorMedicos()
    {
        $turnos = $this->modelMedico->getMedicosConTurnos();
        $cantTurnos = 0;

        foreach($turnos as $turno){
            $cantTurnos++;
        }
        
        if (!empty($turnos))
            $this->view->mostrarTurno($turnos, $cantTurnos);
    }
}
