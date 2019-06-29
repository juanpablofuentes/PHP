<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="{{ route('categorias.store') }}">
             {{csrf_field()}}  
            Nombre: <input type="text" name="nombre"><br>
            Descripción: <input type="text" name="descripcion"><br>
            <input type="submit">
        </form>
    </body>
</html>
