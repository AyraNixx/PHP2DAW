<?php
    $num3 = 4;

    function suma($num1, $num2)
    {
        //Una de las cosas que java no permite pero php sí, es que no puede cambniar
        //de tipo
        print($num1 + $num2);
    }

    //En la definicion de la funcion es parametro y lo que se pasa argumentos
    function suma2($num1, $num2)
    {
        global $num3;
        //Una de las cosas que java no permite pero php sí, es que no puede cambniar
        //de tipo
        return $num1 + $num2 + $num3;
    }

    //Paso por referencia. Ahora, al poner &($variable).
    //Eso hace que el valor de la variable pasada como argumento pueda ser modificada
    function suma3($num1, $num2, &$resultado)
    {
        global $num3;
        //Una de las cosas que java no permite pero php sí, es que no puede cambniar
        //de tipo
        $resultado =  $num1 + $num2 + $num3;

        print $resultado;
    }

    function maximo(int $num1, int $num2, int $num3)
    {
        return max($num1, $num2, $num3);
    }

    //Cuando pasamos los valores a la funcion se les dice argumentos no parametros
    suma(8, $num3);

    print "\nNum3 vale $num3";

    suma(8, $num3);

    echo maximo(1, 8, 19);


?>