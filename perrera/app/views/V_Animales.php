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
        /* 
        
            DROPDOWN BUTTONS
        
        */
        .btn-group.dropdown
        {
            display: none;
        }
        
        .button-dropdown {
            box-sizing: border-box;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            height: 2em;
            padding: 1.1em;

            background: #fefefe;
            border: 1px solid #dbdbdb;
            border-radius: .2em;

            font-size: .9rem;
            line-height: 1.5;
            text-align: center;
            color: #363636;

            position: relative;
            vertical-align: top;

            box-shadow: none !important;
            outline: none !important;

            white-space: nowrap;
            touch-action: manipulation;
            cursor: pointer;
        }

        #add:hover {
            background: #efefef;
        }

        #add:active {
            background: #dddddd;
        }

        .btn-group .button-dropdown {
            padding-left: 1em;
            padding-right: 1em;
        }

        .btn-group .button-dropdown:first-of-type {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .btn-group .button-dropdown:last-of-type {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            border-left: none;
        }

        .btn-group .button-dropdown:not(:first-of-type):not(:last-of-type) {
            border-radius: 0%;
            border-left: none;
        }

        .btn-dropdown-options {
            display: none;
            border: 1px solid black;
            border: 1px solid #dbdbdb;
            border-top: none;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-left-radius: .2em;
            border-bottom-right-radius: .2em;
            background:#fefefe;
            top: 91%;
            z-index: 1000;
        }

        .btn-dropdown-options ul li {
            padding: 6.5px 1em;
            font-size: .8em;
            cursor: pointer;
        }

        .btn-dropdown-options ul li:hover {
            background: #efefef;
        }

        .btn-dropdown-options ul li:active {
            background: #dddddd;
        }

        /*
        
            SHOW BLOCK

        */
        .show-block {
            display: block;
        }

        @media (max-width: 768px) {
            .btn-group.dropdown{display: inline-flex;}
            .btn-group{display: none;}
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


            <!-- Split dropup button -->


            <div class="mb-4 p-3 w-100 bg-secondary bg-opacity-75">
                <div class="button-option-container" style=" display: flex; justify-content: space-between; width: 100%; align-content: center;">
                    <h1 style="font-size: x-large;display: inline;margin-bottom: 0;" class="pt-2 text-primary text-uppercase font-weight-light">
                        <i class="fa-solid fa-paw"></i>
                        ANIMAL
                    </h1>
                    <div class="btn-group" role="group">
                        <button class="button-dropdown">Nuevo</button>
                        <button class="button-dropdown">Editar</button>
                        <button class="button-dropdown">Eliminar</button>
                    </div>
                    <div class="btn-group dropdown" style="position:relative">
                        <button type="button" onclick="" id="add" class="button-dropdown">
                            Nuevo
                        </button>
                        <button type="button" onclick="show_btn_options()" class="button-dropdown px-1">
                            <i class="fa-solid fa-caret-down"></i>
                        </button>
                        <div class="btn-dropdown-options w-100 position-absolute start-0">
                            <ul class="list-unstyled m-0">
                                <li>
                                    Editar
                                </li>
                                <li>
                                    Borrar
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div style="display: flex;flex-direction: row;justify-content: space-between;">
                    <div>
                        <h5 style="text-transform:uppercase; font-size: .8em">Type</h5>
                        <p style="font-size: .65em">Customer - Channel</p>
                    </div>
                    <div>
                        <h5 style="text-transform:uppercase; font-size: .8em">Phone</h5>
                        <p style="font-size: .65em"><a href="tel:(785) 241-6200">(785) 241-6200</a></p>
                    </div>
                    <div>
                        <h5 style="text-transform:uppercase; font-size: .8em">Website</h5>
                        <p style="font-size: .65em"><a href="https://dickenson-consulting.com">dickenson-consulting.com</a></p>
                    </div>
                    <div>
                        <h5 style="text-transform:uppercase; font-size: .8em">Account Owner</h5>
                        <p style="font-size: .65em">Paula Moreno</p>
                    </div>
                </div>
            </div>
            <!-- partial:index.partial.html -->
            <nav class="nav nav-tabs w-100" id="tab" role="tablist">
                <a class="nav-item nav-link border-bottom-0 active" data-toggle="tab" role="tab" aria-selected="true" aria-controls="nav-details" href="#details">Detalles</a>
                <a class="nav-item nav-link border-bottom-0" data-toggle="tab" role="tab" aria-selected="false" aria-controls="nav-files" href="#files">Archivos</a>
            </nav>

            <br />

            <div class="tab-content w-100" id="tabcontent">
                <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                    <div role="tablist">
                        <div class="row" id="infoAnimal-show">
                            <div class="col-md-12 col-lg-6">
                                <div class="card" role="tab">
                                    <div class="card-header" id="info" data-toggle="collapse" href="#info-show" aria-expanded="true" aria-controls="infoAnimal-show">
                                        <h5>Información del animal</h5>
                                    </div>

                                    <div class="collapse show" role="tabpanel" aria-labelledby="info" data-parent="#accordion">
                                        <div class="card-body">
                                            <form>
                                                <div class="form-group row">

                                                    <div class=" col-6">
                                                        <label for="nombre" class="text-uppercase col-12">
                                                            <h6>Nombre</h6>
                                                        </label>
                                                        <input type="text" name="nombre" id="nombre" class="form-control-plaintext border-dark-subtle border-0 border-bottom mt-1 mb-3" value="Chispa" aria-readonly="true"> <!-- CAMBIAR PHP -->
                                                        <label for="genero" class="text-uppercase col-12">
                                                            <h6>Género</h6>
                                                        </label>
                                                        <input type="text" name="genero" id="genero" class="form-control-plaintext border-dark-subtle border-0 border-bottom mt-1 mb-3" value="H" aria-readonly="true"> <!-- CAMBIAR PHP -->
                                                        <label for="raza" class="text-uppercase col-12">
                                                            <h6>Raza</h6>
                                                        </label>
                                                        <input type="text" name="raza" id="raza" class="form-control-plaintext border-dark-subtle border-0 border-bottom mt-1 mb-3" value="H" aria-readonly="true"> <!-- CAMBIAR PHP -->
                                                    </div>
                                                    <div class=" col-6">
                                                        <label for="fech_nac" class="text-uppercase col-12">
                                                            <h6>Fecha de nacimiento</h6>
                                                        </label>
                                                        <input type="text" name="fech_nac" id="fech_nac" class="form-control-plaintext border-dark-subtle border-0 border-bottom mt-1 mb-3" value="12-12-2021" aria-readonly="true"> <!-- CAMBIAR PHP -->
                                                        <label for="especies_id" class="text-uppercase col-12">
                                                            <h6>Especie</h6>
                                                        </label>
                                                        <input type="text" name="especies_id" id="especies_id" class="form-control-plaintext border-dark-subtle border-0 border-bottom mt-1 mb-3" value="H" aria-readonly="true"> <!-- CAMBIAR PHP -->
                                                        <label for="Estado de adopción" class="text-uppercase col-12">
                                                            <h6>Especie</h6>
                                                        </label>
                                                        <input type="text" name="Estado de adopción" id="Estado de adopción" class="form-control-plaintext border-dark-subtle border-0 border-bottom mt-1 mb-3" value="H" aria-readonly="true"> <!-- CAMBIAR PHP -->
                                                    </div>
                                                </div>
                                                <br><br>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="card" role="tab">
                                    <div class="card-header" id="info" data-toggle="collapse" href="#info-show" aria-expanded="true" aria-controls="infoAnimal-show">
                                        <h5>Salud</h5>
                                    </div>

                                    <div class="collapse show" role="tabpanel" aria-labelledby="info" data-parent="#accordion">
                                        <div class="card-body">
                                            <form>
                                                <div class="form-group row">

                                                    <div class=" col-6">
                                                        <label for="estado_salud" class="text-uppercase col-12">
                                                            <h6>Estado de salud</h6>
                                                        </label>
                                                        <input type="text" name="estado_salud" id="estado_salud" class="form-control-plaintext border-dark-subtle border-0 border-bottom mt-1 mb-3" value="Saludable" aria-readonly="true"> <!-- CAMBIAR PHP -->
                                                    </div>
                                                    <div class=" col-6">
                                                        <label for="necesidades_especiales" class="text-uppercase col-12">
                                                            <h6>Requiere de necesidades especiales</h6>
                                                        </label>
                                                        <input type="text" name="necesidades_especiales" id="necesidades_especiales" class="form-control-plaintext border-dark-subtle border-0 border-bottom mt-1 mb-3" value="No" aria-readonly="true"> <!-- CAMBIAR PHP -->
                                                    </div>
                                                </div>
                                                <br><br>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6 mt-4">
                                <div class="card" role="tab">
                                    <div class="card-header" id="info" data-toggle="collapse" href="#info-show" aria-expanded="true" aria-controls="infoAnimal-show">
                                        <h5>Otros datos de interés</h5>
                                    </div>
                                    <div class="collapse show" role="tabpanel" aria-labelledby="info" data-parent="#accordion">
                                        <div class="card-body">
                                            <form>
                                                <div class="form-group row">

                                                    <div class=" col-6">
                                                        <textarea name="otras_observaciones" id="otras_observaciones" cols="30" rows="10" readonly aria-readonly="true"></textarea> <!--CAMBIAR LUEGO-->
                                                    </div>
                                                </div>
                                                <br><br>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade show" id="files" role="tabpanel" aria-labelledby="files-tab">eeee</div>
            </div>
            <br>
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