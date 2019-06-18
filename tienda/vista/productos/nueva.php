<h2>Añadir producto</h2>
<form method="post" enctype="multipart/form-data" action="index.php?seccion=productos&accion=insertar">
    Nombre: <input type="text" name="nombre">
    Descripción: <input type="text" name="descripcion">
    Precio: <input type="text" name="precio">
    Categoría: <select name="idcategoria">
        <?php
        foreach ($categorias as $categoria) {
            ?>
            <option value="<?= $categoria['idcategoria'] ?>">
                <?= $categoria['nombre'] ?></option>
            <?php
        }
        ?>
    </select>
    <br/>
    <h3>Subir imagen</h3>
    <input type="file" name="imagen">
    <input type="submit">
</form>