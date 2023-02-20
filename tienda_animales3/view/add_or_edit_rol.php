<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Si la opcion es 1, el titulo de la página será New rol, si no, será Edit Rol -->
    <title><?= ($option == 1) ? "New Rol" : "Edit Rol" ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8d125d2b91.js" crossorigin="anonymous"></script>
</head>

<body class="bg-secondary">
    <div class="container mt-5">
        <div class="d-flex align-items-center justify-content-center">
            <form action="index_rol.php" method="POST" class="bg-dark text-white p-4" style="width: 370px;">
                <!-- Si option es 1, ponermos Add rol, si no lo es, edit rol -->
                <h2 class="text-center my-4"><b><?= ($option == 1) ? "Add Rol" : "Edit Rol" ?></b></h2>
                <!--Si option es 1, no aparecerá el recuadro de id_rol-->
                <?php
                //Si option es 2, nos aparece un input para modificar el identificador
                if ($option == 2) {
                    echo "<div class='form-group col-md-12'>";
                    echo "<label for='rol' class='mb-3'>Id</label>";
                    echo "<input type=text name=new_id class=form-control value=" . $data["id_rol"] . ">";
                    echo "<input type=hidden name=id_rol value=" . $data["id_rol"] . ">";
                    echo "</div>";
                }
                ?>
                <div class="form-group col-md-12">
                    <label for="rol" class="mt-2 mb-1">Rol</label>
                    <!-- Si option vale 2, se muestran datos del rol a cambiar -->
                    <input type="text" name="rol" class="form-control" value="<?= ($option == 2) ? $data["rol"] : "" ?>">
                </div>
                <div class="form-group col-md-12">
                    <label for="descripcion" class="mt-2 mb-1">Descripcion</label>
                    <input type="text" name="descripcion" class="form-control" value=<?= ($option == 2) ? $data["descripcion"] : "" ?>>
                </div>
                <input type="hidden" name="option" value="<?= $option ?>">
                <div class="form-group col-md-12 text-center">
                    <button type="submit" value="5" name="submit" class="mt-3 btn btn-secondary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="../view/js/validation.js"></script>
</body>

</html>