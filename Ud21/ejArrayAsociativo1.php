<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    /*
    Realizar un programa que lea una frase y cuente las palabras con más de 5 caracteres
*/

    $frase = "Hola buenos días me llamo Pato";
    $numCar = 0;
    $numPalMayor5 = 0;

    for ($i = 0; $i < strlen($frase); $i++) {
        //Cuando hay una palabra? Cuando hay un espacio
        if ($frase[$i] == ' ') {
            $numCar = 0;
        } else {
            //Si no es un espacio incrementamos el tamaño de la palabra actual
            $numCar++;

            //Si llevamos 5 caracteres en la palabra actual incrementamos
            //el numero de palabras
            if ($numCar == 5) {
                $numPalMayor5++;
            }
        }
    }

    /**
     * Funcion que recibe una cadena con palabras y nos devuelve
     * el numero de palabras cuya longitud sea superior a la 
     * longitud recibida
     */
    function masDe5($frase, $longitud)
    {
        //Convierte una cadena en array. Va cortando cuando encuentra
        //el limitador indicado
        $palabras = explode(" ", $frase);

        $num_palabras = 0;

        foreach($palabras as $palabra)
        {
            if(strlen($palabra) >= $longitud)
            {
                $num_palabras++;
            }
        }

        return $num_palabras;
    }

    print "El numero de palabras mayor de 4 es de " . masDe5($frase, 4);

    $juegos = ["title" => "Mario Bros", "year" => 1993, "score" => 9, "type" => "game"];

    ?>

    <select name="game" id="game">
        <?php 
            foreach($juegos as $elemento)
            {
                print "<option>$elemento</option>";
            }
        ?>
    </select>
</body>

</html>