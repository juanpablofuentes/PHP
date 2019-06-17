<h1>Lista de productos</h1>
<a  class="btn btn-primary"  href="index.php?seccion=productos&accion=nueva">Añadir producto</a>
<form action="index.php?seccion=productos&accion=buscar" method="post">
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Buscar</span>
    </div>
      <input type="text" class="form-control" name="nombre" placeholder="Introduzca el nombre a buscar">
      <div class="input-group-append">
    <button class="btn btn-success" type="submit">Go</button> 
  </div>
  </div>
</form>
<table>
    <tr><td>Id</td><td>Nombre</td><td>Acciones</td></tr>
<?php

foreach ($productos as $producto){
    ?>
    <tr><td><?=$producto['idproducto']?></td>
        <td>
<a href="index.php?seccion=productos&accion=detalle&id=<?=$producto['idproducto']?>">
            <?=$producto['nombre']?></a></td>
        <td><a href="index.php?seccion=productos&accion=editar&id=<?=$producto['idproducto']?>">
            Editar</a></td>
    </tr>
    <?php
}

?>
</table>