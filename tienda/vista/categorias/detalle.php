
<h1>Detalle de categoría</h1>
<p>Id: <strong><?=$categoria['idcategoria']?></strong></p>
<p>Nombre: <strong><?=$categoria['nombre']?></strong></p>
<p>Descripción: <strong><?=$categoria['descripcion']?></strong></p>
<a href="index.php?seccion=categorias&accion=borrar&id=<?=$categoria['idcategoria']?>" class="btn btn-danger ">Borrar categoría</a>
<a href="index.php?seccion=categorias&accion=editar&id=<?=$categoria['idcategoria']?>" class="btn btn-info ">Editar categoría</a>

<!-- Aquí tendré que mostrar los productos de esta categoría -->
<h3>Productos de esta categoría</h3>
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
