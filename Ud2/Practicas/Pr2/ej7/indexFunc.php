<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″/>
    <meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1″ />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Asociativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    <?php    

    //TENGO PROBLEMAS CON LA Ñ CON ORD, BUSCAR SI ME DA TIEMPO!!!!!!!!!!!!!
    
    //Funcion que recibe como parámetro una cadena y devuelve la cadena 
    //como las posiciones de sus letras
    function alphabet_pos($str)
    {
        //Definimos una variable que será la que devolveremos como resultado
        $result = "";

        //Recorremos la cadena
        for ($i = 0; $i < strlen($str); $i++) {
            //Si la letra actual es verdaderamente una letra
            if (ctype_alpha($str[$i])) {
                //Concatenamos result con el resultado obtenido de la funcion ord
                //que nos devuelve un entero entre 0 y 255 (código ASCII).
                //Sin embargo, tenemos que tener cuidado porque en el código ASCII
                //hay valores para indicar, por ejemplo, ^. Por lo tanto,
                //lo primero que haremos es utilizar strtolower para que la letra
                //esté en minúscula
                //Con el primer ord obtenemos la posicion del caracter en la tabla ASCII, 
                //es decir, si es 'a' nos saca 97.
                //Luego le restamos el resultado de ord("a") más 1 para que empiece a contar
                //desde 1 (el alfabeto va del 1 al 26 (en inglés), no de 97 a 122)
                //Entonces si nuestro primer caracter es "a", sería 97 - 97 + 1 = 1.
                //Si es i, sería 105 - 97 + 1 = 9
                $result = $result . ord(strtolower($str[$i])) - ord('a') + 1;
            //Si no es una letra, miramos si es un espacio, añadimos un espacio a result
            //porque significa que hay termina la palabra y empieza otra
            } elseif($str[$i] === " "){
                $result = $result . " ";
            }
        }
        //Devolvemos la cadena
        return $result;
    }
    ?>


    <form method="POST" action="#">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="str" name="str" placeholder="Escriba aqui...">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default mb-sm-2 shadow p-3 mb-5 bg-body rounded px-3 py-2" name="submit">Enviar</button>
                </div>
            </div>
        </div>
    </form>
    <div class="container mt-3 text-center">
        <!--Llamamos a la funcion y mostramos el resultado-->
        <?php
        //Si se ha pulsado el botón de enviar 
        if (isset($_POST["submit"])) {
            //Comprobamos que la cadena no esté vacía
            if (isset($_POST["str"])) {
                //Almacenamos la cadena
                $str = $_POST["str"];
                echo "La cadena según las posiciones de las letras de cada palabra:<br/>";
                echo"<h6>";
                    echo alphabet_pos($str);
                echo"</h6>";
            }
        }
        ?>

    </div>
</body>

</html>