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

    function maxMin()
    {

        $numbers = $_POST["numbers"];
        $number = "";
        $max = 0;
        $min = 999999999999999999999999999999999999;

        //Recorremos toda la cadena y la concatenamos 
        for ($j = 0; $j < strlen($numbers); $j++) {
            if ($numbers[$j] !== " ")
                $number = $number . $numbers[$j];
        }

        if (!(is_numeric($number))) {
            echo "No se ha insertado un número";
        } else {
            //Reiniciamos $number
            $number = "";

            for ($i = 0; $i < strlen($numbers); $i++) {
                //Concatenamos los caracteres hasta que se encuentre con un espacio
                $number = $number . $numbers[$i];
                //Si se encuentra con un espacio
                if ($numbers[$i] === " ") {
                    //Comprobamos si $number es mayor o menor que $max y $min.
                    //Si lo es, se guardan.
                    if ($number > $max) {
                        $max = $number;
                    }

                    if ($number < $min) {
                        $min = $number;
                    }

                    $number = "";
                }

                //Si $i ha lleado al final, comprobamos el último número guardado
                //para ver si es máximo o mínimo.
                if ($i === strlen($numbers) - 1) {

                    if ($number > $max) {
                        $max = $number;
                    }

                    if ($number < $min) {
                        $min = $number;
                    }
                }
            }
            //Mostramos el resultado
            echo "Números introducidos ---> $numbers";
            echo "<br/>";
            echo "Máximo ---> $max";
            echo "<br/>";
            echo "Mínimo ---> $min";
        }
    }




    ?>
    <form method="POST" action="#">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <!-- Margenes con mb mr ml mt -sm-distancia-->
                    <!-- Misma linea -->
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <label for="numbers" class="col-lg-3 col-form-label">Números</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="numbers" name="numbers">
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
    <div style="display:flex; justify-content:center;" class="mt-4">    
        <div style="border: 1px solid black;" class="p-3"> 
            <?php

            if (isset($_POST)) {
                if (isset($_POST["submit"])) {
                    maxMin();
                }
            }
            ?>
        </div>
    </div>
</body>

</html>