
<h1>Detalle de producto</h1>
<p>Id: <strong><?=$producto['idproducto']?></strong></p>
<p>Nombre: <strong><?=$producto['nombre']?></strong></p>
<p>Descripción: <strong><?=$producto['descripcion']?></strong></p>
<p>Precio: <strong><?=$producto['precio']?></strong></p>
<p>Categoría: <strong><?=$producto['idcategoria']?></strong></p>

<a href="index.php?seccion=productos&accion=borrar&id=<?=$producto['idproducto']?>" class="btn btn-danger ">Borrar producto</a>
<a href="index.php?seccion=productos&accion=editar&id=<?=$producto['idproducto']?>" class="btn btn-info ">Editar producto</a>