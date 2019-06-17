<?php

require_once 'modelo/categorias.php';
require_once 'modelo/productos.php';

class productos {

    private $prod;

    function __construct() {
        $this->prod = new mProductos();
    }

    function ver() {

        $productos = $this->prod->getAll();
        require_once 'vista/productos/ver.php';
    }

    function detalle() {

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if (empty($id)) {
            require_once 'vista/home.php';
        } else {
            $producto = $this->prod->getById($id);
            require_once 'vista/productos/detalle.php';
        }
    }

    function nueva() {
        require_once 'vista/productos/nueva.php';
    }

    function insertar() {
        $nombre = filter_input(INPUT_POST, "nombre");
        $descripcion = filter_input(INPUT_POST, "descripcion");
        $precio = filter_input(INPUT_POST, "precio");
        $idcategoria = filter_input(INPUT_POST, "idcategoria");
        if (!empty($nombre) && !empty($descripcion)&& is_numeric($precio)&& !empty($idcategoria)) {
            $this->prod->create(['nombre' => $nombre, 'descripcion' => $descripcion,
                'precio'=>$precio,'idcategoria'=>$idcategoria]);
            echo "<p>Producto insertada</p>";
        } else {
            echo "<p>Algún dato es incorrecto</p>";
        }
        $this->ver();
    }

     function buscar() {
        $nombre = filter_input(INPUT_POST, "nombre");
         if (!empty($nombre)) {
            $productos=$this->prod->search(['nombre' => $nombre]);
           
        } else {
            $productos = $this->prod->getAll();;
        }
       require_once 'vista/productos/ver.php';
    }
    
    function editar() {

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if (empty($id)) {
            require_once 'vista/home.php';
        } else {
            $producto = $this->prod->getById($id);
            require_once 'vista/productos/editar.php';
        }
    }

    function actualizar() {
        $id = filter_input(INPUT_POST, "id");
        $nombre = filter_input(INPUT_POST, "nombre");
        $descripcion = filter_input(INPUT_POST, "descripcion");
        $precio = filter_input(INPUT_POST, "precio");
        $idcategoria = filter_input(INPUT_POST, "idcategoria");
        if (!empty($nombre) && !empty($descripcion)&& is_numeric($precio)&& !empty($idcategoria)) {
            $this->prod->update(['nombre' => $nombre, 'descripcion' => $descripcion,
                'precio'=>$precio,'idcategoria'=>$idcategoria, 'id' => $id]);
            echo "<p>Producto actualizado</p>";
        } else {
            echo "<p>Nombre o descripción incorrecta</p>";
        }
        $this->ver();
    }

    function borrar() {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if (empty($id)) {
            require_once 'vista/home.php';
        } else {
            $producto = $this->prod->delete($id);
            $this->ver();
        }
    }

}
