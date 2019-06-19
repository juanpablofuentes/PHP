<?php

require_once 'bd.php';

$sql="select * from cateorias";
$bd=new BD();
$datos=$db->fecth($sql);

foreach ($datos as $dato){
    echo $dato->nombre;
}
