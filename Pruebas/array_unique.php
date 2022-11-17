<?php

$prueba = [1, "hello", 1, "world", "hello"];

var_dump($prueba);

echo "<br>";

//Devuelve el array quitando los elementos repetidos, 
//solo deja uno de ellos
$prueba = array_unique($prueba);

var_dump($prueba);

echo "<br>";

foreach($prueba as $p => $val)
//Daría fallo porque el array unique deja el espacio
//Por lo tanto las pos serían 0 1 3.
//Al leer la posición 2 nos daría problemas
    echo $prueba[2];



//La manera más rápida de arreglar el hueco que ha dejado
//el array_unique, es emplear array_values para sacar los valores
//y los indexe numéricamente
$prueba = array_values($prueba);


echo "<br>";

var_dump($prueba);


//array_keys(array_flip($originalArray))


?>

