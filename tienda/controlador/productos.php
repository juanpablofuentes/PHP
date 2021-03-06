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
            $cat = new mCategorias();
            $categoria = $cat->getById($producto['idcategoria']);
            require_once 'vista/productos/detalle.php';
        }
    }

    function nueva() {
        $cat = new mCategorias();
        $categorias = $cat->getAll();
        require_once 'vista/productos/nueva.php';
    }

    function insertar() {
        $nombre = filter_input(INPUT_POST, "nombre");
        $descripcion = filter_input(INPUT_POST, "descripcion");
        $precio = filter_input(INPUT_POST, "precio");
        $idcategoria = filter_input(INPUT_POST, "idcategoria");
        if (!empty($nombre) && !empty($descripcion) && is_numeric($precio) && !empty($idcategoria)) {
           $id= $this->prod->create(['nombre' => $nombre, 'descripcion' => $descripcion,
                'precio' => $precio, 'idcategoria' => $idcategoria]);
            if (isset($_FILES['imagen'])) {
                if (strpos($_FILES['imagen']['type'], "image") !== false) {
                    move_uploaded_file($_FILES['imagen']['tmp_name'], "img/productos/" . $id.".jpg");
                    echo "Imagen subida<br>";
                } else {
                    echo "Formato de archivo incorrecto. <br>";
                }
            }
            echo "<p>Producto insertado</p>";
        } else {
            echo "<p>Algún dato es incorrecto</p>";
        }
        $this->ver();
    }

    function buscar() {
        $nombre = filter_input(INPUT_POST, "nombre");
        if (!empty($nombre)) {
            $productos = $this->prod->search(['nombre' => $nombre]);
        } else {
            $productos = $this->prod->getAll();
            ;
        }
        require_once 'vista/productos/ver.php';
    }

    function editar() {

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if (empty($id)) {
            require_once 'vista/home.php';
        } else {
            $producto = $this->prod->getById($id);
            $cat = new mCategorias();
            $categorias = $cat->getAll();

            require_once 'vista/productos/editar.php';
        }
    }

    function actualizar() {
        $id = filter_input(INPUT_POST, "id");
        $nombre = filter_input(INPUT_POST, "nombre");
        $descripcion = filter_input(INPUT_POST, "descripcion");
        $precio = filter_input(INPUT_POST, "precio");
        $idcategoria = filter_input(INPUT_POST, "idcategoria");
        if (!empty($nombre) && !empty($descripcion) && is_numeric($precio) && !empty($idcategoria)) {
            $this->prod->update(['nombre' => $nombre, 'descripcion' => $descripcion,
                'precio' => $precio, 'idcategoria' => $idcategoria, 'id' => $id]);
             if (isset($_FILES['imagen'])) {
                if (strpos($_FILES['imagen']['type'], "image") !== false) {
                    move_uploaded_file($_FILES['imagen']['tmp_name'], "img/productos/" . $id.".jpg");
                    echo "Imagen subida<br>";
                } else {
                    echo "Formato de archivo incorrecto. <br>";
                }
            }
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
