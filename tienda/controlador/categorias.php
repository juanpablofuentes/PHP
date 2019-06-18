<?php

require_once 'modelo/categorias.php';
require_once 'modelo/productos.php';

class categorias {

    private $cat;

    function __construct() {
        $this->cat = new mCategorias();
    }

    function ver() {

        $categorias = $this->cat->getAll();
        require_once 'vista/categorias/ver.php';
    }

    function detalle() {

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if (empty($id)) {
            require_once 'vista/home.php';
        } else {
            $categoria = $this->cat->getById($id);
            //Recuperar los productos de esta categoría
            $prod = new mProductos();
            $productos = $prod->search(['idcategoria' => $id]);
            //  print_r($productos);die();
            require_once 'vista/categorias/detalle.php';
        }
    }

    function nueva() {
        require_once 'vista/categorias/nueva.php';
    }

    function insertar() {
        $nombre = filter_input(INPUT_POST, "nombre");
        $descripcion = filter_input(INPUT_POST, "descripcion");
        if (!empty($nombre) && !empty($descripcion)) {
            $this->cat->create(['nombre' => $nombre, 'descripcion' => $descripcion]);
            echo "<p>Categoría insertada</p>";
        } else {
            echo "<p>Nombre o descripción incorrecta</p>";
        }
        $this->ver();
    }

    function buscar() {
        $nombre = filter_input(INPUT_POST, "nombre");
        if (!empty($nombre)) {
            $categorias = $this->cat->search(['nombre' => $nombre]);
        } else {
            $categorias = $this->cat->getAll();
            ;
        }
        require_once 'vista/categorias/ver.php';
    }

    function editar() {

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if (empty($id)) {
            require_once 'vista/home.php';
        } else {
            $categoria = $this->cat->getById($id);
            require_once 'vista/categorias/editar.php';
        }
    }

    function actualizar() {
        $id = filter_input(INPUT_POST, "id");
        $nombre = filter_input(INPUT_POST, "nombre");
        $descripcion = filter_input(INPUT_POST, "descripcion");
        if (!empty($id) && !empty($nombre) && !empty($descripcion)) {
            $this->cat->update(['nombre' => $nombre, 'descripcion' => $descripcion, 'id' => $id]);
            echo "<p>Categoría actualizada</p>";
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
            $categoria = $this->cat->delete($id);
            $this->ver();
        }
    }

    function api_all() {
        try {
            $categorias = $this->cat->getAll();
            $respuesta = ['response' => 'ok',
                'type' => 'categorias',
                'data' => $categorias];
            echo json_encode($respuesta);
        } catch (Exception $ex) {
            $respuesta = ['response' => 'error',
                'type' => 'categorias',
                'data' => $ex->getMessage()];
            echo json_encode($respuesta);
        }
    }

    function api_byid() {
        try {
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            if (empty($id)) {
                $respuesta = ['response' => 'error',
                    'type' => 'categorias',
                    'data' => "Id no especificado"];
            } else {
                $categoria = $this->cat->getById($id);
                $respuesta = ['response' => 'ok',
                    'type' => 'categorias',
                    'data' => $categoria];
            }
        } catch (Exception $ex) {
            $respuesta = ['response' => 'error',
                'type' => 'categorias',
                'data' => $ex->getMessage()];
        }
        echo json_encode($respuesta);
    }

}
