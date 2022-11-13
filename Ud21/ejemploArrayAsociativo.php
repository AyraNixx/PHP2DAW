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

    $juegos = ["title" => "Mario Bros", "year" => 1993, "score" => 9, "type" => "game"];

    //Esto haría que hubiera una nueva clave en el array asociativo
    $juegos["compañia"] = "Nintendo";
    ?>

    <select name="game" id="game">
        <?php
        foreach ($juegos as $elemento) {
            print "<option>$elemento</option>";
        }
        foreach ($juegos as $elemento => $valor) {
            print "<option>$valor</option>";
        }

        ?>
    </select>

    <?php


    $claves = array_keys($juegos);

    $nombres = ["pedro", "juan", "jose"];

    //la funcion array_push añade un nuevo elemento al final del array
    array_push($claves, "duracion");
    array_push($claves, "compañia");

    //Saca el ultimo elemento del array y lo elimina
    $elemento = array_pop($claves);

    echo "<br/>";
    echo var_dump($claves);
    echo "<br/>";
    //Unset destruye una variable pero si es una posicion de un array
    //tambien la elimina pero la posicion sigue existiendo 
    //lo que podría ocasionar errores al recorrer el array
    unset($claves[1]);
    echo "<br/>";
    echo var_dump($claves);
    echo "<br/>";

    //array_values() es el equivalente a aaray_keys, nos devuleve
    //todos los valores. En un array normal, quita los huecos 
    // que puede dejar la funcion unset() y los pone bien
    //
    array_values($claves);
    echo "<br/>";
    echo var_dump($claves);
    echo "<br/>";


    //Busca si se encuentra un elemento en el array. Se puede 
    //poner otro argumento que es un boolean para saber si
    //son del mismo tipo o no ("ejemplo el array tiene todos elementos
    //enteros pero yo digo que busque la cadena "1", pues si digo que 
    //tienen que ser del mismo tipo me va a decir que no lo ha encontrado
    //si no le indico que tiene que ser del mismo tipo po me lo encuentra)
    if(in_array("score", $claves))
    {
        print "score está en el array";
    }


    ?>
</body>

</html>