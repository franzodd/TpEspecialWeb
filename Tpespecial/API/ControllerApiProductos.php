<?php

require_once './models/ModelProducto.php';
require_once 'ControllerApi.php';


class ControllerApiProductos extends ControllerApi
{

    function __construct()
    {
        parent::__construct();
        $this->model = new ModelProducto;
    }

    function viewProductos($params = null)
    {

        $productos = $this->model->getProductos();
        $this->view->responde($productos, 200);
    }
    function viewUnProducto($params = null)
    {
        $id = $params[':ID'];
        $producto = $this->model->getUnProduto($id);
        if (!empty($producto))
            $this->view->responde($producto, 200);
        else
            $this->view->responde('El producto buscado no existe', 404);
    }
    function deleteProducto($params = null)
    {
        $id_producto = $params[":ID"];
        $resultado = $this->model->borrarProducto($id_producto);
        if (!empty($resultado))
            $this->view->responde("El producto con el id=$id_producto fue eliminado", 200);
        else
            $this->view->responde("El producto no existes", 404);
    }
    function agregarProducto($params = null)
    {
        $body = $this->getData();
        $idProducto = $this->model->insertarProducto($body->aroma, $body->precio, $body->id_categoria, $body->propiedad, $body->duracion);
        if (!empty($idProducto))
            $this->view->responde($this->model->getUnProduto($idProducto), 200);
        else
            $this->view->responde("El producto no se pudo insertar", 404);
    }
    function modificarProducto($params = null)
    {
        $id_producto = $params[":ID"];
        $body = $this->getData();
        $this->model->modificarProducto($id_producto, $body->aroma, $body->precio, $body->id_categoria, $body->propiedad, $body->duracion);


        $producto = $this->model->getUnProduto($id_producto);
        if (empty($producto)) {
            $this->view->responde("El producto con no existe", 404);
        } else {
            $resultado = $this->model->modificarProducto($id_producto, $body->aroma, $body->precio, $body->id_categoria, $body->propiedad, $body->duracion);
            if ($resultado > 0) {
                $this->view->responde($this->model->getUnProduto($id_producto), 200);
            } else
                $this->view->responde("El producto no fue actualizado", 204);
        }
    }
}
