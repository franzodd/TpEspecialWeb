<?php

class ModelImagen {
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=aromaticos;charset=utf8', 'root', '');
    }
    function getImagenes(){
        $sentencia = $this->db->prepare(" SELECT * FROM imagen");
        $sentencia->execute();
        $imagenes = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $imagenes;
    }
    function getImagene($id){
        $sentencia = $this->db->prepare("SELECT *, imagen.id as id_imagen FROM imagen JOIN productos ON imagen.fk_id_producto = productos.id WHERE imagen.id=?");
        $sentencia->execute(array($id));
        $imagen = $sentencia->fetch(PDO::FETCH_OBJ);
        return $imagen;
    }
    function getImagenesDeUnProducto($id_producto){
        $sentencia = $this->db->prepare(" SELECT * FROM imagen WHERE fk_id_producto=?");
        $sentencia->execute(array($id_producto));
        $imagenes = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $imagenes;
    }
    function insertaImagen($imagen, $fk_id_producto){
        
        $sentencia = $this->db->prepare(" INSERT INTO imagen(path,fk_id_producto) VALUES (?,?)");
        foreach($_FILES["imagesToUpload"]["tmp_name"] as $key => $tmp_name)
        {
        $destino_final = "img/".uniqid().".png";
        move_uploaded_file($tmp_name, $destino_final);
        $sentencia->execute([$destino_final,$fk_id_producto]);
        }
        return $this->db->lastInsertId();
    }
    function borrarImagen($id){
        $sentencia = $this->db->prepare(" DELETE FROM imagen WHERE id=?");
        $sentencia->execute(array($id));
        return $sentencia->rowCount();
    }
}