<?php

class Tarea {
    private $id;
    private $idUsuario;
    private $categoria;
    private $asunto;
    private $detalles;
    private $hora;
    private $prioridad;

    public function __construct($id, $idUsuario, $categoria, $asunto, $detalles, $hora, $prioridad){
        $this -> id = $id;
        $this -> idUsuario = $idUsuario;
        $this -> categoria = $categoria;
        $this -> asunto = $asunto;
        $this -> detalles = $detalles;
        $this -> hora = $hora;
        $this -> prioridad = $prioridad;
    }

    public function getId(){
        return $this -> id;
    }
    public function getIdUsuario(){
        return $this -> idUsuario;
    }
    public function getCategoria(){
        return $this -> categoria;
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
    public function getPrioridad(){
        return $this -> prioridad;
    }

    public function setCategoria($categoria){
        $this -> id = $categoria;
    }
    public function setAsunto($asunto){
        $this -> nombre = $asunto;
    }
    public function setDetalles($detalles){
        $this -> email = $detalles;
    }
    public function setHora($hora){
        $this -> password = $hora;
    }
    public function setPrioridad($prioridad){
        $this -> prioridad = $prioridad;
    }

}