<h1>Lista de categorías</h1>
<a  class="btn btn-primary"  href="index.php?seccion=categorias&accion=nueva">Añadir categoría</a>
<form action="index.php?seccion=categorias&accion=buscar" method="post">
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

foreach ($categorias as $categoria){
    ?>
    <tr><td><?=$categoria['idcategoria']?></td>
        <td>
<a href="index.php?seccion=categorias&accion=detalle&id=<?=$categoria['idcategoria']?>">
            <?=$categoria['nombre']?></a></td>
        <td><a href="index.php?seccion=categorias&accion=editar&id=<?=$categoria['idcategoria']?>">
            Editar</a></td>
    </tr>
    <?php
}

?>
</table>