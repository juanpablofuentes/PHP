<?php
header('Content-Type: application/json');
        //A donde quiere ir el usuario: el enrutamiento
        $seccion = filter_input(INPUT_GET, "seccion");
        $accion = filter_input(INPUT_GET, "accion");
       
        if (empty($seccion)) {
            require_once 'vista/home.php';
        } else {
            if (file_exists("controlador/$seccion.php")) {
                require_once "controlador/$seccion.php";
                $controller=new $seccion();
                $controller->$accion();
            }
        }
       