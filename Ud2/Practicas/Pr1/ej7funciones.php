    <?php
    //Array con todas las cartas disponibles
    $cartas = [
        1 => "As de corazones", 2 => "Dos de corazones", 3 => "Tres de corazones", 4 => "Cuatro de corazones", 5 => "Cinco de corazones",
        6 => "Seis de corazones", 7 => "Siete de corazones", 8 => "Ocho de corazones", 9 => "Nueve de corazones", 10 => "Diez de corazones", 11 => "Jota de corazones", 12 => "Reina de corazones", 13 => "Rey de corazones",
        14 => "As de tréboles", 15 => "Dos de tréboles", 16 => "Tres de tréboles", 17 => "Cuatro de tréboles", 18 => "Cinco de tréboles",
        19 => "Seis de tréboles", 20 => "Siete de tréboles", 21 => "Ocho de tréboles", 22 => "Nueve de tréboles", 23 => "Diez de tréboles", 24 => "Jota de tréboles", 25 => "Reina de tréboles", 26 => "Rey de tréboles",
        27 => "As de diamantes", 28 => "Dos de diamantes", 29 => "Tres de diamantes", 30 => "Cuatro de diamantes", 31 => "Cinco de diamantes",
        32 => "Seis de diamantes", 33 => "Siete de diamantes", 34 => "Ocho de diamantes", 35 => "Nueve de diamantes", 36 => "Diez de diamantes", 37 => "Jota de diamantes", 38 => "Reina de diamantes", 39 => "Rey de diamantes",
        40 => "As de picas", 41 => "Dos de picas", 42 => "Tres de picas", 43 => "Cuatro de picas", 44 => "Cinco de picas",
        45 => "Seis de picas", 46 => "Siete de picas", 47 => "Ocho de picas", 48 => "Nueve de picas", 49 => "Diez de picas", 50 => "Jota de picas", 51 => "Reina de picas", 52 => "Rey de picas"
    ];

    //Función que crea los selects, recibe como parametros el array de cartas y 
    //el numero que corresponde al Select que se esté creando para seleccionar 
    //una carta
    function cartaSelect($cartas, $numSelect)
    {

        //Recorremos el array de cartas con un bucle foreach
        foreach ($cartas as $carta => $valor) {

            //Si la clave es 1, 14, 27 o 40
            //creamos unos options sin value para que sea 
            //más fácil diferenciar cuando empieza 
            //un nuevo palo.
            switch ($carta) {
                case 1:
                    echo "<select name=$numSelect>";
                    echo "<option value=''>Elige una carta</option>";
                    echo "<option value=''> </option>";
                    echo "<option value=''>---CORAZONES---</option>";
                    echo "<option value=''> </option>";
                    break;
                case 14:
                    echo "<option value=''> </option>";
                    echo "<option value=''>---TRÉBOLES---</option>";
                    echo "<option value=''> </option>";
                    break;
                case 27:
                    echo "<option value=''> </option>";
                    echo "<option value=''>---DIAMANTES---</option>";
                    echo "<option value=''> </option>";
                    break;
                case 40:
                    echo "<option value=''> </option>";
                    echo "<option value=''>---PICAS---</option>";
                    echo "<option value=''> </option>";
                    break;
            }

            //Con cada vuelta del bucle foreach, se creará un option
            //que tendrá como value la clave pero mostrará el valor
            //de la clave (ejemplo: <option value=1> As de corazones </option>)
            echo "<option value='$carta'>" . $valor . "</option>";

            //Si la clave que toca corresponde a 52 (la última)
            if ($carta === 52) {
                //Cerramos el select
                echo "</select>";
            }
        }
    }

    //Función que genera los 5 selects
    function generarSelects($cartas)
    {
        //Hacemos un bucle for que funciona hasta llegar a 5
        for ($i = 0; $i < 5; $i++) {
            //En cada vuelta, creamos un select llamando a la funcion cartaSelect
            echo "<h2>Carta $i</h2>";
            echo "<div class='form-group'>" . cartaSelect($cartas, "carta" . ($i + 1)) . "</div>";
        }
    }

    //Funcion que devuelve true si la mano es Color, devuelve false si no es Color
    function color($cartasSelect)
    {
        
        //Definimos cuatro variables que nos servirán como contadores
        $heart = 0;
        $clover = 0;
        $diamond = 0;
        $spade = 0;

        //ordenamos el array
        sort($cartasSelect);

        //Creamos un bucle foreach que recorrerá el array que contiene todas 
        //las cartas que hemos seleccionado para nuestra mano
        foreach ($cartasSelect as $valor) {
            //Con un switch, vemos si la carta está comprendida entre 1 - 13 (corazones),
            //14 - 26 (tréboles), 27 - 39 (diamantes) o 40 - 52 (picas) y con 
            //los contadores comprobamos cuántas cartas tenemos en la mano que 
            //pertenezcan a un mismo palo
            switch ($valor) {
                case 1:
                case 2:
                case 3:
                case 4:
                case 5:
                case 6:
                case 7:
                case 8:
                case 9:
                case 10:
                case 11:
                case 12:
                case 13:
                    $heart++;
                    break;
                case 14:
                case 15:
                case 16:
                case 17:
                case 18:
                case 19:
                case 20:
                case 21:
                case 22:
                case 23:
                case 24:
                case 25:
                case 26:
                    $clover++;
                    break;
                case 27:
                case 28:
                case 29:
                case 30:
                case 31:
                case 32:
                case 33:
                case 34:
                case 35:
                case 36:
                case 37:
                case 38:
                case 39:
                    $diamond++;
                    break;
                case 40:
                case 41:
                case 42:
                case 43:
                case 44:
                case 45:
                case 46:
                case 47:
                case 48:
                case 49:
                case 50:
                case 51:
                case 52:
                    $spade++;
                    break;
            }
        }

        //Si las 5 cartas son del mismo color devolvemos true, en caso contrario, false
        if ($heart === 5) {
            return true;
        } elseif ($clover === 5) {
            return true;
        } elseif ($diamond === 5) {
            return true;
        } elseif ($spade === 5) {
            return true;
        } else {
            return false;
        }
    }

    //Funcion que comprueba si la mano es escalera
    function escalera($cartasSelect)
    {
        //creamos una variable llamada $escalera que nos devolverá true
        $escalera = true;

        //Ordenamos los valores del array de menor a mayor con la funcion
        //sort
        sort($cartasSelect);

        //Recorremos el array de las cartas que hemos seleccionado
        for ($i = 0; $i < count($cartasSelect); $i++) {

            //Si i es igual a 0 o si la siguiente posicion es menor que la longitud del 
            //array, comprobamos si al restar el valor de la siguiente carta
            //menos la primera carta es distinto de 1, si es distinto, devolvemos false.
            //Si es 1, escalera vale true
            if (($i === 0) || (($i + 1) < count($cartasSelect))) {
                if (($cartasSelect[$i + 1] - $cartasSelect[$i]) !== 1) {
                    $escalera = false;
                    return $escalera;
                } else {
                    $escalera = true;
                }
            }
        }

        //Devolvemos escalera
        return $escalera;
    }

    //Funcion que comprueba si la mano es poker
    function poker($cartas, $cartasSelect)
    {
        //Definimos una variable que es la que va a a guardar en forma de cadena
        //las primeras palabras de cada carta (ej.: As de corazones, se queda con 
        //'As').
        $str_card = "";

        //Recorremos el array de cartas que hemos seleccionado
        foreach($cartasSelect as $valor)
        {
            //Con la función strtok, obtnemos la primera palabra del
            //valor del array asociativo que hemos obtenido al poner
            //la clave de la carta.
            //Concatenamos la cadena separando con un espacio
            $str_card = $str_card . " " . strtok($cartas[$valor], " ");
        }

        //Con la función explode, convertimos la cadena en array y le indicamos
        //que tome como elementos todo lo que haya hasta el espacio
        $str_card = explode(" ", $str_card);

        //Con el array_shift quitamos el primer elemento del array que era
        //un espacio en blanco por concatenar
        array_shift($str_card);

        //Con la funcion array_unique eliminamos todos los elementos del array
        //que se repitan dejando solo uno, es decir, si tenemos 4 'As', nos quedamos
        //con solo uno. 
        //Con la función count comprobamos que la longitud del array es 2. Esto lo
        //hacemos porque tenemos 5 cartas y se supone que para que sea poker 4 deben de 
        //ser iguales, si eliminamos los elementos que son iguales del array para quedarnos
        //con uno solo de ellos, tendrías uno que corresponde a la carta diferente y otro
        //que corresponde con la carta que se ha repetido 4 veces.
        if(count(array_unique($str_card)) === 2)
        {
            return true;
        }else{
            return false;
        }
        
    }

    //Funcion que muestra las cartas que hemos elegido
    function mostrarCarta($cartasSelect)
    {        
        sort($cartasSelect);
        echo "<div class = cartas>";
        foreach ($cartasSelect as $carta) {
            echo "<img src='cartaspoker/" . $carta . ".png'>";
        }
        echo "</div>";
    }

    //Funcion que devuelve true si no se repite ninguna carta y false si se repite
    function cartaRepetida($cartasSelect)
    {
        //Usamos array_unique para que nos devuelva un array con 
        //valores únicos. Luego, comparamos la longitud del array
        //normal al del array con valores únicos y si sale que es
        //mayor, significa que hay repetidos
        if (count($cartasSelect) > count(array_unique($cartasSelect))) {
            return false;
        } else {
            return true;
        }
    }
?>