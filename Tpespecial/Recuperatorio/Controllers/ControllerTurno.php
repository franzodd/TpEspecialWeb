<?php
require_once './models/ModelMensaje.php';
require_once './models/ModelTurno.php';
require_once './Models/ModelUsuario.php';
require_once './Views/view.php';

class ControllerTurno
{

    private $view;
    private $modelTurno;
    private $modelMensaje;
    private $modelUsuario;

    function __construct()
    {
        $this->view = new View();
        $this->modelTurno = new ModelTurno();
        $this->modelMensaje = new ModelMensaje();
        $this->modelUsuario = new ModelUsuario();
    }
    private function ChequearSesion()
    {
        session_start();
        if (!isset($_SESSION["EMAIL"])) {
            header("Location: " . Iniciar_sesion);
            die();
        }
    }

    function borrarTurno($params = null)
    {
        $this->ChequearSesion();
        $id = $params[":ID"];
        $turno = $this->modelTurno->getUnTurno($id);
        if ($turno != null) {
            if ($turno->mes < dateMes()  && $turno->dia < dateDia() && $turno->hora < dateHora()) {//no se como se llaman esas funciones pero llamarian a las fechas y hora actual
                $resultado = $this->modelTurno->borrarTurno($id);
                if (!empty($resultado)) {
                    $this->modelMensaje->mandarMensaje($turno->id_medico, "Se le libero un turno el dia " . $turno->dia . " a la hora " . $turno->hora);
                    $this->view->mostrarAdministracion();
                } else {
                    $this->view->mostrarAdministracion("Error al eliminar el turno");
                }
            } else {
                $this->view->mostrarAdministracion("Se le termino el tiempo de anticipacion para cancelar el turno");
            }
        } else {
            $this->view->mostrarAdministracion("El turno no existe");
        }
    }

}
