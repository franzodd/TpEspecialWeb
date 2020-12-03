<?php

class ModelMedico {
    private $baseDatos;

    function __construct(){
        $this->baseDatos = new PDO('mysql:host=localhost;' . 'dbname=CareMeDB;charset=utf8', 'root', '');
    }

    function getMedicos(){
        $sentencia = $this->baseDatos->prepare(" SELECT * FROM medico");
        $sentencia->execute();
        $medicos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $medicos;
    }

    function getMedicosConTurnos() {
        $sentencia = $this->baseDatos->prepare("SELECT *, medico.id as id_medico FROM medico JOIN turno ON medico.id = turno.id_medico");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

}