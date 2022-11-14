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
    //---------------------- DATE() APUNTES(PARA MÍ)------------------------------
    //
    //
    //La función date nos permite generar una cadena 
    //con la fecha y hora del sistema. Puede recibir uno o dos argumentos (o ninguno
    //y que te devuelva un array asociativo).
    //El primero indica el formato de la fecha, por ejemplo, le podemos decir
    //que queremos día/mes/año poniendo d/m/Y. El segundo, la fecha que queremos
    //convertir (si no ponemos esto, nos saca la actual).
    //Según el caracter que pongamos, tendrá un formato u otro.
    //
    //
    //d --> día (del mes)       j ---> día (sin 0 delante)      D ---> nombre corto (3letras)
    //                          I ---> nombre día completo      t ---> días totales del mes                               
    //                          N ---> n.º del día de la semana (domingo: 7, lunes: 1)
    //                          z ---> n.º día del año
    //m --> mes (num)           n ---> mes (sin 0 delante)      M ---> nombre corto (3letras)
    //                          F ---> nombre mes completo      
    //Y --> año (4 cifras)      y ---> año (2 cifras)   
    // 
    //h --> hora (12h)          H ---> hora (24h)               i ---> minutos      s ---> segundos
    //(lo mismo pero sin cero delante)  g --> hora (12h)      G ---> hora (24h)
    //
    //
    //
    //Otros valores que podemos utilizar:
    //- Fecha completa en formato RFC 2822 (Ejemplo: 01 jun 2016 14:31:46 -0700.)
    // Se emplea ---> r
    //- Fecha completa formato ISO 8061 (Ejemplo: 2022-11-13T19:33:08+01:00)
    //Se emplea ---> c
    //
    //
    //
    //
    //---------------------- STRFTIME() APUNTES(PARA MÍ)------------------------------
    //
    //
    //La función date nos permite generar una cadena 
    //con la fecha y hora del sistema. Puede recibir uno o dos argumentos
    //El primero indica el formato de la cadena. El segundo, la fecha que queremos
    //convertir (si no ponemos esto, nos saca la actual).
    //Según el caracter que pongamos, tendrá un formato u otro.
    //
    //
    //%d --> día (del mes)      %a ---> nombre corto (3letras)
    //                          %A ---> nombre día completo      
    //%m --> mes (num)          %b ---> nombre corto (3letras)
    //                          %B ---> nombre mes completo      
    //%Y --> año (4 cifras)     %y ---> año (2 cifras)    
    //
    //%I --> hora (12h)         %H ---> hora (24h)      %M ---> minutos     %S ---> segundos    
    //
    //Otros valores:
    //
    //- %c --> fecha y hora (dd/mm/aaaa hh:mm:ss)	
    //
    //- %x --> fecha (dd/mm/aaaa)
    //
    //- %X --> hora (hh:mm:s)
    //
    //
    //
    //
    //---------------------- LOCALTIME() APUNTES(PARA MÍ)------------------------------
    //
    //
    //Devuelve un array con info. acerca de la fecha y hora actual.
    //Se le pasa como argumento, la función time() y el segundo 
    //argumento indica si tiene índices asociativos
    //
    //
    //Claves asociativas: 
    //  -   "tm_sec"  --->  segundos,   0 - 59
    //  -   "tm_min"  --->  minutos,    0 - 59
    //  -   "tm_hour" --->  horas,      0 a 23
    //  -   "tm_mday" --->  día (mes),  1 a 31
    //  -   "tm_mon"  --->  mes (año),  0 (Ene) a 11 (Dic)
    //  -   "tm_year" --->  años,       desde 1900
    //  -   "tm_wday" --->  día (week), 0 (dom) a 6 (sáb)
    //  -   "tm_yday" --->  día (año),  0 a 365
    //  -   "tm_isdst"--->  ¿horario verano? Valor positivo si sí, valor - si no.           
    //
    //
    //
    //
    //---------------------- CHECKDATE() APUNTES(PARA MÍ)------------------------------
    //
    //
    //Devuelve true si la fecha es correcta según el calendario Gregoriano.
    //False, si no.
    //Se aplicó en muchos países el 15 de octube de 1582, así que es mejor
    //no usarlo para fechas anteriores porque podrían no ser válido
    //
    //
    //
    //---------------------- GETDATE() APUNTES(PARA MÍ)------------------------------
    //
    //Nos devuelve un array asociativo con distintas variables respecto a la fecha
    //Ejemplo, día de la semana (su nombre)








    function calcularFecha($date, $time)
    {
        //Establecemos el uso horario que tendrán las funciones de fecha y hora
        date_default_timezone_set("Europe/Madrid");

        //Obtenemos la fecha actual con la hora que hemos introducido
        $current_date = date("d/m/Y H:i:s", strtotime($time));

        //Creamos un objeto DateTime
        $current_date = date_create_from_format("d/m/Y H:i:s", $current_date);

        //Obtenemos un string con la fecha y hora del inicio de la pascua
        $holy_week = date("d/m/Y H:i:s", easter_date(date("Y")));
        
        //Creamos un objeto DateTime usando la funcion date_create_from_format
        //que nos pide como argumentos, el formato para la fecha y hora y 
        //una cadena con la fecha
        //El objeto DateTime nos permitirá usar muchas funciones diferentes
        $holy_week = date_create_from_format("d/m/Y H:i:s", $holy_week);

        //modificamos el objeto $holy_week para que se remonte a una semana antes
        //que es cuando empieza la semana santa
        $holy_week = date_modify($holy_week, "-1 week");

        if($current_date > $holy_week)
        {
            $holy_week = date_modify($holy_week, "+1 year");
            $dif = date_diff($current_date, $holy_week);

            return date_interval_format($dif, "%r%a");
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
            <div class="row">
                <button type="submit" class="btn btn-default mb-sm-2 shadow p-3 mb-5 bg-body rounded px-3 py-2" name="submit">Enviar</button>
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

                $date = $_POST["date"];
                $time = $_POST["time"];

                echo calcularFecha($date, $time);
                // echo "La cadena según las posiciones de las letras de cada palabra:<br/>";
                // echo"<h6>";
                //     echo alphabet_pos($str);
                // echo"</h6>";
            }
        }
        ?>

    </div>
</body>

</html>