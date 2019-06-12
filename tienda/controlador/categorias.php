<?php

require_once 'modelo/bd.php';

class categorias {

    function ver() {
        $bd = new BD();
        $categorias = $bd->getCategorias();
        require_once 'vista/categorias/ver.php';
    }

    function detalle() {
        $bd = new BD();
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if (empty($id)) {
            require_once 'vista/home.php';
        } else {
            $categoria = $bd->getCategoria($id);
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
            $bd = new BD();
            $bd->insertarCategoria($nombre, $descripcion);
            echo "<p>Categoría insertada</p>";
        } else {
            echo "<p>Nombre o descripción incorrecta</p>";
        }
        $this->ver();
    }

    function editar() {
        $bd = new BD();
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if (empty($id)) {
            require_once 'vista/home.php';
        } else {
            $categoria = $bd->getCategoria($id);
            require_once 'vista/categorias/editar.php';
        }
    }

    function actualizar() {
        $id = filter_input(INPUT_POST, "id");
        $nombre = filter_input(INPUT_POST, "nombre");
        $descripcion = filter_input(INPUT_POST, "descripcion");
        if (!empty($id) &&!empty($nombre) && !empty($descripcion)) {
            $bd = new BD();
            $bd->actualizarCategoria($id,$nombre, $descripcion);
            echo "<p>Categoría actualizada</p>";
        } else {
            echo "<p>Nombre o descripción incorrecta</p>";
        }
        $this->ver();
    }

}
