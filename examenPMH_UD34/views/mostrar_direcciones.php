<!DOCTYPE html>
<html>

<head>
    <title>ExamenPMH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8d125d2b91.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container mt-5">
        <!-- MODAL -->
        <div id="aviso" class="modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Aviso</h5>
                        <button type="button" class="btn-close" id="cerrarModalBtn" aria-label="Close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p><?= $msg ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-9 col-sm-9">
                <h1>Opciones</h1>
                <hr>

                <!-- Creamos un formulario en el que estará el select de paises y un button de tipo submit 
                     con valor pais. Este formulario enviará los datos a lista_direcciones.php mediante POST -->
                <form action="lista_direcciones.php" method="POST">
                    <label for="pais" class="col-lg-3 col-form-label">Pais</label>
                    <select name="pais">
                        <option value="0">Países</option>
                        <?php
                        // Recorremos el array $data_pais y vamos creando etiquetas option
                        // para cada elemento.
                        foreach ($data_pais as $pais) {
                            echo "<option value='" . $pais["id"] . "'>" . $pais["nombre"] . "</option>";
                        }
                        ?>
                    </select>
                    <button type="submit" name="opcion" value="pais">Mostrar Direcciones</button>
                </form>

                
                <!-- Creamos un formulario en el que estará el select de paises y un button de tipo submit 
                     con valor pais. Este formulario enviará los datos a lista_direcciones.php mediante POST -->
                <form action="lista_direcciones.php" method="POST">
                    <label for="prov" class="col-lg-3 col-form-label">Provincia</label>
                    <select name="prov">
                        <option value="0">Provincia</option>
                        <?php
                        // Recorremos el array $data_provincia y vamos creando etiquetas option
                        // para cada elemento.
                        foreach ($data_provincia as $provincia) {
                            echo "<option value='" . $provincia["codProv"] . "'>" . $provincia["nombre"] . "</option>";
                        }
                        ?>
                    </select>
                    <button type="submit" name="opcion" value="prov">Mostrar Direcciones</button>
                </form>

            </div>

            <?php

            // Si $data_direcciones es distinto de nulo
            if ($data_direcciones != null) {
            ?>
                <div class="col-lg-9 col-sm-9">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Calle</th>
                                <th scope="col">Número</th>
                                <th class='text-center' scope="col">Código Postal</th>
                                <th class='text-center' scope="col">Provincia</th>
                                <th class='text-center' scope="col">País</th>
                                <th class='text-center' scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        //Recorremos el array y vamos crando una fila para cada direccion obtenida
                        foreach ($data_direcciones as $direccion) {
                            echo "<tr>";
                            //Mostramos los datos de cada elemento
                            //Llamamos a la funcion details para mostrar más datos del elemento seleccionado
                            echo "<td>" . $direccion["calle"] . "</td>";
                            echo "<td>" . $direccion["numero"] . "</td>";
                            echo "<td class='text-center'>" . $direccion["codigoPostal"] . "</td>";
                            echo "<td class='text-center'>" . $direccion["prov_nombre"] . "</td>";
                            echo "<td class='text-center'>" . $direccion["pais_nombre"] . "</td>";
                            echo "</tr>";
                        }
                    }

                        ?>
                        </tbody>
                    </table>
                </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <?php
    if ($msg != "") { ?>

        <script>
            $(document).on("ready", function() {
                $("#aviso").modal("show");
            })
        </script>
    <?php
    }
    ?>
    <script language="JavaScript" type="text/javascript" src="../views/js/exam.js"></script>
</body>

</html>