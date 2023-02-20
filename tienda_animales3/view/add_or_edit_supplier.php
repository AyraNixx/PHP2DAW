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
    <div class="container mt-5">
        <div class="d-flex align-items-center justify-content-center">
            <form action="index_supplier.php" method="POST" class="bg-dark text-white p-4" style="width: 370px;" id="form">
            <!-- Si option es 1, ponermos Add supplier, si no lo es, edit supplier -->
                <h2 class="text-center my-4"><b><?= ($option == 1) ? "Add Supplier" : "Edit Supplier" ?></b></h2>
                <!--Si option es 1, no aparecerá el recuadro de id_supplier-->
                <?php
                //Si option es 2, nos aparece un input para modificar el identificador
                if ($option == 2) {
                    echo "<div class='form-group col-md-12'>";
                    echo "<label for='id_proveedor' class='mb-3'>Id</label>";
                    echo "<input type=text name=new_id class=form-control value=" . $data["id_proveedor"] . ">";
                    echo "<input type=hidden name=id_proveedor value=". $data["id_proveedor"] . ">";
                    echo "</div>";
                }
                ?>
                <div class="form-group col-md-12">
                    <label for="nombre" class="mt-2 mb-1">Nombre</label>
                    <!-- Si option vale 2, se muestran datos del nombre a cambiar -->
                    <input type="text" name="nombre" class="form-control" value="<?= ($option == 2) ? $data["nombre"] : "" ?>">
                </div>
                <div class="form-group col-md-12">
                    <label for="direccion" class="mt-2 mb-1">Direccion</label>
                    <input type="text" name="direccion" class="form-control" value=<?= ($option == 2) ? $data["direccion"] : "" ?>>
                </div>
                <div class="form-group col-md-12">
                    <label for="telefono" class="mt-2 mb-1">Telefono</label>
                    <input type="tel" name="telefono" class="form-control" value=<?= ($option == 2) ? $data["telefono"] : "" ?>>
                </div>
                <div class="form-group col-md-12">
                    <label for="correo" class="mt-2 mb-1">Correo</label>
                    <input type="email" name="correo" class="form-control" value=<?= ($option == 2) ? $data["correo"] : "" ?>>
                </div>
                <input type="hidden" name="option" value="<?=$option?>">
                <div class="form-group col-md-12 text-center">
                    <button type="submit" value="5" name="submit" class="mt-3 btn btn-secondary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="./js/index.js"></script>
</body>

</html>