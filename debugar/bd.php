<?php

class BD {

    private $server = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "tienda_jp";
    protected $conn;

    function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->$server;dbname=$this->db;charset=UTF8", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }

    function fetch($sql, $params = []) {
        try {
            $st = $this->con->prepare($sql);
            $st->execute($params);
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    function execute($sql, $params = []) {
        try {
            $st = $this->conn->prepare($sql);
            $st->execute($params);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

}
