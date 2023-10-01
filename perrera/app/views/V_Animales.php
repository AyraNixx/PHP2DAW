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
        .button-30 {
            box-sizing: border-box;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            height: 2em;
            padding: calc(.5em - 1px) 1em;

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

        .button-30:focus {
            border-color: #485fc7;
            outline: 0;
        }

        .button-30:hover {
            border-color: #b5b5b5;
        }

        .button-30:focus:not(:active) {
            outline: none !important;
            box-shadow: rgba(72, 95, 199, .25) 0 0 0 .125em;
        }

        input[type="radio"] {
            display: none;
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
                <div class="button-option-container" style="
    display: flex;
    justify-content: space-between;
    width: 100%;
    align-content: center;
">
                    <h1 style="font-size: x-large;display: inline;margin-bottom: 0;" class="pt-2 text-primary text-uppercase font-weight-light">
                        <i class="fa-solid fa-paw"></i>
                        ANIMAL
                    </h1>

                    <div class="btn-group dropdown">
                        <button type="button" onclick="" id="add" class="button-30">
                            Nuevo
                        </button>
                        <button type="button" onclick="show_btn_options()"></button>
                    </div>

                    <div class="btn-group dropdown">
                        <button type="button" class="btn btn-light border-secondary-subtle button-60 ">
                            Añadir
                        </button>
                        <button type="button" class="btn btn-light border-secondary-subtle button-60 dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a href="">Editar</a>
                            <br>
                            <a href="">Eliminar</a>
                        </div>
                    </div>
                    <div class="segment segment--material" style="width: fit-content;margin: 0;display: flex;justify-content: center;align-items: center;">
                        <button class="button-30">Añadir</button>
                        <button class="button-30">Editar</button>
                        <button class="button-30">Eliminar</button>
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

            <div class="tab-content w-100" id="nav-tabContent">
                <div class="tab-pane fade show active" id="order" role="tabpanel" aria-labelledby="nav-home-tab">
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
            </div>
            <br>
            <div class="tab-content" id="nav-tabContent" style="margin: auto 3rem;">


                <!-- Order Details -->
                <!--<div class="tab-pane fade show active" id="order" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div id="" role="tablist">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h5 class="mb-0">
                                            Información
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <form>
                                                <div class="form-group row">
                                                    <label for="draftStatus" class="col-sm-4 col-form-label ">Lettering Draft Status</label>
                                                    <div class="col-sm-8">
                                                        <select class="custom-select col-sm-8" id="draftStatus" readonly>
                                                            <option selected>Choose...</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="cadStatus" class="col-sm-4 col-form-label ">CAD Status</label>
                                                    <div class="col-sm-8">
                                                        <select class="custom-select col-sm-8" id="cadStatus">
                                                            <option selected>Choose...</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="orderStatus" class="col-sm-4 col-form-label ">Order Status</label>
                                                    <div class="col-sm-8">
                                                        <select class="custom-select col-sm-8" id="orderStatus">
                                                            <option selected>Choose...</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header collapsed" role="tab" id="headingTwo" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        <h5 class="mb-0">
                                            Delivery Info
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="card-body">
                                                <form>
                                                    <div class="form-group row">
                                                        <label for="graveyard" class="col-md-4 col-form-label ">Graveyard</label>
                                                        <div class="col-md-8 col-sm-12">
                                                            <select class="custom-select col-md-8 " id="graveyard">
                                                                <option selected>Choose...</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-form-label" for="authority">Graveyard Authority</label>
                                                        <div class="col-md-8 col-sm-12"> -->
                <!-- <input type="text" class="col-md-8 form-control" id="authority" placeholder=""> -->
                <!-- <a href="#">John Doe</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="orderStatus" class="col-md-4 col-form-label ">Order Status</label>
                                                        <div class="col-md-8 col-sm-12">
                                                            <select class="custom-select col-md-8" id="orderStatus">
                                                                <option selected>Choose...</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header collapsed" role="tab" id="headingThree" data-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                        <h5 class="mb-0">
                                            Delivery Status
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse show" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="esp" class="col-md-4 col-form-label ">ESP</label>
                                                <div class="col-md-8 col-sm-12">
                                                    <select class="custom-select col-md-8" id="esp">
                                                        <option selected>Choose...</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 col-form-label" for="location">Location</label>
                                                <div class="col-md-8 col-sm-12">
                                                    <input type="text" class="col-md-8 form-control" id="location" placeholder="e.g. there ">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 col-form-label" for="trackingNum">Tracking Number</label>
                                                <div class="col-md-8 col-sm-12">
                                                    <input type="text" class="col-md-8 form-control" id="trackingNum" placeholder="e.g. 123452">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="applicationStatus" class="col-md-4 col-form-label ">Application Status</label>
                                                <div class="col-md-8 col-sm-12">
                                                    <select class="custom-select col-md-8" id="applicationStatus">
                                                        <option selected>Choose...</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="assemblerStatus" class="col-md-4 col-form-label ">Assemblerer Status</label>
                                                <div class="col-md-8 col-sm-12">
                                                    <select class="custom-select col-md-8" id="assemblerStatus">
                                                        <option selected>Choose...</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4 col-form-label" for="assembler">Assembler</label>
                                                <div class="col-md-8 col-sm-12">
                                                    <select class="custom-select col-md-8" id="assembler">
                                                        <option selected>Choose...</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="assemblerPayment" class="col-md-4 col-form-label ">Payment to Assembler</label>
                                                <div class="col-md-8 col-sm-12">
                                                    <select class="custom-select col-md-8" id="assemblerPayment">
                                                        <option selected>Choose...</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-inline h4">Order Details</div>
                                        <div class="d-inline float-right"><small><a href="">Edit</a></small></div>
                                    </div>
                                    <div class="card-body">
                                        <dl class="row">
                                            <dd class="col-sm-4">Headstone Model</dd>
                                            <dt class="col-sm-8">Bamse</dt>
                                            <dd class="col-sm-4">Headstone Material</dd>
                                            <dt class="col-sm-8">none</dt>
                                        </dl>
                                        <dl class="row">

                                        </dl>
                                        <dl class="row">
                                            <dd class="col-sm-4">Headstone Size</dd>
                                            <dt class="col-sm-8">Medium (75x65x12)</dt>
                                            <dd class="col-sm-4">Headstone Base</dd>
                                            <dt class="col-sm-8">Regular (15x56x24)</dt>
                                        </dl>
                                        <dl class="row">
                                            <dd class="col-sm-4">Assembler Discount</dd>
                                            <dt class="col-sm-8">Yes</dt>
                                            <dd class="col-sm-4">Total Price</dd>
                                            <dt class="col-sm-8">9330 <br>
                                                <button>View Bill</button>
                                            </dt>
                                        </dl>
                                        <hr>
                                        <dl class="row">
                                            <dt class="col-sm-12">Comments</dt>
                                            <dd class="col-sm-12">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- End of Order Details -->
                <!--Product Info  -->
                <!--<div class="tab-pane fade" id="product" role="tabpanel" aria-labelledby="nav-profile-tab">
                    Display Product Info Content
                </div> -->
                <!--Factory Order  -->
                <!--<div class="tab-pane fade" id="factory" role="tabpanel" aria-labelledby="nav-profile-tab">
                    Display Factory Order Content
                </div> -->
                <!--Customer Info  -->
                <!--<div class="tab-pane fade" id="customer" role="tabpanel" aria-labelledby="nav-contact-tab">
                    Display Customer Info Content
                </div> -->
                <!--Files   -->
                <!--<div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="nav-contact-tab">
                    Display Files
                </div>-->
            </div>
            </div>
        </main>

    </section>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="./js/widthMenu.js"></script>
</body>

</html>