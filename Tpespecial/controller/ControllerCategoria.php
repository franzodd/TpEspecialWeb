<?php

require_once './models/ModelCategoria.php';
require_once './Helper/HelperSession.php';
require_once './views/view.php';

class ControllerCategoria
{

    private $view;
    private $model;
    private $helper;

    function __construct()
    {
        $this->view = new View();
        $this->model = new ModelCategoria();
        $this->helper = new HelperSession();
    }
    function datosDeCategoria()
    {
        $this->helper->ChequearSesion();
        if (isset($_REQUEST['nombre'])) {
            $resultado = $this->model->insertaCategoria($_REQUEST['nombre']);
            if (empty($resultado))
                echo "Error al insertar la categoria";
        }
        $this->view->mostrarUserLocation();
    }
    function borrarCategoriaPorParametro($params = null)
    {
        $this->helper->ChequearSesion();
        $id_categoria = $params[":ID"];
        $resultado = $this->model->borrarCategoria($id_categoria);
        if (empty($resultado))
            $this->view->mostrarUserLocation();
        else
            echo "Error al insertar la categoria";
    }
    function modificarCategorias()
    {
        $this->helper->ChequearSesion();
        if (isset($_REQUEST['nombre'])) {
            $resultado = $this->model->modificarCategoria($_REQUEST['id'], $_REQUEST['nombre']);
            if (empty($resultado))
                echo "Error al insertar la categoria";
        }
        $this->view->mostrarEditarLocation();
    }
}
