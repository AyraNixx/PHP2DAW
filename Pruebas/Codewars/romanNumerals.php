<?php
function solution($roman)
{

    //Array asociativo con el valor de los numeros romanos
    $roman_numbers = ["I" => 1, "V" => 5, "X" => 10, "L" => 50, "C" => 100, "D" => 500, "M" => 1000];

    //Definimos una nueva variable que es en la que almacenaremos el valor del numero 
    //romano
    $number = 0;

    //Pasamos la cadena a mayuscula, la convertimos en array y obtenemos un array
    //asociativo con el numero de veces que aparece un caracter en dicha cadena
    $roman = array_count_values(str_split(strtoupper($roman)));

    //Recorremos el array roman
    foreach ($roman as $num => $val) {

        //Si hay una clave en el array_numbers que se llame como $num
        if (isset($roman_numbers[$num])) {

            //Cambiamos el valor de la clave, multiplicando este por el numero
            //de veces que aparece en la cadena introducida
            $roman_numbers[$num] = $roman_numbers[$num] * $val;
            
            if (current($roman) != null && $roman_numbers[$num] < $roman_numbers[key($roman)]) {

                $number -= ($roman_numbers[$num] * 2);
            }
            
            reset($roman);
        }
    }

    //return (array_sum(array_intersect_key($roman_numbers, $roman)) + $number);
}

echo solution("MMXVII");
