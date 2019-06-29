<?php


class Publicaciones {
    protected $titulo;
    protected $precio;
    protected $paginas;
    function __construct($titulo, $precio,$paginas){
        $this->__set("titulo",$titulo);
        $this->__set("precio",$precio);
        $this->__set("paginas",$paginas);
    }
      function __get($name) {
        if (!property_exists($this, $name)) {
            throw new Exception("La propiedad $name no existe");
        }
        return $this->$name;
    }

    function __set($name, $value) {
        if (empty($value)){
            return;
        }
        if (!property_exists($this, $name)) {
            throw new Exception("La propiedad $name no existe");
        }
        $this->$name = $value;
    }

}
class Revista extends Publicaciones{
    protected $numero;
    protected $sector;
    
    function __construct($titulo, $precio, $paginas) {
        parent::__construct($titulo, $precio, $paginas);
        
    }
}
class Libro extends Publicaciones{
    protected $autor;
    protected $editorial;
    
    function __construct($titulo, $precio, $paginas) {
        parent::__construct($titulo, $precio, $paginas);
    }
}

class Fanzine extends Revista{
    protected $distribucion;
    function __construct($titulo, $precio, $paginas) {
        parent::__construct($titulo, $precio, $paginas);
    }
}
class Incunable extends Libro{
    protected $anyo;
    function __construct($titulo, $precio, $paginas) {
        parent::__construct($titulo, $precio, $paginas);
    }
}
class Electronico extends Libro{
    protected $formato;
  public function __construct($titulo, $precio, $paginas) {
        parent::__construct($titulo, $precio, $paginas);
    }
}

$f=new  Fanzine("Kaos",1,50);
$f->numero=1;
$f->sector="antisistema";
$f->distribucion="librerias";

var_dump($f);