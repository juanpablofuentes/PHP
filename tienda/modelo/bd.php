<?php

class BD {

    private $server = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "tienda";
    private $conn;

    function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->server;dbname=$this->db;charset=UTF8", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }

    function getCategorias() {
        $sql = "select * from categorias";
        $st = $this->conn->prepare($sql);
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    function getCategoria($id) {
        try {
            $sql = "select * from categorias where idcategoria=:id";
            $st = $this->conn->prepare($sql);
            $st->execute(['id' => $id]);
            return $st->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            throw new Exception("Error obteniendo categoria $id " . $ex->getMessage());
        }
    }

    function insertarCategoria($nombre, $descripcion) {
        try {
            $sql = "insert into categorias (nombre,descripcion) values"
                    . "(:nombre,:descripcion);";
            $st = $this->conn->prepare($sql);
            $st->execute(['nombre' => $nombre,
                'descripcion' => $descripcion]);
        } catch (Exception $ex) {
            throw new Exception("Error creando categoría " . $ex->getMessage());
        }
    }

    function actualizarCategoria($id, $nombre, $descripcion) {
        try {
            $sql = "update categorias set nombre=:nombre, "
                . "descripcion=:descripcion where idcategoria=:id";
             $st = $this->conn->prepare($sql);
            $st->execute(['id'=>$id,
                'nombre' => $nombre,
                'descripcion' => $descripcion]);
        } catch (Exception $ex) {
              throw new Exception("Error actualizando categoría " . $ex->getMessage());
          
        }
    }

}
