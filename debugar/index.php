<?php

require_once 'bd.php';

$sql="select * from categorias";
$bd=new BD();
$datos=$bd->fetch($sql);

$response=['response'=>"Ok",'table'=>'Categorías','data'=>'$datos'];

echo json_decode($response);