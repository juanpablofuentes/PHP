<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <h2>Añadir categoría</h2>
        Nombre:<input type="text" id="nombre"><br/>
        Descripción:<input type="text" id="descripcion"><br/>
        <button id="ajax">Añadir categoría</button>
        <div id="resultado"></div>
        <script>
            $(function () {
                console.log("Página cargada");
                $('#ajax').click(function () {
                    console.log("Pulsado");

                    fetch('http://localhost/PHP/tienda/api.php?seccion=categorias&accion=api_new', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: 'nombre=' + $("#nombre").val() + '&descripcion=' + $("#descripcion").val()
                    })
                            .then(function (response) {
                                console.log('response =', response);
                                return response.json();
                            })
                            .then(function (data) {
                                console.log('data = ', data);
                               
                            })
                            .catch(function (err) {
                                console.error(err);
                            });

                });
            });
        </script>
    </body>
</html>
