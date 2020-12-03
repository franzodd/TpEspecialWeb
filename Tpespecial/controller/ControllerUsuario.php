<?php

require_once "./views/UsuarioView.php";
require_once "./models/ModelUsuario.php";
require_once "./Helper/HelperSession.php";

class ControllerUsuario
{

    private $view;
    private $model;
    private $helper;

    function __construct()
    {
        $this->view = new UserusarioView();
        $this->model = new ModelUsuario();
        $this->helper = new HelperSession();
    }

    function InicioSesion()
    {
        $this->view->MostrarInicioSesion();
    }

    function registrarUsuario()
    {
        $this->view->mostrarRegistrarUsuario();
    }

    function CerrarSesion()
    {
        session_start();
        session_destroy();
        $this->view->mostrarLoguearse();
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
            $usuarioFromDB = $this->model->getUsuario($usuario);
            if (isset($usuarioFromDB) && $usuarioFromDB) {
                if (password_verify($pass, $usuarioFromDB->password)) {
                    session_start();
                    $_SESSION['ID'] = $usuarioFromDB->id;
                    $_SESSION["EMAIL"] = $usuarioFromDB->email;
                    $_SESSION['ADMI'] = $usuarioFromDB->administrador;
                    $_SESSION['LAST_ACTIVITY'] = time();
                    header("Location: " . BASE_URL . "usuario");
                } else {
                    $this->view->MostrarInicioSesion("Contraseña incorrecta");
                }
            } else {
                $this->view->MostrarInicioSesion("El usuario no existe");
            }
        }
    }

    function insertarUsuario()
    {
        if (isset($_REQUEST["email"])) {
            $email = $_REQUEST["email"];
            $pass = $_REQUEST["password"];
            $verificacion = $_REQUEST["verificacion"];
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $usuario = $this->model->getUsuario($email);
            if ($usuario == null) {
                if ($pass == $verificacion) {
                    $this->model->insertaUsuario($email, $hash);
                    $this->VerificarUsuario($email, $pass);
                } else {
                    $this->view->mostrarRegistrarUsuario("Las contraseñas no coinciden");
                }
            } else
                $this->view->mostrarRegistrarUsuario("El usuario ingresado ya existe");
        }
    }

    function borrarUsuarioPorParametro($params = null)
    {
        $this->helper->ChequearAdmi();
        $id_usuario = $params[":ID"];
        $this->model->borrarUsuario($id_usuario);
        header("Location: " . BASE_URL . "administracion");
    }

    function convertirAdministrador()
    {
        $this->helper->ChequearAdmi();
        if (isset($_REQUEST['administrador'])) {
            $this->model->modificarUsuario($_REQUEST['id'], 1);
        } else {
            $this->model->modificarUsuario($_REQUEST['id'], 0);
        }
        header("Location: " . BASE_URL . "administracion");
    }
}
