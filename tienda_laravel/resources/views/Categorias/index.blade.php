<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3>Lista de categorías</h3>
        <a href="{{ route('categorias.create') }}">Nueva categoría</a>
        @forelse($categorias as $categoria)
        <p><a href="{{route('categorias.edit', $categoria->idcategoria)}}">
                {{$categoria->nombre}}</a> -- {{$categoria->descripcion}}</p>
        <form action="{{route('categorias.destroy', $categoria->idcategoria)}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">

            <button  type="submit">Borrar categoría</button>
        </form>
            @empty
            <p>No hay categorías</p>
            @endforelse
    </body>
</html>
