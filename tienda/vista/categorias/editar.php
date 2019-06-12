<h2>Editar categoría</h2>
<form method="post" action="index.php?seccion=categorias&accion=actualizar">
    <input type="hidden" name="id"  value="<?=$categoria['idcategoria']?>">
    Nombre: <input type="text" name="nombre" value="<?=$categoria['nombre']?>">
    Descripción: <input type="text" name="descripcion" 
                        value="<?=$categoria['descripcion']?>">
    <input type="submit">
</form>