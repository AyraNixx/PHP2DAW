<?php

//Comprobamos que la sesion esta iniciada
session_start();
//Si no tenemos guardado login 
if (!isset($_SESSION["login"])) {
    header("Location:../controller/LoginC.php");
}
$name = $_SESSION["nombre"];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8d125d2b91.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: url("https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/perros-vivir-mas-anos-1669733501.jpg?crop=1.00xw:0.802xh;0,0.100xh&resize=1600:*");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: 50% 50%;
            color: #FBFBFB;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand px-2 mx-2 border border-light rounded-circle" href="../view/index_usuario.php">
            <i class="fa-solid fa-shop text-light"></i>
        </a>
        <button class="navbar-toggler p-2 mx-2" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link p-2" href="../controller/LoginC.php?action=logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="d-flex align-items-center justify-content-center bg-light bg-gradient bg-opacity-75 p-5">
            <h1 class="text-success">Bienvenido, <?= $name ?></h1>
        </div>
    </div>

    <!-- Enlace a los archivos JavaScript de Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>