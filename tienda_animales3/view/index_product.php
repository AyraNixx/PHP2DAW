<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8d125d2b91.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="table-wrapper">
            <div class="table-tittle">
                <div class="row">
                    <div class="col-sm-8">
                        <h2><b>Productos</b></h2>
                    </div>
                    <div class="col-sm-4 text-end">
                        <form action="index_product.php" method="POST">
                            <button name="submit" value="1" class="btn btn-success add-new">
                                Añadir
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-striped">
                <thead class="table-dark text-center">
                    <tr>                    
                        <th scope="col">#<a class=" p-0 text-white <?=($actual_ord == "ASC") ? "asc" : "desc"?>" href='index_product.php?'><i class="fa-sharp fa-solid fa-arrow-down-short-wide filter"></i></a></th>
                        <th scope="col">Nombre<a class=" p-0 text-white <?=($actual_ord == "ASC") ? "asc" : "desc"?>" href='index_product.php?'><i class="fa-sharp fa-solid fa-arrow-down-short-wide filter"></i></a></th>
                        <th scope="col">Precio<a class=" p-0 text-white <?=($actual_ord == "ASC") ? "asc" : "desc"?>" href='index_product.php?'><i class="fa-sharp fa-solid fa-arrow-down-short-wide filter"></i></a></th>
                        <th scope="col">Stock<a class=" p-0 text-white <?=($actual_ord == "ASC") ? "asc" : "desc"?>" href='index_product.php?'><i class="fa-sharp fa-solid fa-arrow-down-short-wide filter"></i></a></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    //Contador
                    $i = 1;
                    //Recorremos el array data
                    foreach ($data as $element) {
                        //Url destino
                        $url = "index_product.php";

                        echo "<tr>";
                        //Mostramos los datos de cada elemento
                        echo "<td id='" . $i . "'>" . $element["id_producto"] . "</td>";
                        //Llamamos a la funcion details para mostrar más datos del elemento seleccionado
                        echo "<td><a onclick=details(" . $i . ",'".$url."')>" . $element["nombre"] . "</a></td>";
                        echo "<td>" . $element["precio"] . "</td>";
                        echo "<td>" . $element["stock"] . "</td>";
                        echo "<td class='p-0'>";
                    ?>
                        <!-- Creamos dos botones para modificar o eliminar y pasamos los datos con input hidden -->
                        <form action="index_product.php" method="POST" class="d-inline-block" enctype="multipart/form-data">
                            <input type="hidden" name="id_producto" value='<?= $element["id_producto"] ?>'>
                            <input type="hidden" name="nombre" value='<?= $element["nombre"] ?>'>
                            <input type="hidden" name="precio" value='<?= $element["precio"] ?>'>
                            <input type="hidden" name="stock" value='<?= $element["stock"] ?>'>
                            <input type="hidden" name="categoria" value='<?= $element["categoria"] ?>'>
                            <input type="hidden" name="foto[]" value='<?= $element["foto"] ?>' multiple>
                            <button value="2" name="submit" class="mt-2 border-0 bg-transparent text-warning">
                                <i class="fa-solid fa-marker"></i>
                            </button>
                        </form>

                        <i class="text-muted">|</i>

                        <form action="index_product.php" method="POST" class="d-inline-block">
                            <input type="hidden" name="id_producto" value='<?= $element["id_producto"] ?>'>
                            <button value="3" name="submit" class="mt-2 border-0 bg-transparent text-danger">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    <?php
                        echo "</td>";
                        echo "</tr>";

                        //Aumentamos el contador
                        $i += 1;
                    }
                    ?>
                </tbody>
            </table>
            <div id="info_content">
                <?=$msg;?>
            </div>
            <div>
                <nav>
                    <ol class="pagination justify-content-end" style="list-style-type: none;">
                        <?php

                        //Si la página actual no es la primera, activamos previous. Si es la primera
                        //lo desactivamos con la clase disabled
                        if ($actual_page != 1) {
                            echo "<li class='page-item'><a href='index_product.php?&num_page=" . ($actual_page - 1) . "' class='page-link'>Previous</a></li>";
                        } else {
                            echo "<li class='page-item disabled'><a class='page-link'>Previous</a></li>";
                        }

                        for ($i = 1; $i <= $total_page; $i++) {
                            echo "<li class='page-item".(($i == $actual_page) ? ' active' : '') ."'><a href='index_product.php?num_page=$i' class='page-link'>$i</a></li>";
                        }

                        //Hacemos lo mismo que con previous
                        if ($actual_page != $total_page) {
                            echo "<li class='page-item'><a href='index_product.php?num_page=" . ($actual_page + 1) . "' class='page-link'>Next</a></li>";
                        } else {
                            echo "<li class='page-item disabled'><a class='page-link'>Next</a></li>";
                        }
                        ?>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script language="JavaScript" type="text/javascript" src="../view/js/index.js"></script>
</body>

</html>