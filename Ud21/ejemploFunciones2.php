<?php 
    //include("ejemploFunciones.php");

    //Funciones tipadas (le indicamos el tipo de las variables y el tipo que nos va a devolver)
    function minimo(int $num1, int $num2) : int
    {
        return 1;
    }

    //declare(strict_types = 1); Si lo ponemos, tendremos que hacer las funciones
    //como la de arriba, si está en 0 significa que no tenemos que especificar el tipo


    //Cuando ponemos global, indicamos que s epuede acceder a dicha variable desde cualquier
    //sitio. Por ejemplo, si lo ponemos en una variable de una funcion, significa que esa
    //variable se puede usar desde cualquier parte del codigo

    $fraseT = "Esta es una frase muy tonta";

    /**
     * Función que recibe una frase y una letra y devuelve la cantidad
     * de veces que dicha letra aparece en la frase
     * 
     * @param frase cadena de búsqueda
     * @param letra letra a buscar
     */

     function ocurrencias($frase, $letra)
     {
        $frase = str_split($frase);

        //Array_count values comprueba todos los elementos de un array
        //y devuelve los elementos con su cantidad
        $frase = array_count_values($frase);

        return $frase[$letra];
     }

     echo ocurrencias($fraseT, 'a');
?>