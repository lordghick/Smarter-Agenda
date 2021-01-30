<?php

class ValidadorTarea {
    private $asunto;
    private $detalles;
    private $hora;
    private $errorAsunto;

    public function __construct($asunto, $detalles, $hora){
        $this -> asunto = "";
        $this -> detalles = $this -> validarDetalles($detalles);
        $this -> hora = $this -> validarHora($hora);
        $this -> errorAsunto = $this -> validarAsunto($asunto);
    }

    private function validarTarea($variable){
        if(isset($variable) && !empty($variable)){
            return true;
        }else{
            return false;
        }
    }

    private function validarAsunto($asunto){
        if(!$this -> validarTarea($asunto)){
            return "Debes especificar un asunto";
        } else {
            $this -> asunto = $asunto;
            return "";
        }
    }
    private function validarDetalles($detalles){
        if(!$this -> validarTarea($detalles)){
            return $this -> detalles = "No especificados ";
        } else {
            return $this -> detalles = $detalles;
        }
    }
    private function validarHora($hora){
        if(!$this -> validarTarea($hora)){
            return $this -> hora = "No especificada ";
        } else {
            return $this -> hora = $hora;
        }
    }

    public function tareaValida(){
        if ($this -> errorAsunto === ""){
            return true;
        }else{
            return false;
        }
    }

    public function getAsunto(){
        return $this -> asunto;
    }

    public function getDetalles(){
        return $this -> detalles;
    }

    public function getHora(){
        return $this -> hora;
    }

    public function getError(){
        return $this -> errorAsunto;
    }
}