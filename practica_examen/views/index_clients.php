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

    <div id="aviso" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Aviso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><?= $msg ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">

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
                            <th scope="col">Edad</th>
                            <th scope="col">Sexo</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        //Tenemos que generar una fila tr para cada cliente
                        //que tenga el array de datosClientes
                        foreach ($data_clients as $client) {

                            //Url destino
                            $url = "index_product.php";

                            echo "<tr>";
                            //Mostramos los datos de cada elemento
                            //Llamamos a la funcion details para mostrar más datos del elemento seleccionado
                            echo "<td class='name' style='cursor:pointer;' onclick=details(" . $client["idClientes"] . ",'" . $url . "')>" . $client["nombre"] . "</td>";
                            echo "<td>" . $client["email"] . "</td>";
                            echo "<td class='text-center'>" . $client["edad"] . "</td>";
                            echo "<td class='text-center'>" . $client["sexo"] . "</td>";
                            echo "<td class='p-0'>";
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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <?php
    //Si llega el mensaje implica que se ha modificado o borrado un cliente
    if ($msg != null && isset($msg)) {
        print("<script>
        \$(document).ready(function(){
                \$('#aviso').modal({show:true});
            });
        </script>");
    }
    ?>
</body>

</html>