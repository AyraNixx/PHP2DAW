<!DOCTYPE html>
<html lang="en">
<head>

    <?php
        //$RUTACSS = $_REQUEST["PathCss"];
        //$template = $_REQUEST["cssTemplate"];
    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--Podemos llamar a las varianles para llamar al css ('-->
    <link rel="stylesheet" type="text/css" media="screen" href='<?php //echo "$RUTACSS/$template"?>'>
    <script src="main.js"></script>
</head>
<body>
    <?php
    $cad1="12";
    $num1=12;

        //Cuando hagamos un condicional, por ejemplo, siempre usamos llaves aunque se
        //puedan poner sin llaves en algunas ocasiones.


        //Comparador doble. Convierte las variables al mismo tipo si fuese posible. Por lo tanto
        //nos diría que son iguales
        if($cad1 == $num1)
        {
            echo "Las variables son iguals";
        }else{
            echo "Las variables son distintas";
        }

        //Comparador doble. Comprueba que sean iguales, no cambia el tipo aunque pudiese.
        //Nos diría que son distintas
        if($cad1 === $num1)
        {
            echo "Las variables son iguals";
        }else{
            echo "Las variables son distintas";
        }

        //Cuando haya muchas condiciones, podemos usar el switch


        //BUCLES
        //while --> Se usa más para controlar acciones infinitas (?). Por ejemplo, un menú
              //--> No podemos olvidarnos nunca de la condición para que siga funcionando 
                //el bucle
        //for --> Se utiliza más un for que un while pero tampoco te olvides de ella
        //do-while --> El código del bucle lo hace al menos una vez y luego la sigue haciendo
                    // según la condición.

        //Tenemos que intentar evitar usar el break (sale del bloque de código del bucle,
        //es decir, sale del bucle (?)) y el continue ().        
    ?>
    <br/>
    <!--Select de la edad con los numeros pares-->
    <label for="edad_1">EDAD</label>
    <select name="edad_1" id="edad_1">
    <?php 
            //
            for($i = 0; $i <= 120; $i++){
                //Si es impar saltamos y no lo añadimos al despegable.
                //Con continue, le decimos que si no cumple con la condición salte
                //y pruebe con otro. Si usasemos break, terminaría en el momento en el 
                //que encuentre un impar
                if($i%2 != 0);
                {                            
                    print("<option value= '$i'>$i</option>");
                }
            }
    ?>
    </select>
    <select name="edad_2" id="edad_2">
        <?php         
            //
            for($i = 0; $i <= 120; $i++){
                //Si es impar saltamos y no lo añadimos al despegable.
                //Con continue, le decimos que si no cumple con la condición salte
                //y pruebe con otro. Si usasemos break, terminaría en el momento en el 
                //que encuentre un impar
                if($i%2 != 0) continue;
                {                            
                    print("<option value= '$i'>$i</option>");
                }
            }


            //ARRAY
            //En php no existe el problema que teníamos con los arrays en java.
            //no tenemos que indicar como de grande es el array.
            
        ?>
    </select>
    <!--Este es un div que hizo y que quitó después de poner <?php ?> pero no lo he quitado
    aún-->
    <!--<div class="header">
        <ol class="menu_1" type="circle">

        </ol>
    </div>-->
</body>
</html>