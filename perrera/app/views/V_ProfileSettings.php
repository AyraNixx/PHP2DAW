<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animales</title>
    <link rel="shortcut icon" href="../../public/imgs/logos/logo1.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/8d125d2b91.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../views/css/sass.css">
    <style>
        .circle-container {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            width: 100px;
            height: 100px;

            border-radius: 50%;

            font-weight: 800;


        }
    </style>
</head>

<body>
    <!-- MENU -->
    <?php include_once "./components/menu.php"; ?>

    <!-- CONTENIDO -->
    <section id="content">

        <!-- MODAL -->
        <!-- <?php include_once "./components/modalAlert.php"; ?> -->

        <!-- HEADER -->
        <?php include_once "./components/header.php"; ?>


        <!-- CONTENEDOR PRINCIPAL -->
        <main class="mx-4 mt-5">

            <div class="row align-items-center h-100">
                <div class="col-lg-9 col-sm-12">
                    <div class="row h-100 w-100 pt-5">
                        <h1 class="h2 text-primary">Ajustes de perfil</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-12 p-0">
                            <div class="col-12 p-3 px-5 text-center">
                                <div class="circle-container border border-2 border-primary text-primary bg-primary-subtle h4">
                                    <?= "PMH" ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 p-0">
                            <!-- ADD ACTION AND METHOD -->
                            <form class="login" action="">
                                <div class="form-group col-sm-10 mx-auto">
                                    <label for="correo">Email</label>
                                    <input type="email" class="form-control bg-transparent" placeholder="email@example.com" name="correo" id="correo" required>
                                </div>
                                <div class="form-group mt-4 col-sm-10 mx-auto">
                                    <label for="passwd">Contraseña</label>
                                    <input type="password" class="form-control bg-transparent" placeholder="************" name="passwd" id="passwd" required>
                                </div>
                                <div class="form-group mt-4 col-sm-10 mx-auto">
                                    <label for="fechnac">Contraseña</label>
                                    <input type="date" class="form-control bg-transparent" placeholder="dd/mm/YYYY" name="fechnac" id="fechnac">
                                </div>
                                <div class="row mt-5">
                                    <button class="btn btn-primary btnblock">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </section>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./js/Utils.js"></script>


    <script src="./js/widthMenu.js"></script>
</body>

</html>