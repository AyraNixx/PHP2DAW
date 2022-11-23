<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    <?php


    //Función que verifica si las condiciones relacionadas con los hijos
    //se cumplen
    function cumpleHijos($children)
    {
        //Contador
        $contador = 0;

        //Definimos media;
        $media = 0;
        //Creamos un array asociativo que es el que se va a devolver
        $array = ["cumpleCondiciones" => false, "media" => 0];
        //Pasamos la cadena a array y establecemos como delimitador
        //el salto de línea.
        $children = explode("\n", $children);


        //Con un bucle, convertimos cada cadena de hijo en un array
        //empleando la función explode
        foreach ($children as $child => $val) {
            $children[$child] = explode(" ", trim($val));
        }

        //Recorremos el array para comprobar si son mayores de 
        //14 año o si tienen una minusvalia
        foreach ($children as $child) {
            //La edad es en la posición 1 y la minusvalía en la posicion
            //3. 
            if (($child[1] < 14) || (strtoupper($child[3]) == "S")) {
                //Si hay un hijo que cumpla con estas condiciones
                $contador += 1;
            }

            //Sumamos todas las edades de todos los hijos
            $media += $child[1];
        }

        //Dividimos media entre la longitud de $children, que representa
        //el numero de hijos que hay
        $media /= count($children);

        //Le damos a la clave media del array 'array' el valor de $media
        $array["media"] = $media;

        if ($contador >= 1) {
            //Le damos a la clave cumpleCondiciones del array 'array' el valor de true
            //si se cumple que contador es mayor que 1
            $array["cumpleCondiciones"] = true;
        }
        //Devolvemos el array
        return $array;
    }




    // Función que verifica si las condiciones relacionadas con  el domicilio
    // se cumplen
    function cumpleDomicilio($addres)
    {

        //Contador
        $provincias = 1;

        //Creamos un array asociativo que es el que se va a devolver
        $array = ["provincias" => false, "masCasas" => false];

        //Pasamos la cadena a array y establecemos como delimitador
        //el salto de línea.
        $addres = explode("\n", $addres);

        //Con un bucle, convertimos cada cadena de domicilio en un array
        //empleando la función explode
        foreach ($addres as $house => $val) {
            $addres[$house] = explode(" ", trim($val));
        }

        //Recorremos el array para comprobar si hay viviendas en 
        //una localidad distina
        for ($i = 0; $i < count($addres); $i++) {

            //Mientras que $i + 1 sea menor que la longitud del array
            if(($i + 1) < count($addres))
            {
                //Comprobamos la provincia del domicilio actual con el del siguiente
            //     //si son iguales, se suma provincia
                if (strtolower($addres[$i][0]) == strtolower($addres[$i + 1][0])) {
                    $provincias += 1;
                }
            }
        }

        //Si no tiene una casa en más de una provincia
        if ($provincias == 1) {
            //Se le da a la clave "provincias" del array $array, el valor de true;
            $array["provincias"] = true;
        }

        //Si el array $addres tiene más de dos elementos
        if (count($addres) <= 2) {
            //Se le da a la clave "masCasas" del array $array, el valor de true;
            $array["masCasas"] = true;
        }

        //Devolvemos el array
        return $array;
    }

    ?>

    <div class="container mb-sm-2 mt-sm-2"">

    <?php

    //Comprobamos que $_POST no esté vacío
    if (isset($_POST)) {
        //Sacamos las variables
        $name = $_POST["name"];
        $age = $_POST["age"];
        $civil = $_POST["civil"];
        $salary = $_POST["salary"];
        $child = $_POST["child"];
        $addres = $_POST["addres"];        

        //Obtenemos los arrays generados al pasar como argumentos
        //$child y $addres a cumpleHijos() y cumpleDomicilio 
        //respectivamente.
        $children_array = cumpleHijos($child);
        $addres_array = cumpleDomicilio($addres);

        // $addres_array = cumpleDomicilio($addres);

        //Comprobamos que es mayor de edad
        if ($age >= 18) {
            echo "<p style = 'background: green;'> Es mayor de edad </p>";
        } else {
            echo "<p style = 'background: red;'> Es mayor de edad </p>";
        }



        //Si miramos si su estado civil es casado
        if ($civil === "casado") {
            echo "<p style = 'background: green;'> Es casado </p>";
            //Si no lo cumple    
        } else {
            echo "<p style = 'background: red;'> Es casado </p>";
        }




        //Comprobamos si su sueldo
        //es mayor que 10000 pero menor que 30000
        if ($salary >= 10000 && $salary <= 30000) {
            echo "<p style = 'background: green;'> Tiene un sueldo mayor de 10000 y menor de 30000 </p>";
            //Si no se cumple
        } else {
            echo "<p style = 'background: red;'> Tiene un sueldo mayor de 10000 y menor de 30000 </p>";
        }


        //Si el valor de la clave de cumpleConiciones del array
        //asociativo $children_array es true, cumple la condicion
        if (($children_array["cumpleCondiciones"]) == true) {
            echo "<p style = 'background: green;'> Tiene 2 hijos menores de 14 o uno con minusvalía </p>";
            //Si no la cumple
        } else {
            echo "<p style = 'background: red;'> Tiene 2 hijos menores de 14 o uno con minusvalía </p>";
        }

        //Si el valor de la clave "provincias" del array asociativo
        //$addres_array es true, cumple la condicion
        if($addres_array["provincias"] == true)
        {
            echo "<p style = 'background: green;'> No tiene casas en provincias distintas </p>";    
        //Si no la cumple
        }else{
            echo "<p style = 'background: red;'> No tiene casas en provincias distintas </p>";    
        }


        //Si el valor de la clave masCasas del array asociativo 
        //$addres_array es true, cumple con la condición
        if($addres_array["masCasas"] == true)
        {
            echo "<p style = 'background: green;'> No tiene más de dos casas </p>";    
        }else{
            echo "<p style = 'background: red;'> No tiene más de dos casas </p>";    
        }


    }

    ?>
    </div>

</body>

</html>