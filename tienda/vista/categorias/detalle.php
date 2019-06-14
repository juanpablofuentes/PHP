
<h1>Detalle de categoría</h1>
<p>Id: <strong><?=$categoria['idcategoria']?></strong></p>
<p>Nombre: <strong><?=$categoria['nombre']?></strong></p>
<p>Descripción: <strong><?=$categoria['descripcion']?></strong></p>

<a href="index.php?seccion=categorias&accion=borrar&id=<?=$categoria['idcategoria']?>" class="btn btn-danger ">Borrar categoría</a>
<a href="index.php?seccion=categorias&accion=editar&id=<?=$categoria['idcategoria']?>" class="btn btn-info ">Editar categoría</a>
