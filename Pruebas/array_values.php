<?php
    $array = array("size" => "XL", "color" => "gold");

    //Quita las claves y te devuelve los valores
    $array = array_values($array);

    echo $array[0];
    echo "<br>";
    echo $array[1];