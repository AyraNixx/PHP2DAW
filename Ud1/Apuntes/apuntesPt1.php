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

    <?php
        $edad = 6;
        $nota = 4.56;
        $nombre_persona = "Pedro";

        echo "<h2>PRACTICAS DE PHP</h2>";

        //Ejemplo de concatenacion de cadenas y varuables utilizando .

        echo "La edad de " .$nombre_persona. " es " .$edad;
        echo "<br>" .$nombre_persona. "'s age is " .$edad;
        echo "<br>La nota de " .$nombre_persona. " es " .$nota;

        //COMENTARIOS
        //SIMPLES (Una sola línea) ----> // o #





        //VARIABLES
            #Solo pueden comenzar por letra o por guion bajo. Puede tener cualquier tipo de caracter alfanumérico (nada de asteriscos, puntos, etc).
            #Diferencia las minusculas de las mayusculas ---> MIRA no es igual que mira.
            #
            #Si ponemos global delante de una variable que esté definida dentro de una función
                #podemos acceder a ella desde fuera de la funcion. ES POCO RECOMENDABLE
                #Accedemos a caulquier variable del código independientemente de dónde se encuentre
            #STATIC. 
                #Sin tener inicializada la variable, puedes llamarla.
                #Se guarda el valor después de que ha sido usada. Por ejemplo, si la llamamos
                    #una vez, vale 0, si la llamamos otra vez valdrá 1 (EJEMPLO DE FUNCIÓN INCREMENTAL). 
                #Se suele usar más en videojuegos.

        


        //ECHO / PRINT (INCOMPLETO)
            #Dos formas para mostrar resultados con 'echo' 'print'.

            #Con printf podemos mostrar los valores formateados. Se emplea en la cadena de texto
                #un tanto por ciento y una letra que indica el tipo de dato.
                #Los tipos de datos más comunes 
                #Ejemplo:
                    # - %d --> Entero
                    # - %s --> String
                    # - %
            
            printf("<br>La nota de %s es %.2f", $nombre_persona, $nota);

        //TIPOS DE VARIABLES
            # String. 
                #Para saber la longitud de un String ya no se usa length, se usa st(?)
            #


        //MATH 
            # Enlace --> https://www.w3schools.com/php/php_ref_math.asp


        //CONSTANT
            # Son variables que no se pueden cambiar despues de definirlas
            # La forma más correcta de nombrarla es empezar con una letra o con
                # un guión bajo y escribirla en MAYÚSCULAS

            # Para definirla, usamos la función define y, entre paréntesis, ponemos
                # primero su nombre y luego su valor. Puede tener un tercer parámetro
                # para indicar si queremos que esta variable sea detectada independientemente
                # de si está en mayúscula o no. Por defecto, diferencia entre mayúsculas
                # y minúsculas
                
                define("PUNTOS_DE_VIDA", 100);

                echo "<br>" . PUNTOS_DE_VIDA;
    ?>

</body>

</html>