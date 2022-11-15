<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1″ />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fecha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        table{background-color: #cce1f5;}
        table,td{border: 2px solid #fff; margin: 10px; padding: 10px;}
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
        <i class="navbar-brand">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/512px-Bootstrap_logo.svg.png" width="35" height="25" alt="">
        </i>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">


                <?php

                //Si $_POST["options"] no está vacío
                if (isset($_POST["options"])) {

                    //Almacenamos el array
                    $options = $_POST["options"];

                    //Recorremos el array y si se cumple algunas de las condiciones
                    //se muestra la opción
                    foreach ($options as $add) {

                        //Opción INICIO
                        if ($add === "home") {
                            echo "<li class='nav-item active'>";
                            echo "<a class='nav-link' href='#'>Inicio</a>";
                            echo "</li>";
                        }

                        //Opción CATÁLOGO
                        if ($add === "catalog") 
                        {
                            echo "<li class='nav-item dropdown'>";
                                echo "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                                    echo "Catálogo";
                                echo "</a>";
                                echo "<div class='dropdown-menu' aria-labelledby='navbarDropdown'>";
                                    echo "<a class='dropdown-item' href='#'>Ejemplo 1</a>";
                                    echo "<a class='dropdown-item' href='#'>Ejemplo 2</a>";
                                    echo "<div class='dropdown-divider'></div>";
                                        echo "<a class='dropdown-item' href='#'>Other</a>";
                                    echo "</div>";
                            echo "</li>";
                        }

                        ////Opción LOCALIZACIÓN
                        if ($add === "location") {
                            echo "<li class='nav-item'>";
                            echo "<a class='nav-link' href='#'>Localización</a>";
                            echo "</li>";
                        }

                        //Opción SERVICIOS
                        if ($add === "services") {
                            echo "<li class='nav-item dropdown'>";
                                echo "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                                    echo "Servicios";
                                echo "</a>";
                                echo "<div class='dropdown-menu' aria-labelledby='navbarDropdown'>";
                                    echo "<a class='dropdown-item' href='#'>Ejemplo 1</a>";
                                    echo "<a class='dropdown-item' href='#'>Ejemplo 2</a>";
                                echo "</div>";
                            echo "</li>";
                        }

                        //OPCIÓN CONTACATO
                        if ($add === "contact") {
                            echo "<li class='nav-item'>";
                            echo "<a class='nav-link' href='#'>Contacto</a>";
                            echo "</li>";
                        }
                    }
                }

                ?>
            </ul>
        </div>
    </nav>
    <div class="container p-0 w-100">
        <?php

        //Si $_POST["table"] no está vacío
        if(isset($_POST["table"]))
        {
            //Almacenamos el array con los valores de los checkbox marcados
            $ceils = $_POST["table"];

            //Definimos dos variables para almacenar el numero de filas y de columnas
            $rows = 0;
            $cols = 0;

            //Como se puede seleccionar más de un checkbox en el grid de checkbox podríamos
            //tener marcadas, por ejemplo, el checkbox 8x1 y el checkbox 6x7.
            //En este caso, el que tiene mayor altura es el primero pero el que tiene más anchura
            //es el segundo, por lo tanto si queremos sacar la máxima altura y la máxima anchura
            //deberemos de extraer el 8 para las filas y el 7 para las columnas y así obtener una
            //tabla 8x7.

            //Recorremos el array con los valores de los checkbox marcados
            foreach($ceils as $ceil)
            {
                //Con explode, convertimos en array la cadena a partir de la coma
                //para sacar la fila y la columna
                $positions = explode(",", $ceil);

                //Vemos si la fila de esta celda es mayor que la que tenemos 
                if($positions[0] > $rows)
                {
                    //si es mayor, se guarda su posicion
                    $rows = $positions[0];
                }

                //hacemos lo mismo para las columnas
                if($positions[1] > $cols)
                {
                    $cols = $positions[1];
                }
            }
            

            ?>
            <table class="w-100 text-center">
                <tbody>
                    <?php
                        //Realizamos un bucle hasta que se llege al valor de $rows (incluido)
                        for($i = 1; $i <= $rows; $i++)
                        {
                            //Vamos creando las filas
                            echo "<tr>";
                            //Con otro bucle hasta $cols vamos generando las casillas
                            for($j = 1; $j <= $cols; $j++)
                            {
                                echo "<td>$i.$j</td>";
                            }
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        <?php
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>