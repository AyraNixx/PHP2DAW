<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1″ />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fecha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <?php

    date_default_timezone_set("Europe/Madrid");


    function show_message($birth_date, $time)
    {
        //El parámetro $birth_date corresponde a la fecha de nacimiento que 
        //nos pasan como argumento al llamar a la función show_message
        //así que con date, le indicamos que formatee la fecha para que solo
        //nos saquen el día, mes y la hora. 
        //Ejemplo --> FECHA DE NACIMIENTO: 1999-04-30 00:00:00 -->  -04-30 00:00:00
        //Birth_date se pasará como parámetro a la función birthday y ahí sacaremos
        //la fecha de su próximo cumpleaños
        $birth_date = date("-m-d H:i:s", strtotime($birth_date));
        //Sacamos la fecha actual con la hora que le hemos indicado en el formulario
        $current_date = date("Y-m-d H:i:s", strtotime($time));

        global $name;


        //Devolvemos el mensaje
        return "Bienvenido $name, " . season($current_date)
            . untilChristmass($current_date) . untilHolyWeek($current_date)
            . birthday($birth_date, $current_date);
    }



    function season($current_date)
    {
        //Hacemos un array asociativo para los rangos de fechas de las estaciones 
        //(No hace falta que pongamos Winter)
        $seasons = [
            "Sp" => [date("Y-03-20 H:i:s"), date("Y-06-20 H:i:s")],
            "Sm" => [date("Y-06-21 H:i:s"), date("Y-09-22 H:i:s")],
            "F"  => [date("Y-09-23 H:i:s"), date("Y-12-20 H:i:s")]
        ];

        //Comprobamos que $current_date se encuentra dentro del rango de Primavera          
        if ($current_date >= $seasons["Sp"][0] && $current_date <= $seasons["Sp"][1]) {
            return "estás en primavera ";
            //Si no cumple la primera condición, comprobamos si está dentro del rango
            //de Verano
        } elseif ($current_date >= $seasons["Sm"][0] && $current_date <= $seasons["Sm"][1]) {
            return "estás en verano ";
            //Si no lo cumple, vemos si está dentro del rango de Otoño
        } elseif ($current_date >= $seasons["F"][0] && $current_date <= $seasons["F"][1]) {
            return "estás en otoño ";
            //Si tampoco lo cumple, es invierno
        } else {
            return "estás en invierno ";
        }
    }


    function untilChristmass($current_date)
    {
        //Definimos una variable que nos devuelve la fecha de navidad con el formato 
        //que hemos querido darle. Ponemos "Y" a parte para sacar el año actual y lo 
        //concatenamos con el mes y día en el que se celebra la festividad.
        $christmas = date("Y") . "-12-25" . date(" H:i:s");


        //Con un condicional, comprobamos que la fecha actual no sea mayor o igual
        //que el día de navidad, en cuyo caso, le sumaremos un año a $christmas
        if ($current_date >= $christmas) {
            //Añadimos un año más
            $christmas = (date("Y") + 1)  . "-12-25" . date(" H:i:s");
        }

        //Con strtotime obtenemos enteros 
        //Dividimos el resultado entre 86400 segundos que corresponden a los segundos 
        //de un día completo (24 horas * 60 minutos * 60 segundos = 86400).
        $days_diff = (strtotime($christmas) - strtotime($current_date)) / 86400;

        //Devolvemos los días que quedan para Navidad
        return "quedan " . round($days_diff) . " días para las vacaciones de Navidad y ";

        //También podríamos haber creado un objeto DateTime y utilizar muchas de sus
        //como date_diff o modify para cambiar el año de la fecha de navidad si fuese
        //necesario aumentarle el año.
    }


    function untilHolyWeek($current_date)
    {
        //Para añadir la parte final de la frase
        $next_year = false;
        //Pascua sucede una semana después del inicio de la Semana Santa.
        //En PHP existe una función, easter_date que nos saca un timestamp
        //que corresponde a los segundos transcurridos desde el 1 de enero
        //de 1970 hasta la fecha indicada. 
        //Si usamos date, le damos formato a ese timestamp que obtenemos y
        //sacamos la fecha de inicio de Pascua
        $easter = date("Y-m-d H:i:s", easter_date(date("Y")));

        //Como hemos dicho Pascua sucede una semana después del inicio de Semana
        //Santa por lo que para obtener la fecha del inicio de Semana Santa,
        //le quitaremos una semana a $easter cuando lo usemos como argumento 
        //en el strtotime empleado para sacar el timestamp que emplearemos 
        //para sacar la fecha de inicio de Semana Santa.
        $holy_week = date("Y-m-d H:i:s", strtotime($easter . "-1 week"));

        //Con un condicional, comprobamos que la fecha actual no sea mayor o igual
        //que el día de inicio de Semana Santa, en cuyo caso, le sumaremos un año a 
        //$easter y modificaremos $holy_week para posteriormente averiguar los días
        //y horas que quedan hasta la próxima Semana Santa
        if ($current_date >= $holy_week) {
            //Añadimos un año más            
            $easter = date("Y-m-d H:i:s", easter_date(date("Y") + 1));
            $holy_week = date("Y-m-d H:i:s", strtotime($easter . "-1 week"));
            //Decimos que next_year es true para indicar que es el año que viene
            $next_year = true;
        }

        // //Con strtotime obtenemos timestamps que son enteros
        // //Dividimos el resultado entre 86400 segundos que corresponden a los segundos 
        // //de un día completo (24 horas * 60 minutos * 60 segundos = 86400).
        $diff = (strtotime($holy_week) - strtotime($current_date)) / 86400;

        //Con floor sacamos la parte entera resultante, que corresponde con los días 
        //que quedan hasta semana santa
        $days_diff = floor($diff);
        //Y para sacar las horas restantes, restamos el total obtenido ($diff) de los
        //días ($days_diff) y lo multiplicamos por 24, porque los días tienen 24h
        $hours_diff = round(($diff - $days_diff) * 24);

        //Dependiendo de si $next_year es true o false se saca un final de cadena 
        //distinto
        if ($next_year) {
            $end = " del año que vine.";
        } else {
            $end = ".";
        }

        //Devolvemos la frase con los días y horas que quedan para Semana Santa
        return "$days_diff días $hours_diff horas para vacaciones de Semana Santa$end";
    }




    function birthday($birth_date, $current_date)
    {
        //Obtenemos la fecha del cumpleaños de este año
        $birthday = date("Y") . $birth_date;

        //Si el cumpleaños ya ha pasado, se le suma un año
        if ($birthday <= $current_date) {
            $birthday = (date("Y") + 1) . $birth_date;
        }
 
        //Definimos una variable para almacenar la fecha formateada con el formato
        //que queremos
        //Utilizamos la clase IntleDateFormatter para formatear la fecha
        $date = IntlDateFormatter::formatObject(
            //El primer parámetro (necesario) es un objeto de tipo DateTime 
            //le pasamos $birthday para indicar la fecha que queremos que 
            //represente
            new DateTime($birthday),
            //Luego, poneemos el formato que queremos que nos saque
            "EEEE, dd 'de' MMMM 'del' yy",
            //La configuración regional a usar
            'es_ES');

        //Sacamos el número de la semana en el que cae el cumpleaños (7 es domingo,
        //1 es lunes)
        $day_week = date("N", strtotime($birthday));

        //Si $day_week es 6 o 7, significa que cae en finde 
        if ($day_week == 6 || $day_week == 7) {
            return " Tu cumpleaños cae en fin de semana y es el día $date";
        } else {
            return " Tu cumpleaños no cae en fin de semana y es el día $date";
        }
    }





    ?>
    <form method="POST" action="#">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <div class="col-lg-6">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <div class="col-lg-6">
                            <label for="date">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                    </div>
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <div class="col-lg-6">
                            <label for="time">Hora</label>
                            <input type="time" class="form-control" id="time" name="time">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3 mx-1">
                <button type="submit" class="btn btn-primary w-25" name="submit">Enviar</button>
            </div>
        </div>
    </form>
    <div class="container mt-3 text-center">
        <!--Llamamos a la funcion y mostramos el resultado-->
        <?php
        //Si se ha pulsado el botón de enviar 
        if (isset($_POST["submit"])) {
            //Comprobamos que la cadena no esté vacía
            if (isset($_POST["date"]) && isset($_POST["time"])) {

                $name = $_POST["name"];

                $date = $_POST["date"];
                $time = $_POST["time"];

                echo show_message($date, $time);
            }
        }
        ?>

    </div>
</body>

</html>