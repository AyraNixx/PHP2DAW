<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sin Funciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <form method="POST" action="#">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <label for="nombre" class="col-lg-3 col-form-label">Nombre:</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default mb-sm-2 shadow p-3 mb-5 bg-body rounded px-3 py-2" name="submit">Enviar</button>
                </div>
            </div>
        </div>
    </form>
    <br>
    <br>
    <?php
    if (isset($_POST["submit"])) {
        if (isset($_POST["name"])) {

            //Obtenemos el nombre introducido
            $name = $_POST["name"];

            //Definimos una variable que sirve como contador de vocales
            $vocals = 0;

            //Definimos una variable para sacar cada palabra
            $palabra = "";
            //Pos para recordar la posicion en la que nos quedamos
            $pos = 0;

            //Contador para el número de palabaras que hay
            //(no sé si en esta version puedo usar str_word_count para 
            //un bucle así que hago esto por si acaso)
            $palabras = 1;

            //Bucle que recorre la cadena para sacar el numero de palabras
            for($j = 0; $j < strlen($name); $j++)
            {
                if($name[$j] === " ")
                {
                    $palabras++;
                }
            }

            //Recorremos la cadena name
            for ($x = 1; $x < $palabras; $x++) {
                
                //Utilizamos otro bucle para recorrer de nuevo la cadena 
                //y sacar la palabra que corresponda
                for ($y = $pos; $y < strlen($name); $y++) {
                    //Concatenamos para sacar cada palabra   
                    $palabra = $palabra . $name[$y];

                    //Si el caracter coincide con un espacio en blanco,
                    //guardamos la posicion del siguiente caracter para que 
                    //el bucle empiece por el.
                    if ($name[$y] === " " ) {
                        $pos = $pos + 1;
                        break;
                    }
                    //Sumamos contador
                    $pos++;
                }

                //Quitamos los espacios en blanco del principio y del final por si acaso
                //he supuesto que esta función se puede usar en esta versión porque el 
                //enunciado habla de ella
                $palabra = trim($palabra);

                //Recorremos la palabra y aumentamos los contadores de cada vocal según toque
                for ($j = 0; isset($palabra[$j]); $j++) {
                    switch ($palabra[$j]) {
                        case "a":
                        case "A":
                        case "e":
                        case "E":
                        case "i":
                        case "I":
                        case "o":
                        case "O":
                        case "u":
                        case "U":
                            $vocals++;
                            break;
                    }
                }
                ?>

                <!--Mostramos la palabra y el total de vocales que hay en ella-->
                <div class="m-4">
                    <h6>Palabra --------><?=$palabra ?> </h6>
                    <p class="m-0">Total de vocales  --->    <?= $vocals ?> </p>                    
                </div>

                <?php

                //Reiniciamos la palabra
                $palabra = "";
                //Reiniciamos el contador $vocals
                $vocals = 0;
            }
        }
    }
    ?>
</body>

</html>