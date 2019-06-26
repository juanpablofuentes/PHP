<?php

class Componentes {

    private $referencia;
    private $nombre;
    private $precio;

    function __construct(string $referencia, string $nombre, float $precio) {
        $this->__set("referencia", $referencia);
        $this->__set("nombre", $nombre);
        $this->__set("precio", $precio);
    }

    function __get($name) {
        if (!property_exists($this, $name)) {
            throw new Exception("La propiedad $name no existe");
        }
        return $this->$name;
    }

    function __set($name, $value) {
        if (!property_exists($this, $name)) {
            throw new Exception("La propiedad $name no existe");
        }
        $this->$name = $value;
    }

}

class Empleado {

    private $nombre;
    private $preciohora;

    function __construct(string $nombre, float $preciohora) {
        $this->__set("nombre", $nombre);
        $this->__set("preciohora", $preciohora);
    }

    function __get($name) {
        if (!property_exists($this, $name)) {
            throw new Exception("La propiedad $name no existe");
        }
        return $this->$name;
    }

    function __set($name, $value) {
        if (!property_exists($this, $name)) {
            throw new Exception("La propiedad $name no existe");
        }
        $this->$name = $value;
    }

}

class Montaje {

    private $empleado;
    private $horas;

    function __construct(Empleado $empleado, int $horas) {
        $this->__set("empleado", $empleado);
        $this->__set("horas", $horas);
    }

    function __get($name) {
        if (!property_exists($this, $name)) {
            throw new Exception("La propiedad $name no existe");
        }
        return $this->$name;
    }

    function __set($name, $value) {
        if (!property_exists($this, $name)) {
            throw new Exception("La propiedad $name no existe");
        }
        $this->$name = $value;
    }

}

class Producto {

    private $nombre;
    private $montaje;
    private $componentes = [];

    function __construct(string $nombre) {
        $this->nombre=$nombre;
    }

    function getMontaje() {
        return $this->montaje->empleado->nombre . " " . $this->montaje->horas;
    }

    function setMontaje(Montaje $montaje) {
        $this->montaje = $montaje;
    }

    function addComponente(Componentes $componente) {
        $this->componentes[] = $componente;
    }

    function coste() {
        $importe=0;
        foreach($this->componentes as $componente){
            $importe+=$componente->precio;
        }
        $importe+=$this->montaje->horas*$this->montaje->empleado->preciohora;
        return $importe;
    }
    function __toString() {
         $lista=$this->nombre;
        foreach($this->componentes as $componente){
            $lista.=" | ".$componente->nombre;
        };
        return $lista;
    }
}

$a=new Componentes("TR4","tornillo",10.0);
$b=new Componentes("AT5","Arandela",15.0);
$c=new Componentes("PY6","Pasador",20.0);

$eva=new Empleado("Eva",30);

$atornillar=new Montaje($eva,2);

$silla=new Producto("Silla");
$silla->setMontaje($atornillar);
$silla->addComponente($b);
$silla->addComponente($c);
$silla->addComponente($c);
var_dump($silla);
echo $silla;
echo $silla->coste();