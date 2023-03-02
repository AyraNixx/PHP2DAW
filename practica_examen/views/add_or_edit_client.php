<!DOCTYPE html>
<html>

<head>
    <title>Modificar Cliente</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>

    <?php

    // Dependiendo de si la variable $action corresponde con update o con
    // add, se llamará a un controlador u a otro
    switch ($action) {
        case "update":
            $url = "../controllers/update_client.php";
            break;
        case "add":
            $url = "../controllers/add_client.php";
            break;
        default:
            $url = "../controllers/main_controller_clientes.php";
            
    }

    ?>

    <form method="POST" action="<?=$url;?>">

        <div class="container">

            <div class="row">


                <div class="col-lg-9 col-sm-9">

                    <?php
                    
                    if($action == "update")
                    {
                        echo "<div class='form-group row mb-sm-2 mt-sm-2'>";
                        echo "<label for='new_id' class='col-lg-3 col-form-label'>Identificador: </label>";
                        echo "<div class='col-lg-6'>";
                        echo "<input type='text' class='form-control' name='new_id' value='" . (isset($data_client) ? $data_client["idClientes"] : "") . "' />";
                        echo "</div>";
                    }
                    
                    ?>

                    <!-- Margenes con mb mr ml mt -sm-distancia-->
                    <!-- Misma linea -->
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <label for="nombre" class="col-lg-3 col-form-label">Nombre:</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="nombre" value='<?= (isset($data_client) ? $data_client["nombre"] : "") ?>' />
                        </div>
                    </div>

                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <label for="email" class="col-lg-3 col-form-label">Email:</label>
                        <div class="col-lg-6">
                            <input type="email" class="form-control" name="email" value='<?= (isset($data_client) ? $data_client["email"] : "") ?>' />
                        </div>
                    </div>

                    <div class=" form-group row mb-sm-2 mt-sm-2 ">
                        <label for="edad" class="col-lg-3 col-form-label">Edad</label>
                        <div class="col-lg-6">
                            <select class="form-control w-25" name="edad">
                                <?php
                                //Generamos las option del select edad
                                for ($i = 1; $i <= 120; $i++) {
                                    print("<option value='$i' ");
                                    //Si la edad de nuestro cliente a modificar es la que estamos escribiendo ahora
                                    //La marcamos como seleccionada 
                                    if (isset($data_client)) {
                                        if ($data_client["edad"] == $i) print("selected");
                                    }
                                    print(">$i</option>\n");
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <br>
                    <label class="form-check-label">
                        Sexo
                    </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="H" id="radio1" name="sexo" 
                        <?php
                            //Si el sexo es masculino marcamos esta opcion
                            if (isset($data_client)) {
                                if ($data_client["sexo"] == 'H') print("checked");
                            }
                        ?>
                            >
                        <label class="form-check-label" for="radio1">
                            Hombre
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="M" id="radio2" name="sexo" <?php
                            //Si el sexo es femenino marcamos esta opcion
                            if (isset($data_client)) {
                                if ($data_client["sexo"] == 'M') print("checked");
                            }
                        ?>>
                        <label class="form-check-label" for="radio2">
                            Mujer
                        </label>
                    </div>


                    <br>
                    <!--Añadimos un campo oculto con el identificador del cliente para poder modificar el registro en Bd-->
                    <input type="hidden" name="idClientes" value='<?= (isset($data_client) ? $data_client["idClientes"] : "") ?>' />
                    <button type="submit" name="update" value="true" class="btn btn-default mb-sm-2 shadow p-3 mb-5 bg-body rounded px-3 py-2">Enviar</button>

                </div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>