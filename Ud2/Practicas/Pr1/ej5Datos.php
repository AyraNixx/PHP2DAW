<?php
//Comprobamos que el POST no esté vacío
if (isset($_POST)) {
    //Obtenemos los nombres de los jugadores
    $players = [$_POST["player1"], $_POST["player2"]];

    //Definimos 4 variables para sacar las tiradas de cada jugador
    $dice11 = rand(1, 6);
    $dice12 = rand(1, 6);
    $dice21 = rand(1, 6);
    $dice22 = rand(1, 6);

    //Mostramos lo que ha sacado cada jugador con echo y la etiqueta img
    echo "<h2>" . $players[0] . " ha sacado: </h2>";
    echo "<img src='caradado/dice" . $dice11 . ".png'>";
    echo "<img src='caradado/dice" . $dice12 . ".png'>";
    echo "<h2>" . $players[1] . " ha sacado: </h2>";
    echo "<img src='caradado/dice" . $dice21 . ".png'>";
    echo "<img src='caradado/dice" . $dice22 . ".png'>";

    //Comprobamos si los dados del primer jugador son pareja
    if (($dice11 === $dice12) && ($dice21 !== $dice22)) {
        //Si son pareja, gana el primer jugador
        echo "<h1>" . $players[0] . " es el ganador</h1>";
    //Si la primera condición no se cumple, comprobamos que los 
    //dados del segundo jugador sean pareja
    } elseif (($dice11 !== $dice12) && ($dice21 === $dice22)) {
        //Si son pareja, gana el segundo jugador
        echo "<h1>" . $players[1] . " es el ganador</h1>";
    //Si no se cumple, comprobamos que tanto el primer jugador como
    //el segundo han sacado pareja
    } elseif (($dice11 === $dice12) && ($dice21 === $dice22)) {
        //Si ambos han sacado pareja, comprobamos quién de los dos
        //ha sacado la mejor pareja
        if (($dice11 + $dice12) === ($dice21 + $dice22)) {
            echo "<h1>Empate, gana tanto {$players[0]} como {$players[1]}</h1>";
        } elseif (($dice11 + $dice12) > ($dice21 + $dice22)) {
            echo "<h1>" . $players[0] . " es el ganador</h1>";
        } else {
            echo "<h1>" . $players[1] . " es el ganador</h1>";
        }
    //Si ninguno ha sacado pareja, vemos quién ha obtenido la mejor
    //tirada
    } else {
        if (($dice11 + $dice12) === ($dice21 + $dice22)) {
            echo "<h1>Empate, gana tanto {$players[0]} como {$players[1]}</h1>";
        } elseif (($dice11 + $dice12) > ($dice21 + $dice22)) {
            echo "<h1>" . $players[0] . " es el ganador</h1>";
        } else {
            echo "<h1>" . $players[1] . " es el ganador</h1>";
        }
    }
}

            // //La funcion foreach toma el array asociativo tiradas y lo recorre, alamcenando
            // //en cada vuelta la clave en tiradas y el valor de dicha clave en valor
    // foreach ($tiradas as $tirada => $valor)
    // {                
    // }
