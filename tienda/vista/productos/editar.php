<h2>Editar producto</h2>
<form method="post" action="index.php?seccion=productos&accion=actualizar">
    <input type="hidden" name="id"  value="<?=$producto['idproducto']?>">
    Nombre: <input type="text" name="nombre" value="<?=$producto['nombre']?>">
    Descripción: <input type="text" name="descripcion" 
                        value="<?=$producto['descripcion']?>">
      Precio: <input type="text" name="precio" 
                        value="<?=$producto['precio']?>">
        Categoría: <input type="text" name="idcategoria" 
                        value="<?=$producto['idcategoria']?>">
    <input type="submit">
</form>