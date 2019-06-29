<?php

class Estadisticas {

    private $server = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "tienda_jp";
    protected $conn;

    function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->server;dbname=$this->db;charset=UTF8", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }

    function totalCategorias() {
        try {
            $sql = "select count(*) total from categorias";
            $res = $this->conn->query($sql)->fetch();
            return $res['total'];
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    function totalProductos($idcat = 0) {
        try {
            if (empty($idcat)) {
                $sql = "select count(*) total from productos";
            } else {
                $sql = "select count(*) total from productos where idcategoria=:id";
            }
            $st = $this->conn->prepare($sql);
            $st->execute(['id' => $idcat]);
            return $st->fetch()['total'];
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    function borrarHuerfanos() {
        try {
            $sql = "SELECT idproducto FROM productos left join categorias using(idcategoria) where categorias.idcategoria is null";
            $productos = $this->conn->query($sql)->fetchAll();
            foreach ($productos as $producto) {
                $this->conn->exec("delete from productos where idproducto=" . $producto['idproducto']);
            }
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    function borrarVacias() {
        try {
            $sql = "SELECT idcategoria FROM categorias left join productos using(idcategoria) where idproducto is null";
            $categorias = $this->conn->query($sql)->fetchAll();
            foreach ($categorias as $categoria) {
                $this->conn->exec("delete from categorias where idcategoria=" . $categoria['idcategoria']);
            }
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

}

$a = new Estadisticas();

echo $a->totalCategorias();
echo $a->totalProductos();
echo $a->borrarHuerfanos();
echo $a->borrarVacias();
