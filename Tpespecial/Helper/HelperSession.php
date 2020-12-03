<?php

class HelperSession
{

    public function ChequearSesion()
    {
        session_start();
        if (!isset($_SESSION["EMAIL"])) {
            header("Location: " . Iniciar_sesion);
            die();
        } else {
            if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 9800)) {
                header("Location: " . Iniciar_sesion);
                die();
            }
            $_SESSION['LAST_ACTIVITY'] = time();
        }
    }
    public function boolean($admi)
    {
        return $admi == 1;
    }
    public function ChequearAdmi()
    {
        $this->ChequearSesion();
        if ($this->boolean($_SESSION['ADMI']) != true) {
            header("Location: " . BASE_URL . "usuario");
        }
    }

    public function sesion()
    {
        session_start();
        if ($_SESSION != null)
            return $_SESSION;
        else
            return false;
    }
    
    public function sesionIniciada()
    {
        if ($_SESSION != null)
            return $_SESSION;
        else
            return false;
    }
}
