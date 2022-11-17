<?php 

    $prueba = [1, "hello", 1, "world", "hello"];

    //Cuenta todos los valores de un array, recuenta
    //Si hay elementos iguales en el array te dice 
    //cuántos hay en total
    $values_count = array_count_values($prueba);

    //Si recorremos el array, podemos ver el recuento de elementos
    foreach($values_count as $i => $count)
    {
        echo "$i: $count<br>";
    }

?>