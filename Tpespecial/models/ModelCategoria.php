<?php

class ModelCategoria {
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=aromaticos;charset=utf8', 'root', '');
    }
    function getCategorias(){
        $sentencia = $this->db->prepare(" SELECT * FROM categoria");
        $sentencia->execute();
        $categoria = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $categoria;
    }
    function insertaCategoria($categoria){
        $sentencia = $this->db->prepare(" INSERT INTO categoria(nombre) VALUES (?)");
        $sentencia->execute([$categoria]);
        return $this->db->lastInsertId();
    }
    function borrarCategoria($id){
        $sentencia = $this->db->prepare(" DELETE FROM categoria WHERE id=?");
        $sentencia->execute(array($id));
        return $sentencia->rowCount();
    }
    function modificarCategoria($id, $nombre)
    {
        $sentencia = $this->db->prepare(" UPDATE categoria SET nombre=? WHERE id=?");
        $sentencia->execute([$nombre,$id]);
        return $sentencia->rowCount();
    }
}