<?php

class ModelUsuario
{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=aromaticos;charset=utf8', 'root', '');
    }
    function getUsuarios()
    {
        $sentencia = $this->db->prepare("SELECT * FROM usuario");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    function getUsuario($usuario)
    {
        $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE email=?");
        $sentencia->execute(array($usuario));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
    function insertaUsuario($email, $password)
    {
        $sentencia = $this->db->prepare(" INSERT INTO usuario(email,password) VALUES (?,?)");
        $sentencia->execute([$email, $password]);
        return $this->db->lastInsertId();
    }
    function borrarUsuario($id)
    {
        $sentencia = $this->db->prepare(" DELETE FROM usuario WHERE id=?");
        $sentencia->execute(array($id));
        return $sentencia->rowCount();
    }
    function modificarUsuario($id, $administrador)
    {
        $sentencia = $this->db->prepare(" UPDATE usuario SET administrador=? WHERE id=?");
        $sentencia->execute([$administrador,$id]);
        return $sentencia->rowCount();
    }
}
