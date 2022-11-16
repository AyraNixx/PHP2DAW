<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Asociativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    <?php

    //Funcion que recibe como parámetro una cadena y devuelve la cadena 
    //como las posiciones de sus letras
    function alphabet_pos($str)
    {
        //Array asociativo con las posiciones de las letras en el abecedario
        $alphabet = array_combine(range("a", "z"), range(1, 26));

        //Pasamos a minúsculas
        $str = strtolower($str);

        //Definimos una nueva variable
        $new_str = "";

        //Recorremos la cadena
        for ($i = 0; $i < strlen($str); $i++) {
            //Recorremos el array alphabet, $letter corresponde a la clave
            //y $pos al valor
            foreach($alphabet as $letter => $pos)
            {
                //Si el caracter coincide con una clave del array
                if($str[$i] === $letter)
                {
                    //Concatenamos el valor de la clave
                    $new_str = $new_str . $pos;
                //Si hay un espacio, concatenamos un espacio para separar
                //las palabras.
                }elseif($str[$i] === " ")
                {
                    $new_str = $new_str . " ";
                }
            }
        }
        //Devolvemos la nueva cadena
        return $new_str;
    }
    ?>


    <form method="POST" action="#" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="str" name="str" placeholder="Escriba aquí...">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default mb-sm-2 shadow p-3 mb-5 bg-body rounded px-3 py-2" name="submit">Enviar</button>
                </div>
            </div>
        </div>
    </form>

    <div class="container mt-3 text-center">
        <!--Llamamos a la funcion y mostramos el resultado-->
        <?php
        //Si se ha pulsado el botón de enviar 
        if (isset($_POST["submit"])) {
            //Comprobamos que la cadena no esté vacía
            if (isset($_POST["str"])) {
                //Almacenamos la cadena
                $str = $_POST["str"];
                echo "<p>La cadena según las posiciones de las letras de cada palabra:</p>";
                echo"<h6>";
                    echo alphabet_pos($str);
                echo"</h6>";
            }
        }
        ?>

    </div>
</body>

</html>