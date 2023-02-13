<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8d125d2b91.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="table-wrapper">
            <div class="table-tittle">
                <div class="row">
                    <div class="col-sm-8">
                        <h2><b>Categorías</b></h2>
                    </div>
                    <div class="col-sm-4 text-end">
                        <form action="index_category.php" method="POST">
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
                        <!-- Si actual_ord es ASC se cambia a desc y viceversa -->                
                        <th scope="col">#<a class=" p-0 text-white <?=($actual_ord == "ASC") ? "asc" : "desc"?>" href='index_category.php?'><i class="fa-sharp fa-solid fa-arrow-down-short-wide filter"></i></a></th>
                        <th scope="col">Categoría<a class=" p-0 text-white <?=($actual_ord == "ASC") ? "asc" : "desc"?>" href='index_category.php?'><i class="fa-sharp fa-solid fa-arrow-down-short-wide filter"></i></a></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    //Contador
                    $i = 1;
                    foreach ($data as $element) {
                        //Sumamos contador
                        $i += 1;
                        //Url a la que se le van a pasar los datos
                        $url = "index_category.php";

                        echo "<tr>";
                        echo "<td id='" . $i . "'>" . $element["id_categoria"] . "</td>";
                        //Si hace click sobre el nombre, se llamará a la función details que dará más información acerca del
                        //elemento seleccionado
                        echo "<td><a onclick=details(" . $i . ",'".$url."')>" . $element["nombre"] . "</a></td>";
                        echo "<td class='p-0'>";
                    ?>
                        <!-- Enviamos los datos del elemento seleccionado y creamos un boton para su modificacion -->
                        <!-- Pasamos los datos como hidden -->
                        <form action="index_category.php" method="POST" class="d-inline-block">
                            <input type="hidden" name="id_categoria" value='<?= $element["id_categoria"] ?>'>
                            <input type="hidden" name="nombre" value='<?= $element["nombre"] ?>'>
                            <input type="hidden" name="descripcion" value='<?= $element["descripcion"] ?>'>
                            <button value="2" name="submit" class="mt-2 border-0 bg-transparent text-warning">
                                <i class="fa-solid fa-marker"></i>
                            </button>
                        </form>

                        <i class="text-muted">|</i>

                        <!-- Hacemos lo mismo que arriba, solo que para la eliminación del elemento -->
                        <form action="index_category.php" method="POST" class="d-inline-block">
                            <input type="hidden" name="id_categoria" value='<?= $element["id_categoria"] ?>'>
                            <button value="3" name="submit" class="mt-2 border-0 bg-transparent text-danger">
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
                <?=$msg;?>
            </div>
            <div>
                <nav>
                    <ol class="pagination justify-content-end" style="list-style-type: none;">
                        <?php

                        //Si la página actual no es la primera, activamos previous. Si es la primera
                        //lo desactivamos con la clase disabled
                        if ($actual_page != 1) {
                            echo "<li class='page-item'><a href='index_category.php?&num_page=" . ($actual_page - 1) . "' class='page-link'>Previous</a></li>";
                        } else {
                            echo "<li class='page-item disabled'><a class='page-link'>Previous</a></li>";
                        }

                        for ($i = 1; $i <= $total_page; $i++) {
                            echo "<li class='page-item".(($i == $actual_page) ? ' active' : '') ."'><a href='index_category.php?num_page=$i' class='page-link'>$i</a></li>";
                        }

                        //Hacemos lo mismo que con previous
                        if ($actual_page != $total_page) {
                            echo "<li class='page-item'><a href='index_category.php?num_page=" . ($actual_page + 1) . "' class='page-link'>Next</a></li>";
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