<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Si la opcion es 1, el titulo de la página será New Product, si no, será Edit Product -->    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8d125d2b91.js" crossorigin="anonymous"></script>
</head>

<body class="bg-secondary">
    <div class="container mt-5">
        <div class="d-flex align-items-center justify-content-center">
            <form action="#" method="POST" enctype="multipart/form-data" class="bg-dark text-white p-4" style="width: 370px;">
            <!-- Si option es 1, ponermos Add Product, si no lo es, edit Product -->
                <h2 class="text-center my-4"><b>Pruebas bb</b></h2>
                
                <div class="form-group col-md-12">
                    <label for="foto" class="mt-2 mb-1">Foto/s</label>
                    <input type="file" name="foto[]" class="form-control" multiple>
                </div>
                <div class="form-group col-md-12 text-center">
                    <button type="submit" value="5" name="submit" class="mt-3 btn btn-secondary">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <?php if(isset($_POST["submit"])){
        echo "<pre>";
        var_dump($_FILES);
        echo "</pre>";
    }?>

</body>

</html>