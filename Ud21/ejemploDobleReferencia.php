<?php 

    include("controller/global.php");

    $resultado = 20;

    //Hacemos referencia a la variable
    echo $resultado;

    //Podemos hacer referencia a una variable para que nos 
    //de el valor de otra
    $nombrevar = "resultado";

    //Nos sacaría el vallor de resultado porque es como poner
    //$($nombrevar) = $("resultado) = $resultado.
    echo $$nombrevar;

    //bucle que recorre con un índice un array que tenemos definido
    //en global.php
    for($i = 0; $i < count($variables); $i++)
    {
        print "$$variables[$i]\n";
    }

    //bucle for especificado para correr array o un conjunto
    //de elementos
    //bucle que recorre elementos del array
    foreach($variables as $variable)
    {
        print "$variable\n";
    }

    // foreach($nombre as $car)
    // {
    //     print "$car";
    // }

    //Usamos while para una condición de parada más complicada
    while($i < count($variables))
    {
        print "$variables[$i]\n";
        $i++;
    }
?>