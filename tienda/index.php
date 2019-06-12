<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //A donde quiere ir el usuario: el enrutamiento
        $seccion = filter_input(INPUT_GET, "seccion");
        $accion = filter_input(INPUT_GET, "accion");
      
        if ($seccion=="categorias"){
            require_once 'controlador/categorias.php';
            $controller=new categorias();
            if ($accion=="ver"){
                $controller->ver();
            }
        }
        if (empty($seccion)) {
            require_once 'vista/home.php';
        } else {
            if (file_exists("controlador/$seccion.php")) {
                require_once "controlador/$seccion.php";
                $controller=new $seccion();
                $controller->$accion();
            }
        }
        ?>
    </body>
</html>
