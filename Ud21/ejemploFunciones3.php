<?php
    $nota  = 5.34345;

    //Formatea, le indicamos con %f que es un float.
    printf("la nota es %f", $nota);

    //Formatea, le indicamos con %f que es un float. SI ponemos .2, por ejemplo,
    //le indicamos que solo queremos que nos muestre los dos primeros decimales
    printf("\nla nota es %.2f", $nota);

    //Hace lo mismo que printf, pero en vez de mostrarlo por consola, te devuelve
    //la cadena formateada.
    $cadena = sprintf("la nota es %.2f", $nota);

    printf("\n");

    //Tabla acii, codigo de caracteres basicos que asocia un numero a un caracter.
    //Explicacion chorra de 1s
    //La funcion ord nos saca el codigo ascii correspondiente al caracter introducido
    print ord("a");

    //strcmp ordena la cadena de forma ordenada
    //Para ver si un texto está ordenado antes que otro.
    //Si devuelve 0, la primera cadena es mayor que la segunda
    if(strcmp("antonio fernandez", "Antonio Alba") < 0)
        print "\nantonio f va primero";
    else 
        print "\nAntonio a va primero";


    //trim, elimina los espacios del principio y del final
    //ltrim / rtrim elimina los espacions iniciales o finales (dependiendo del que elijas)
    $fraseT = " Hey que tal? ";
    $fraseT = trim($fraseT);

    print "\n-$fraseT-";

    //str_ (no me acuerdo)En la posicion en la que digas, te pone el caracter indicado las veces que quieras

    //strstr te busca una cadena desde la posicion que le has indicado y te la devuelve

    //ctype sirve para averiguar en una cadena de texto si hay letras, digitos, caracteres
    //puntuacion, alfanumericos, sin espacios, etc.
    //ctype_alpha, ctype_alnum, ctype_alnum, etc

    //implode pasa un array a cadena con un separador
    //explode coge un array y la convierte en cadena indicando el limitador de cada elemento
    $menu = ["Home", "Product", "About", " Gallery"];

    //Niceeeeeee
    $menuHtml = "<ol><li>" . implode("<li>", $menu) . "<li></ol>";

    print "\n\n" . $menuHtml;

    //strtok le pasamos como argumento la cadena y el separador y si queremos que 
    //nos saque el resto pues en el bucle ponemos strtok(separador);

    //substr_count() numero de veces que aparece una subcadena en una cadena
    //Esta me resuelve la vida en el poker
    $numVeces = substr_count($menuHtml, "<li>");
    print "\n$numVeces";

    //cadena, subcadena a buscar, offset y length
    $numVeces = substr_count($menuHtml, "<li>", 0, 20);
    print "\n$numVeces";

    //rand() random, mt_rand() mas rapido

    //max() min() son god

    





?>