<?php

class ModelTurno {
    private $baseDatos;

    function __construct(){
        $this->baseDatos = new PDO('mysql:host=localhost;' . 'dbname=CareMeDB;charset=utf8', 'root', '');
    }

    function getUnTurno($id){
        $sentencia = $this->baseDatos->prepare("SELECT * FROM turno  WHERE turno.id=?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function borrarTurno($id)
    {
        $sentencia = $this->baseDatos->prepare(" DELETE FROM turno WHERE id=?");
        $sentencia->execute(array($id));
        return $sentencia->rowCount();
    }

    function getTurnosPorMedicos() {
        $sentencia = $this->baseDatos->prepare("SELECT *, turno.id as id_turno FROM turno JOIN medico ON turno.id_medico = medico.id");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
}