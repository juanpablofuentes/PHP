<?php
require_once 'modelo/bd.php';
class categorias{
    function ver(){
       $bd=new BD();
       $categorias=$bd->getCategorias();
       require_once 'vista/categorias/ver.php';
    }
}
