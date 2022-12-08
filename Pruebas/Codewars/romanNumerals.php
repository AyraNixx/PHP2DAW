<?php
function solution($roman)
{

    //Array asociativo con el valor de los numeros romanos
    $roman_numbers = ["I" => 1, "V" => 5, "X" => 10, "L" => 50, "C" => 100, "D" => 500, "M" => 1000];

    //Definimos una nueva variable que es en la que almacenaremos el valor del numero 
    //romano
    $number = 0;

    $roman = strtoupper($roman);

    for ($i = 0; $i < strlen($roman); $i++) {

        if (($i + 1) < strlen($roman)) {
            if ($roman_numbers[$roman[$i]] < $roman_numbers[$roman[$i + 1]]) {
                $number -= $roman_numbers[$roman[$i]];
            } else {
                $number += $roman_numbers[$roman[$i]];
            }
        }else{
            $number += $roman_numbers[$roman[$i]];
        }
    }

    echo $number;

    //return (array_sum(array_intersect_key($roman_numbers, $roman)) + $number);
}

echo solution("MMXVII");
