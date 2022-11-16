<?php 

    //Array_combine permite combinar dos arrays distintos, el primero representa a las 
    //claves y el segundo al valor
    //Por ejemplo, podemos usarlo para crear un array con las posiciones de las letras
    //en el abecedario
    $alphabet = array_combine(range("a", "z"), range(1, 26));

    foreach($alphabet as $letter => $pos)
        echo "$letter: $pos <br/>";

?>