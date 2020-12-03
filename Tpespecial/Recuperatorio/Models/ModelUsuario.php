<?php

class ModelUsuario{

    private $baseDatos;

    function __construct(){
        $this->baseDatos = new PDO('mysql:host=localhost;' . 'dbname=CareMeDB;charset=utf8', 'root', '');
    }
    function getUsuario($usuario){
        $sentencia = $this->baseDatos->prepare("SELECT * FROM usuario WHERE email=?");//no existe usuario en sus tablas, lo dejo ilustrativo 
        $sentencia->execute(array($usuario));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}