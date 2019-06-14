<?php

require_once 'bd.php';

/**
 * Description of categorias
 *
 * @author incid
 */
class mCategorias extends BD {

    function getAll() {
        $sql = "select * from categorias";
        return $this->fetch($sql);
    }

    function getById($id) {
        $sql = "select * from categorias where idcategoria=:id";
        $cats = $this->fetch($sql, ['id' => $id]);
        return $cats[0];
    }

    function search($filtro) {
        $sql = "select * from categorias where 1=1 ";
        foreach ($filtro as $clave => $valor) {
            if (is_numeric($valor)){
            $sql .= " and $clave = $valor ";
            }else{
                 $sql .= " and $clave like '%$valor%' ";
            }
        }
       
        return $this->fetch($sql);
    }

    function create($data) {
        $sql = "insert into categorias (nombre,descripcion) values (:nombre,:descripcion)";
        $this->execute($sql, $data);
    }

    function update($data) {
        $sql = "update categorias set nombre=:nombre, descripcion=:descripcion where idcategoria=:id";
        $this->execute($sql, $data);
    }

    function delete($id) {
        $sql = "delete from categorias where idcategoria=:id";
        $this->execute($sql, ['id' => $id]);
    }

}
