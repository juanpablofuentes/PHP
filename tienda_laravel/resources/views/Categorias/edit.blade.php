<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="{{ route('categorias.update',$categoria->idcategoria) }}">
            {{csrf_field()}}  
            <input name="_method" type="hidden" value="PUT">

            Nombre: <input type="text" name="nombre" value="{{$categoria->nombre}}"><br>
            Descripción: <input type="text" name="descripcion"  value="{{$categoria->descripcion}}"br>
            <input type="submit">
        </form>
    </body>
</html>
