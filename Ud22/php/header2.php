<!--La cabecera debe de tener la apertura del html (doctype, html, head)-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8d125d2b91.js" crossorigin="anonymous"></script>
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
        
header nav 
{
    background: transparent;
    border-bottom: 1px solid #bba67f;
}
        footer {
            background-color: #cfd1cb;
        }

        a {
            text-decoration: none;
            color: #cfd1cb;
        }

        h6 a,
        a i {
            color: #bba67f;
        }

        h6 a,
        a i:hover {
            color: #ba8f40;
        }

        h6 a,
        a i:active {
            color: #ac7d25;
        }

        .my-5 {
            margin-top: 1rem !important;
            margin-bottom: 2rem !important;
            background-color: #fff6e6;
            background-color: #bba67f;
            color: #bba67f;
        }

        .last-div {
            background-color: #bba67f;

        }

        body {
            background: url("https://wallpaper.dog/large/10884579.jpg");
        }

        main p {
            color: #869377;
        }

        h3 {
            font-family: cursive;
            color: #ba8f40;
        }
    </style>
</head>