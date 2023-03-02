<?php

namespace views;
//Comprobamos que la sesion esta iniciada
// session_start();

// if (!isset($_SESSION['id'])) {
//     print "Sesion no valida, redireccionando a la pagina principal";
// } else {
//     print "el id de sesion es " . $_SESSION['id'];
// }



?>

<!DOCTYPE html>
<html>

<head>
    <title>Lista de Clientes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8d125d2b91.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <style>
        .name:hover {
            color: red;
        }

        i:hover {
            color: gray;
        }
    </style>
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
                <h1>Clientes</h1>
                <hr>
                <div class="w-100 text-end">
                    <form action="../controllers/add_client.php" method="POST">
                        <button class="btn btn-success mb-3">Añadir Cliente</button>
                    </form>
                </div>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th class='text-center' scope="col">Edad</th>
                            <th class='text-center' scope="col">Sexo</th>
                            <th class='text-center' scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        //Tenemos que generar una fila tr para cada cliente
                        //que tenga el array de datosClientes
                        foreach ($data_clients as $client) {

                            //Url destino
                            $url = "../controllers/details_clientC.php";

                            echo "<tr>";
                            //Mostramos los datos de cada elemento
                            //Llamamos a la funcion details para mostrar más datos del elemento seleccionado
                            echo "<td class='name' style='cursor:pointer;' onclick=details(" . $client["idClientes"] . ",'" . $url . "')>" . $client["nombre"] . "</td>";
                            echo "<td>" . $client["email"] . "</td>";
                            echo "<td class='text-center'>" . $client["edad"] . "</td>";
                            echo "<td class='text-center'>" . $client["sexo"] . "</td>";
                            echo "<td class='text-center' class='p-0'>";
                        ?>
                            <!-- Creamos dos botones para modificar o eliminar y pasamos los datos con input hidden -->
                            <form action="../controllers/update_client.php" method="POST" class="d-inline-block">
                                <input type="hidden" name="idClientes" value='<?= $client["idClientes"] ?>'>
                                <input type="hidden" name="nombre" value='<?= $client["nombre"] ?>'>
                                <input type="hidden" name="email" value='<?= $client["email"] ?>'>
                                <input type="hidden" name="edad" value='<?= $client["edad"] ?>'>
                                <input type="hidden" name="sexo" value='<?= $client["sexo"] ?>'>
                                <button name="update" value="false" class="mt-2 border-0 bg-transparent text-warning">
                                    <i class="fa-solid fa-marker"></i>
                                </button>
                            </form>

                            <i class="text-muted">|</i>

                            <form action="../controllers/delete_client.php" method="POST" class="d-inline-block">
                                <input type="hidden" name="idClientes" value='<?= $client["idClientes"] ?>'>
                                <button class="mt-2 border-0 bg-transparent text-danger">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        <?php
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>


                <div id="info_content">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-9 col-sm-9">
                    <nav>
                        <ol class="pagination justify-content-end" style="list-style-type: none;">
                            <?php

                            //Si la página actual no es la primera, activamos previous. Si es la primera
                            //lo desactivamos con la clase disabled
                            if ($page != 1) {
                                echo "<li class='page-item'><a href='main_controller_clientes.php?page=" . ($page - 1) . "' class='page-link'>Previous</a></li>";
                            } else {
                                echo "<li class='page-item disabled'><a class='page-link'>Previous</a></li>";
                            }
                            //Hacemos lo mismo que con previous
                            if ($page != $pages) {
                                echo "<li class='page-item'><a href='main_controller_clientes.php?page=" . ($page + 1) . "' class='page-link'>Next</a></li>";
                            } else {
                                echo "<li class='page-item disabled'><a class='page-link'>Next</a></li>";
                            }
                            ?>
                        </ol>
                    </nav>
                </div>

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
    <script language="JavaScript" type="text/javascript" src="../views/js/utils.js"></script>
</body>

</html>