<?php

require_once './Models/ModelMensaje.php';
require_once 'ControllerApi.php';


class ApiControllerMensaje extends ControllerApi
{

    function __construct()
    {
        parent::__construct();
        $this->modelMensaje = new ModelProducto;
    }

    function crearMensaje($params = null)
    {
        $body = $this->getData();
        $idMensaje = $this->model->insertaProducto($body->id_medico, $body->mensaje, $body->visto);
        if (!empty($idMensaje))
            $this->view->responde($this->modelMensaje->getUnMensaje($idMensaje), 200);
        else
            $this->view->responde("El mensaje no se pudo crear", 404);
        //Supongo que la extiendo del ControllerApi que nos enseniaron a hacer y el view esta definido ahi igual que el getData
    }
}
