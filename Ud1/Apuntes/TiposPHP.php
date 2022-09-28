<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h2>PRACTICA PHP PT.1</h2>

    <?php

    $numero1 = "23";
    $numero2 = 4;

    # Utilizamos var_dump y observamos que considera numero1 como una cadena
    var_dump($numero1, $numero2);

    # Sin embargo, si los usamos en una operación, a veces detectará dicha cadena como número y realizará la cuenta. 
    # Hay que tener cuidado y poner paréntesis para indicar que tenga en cuenta antes la operación.
    echo "<br>" .($numero1 + $numero2);

    #Sirve para clases, objetos, arrays. Te indica de qué tipo es la variable
    var_dump(3.2);

    echo "<br>";

    #ARRAYS totalmente distintos a JAVA
    $cars = array("Volvo", "BMW", "Toyota");

    echo "<br>";

    var_dump($cars);

    # Para acceder a una posicion en especifica del array, utilizamos [] y la posicion en la que se encuentra el elemento
    # que queremos. Ni falta hace decir que la primera posicion es 0
    echo "<br>" . $cars[1];

    # Strlen() para conocer la longitud de la cadena
    $nombre_modulo = "Desarrollo entorno servidor";

    echo "<br> La longitud de la cadena es " .strlen($nombre_modulo);

    # Str_word_count() devuelve el numero de palabaras que tiene
    echo "<br> La cadena tiene " .str_word_count($nombre_modulo) ." palabras";

    # Strpos() busca la posicion en la que aparece por primera vez la cadena indicada
    echo "<br> La primera e se encuentra en la posición " .strpos($nombre_modulo, "entorno");

    # str_replace() Sustituye una subcadena de una cadena por otra. Ejemplo, si tenemos 'HOLA PEPE MALVAVISCO',
    # si queremos cambiar malvavisco por alejandro, pues lo utilizamos.
    echo "<br> Te cambio desarrollo por pepe " .str_replace("entorno", "pepe", $nombre_modulo);

    


































    ?>

</body>

</html>