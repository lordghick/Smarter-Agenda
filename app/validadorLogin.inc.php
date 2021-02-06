<?php
include_once 'repositorioUsuario.inc.php';

class ValidadorLogin
{
    private $usuario;
    private $error;

    public function __construct($email, $password, $conexion)
    {
        $this->error = "";
        if (!$this->variable_iniciada($email)) {
            $this->usuario = null;
            $this->error = "Debes introducir un correo";
        } else if (!$this->variable_iniciada($password)) {
            $this->usuario = null;
            $this->error = "Debes introducir tu contraseña";
        }else{
            $this->usuario = RepositorioUsuario::emailLogin($conexion, $email);

            if (is_null($this->usuario) || !password_verify($password, $this->usuario->getPassword())) {
                $this->error = "Usuario o contraseña inválida";
            }
        }
    }

    private function variable_iniciada($variable)
    {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    public function getUsuario()
    {
        return $this->usuario;
    }
    public function getError()
    {
        return $this->error;
    }
}
