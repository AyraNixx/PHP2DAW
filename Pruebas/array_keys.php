<?php

//Para que saque todas las claves
$array = array(0 => 100, "color" => "red");
print_r(array_keys($array));
//result -> array(0, color);

$array = array("blue", "red", "green", "blue", "blue");
//Para que solo saque aquellas que coincidan con la clave blue
print_r(array_keys($array, "blue"));


?>