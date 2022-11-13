<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <?php


    /**
     * @author Paula Moreno Hermoso
     * @param 
     */
    function crearTabla($cols, $rows)
    {
        echo "<table>";

        for ($i = 1; $i <= $rows; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= $cols; $j++) {
                echo "<td>";
                echo "Casilla " . $i . "." . $j;
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    /**
     * @author Paula Moreno Hermoso
     * @param 
     */
    function crearSexo()
    {
        echo "<br/>";
        echo "<h6>Sexo</h6>";
        echo "<div class='form-check form-check-inline'>";
        echo "<input class='form-check-input' type='radio' value='Masculino' id='radio1' name='sexo'>";
        echo "<label class='form-check-label' for='radio1'>Masculino</label>";
        echo "</div>";


        echo "<div class='form-check form-check-inline'>";
        echo "<input class='form-check-input' type='radio' value='Femenino' id='radio2' name='sexo'>";
        echo "<label class='form-check-label' for='radio2'>Femenino</label>";
        echo "</div>";


        echo "<div class='form-check form-check-inline'>";
        echo "<input class='form-check-input' type='radio' value='Neutro' id='radio3' name='sexo'>";
        echo "<label class='form-check-label' for='radio3'>Neutro</label>";
        echo "</div>";
        echo "<br/>";
    }

    function crearObservaciones($width, $rows)
    {
        echo "<br/>";
        echo "<label for='remark'><h6>Observaciones</h6></label>";
        echo "<br/>";
        echo "<textarea name='remark' id='remark' cols='$width' rows='$rows'>";
        echo "</textarea>";
    }

    if (isset($_POST)) {
        $cols = $_POST["cols"];
        $rows = $_POST["rows"];

        $bg_color = $_POST["bg_color"];
        $font = $_POST["font"];
    ?>

        <style>
            table,
            td {
                /*Llamamos a la variable $bg_color y la mostramos con echo
            para obtener el color de fondo seleccionado*/
                background: <?= $bg_color ?>;
                border: 2px solid #fff;

                margin: 10px;
                padding: 10px;

                /*Llamamos a la variable $font y la mostramos con echo
            para obtener la fuente seleccionada*/
                font-family: <?= $font ?>;
            }
        </style>

</head>

<body>

    <h4 class="mt-4 text-center">FORMULARIO CREADO</h4>
    <br />
    <div class="container justify-content-center">
        <div class="row">
            <!--Llamamos a la funcion crearTabla para generar la tabla con las 
            columnas y filas seleccionadas-->
            <?php crearTabla($cols, $rows) ?>

        </div>

        <br />

        <div class="row">
            <form>

                <?php
                    if (isset($_POST["options"])) {
                        $options = $_POST["options"];

                        foreach ($options as $add) {
                            if ($add === "age") {
                                echo "<div class='form-group'>";
                                echo "<label for='age'><h6>Edad</h6></label>";
                                echo "<select class='form-select w-50' id='age' name='age'>";
                                for ($i = 1; $i <= 120; $i++) {
                                    echo "<option value = $i> $i </option>";
                                }
                                echo "</select>";
                                echo "</div>";
                            }

                            if ($add === "sex") {
                                crearSexo();
                            }

                            if ($add === "remark") {
                                crearObservaciones($cols, $rows);
                            }
                        }
                    }
                ?>
            </form>
        </div>

    </div>


<?php
    }
?>
</body>

</html>