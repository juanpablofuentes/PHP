<h1>Lista de categorías</h1>
<table>
    <tr><td>Id</td><td>Nombre</td></tr>
<?php

foreach ($categorias as $categoria){
    ?>
    <tr><td><?=$categoria['idcategoria']?></td>
        <td><?=$categoria['nombre']?></td></tr>
    <?php
}

?>
</table>