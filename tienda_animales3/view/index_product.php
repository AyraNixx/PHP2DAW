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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand px-1 mx-1 border border-light rounded-circle" href="../view/index_admin.php">
            <i class="fa-solid fa-shop text-light"></i>
        </a>
        <button class="navbar-toggler p-2 mx-2" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link p-2" href="../controller/controller_category.php">Categorías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2" href="../controller/controller_product.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2" href="../controller/controller_rol.php">Roles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2" href="../controller/controller_supplier.php">Proveedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-2" href="../controller/LoginC.php?action=logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
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
                        <p><?= $this->msg ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-wrapper">
            <div class="table-tittle">
                <div class="row">
                    <div class="col-sm-8">
                        <h2><b>Productos</b></h2>
                    </div>
                    <div class="col-sm-4 text-end">
                        <form action="controller_product.php" method="POST">
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
                        <!-- Si $this->ord es ASC, tendrá la clase desc, si NO lo es, la clase será ASC -->
                        <!-- Se puede mejorar pero ya si eso en otra vida porque yo no puedo más -->
                        <th scope="col">Nombre<a class=" p-1 text-white <?= ($this->ord == "ASC") ? "asc" : "desc" ?>" href='controller_product.php?field=nombre'><i class="fa-sharp fa-solid fa-arrow-down-short-wide filter"></i></a></th>
                        <th scope="col">Precio<a class=" p-1 text-white <?= ($this->ord == "ASC") ? "asc" : "desc" ?>" href='controller_product.php?field=precio'><i class="fa-sharp fa-solid fa-arrow-down-short-wide filter"></i></a></th>
                        <th scope="col">Stock<a class=" p-1 text-white <?= ($this->ord == "ASC") ? "asc" : "desc" ?>" href='controller_product.php?field=stock'><i class="fa-sharp fa-solid fa-arrow-down-short-wide filter"></i></a></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //Recorremos el array data
                    foreach ($data_product as $product) {
                        //Url destino
                        $url = "controller_product.php";

                        echo "<tr>";
                        //Mostramos los datos de cada elemento
                        //Llamamos a la funcion details para mostrar más datos del elemento seleccionado
                        echo "<td><a style='cursor:pointer;' onclick=details(" . $product["id_producto"] . ",'" . $url . "')>" . $product["nombre"] . "</a></td>";
                        echo "<td class='text-center'>" . $product["precio"] . "</td>";
                        echo "<td class='text-center'>" . $product["stock"] . "</td>";
                        echo "<td class='p-0 text-center'>";
                    ?>
                        <!-- Creamos dos botones para modificar o eliminar y pasamos los datos con input hidden -->
                        <form action="controller_product.php" method="POST" class="d-inline-block" enctype="multipart/form-data">
                            <input type="hidden" name="id_producto" value='<?= $product["id_producto"] ?>'>
                            <input type="hidden" name="nombre" value='<?= $product["nombre"] ?>'>
                            <input type="hidden" name="precio" value='<?= $product["precio"] ?>'>
                            <input type="hidden" name="stock" value='<?= $product["stock"] ?>'>
                            <input type="hidden" name="categoria" value='<?= $product["categoria"] ?>'>
                            <input type="hidden" name="prev_img" value='<?= $product["foto"] ?>'>
                            <button value="2" name="submit" class="mt-2 border-0 bg-transparent text-warning">
                                <i class="fa-solid fa-marker"></i>
                            </button>
                        </form>

                        <i class="text-muted">|</i>

                        <form action="controller_product.php" method="POST" class="d-inline-block">
                            <input type="hidden" name="id_producto" value='<?= $product["id_producto"] ?>'>
                            <input type="hidden" name="img" value='<?= $product["foto"] ?>'>
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
            </div>
            <div>
                <nav>
                    <ol class="pagination justify-content-end" style="list-style-type: none;">
                        <?php

                        //Si la página actual no es la primera, activamos previous. Si es la primera
                        //lo desactivamos con la clase disabled
                        if ($this->page != 1) {
                            echo "<li class='page-item'><a href='controller_product.php?field=" . ($this->field) . "&ord=" . ($this->ord) . "&page=" . ($this->page - 1) . "' class='page-link'>Previous</a></li>";
                        } else {
                            echo "<li class='page-item disabled'><a class='page-link'>Previous</a></li>";
                        }

                        for ($i = 1; $i <= $total_page; $i++) {
                            echo "<li class='page-item" . (($i == $this->page) ? ' active pagina' : '') . "'><a href='controller_product.php?field=" . ($this->field) . "&ord=" . ($this->ord) . "&page=$i' class='page-link'>$i</a></li>";
                        }

                        //Hacemos lo mismo que con previous
                        if ($this->page != $total_page) {
                            echo "<li class='page-item'><a href='controller_product.php?field=" . ($this->field) . "&ord=" . ($this->ord) . "&page=" . ($this->page + 1) . "' class='page-link'>Next</a></li>";
                        } else {
                            echo "<li class='page-item disabled'><a class='page-link'>Next</a></li>";
                        }
                        ?>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php
    if ($this->msg != "") { ?>

        <script>
            $(document).on("ready", function() {
                $("#aviso").modal("show");
            })
        </script>
    <?php
    }
    ?>
    <script language="JavaScript" type="text/javascript" src="../view/js/index.js"></script>
</body>

</html>