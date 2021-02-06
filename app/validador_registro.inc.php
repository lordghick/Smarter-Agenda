<?php

class ValidadorRegistro
{

    private $nombre;
    private $email;
    private $password;

    private $error_nombre;
    private $error_email;
    private $error_password1;
    private $error_password2;

    public function __construct($nombre, $email, $password1, $password2)
    {

        $this->nombre = "";
        $this->email = "";
        $this->password = "";

        $this->error_nombre = $this->validar_nombre($nombre);
        $this->error_email = $this->validar_email($email);
        $this->error_password1 = $this->validar_password1($password1);
        $this->error_password2 = $this->validar_password2($password1,  $password2);
    }

    private function variable_iniciada($variable)
    {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    private function validar_nombre($nombre)
    {
        if (!$this->variable_iniciada($nombre)) {
            return "Debes escribir un nombre de usuario.";
        } else {
            $this->nombre = $nombre;
        }
        return "";
    }

    private function validar_email($email)
    {
        if (!$this->variable_iniciada($email)) {
            return "Debes proporcionar un email";
        } else {
            include_once 'conexion.inc.php';

            Conexion::abrirConexion();
            $conexion = Conexion::obtenerConexion();

            $sql = "SELECT email FROM usuarios WHERE email = :email";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
            $sentencia->execute();
            $resultado = $sentencia->fetch();
            
            if ($resultado) {
                return "Este correo electrónico ya está en uso";
            } else {
                $this->email = $email;
            }
        }
        return "";
    }

    private function validar_password1($password1)
    {
        if (!$this->variable_iniciada($password1)) {
            return "Debes proporcionar una contraseña";
        } else {
            $this->password = $password1;
        }

        return "";
    }

    private function validar_password2($password1, $password2)
    {
        if(!$this->variable_iniciada($password1)) {
            return "Debes escribir una contraseña";
        }
        if (!$this->variable_iniciada($password2)) {
            return "Debes repetir tu contraseña";
        }

        if ($password1 !== $password2) {
            return "Las contraseñas no coinciden";
        }

        return "";
    }

    public function obtenerNombre()
    {
        return $this->nombre;
    }
    public function obtenerEmail()
    {
        return $this->email;
    }
    public function obtenerPassword()
    {
        return $this->password;
    }

    public function obtenerErrorEmail()
    {
        return $this->error_email;
    }
    public function obtenerErrorPassword1()
    {
        return $this->error_password1;
    }
    public function obtenerErrorPassword2()
    {
        return $this->error_password2;
    }

    //para que el usuario no deba volver a escribir su nombre en caso de un error en la contraseña o email o lo que sea
    public function mostrarNombre()
    {
        if ($this->nombre !== "") {
            echo 'value="' . $this->nombre . '"';
        }
    }

    public function mostrarErrorNombre()
    {
        if ($this->error_nombre !== "") {
            echo $this->avisoInicio . $this->error_nombre . $this->avisoCierre;
        }
    }

    public function registroValido()
    {
        if ($this->error_nombre === "" && $this->error_email === "" && $this->error_password1 === "" && $this->error_password2 === "") {
            return true;
        } else {
            return false;
        }
    }
}
