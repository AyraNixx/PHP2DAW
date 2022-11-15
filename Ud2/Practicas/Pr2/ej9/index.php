<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1″ />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fecha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form method="POST" action="menu.php">
            <div class="container">
                <div class="row">
                    <!-- CREAMOS LOS CHECKBOXS PARA ELEGIR LAS OPCIONES DEL MENÚ-->
                    <h4 class = "mt-4 p-0">Añadir al menú</h4>
                    <br />
                    <br />
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="home" id="home" name="options[]" checked>
                        <label class="form-check-label" for="home">
                            Inicio
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="catalog" id="catalog" name="options[]">
                        <label class="form-check-label" for="catalog">
                            Catálogo
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="location" id="location" name="options[]">
                        <label class="form-check-label" for="location">
                            Localización
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="services" id="services" name="options[]">
                        <label class="form-check-label" for="services">
                            Servicios
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="contact" id="contact" name="options[]">
                        <label class="form-check-label" for="contact">
                            Contacto
                        </label>
                    </div>
                </div>

                <br />
                <h4 class = "mt-2 p-0">Seleccionar tamaño tabla</h4>
                <div class="row p-0">
                    <!--CREAMOS UN GRID DE 8X8 DE CHECKBOX-->
                    <?php
                    //Realizamos un bucle que va del 1 al 8(incluido) para las filas
                    for ($i = 1; $i <= 8; $i++) {
                        echo "<div class='row'>";
                        //Hacemos otro para generar 8 columnas por cada fila
                        for ($j = 1; $j <= 8; $j++) {
                            echo "<div class='col-1 text-center p-2'>";
                            //Ponemos como value el valor de la fila y de la columna en la que se encuentra
                            //la celda, separadas por una coma
                            echo "<input type='checkbox' id='table' name='table[]' value='$i,$j' class='m-1'/>celda $i.$j";
                            echo "</div>";
                        }
                        echo "</div>";
                    }
                    ?>

                </div>

                <div class="row my-3 mx-1">
                    <button type="submit" class="btn btn-primary w-25" name="submit">Enviar</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>