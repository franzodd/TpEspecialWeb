<?php

class ModelProducto
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=aromaticos;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    function getProductosConCategoria() {
        $query = $this->db->prepare("SELECT *, productos.id as id_producto FROM productos JOIN categoria ON productos.id_categoria = categoria.id"); //SELECT * FROM `productos` ORDER BY id DESC
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    function getProductos()
    {
        $sentencia = $this->db->prepare(" SELECT * FROM productos");
        $sentencia->execute();
        $producto = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $producto;
    }
    function getUnProduto($id_producto){
        $sentencia = $this->db->prepare("SELECT *, productos.id as id_producto FROM productos JOIN categoria ON productos.id_categoria = categoria.id WHERE productos.id=?");
        $sentencia->execute(array($id_producto));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
    function getPorCategoria($id_de_categoria){
        $sentencia = $this->db->prepare("SELECT * FROM productos JOIN categoria ON productos.id_categoria = categoria.id WHERE categoria.id=?"  );
        $sentencia->execute([$id_de_categoria]);
        
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    function insertarProducto($aroma, $precio, $id_categoria, $propiedad, $duracion)
    {
        $sentencia = $this->db->prepare(" INSERT INTO productos(aroma,precio,propiedad,duracion,id_categoria) VALUES (?,?,?,?,?)");
        $sentencia->execute([$aroma, $precio,$propiedad, $duracion,$id_categoria]);
        return $this->db->lastInsertId();
    }
    function borrarProducto($id)
    {
        $sentencia = $this->db->prepare(" DELETE FROM productos WHERE id=?");
        $sentencia->execute(array($id));
         return $sentencia->rowCount();
    }
    function modificarProducto($id, $aroma, $precio, $id_categoria, $propiedad, $duracion)
    {
        $sentencia = $this->db->prepare(" UPDATE productos SET aroma=?, precio=?, id_categoria=?, propiedad=?, duracion=? WHERE id=?");
        $sentencia->execute([$aroma,$precio,$id_categoria,$propiedad,$duracion,$id]);
        return $sentencia->rowCount();
    }
}
