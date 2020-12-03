<?php

require_once "./Views/UsuarioView.php";
require_once "./Models/ModelUsuario.php";

class ControllerUsuario
{

    private $viewUsuario;
    private $modelUsuario;

    function __construct()
    {
        $this->viewUsuario = new UserusarioView();
        $this->modelUsuario = new ModelUsuario();
    }
    function InicioSesion()
    {
        $this->viewUsuario->MostrarInicioSesion();
    }
    function VerificarUsuario($email = null, $contraseña = null)
    {
        if ($email != null && $contraseña != null) {
            $usuario = $email;
            $pass = $contraseña;
        } else {
            $usuario = $_POST["input_usuario"];
            $pass = $_POST["input_pass"];
        }
        if (isset($usuario)) {
            $usuarioFromDB = $this->modelUsuario->getUsuario($usuario);
            if (isset($usuarioFromDB) && $usuarioFromDB) {
                if (password_verify($pass, $usuarioFromDB->password)) {
                    session_start();
                    $_SESSION["EMAIL"] = $usuarioFromDB->email;
                    $_SESSION['LAST_ACTIVITY'] = time();
                    header("Location: " . BASE_URL . "administrador");
                } else {
                    $this->viewUsuario->MostrarInicioSesion("Contraseña incorrecta");
                }
            } else {
                $this->viewUsuario->MostrarInicioSesion("El usuario no existe");
            }
        }
    }
}