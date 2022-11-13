<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src=""></script>
</head>

<body>
    <?php

    function totalVocals()
    {
        $name = strtolower(trim($_POST["name"]));
        $vocals = 0;

        foreach (count_chars($name, 1) as $i => $val) {
            switch(chr($i))
            {
                case "a":
                case "e":
                case "i":
                case "o":
                case "u":
                    $vocals = $vocals + $val;
            }
        }
        echo "Hay $vocals en total en $name";
    }

    ?>
    <form method="POST" action="#">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <!-- Margenes con mb mr ml mt -sm-distancia-->
                    <!-- Misma linea -->
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <label for="nombre" class="col-lg-3 col-form-label">Nombre:</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <!--Sombra shadow p-3 mb-5 bg-body rounded-->
                    <!-- btn btn-default boton por defecto-->
                    <!-- px-4 py-5 pading x e y -->
                    <button type="submit" class="btn btn-default mb-sm-2 shadow p-3 mb-5 bg-body rounded px-3 py-2" name="submit">Enviar</button>
                </div>
            </div>
        </div>
    </form>
    <h3 style="text-align: center;">
        <?php

        if (isset($_POST)) {

            if (isset($_POST["submit"])) {
                totalVocals();
            }
        }

        ?>
    </h3>
    <br />
    <br />
</body>

</html>