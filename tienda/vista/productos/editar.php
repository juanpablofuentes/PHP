<h2>Editar producto</h2>
<form method="post" enctype="multipart/form-data" action="index.php?seccion=productos&accion=actualizar">
    <input type="hidden" name="id"  value="<?= $producto['idproducto'] ?>">
    Nombre: <input type="text" name="nombre" value="<?= $producto['nombre'] ?>">
    Descripción: <input type="text" name="descripcion" 
                        value="<?= $producto['descripcion'] ?>">
    Precio: <input type="text" name="precio" 
                   value="<?= $producto['precio'] ?>">
    Categoría: <select name="idcategoria">
        <?php
        foreach ($categorias as $categoria) {
            ?>
            <option <?=(($categoria['idcategoria']==$producto['idcategoria'])?'selected':'')?>
                value="<?= $categoria['idcategoria'] ?>">
                <?= $categoria['nombre'] ?></option>
            <?php
        }
        ?>
    </select>
    <input type="file" name="imagen">
    <input type="submit">
</form>