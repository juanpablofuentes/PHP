<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    </head>
    <body>
        <h1>Uso de mi WS</h1>
        <h3>Categorías</h3>
        <div id="categorias"></div>
        <script>
            $(function () {
                console.log("Página cargada");

                fetch('http://localhost/PHP/tienda/api.php?seccion=categorias&accion=api_all')
                        .then(function (response) {
                            console.log('response =', response);
                            return response.json();
                        })
                        .then(function (resultado) {
                            if (resultado.response == "ok") {
                                console.log('data = ', resultado.data);
                                $('#categorias').html("<ul>");
                                for (var i = 0; i < resultado.data.length; i++) {
                                    console.log(resultado.data[i].nombre);
                                    $('#categorias').append("<li>" + resultado.data[i].nombre + "</li>");
                                }
                                $('#categorias').append("</ul>");
                            }
                        }
                        )
                        .catch(function (err) {
                          
                            console.error(err);
                        });
            });

        </script>
    </body>
</html>
