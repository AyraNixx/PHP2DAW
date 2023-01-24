<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Si la opcion es 1, el titulo de la página será New product, si no, será Edit product -->
    <title><?= ($option == 1) ? "New Product" : "Edit Product" ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8d125d2b91.js" crossorigin="anonymous"></script>
</head>

<body class="bg-secondary">
    <div class="container mt-5">
        <div class="d-flex align-items-center justify-content-center">
            <form action="index_product.php" method="POST" class="bg-dark text-white p-4" style="width: 370px;" enctype="multipart/form-data">
                <!-- Si option es 1, ponermos Add rol, si no lo es, edit rol -->
                <h2 class="text-center my-4"><b><?= ($option == 1) ? "Add Product" : "Edit Product" ?></b></h2>
                <!--Si option es 1, no aparecerá el recuadro de id_rol-->
                <?php
                //Si option es 2, nos aparece un input para modificar el identificador
                if ($option == 2) {
                    echo "<div class='form-group col-md-12'>";
                    echo "<label for='id_product' class='mb-3'>Id</label>";
                    echo "<input type=text name=id class=form-control value=" . $data["id_product"] . ">";
                    echo "</div>";
                }
                ?>
                <div class="form-group col-md-12">
                    <label for="nombre" class="mt-2 mb-1">Nombre</label>
                    <!-- Si option vale 2, se muestran datos del rol a cambiar -->
                    <input type="text" name="nombre" class="form-control" value="<?= ($option == 2) ? $data["nombre"] : "" ?>">
                </div>
                <div class="form-group col-md-12">
                    <label for="precio" class="mt-2 mb-1">Precio</label>
                    <input type="text" name="precio" class="form-control" value=<?= ($option == 2) ? $data["precio"] : "" ?>>
                </div>
                <div class="form-group col-md-12">
                    <label for="stock" class="mt-2 mb-1">Stock</label>
                    <select class="form-control form-control-sm" name="stock">
                        <?php for ($i = 50; $i < 20000; $i += 50) {
                            echo "<option value=$i>$i</option>";
                        } 
                        ?>
                    </select>

                </div>
                <div class="form-group col-md-12">
                    <label for="categoria" class="mt-2 mb-1">Categoria</label>
                    <input type="text" name="categoria" class="form-control" value=<?= ($option == 2) ? $data["categoria"] : "" ?>>
                </div>
                <div class="form-group col-md-12">
                    <label for="foto" class="mt-2 mb-1">Foto</label>
                    <input type="file" name="foto" class="form-control-file" value=<?= ($option == 2) ? $data["foto"] : "" ?>>
                </div>
                <input type="hidden" name="prev_option" value="<?= $option ?>">
                <div class="form-group col-md-12 text-center">
                    <button type="submit" value="5" name="submit" class="mt-3 btn btn-secondary">Guardar</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>