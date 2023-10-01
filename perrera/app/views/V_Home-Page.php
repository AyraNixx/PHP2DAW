<?php

//Comprobamos que la sesion esta iniciada
session_start();
//Si no tenemos guardado login 
if (!isset($_SESSION["login"])) 
{
    header("Location:../../public/Login.php");
}

$user_name = $_SESSION["nombre"];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../views/css/sass.css">
    <link rel="shortcut icon" href="../../public/imgs/logos/logo1.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/8d125d2b91.js" crossorigin="anonymous"></script>
</head>

<body class="bg-white">

    <div class="container-fluid bg-transparent vh-100">

        <!-- ENCABEZADO -->
        <header>
            <!-- Image and text -->
            <nav class="navbar border-bottom border-secondary ">
                <a class="navbar-brand ms-3" href="./V_Home-Page.php">
                    <!-- Usamos la etiqueta object para que en caso de que un navegador no permita visualizar svg
                         tenga como alternativa una imagen con extensión png. -->
                    <object data="../../public/imgs/logos/logo1.svg" type="image/svg+xml" width="30" height="30" class="d-inline-block align-top me-2" alt="Logo perrera">
                        <img src="../../public/imgs/logos/logo1.png">
                    </object>
                    Patas arriba
                </a>



                <!-- Butón que muestra el menú -->


                <!-- Apuntes -->
                <!-- data-toggle: Indica el comportamiento del botón al hacer clic en él, en este caso que va activar 
                                  un elemento colapsable -->
                <!-- data-target: Indica el elemento que se debe colapsar, se pasa el id del elemento a colapsar -->
                <!-- aria-controls: Se usa para vincular el botón con el elememto que se va a controlar -->
                <!-- aria-expanded: Indica si el elemento está expandido o colapsado actualmente -->
                <!-- aria-label: Etiqueta descriptiva para el botón -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav" aria-controls="sidenav" aria-expanded="false" aria-label="Botón para abrir el menú" class="border-none">
                    <span class="navbar-toggler-icon"></span>
                </button>


            </nav>
        </header>

        <!-- CONTENIDO -->
        <div class="d-flex" id="main-container">
            <div id="sidenav" class="bg-white border-end border-secondary ">
                <ul class="list-unstyled">
                    <li><a href="./V_Home-Page.php">Inicio</a></li>
                    <li><a href="./V_Animales.php">Animales</a></li>
                    <hr>
                    <li><a href="../controllers/LoginC.php?action=logout">Cerrar sesión</a></li>
                </ul>
            </div>

            <main class="main-content px-4 pb-5 ">

                <div class="date">

                    <?php
                        // Sacamos la fecha actual
                        $format = new IntlDateFormatter(
                            'es_Es',
                            IntlDateFormatter::FULL, // Utilizamos el estilo completo para mostrar el nombre completo del mes
                            IntlDateFormatter::NONE // No especificamos el formato de la hora, ya que solo estamos formateando la fecha
                        );

                        echo $format->format(new DateTime());
                    ?>
                </div>
                <h3 class="welcome-text text-primary font-weight-bold text-uppercase">
                    Bienvenido
                </h3>

                <h5 class="welcome-text text-info text-uppercase">
                    <?= $user_name ?>
                </h5>

                <div class="position-relative w-100 h-100 bg-primary task-container">


                    <div class="task-container-bg w-100 h-100 d-flex flex-column bg-white">
                        <div class="task-header">
                            <div class="title-container d-flex align-items-center">
                                <div class="img-container">

                                </div>
                                <h5 class="title-task text-uppercase m-0">mis tareas</h5>
                            </div>

                            <div class="task-show-container d-flex position-relative">
                                <span class="ongoing-tasks">Pendientes</span>
                                <span class="ended-tasks">Finalizadas</span>
                            </div>
                        </div>    
                        
                        <div class="task-table-container h-100 text-break">

                        </div>
                        
                    </div>


                    <!-- TRIANGULOS DE FONDO -->
                    <object data="../../public/imgs/bg/triangulo1.svg" type="image/svg+xml" class="bg-1" alt="Triangulo de fondo 1">
                        <img src="../../public/imgs/bg/triangulo1.webp">
                        <img src="../../public/imgs/bg/triangulo1.png">
                    </object>


                    <object data="../../public/imgs/bg/triangulo2.svg" type="image/svg+xml" class="bg-2" alt="Triangulo de fondo 2">
                        <img src="../../public/imgs/bg/triangulo2.webp">
                        <img src="../../public/imgs/bg/triangulo2.png">
                    </object>
                </div>



            </main>

        </div>
    </div>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>