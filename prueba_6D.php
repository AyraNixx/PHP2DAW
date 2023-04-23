<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
</head>

<body>

    <?php

    // Si alguno de los campos está vacío, nos devuelve a la vista del formulario
    if (!isset($_POST["nombre"]) || !isset($_POST["sexo"]) || !isset($_POST["edad"]) || !isset($_POST["sueldo"])) {
        // Utilizamos header para redirigir a la vista del formulario
        header('Location:prueba_6.php');
        exit();
    }

    // Si las claves existen, las guardamos
    $nombre = $_POST["nombre"];
    $sexo = $_POST["sexo"];
    $edad = $_POST["edad"];
    $sueldo = $_POST["sueldo"];

    ?>

    <!-- Creamos la tabla -->
    <table>
        <tr>
            <th>NOMBRE</th>
            <td><?=$nombre?></td>
        </tr>
        <tr>
            <!-- Utilizando la etiqueta style, le damos un color al fondo de la celda
                 dependiendo de si el valor de la variable corresponde con el comparado
                 en la condición ternaria -->
            <td style="background-color: <?=($sexo == "H")?("green"):("none")?>;">HOMBRE</td>
            <td style="background-color: <?=($sexo == "M")?("green"):("none")?>;">MUJER</td>
        </tr>
        <tr>
            <td style="background-color: <?=($sueldo == 1)?("green"):("none")?>;">0-12000</td>
            <td style="background-color: <?=($sueldo == 2)?("green"):("none")?>;">12000-20000</td>
            <td style="background-color: <?=($sueldo == 3)?("green"):("none")?>;">21000-35000</td>
            <td style="background-color: <?=($sueldo == 4)?("green"):("none")?>;">+35000</td>
        </tr>
        <tr>
            <td style="background-color: <?=($edad == 1)?("green"):("none")?>;">0-25</td>
            <td style="background-color: <?=($edad == 2)?("green"):("none")?>;">25-45</td>
            <td style="background-color: <?=($edad == 3)?("green"):("none")?>;">45-65</td>
            <td style="background-color: <?=($edad == 4)?("green"):("none")?>;">JUBILADO</td>
        </tr>
    </table>
</body>

</html>