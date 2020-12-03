<?php

require_once './models/ModelComentario.php';
require_once 'ControllerApi.php';


class ControllerApiComentarios extends ControllerApi
{

    function __construct()
    {
        parent::__construct();
        $this->model = new ModelComentario;
    }

    function viewComentarios($params = null)
    {
        $comentarios = $this->model->getComentarios();
        $this->view->responde($comentarios, 200);
        if (empty($comentarios))
            $this->view->responde("Error en los comentarios", 404);
    }

    function viewComentariosDeUnProducto($params = null)
    {
        $id = $params[':ID'];
        $comentarios = $this->model->getComentariosDelProducto($id);
        $this->view->responde($comentarios, 200);
        if (empty($comentarios))
            $this->view->responde("Error en los comentarios", 404);
    }

    function viewComentario($params = null)
    {
        $id = $params[':ID'];
        $comentario = $this->model->getComentario($id);
        $this->view->responde($comentario, 200);
        if (empty($comentario))
            $this->view->responde("Error en el comentario", 404);
    }

    function deleteComentario($params = null)
    {
        $id_comentario = $params[":ID"];
        $resultado = $this->model->borrarComentario($id_comentario);
        if (!empty($resultado))
            $this->view->responde("El comentario con el id=$id_comentario fue eliminado", 200);
        else
            $this->view->responde("El comentario no existe", 404);
    }

    function agregarComentario($params = null)
    {
        $body = $this->getData();
        $idComentario = $this->model->insertarComentario($body->comentario, $body->puntaje, $body->id_usuario, $body->id_producto);
        if (!empty($idComentario))
            $this->view->responde($this->model->getComentario($idComentario), 201);
        else
            $this->view->responde("El comentario no se pudo insertar", 404);
    }
}