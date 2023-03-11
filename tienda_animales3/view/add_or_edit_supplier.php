<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Si la opcion es 1, el titulo de la página será New Supplier, si no, será Edit Supplier -->
    <title><?= ($option == 1) ? "New Supplier" : "Edit Supplier" ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8d125d2b91.js" crossorigin="anonymous"></script>
</head>

<body class="bg-secondary">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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

        <div class="d-flex align-items-center justify-content-center">
            <form action="controller_supplier.php" method="POST" class="bg-dark text-white p-4" style="width: 370px;" id="form">
                <!-- Si option es 1, ponermos Add supplier, si no lo es, edit supplier -->
                <h2 class="text-center my-4"><b><?= ($option == 1) ? "Add Supplier" : "Edit Supplier" ?></b></h2>
                <!--Si option es 1, no aparecerá el recuadro de id_supplier-->
                <?php
                //Si option es 2, nos aparece un input para modificar el identificador
                if ($option == 2) {
                    echo "<div class='form-group col-md-12'>";
                    echo "<label for='id_proveedor' class='mb-3'>Id</label>";
                    echo "<input type=text name=new_id class=form-control value=" . $data_supplier["id_proveedor"] . ">";
                    echo "<input type=hidden name=id_proveedor value=" . $data_supplier["id_proveedor"] . ">";
                    echo "</div>";
                }
                ?>
                <div class="form-group col-md-12">
                    <label for="nombre" class="mt-2 mb-1">Nombre</label>
                    <!-- Si option vale 2, se muestran datos del nombre a cambiar -->
                    <input type="text" name="nombre" class="form-control" value="<?= ($option == 2) ? $data_supplier["nombre"] : "" ?>" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="direccion" class="mt-2 mb-1">Direccion</label>
                    <input type="text" name="direccion" class="form-control" value=<?= ($option == 2) ? $data_supplier["direccion"] : "" ?> required>
                </div>
                <div class="form-group col-md-12">
                    <label for="telefono" class="mt-2 mb-1">Telefono</label>
                    <input type="tel" name="telefono" class="form-control" value=<?= ($option == 2) ? $data_supplier["telefono"] : "" ?> required pattern="^\d{3}(([\s-])?\d{2}){3}$">
                </div>
                <div class="form-group col-md-12">
                    <label for="correo" class="mt-2 mb-1">Correo</label>
                    <input type="email" name="correo" class="form-control" value=<?= ($option == 2) ? $data_supplier["correo"] : "" ?> required pattern="^\w+([\.-_]?\w+)*@\w+([\.-_]?\w+)*(\.\w{2,4})+$">
                </div>
                <input type="hidden" name="option" value="<?= $option ?>">
                <div class="form-group col-md-12 text-center">
                    <button type="submit" value="5" name="submit" class="mt-3 btn btn-secondary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Enlace a los archivos JavaScript de Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../view/js/index.js"></script>
</body>

</html>