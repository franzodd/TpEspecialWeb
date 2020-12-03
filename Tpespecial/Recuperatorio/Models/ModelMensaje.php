<?php

class ModelMensaje {
    private $baseDatos;

    function __construct(){
        $this->baseDatos = new PDO('mysql:host=localhost;' . 'dbname=CareMeDB;charset=utf8', 'root', '');
    }

    function mandarMensaje($id_medico, $mensaje)
    {
        $sentencia = $this->baseDatos->prepare(" INSERT INTO mensaje(mensaje,id_medico) VALUES (?,?)");
        $sentencia->execute([$mensaje,$id_medico]);
        return $this->baseDatos->lastInsertId();
    }
}