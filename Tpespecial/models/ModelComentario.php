<?php

class ModelComentario
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=aromaticos;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function getComentariosDelProducto($id_producto)
    {
        $sentencia = $this->db->prepare("SELECT *, comentarios.id as id_comentario FROM comentarios JOIN usuario ON comentarios.id_usuario = usuario.id WHERE comentarios.id_producto=?");
        $sentencia->execute([$id_producto]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getComentarios()
    {
        $sentencia = $this->db->prepare(" SELECT * FROM comentarios");
        $sentencia->execute();
        $comentario = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comentario;
    }

    function getComentario($id)
    {
        $sentencia = $this->db->prepare("SELECT *, comentarios.id as id_comentario FROM comentarios JOIN usuario ON comentarios.id_usuario = usuario.id WHERE comentarios.id=?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }   

    function insertarComentario($comentario,$puntaje,$id_usuario,$id_producto)
    {
        $sentencia = $this->db->prepare(" INSERT INTO comentarios (comentario,puntaje,id_usuario,id_producto) VALUES (?,?,?,?)");
        $sentencia->execute([$comentario,$puntaje,$id_usuario,$id_producto]);
        return $this->db->lastInsertId();
    }

    function borrarComentario($id)
    {
        $sentencia = $this->db->prepare(" DELETE FROM comentarios WHERE id=?");
        $sentencia->execute(array($id));
        return $sentencia->rowCount();
    }
}

