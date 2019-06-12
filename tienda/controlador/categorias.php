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

}
