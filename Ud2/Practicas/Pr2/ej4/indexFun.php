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

    function vocals($str)
    {
        //Pasamos la cadena a minúscula
        $str = strtolower(trim($str));
        //Para sacar el total de vocales
        $vocals = 0;

        //Recorremos la cadena y empleamos la función count_chars que 
        //nos devolverá el número de veces en las que aparece un caracter
        //en la cadena. Le ponemos 1 para que nos devuelva un array con 
        //aquellos caracteres que aparezcan al menos una vez (si no ponemos
        //nada, lo cuenta como 0 y nos muestra el numero de apariciones de todos)
        //
        //Si la clave (el caracter), corresponde con a, e, i, o, u
        //sumamos su valor (val), que es el el numero de veces que aparece
        foreach (count_chars($str, 1) as $i => $val) {
            switch (chr($i)) {
                case "a":
                case "e":
                case "i":
                case "o":
                case "u":
                    $vocals = $vocals + $val;
            }
        }
        return $vocals;
    }

    ?>
    <form method="POST" action="#">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <label for="name" class="col-lg-3 col-form-label">Nombre:</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default mb-sm-2 shadow p-3 mb-5 bg-body rounded px-3 py-2" name="submit">Enviar</button>
                </div>
            </div>
        </div>
    </form>
    <?php

    //Si se ha pulsado el botón
    if (isset($_POST["submit"])) {
        //Comprobamos que name no esté vacío
        if (isset($_POST["name"])) {
            //Convertimos la cadena recibida en array para almacenar cada palabra
            //y quitamos los espacios del principio y del final
            $name = explode(" ", trim($_POST["name"]));

            //Recorremos el array
            for ($i = 0; $i < count($name); $i++) {
                //Mostramos el número de vocales totales que hay en cada palabra
                //llamando a la función vocal() que recibe como argumento la palabra
                //de la cadena que corresponda.
                echo "<h6 class = 'px-5 pt-3'>-----" . ($i + 1) ." ª PALABRA: $name[$i] -----</h6>";
                echo "<p class = 'm-0 px-5'> Hay " . vocals($name[$i]) . " vocales en total</p>";
            }
        }
    }

    ?>
    <br />
    <br />
</body>

</html>