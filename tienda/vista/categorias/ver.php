<h1>Lista de categorías</h1>
<a href="index.php?seccion=categorias&accion=nueva">Añadir categoría</a>
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