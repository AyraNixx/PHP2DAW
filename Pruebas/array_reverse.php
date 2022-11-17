<?php 

    //He leído que array_shift no es muy óptimo porque recorre
    //todo el array tan solo para quitar el primer elemento
    //así que vamos a realizar otra manera de hacerlo
    //aunque tampoco estoy muy segura de si compensa

    
    $prueba = ["chispa", "hello", 1, "world", "pepe", 45];



    $prueba = array_reverse($prueba);

    $first = array_pop($prueba);

    $prueba = array_reverse($prueba);

    var_dump($prueba);


    //Probemos con solo shift
    $prueba = ["chispa", "hello", 1, "world", "pepe", 45];

    //Lo hace del tirón, mirar a ver si es mejor esto o no
    array_shift($prueba);

    echo "<br>";
    var_dump($prueba);


?>