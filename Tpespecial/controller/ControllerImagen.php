<?php
require_once './Helper/HelperSession.php';
require_once './models/ModelImagen.php';
require_once './views/view.php';

class ControllerImagen
{

    private $view;
    private $model;
    private $helper;

    function __construct()
    {
        $this->view = new View();
        $this->model = new ModelImagen();
        $this->helper = new HelperSession();
    }
    function datosDeImagen()
    {
        $this->helper->ChequearAdmi();
        $id_producto = 0;
        if (isset($_FILES["imagesToUpload"])) {
            $id_producto = $_REQUEST['fk_id_producto'];
            foreach ($_FILES["imagesToUpload"]["tmp_name"] as $key => $tmp_name) {
                $name = $_FILES["imagesToUpload"]["name"][$key];
            }
            $id_imagen = $this->model->insertaImagen($name, $_REQUEST['fk_id_producto']);
            if (!empty($id_imagen))
                $this->view->mostrarProductoLocation($id_producto);
            else
                echo "Error al insertar las imagenes";
        } else
            echo "Error al insertar las imagenes";
    }
    function borrarImagenPorParametro($params = null)
    {
        $this->helper->ChequearAdmi();
        $id_imagen = $params[":ID"];
        $imagen = $this->model->getImagene($id_imagen);
        $resultado = $this->model->borrarImagen($id_imagen);
        if (!empty($resultado))
            $this->view->mostrarProductoLocation($imagen->fk_id_producto);
        else
            echo "Error al eliminar la imagen";
    }
}
