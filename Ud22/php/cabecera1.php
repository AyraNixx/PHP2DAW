<!--La cabecera debe de tener la apertura del html (doctype, html, head)-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://www.nicepng.com/png/full/328-3285837_a-sperm-whale-blue-whale-icon.png" type="image/x-icon">

    <title>Cabecera 1</title>
    <!--Ponemos un codigo php para que cargue el global-->
    <?php
    //Si requiero el fichero global
    //Para salir fuera, es decir, ir hacia atrás, ponemos punto punto
    //Sin embargo, esta no es la ruta original porque la ruta del require va a ser
    //la del fichero en la que se encuentran todas las partes, el index
    //require("../global/global.php");
    require("global/global.php");
    ?>
    <style>
        * {}

        footer {
            background-color: rgb(106, 144, 179);
        }

        .divisor {
            display: block;
            width: 100%;
            height: 30px;
            background-color: #9DC6E4;
        }

        h5 {
            color: #fff;
        }

        a {
            color: #2e2d2d;
            text-decoration: none;
        }

        a:hover {
            color: #fff;
        }
    </style>
</head>