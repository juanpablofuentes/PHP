<?php

class Tareas {

    private $responsable;
    private $limite = 10;
    private $lista = [];

    function __construct($responsable) {
        $this->responsable = $responsable;
    }

    function __get(string $name) {
        if ($name == "responsable") {
            return $this->responsable;
        }
    }

    function addTarea(string $tarea) {
        if (count($this->lista)>=$this->limite){
            throw new Exception("Límite superado");
        }
        $this->lista[] = $tarea;
    }

    function procesar() {
        $tarea = array_shift($this->lista);
        return $tarea . " Realizada";
    }

    function quitarTarea(string $tarea) {
        $this->lista = array_diff($this->lista, [$tarea]);
    }

}

$l=new Tareas("Juan");

echo $l->responsable;

$l->addTarea("Fregar");
$l->addTarea("Barrer");
$l->addTarea("Limpiar");
$l->addTarea("Barrer");

var_dump($l);

echo $l->procesar();
var_dump($l);
$l->quitarTarea("Barrer");
var_dump($l);