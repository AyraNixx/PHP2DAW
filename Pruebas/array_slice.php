<?php
$entrada = array("a", "b", "c", "d", "e");

$salida = array_slice($entrada, 2);      // devuelve "c", "d", y "e"
$salida = array_slice($entrada, -2, 1);  // devuelve "d"
$salida = array_slice($entrada, 0, 3);   // devuelve "a", "b", y "c"

// observe las diferencias en las claves de los arrays
print_r(array_slice($entrada, 2, -1));
print_r(array_slice($entrada, 2, -1, true));
print_r(array_slice($entrada, -1, 1, true));
?>