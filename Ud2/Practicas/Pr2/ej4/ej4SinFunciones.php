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
        if (isset($_POST)) {

            //Obtenemos el nombre introducido
            $name = $_POST["name"];

            //Definimos variables que usaremos como contadores
            $a = 0;
            $e = 0;
            $i = 0;
            $o = 0;
            $u = 0;

            //Definimos una variable para sacar cada palabra
            $palabra = "";
            //Un array para almacenar las palabras
            $palabras = array();
            //Pos para recordar la posicion en la que nos quedamos
            $pos = 0;

            //Recorremos la cadena name
            for ($x = 0; $x < (str_word_count($name)); $x++) {

                //Utilizamos otro bucle para recorrer de nuevo la cadena 
                //y sacar la palabra que corresponda
                for ($y = $pos; $y < strlen($name); $y++) {
                    //Concatenamos para sacar cada palabra   
                    $palabra = $palabra . $name[$y];

                    //Si el caracter coincide con un espacio en blanco,
                    //guardamos la posicion del siguiente caracter para que 
                    //el bucle empiece por el.
                    if ($name[$y] === " ") {
                        $pos = $pos + 1;
                        break;
                    }
                    //Sumamos contador
                    $pos++;
                }

                //Quitamos los espacios en blanco del principio y del final por si acaso
                $palabra = trim($palabra);

                //Recorremos la palabra y aumentamos los contadores de cada vocal según toque
                for ($j = 0; isset($palabra[$j]); $j++) {
                    switch ($palabra[$j]) {
                        case "a":
                            $a++;
                            break;
                        case "A":
                            $a++;
                            break;
                        case "e":
                            $e++;
                            break;
                        case "E":
                            $e++;
                            break;
                        case "i":
                            $i++;
                            break;
                        case "I":
                            $i++;
                            break;
                        case "o":
                            $o++;
                            break;
                        case "O":
                            $o++;
                            break;
                        case "u":
                            $u++;
                            break;
                        case "U":
                            $u++;
                            break;
                    }
                }

                //Mostramos la palabra y el total de vocales que hay en ella
                echo "<h5>Palabra -------->    $palabra</h5>";
                echo "<h6>Total de vocales  --->    " . ($a + $e + $i + $o + $u) . "</h6>";
                echo "<br/>";

                //Reiniciamos la palabra
                $palabra = "";
                //Reiniciamos las vocales
                $a = 0;
                $e = 0;
                $i = 0;
                $o = 0;
                $u = 0;
            }
        }
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
    <br>
    <br>
    <?php
    if (isset($_POST["submit"])) {
        totalVocals();
    }
    ?>
</body>

</html>