<?php

// "Apodo" para el directorio
namespace utils;

// Usamos use para heredar las clases de PDO, PDOException y Exception
use \PDO;
use \PDOException;
use \Exception;


// Creamos la clase
class Utils
{
    // Definimos las constantes que devolveremos en la función de send_code()
    const ACIERTO = 1;
    const FALLO = 2;

    /***********************************************************************
     *                                                                     *
     *                         CONEXIÓN BD                                 *
     *                                                                     *
     ***********************************************************************/
    /**
     * Funcion utilizada para iniciar conexión con una base de datos.
     * @return PDO Devuelve una conexion PDO
     */
    public static function conectar()
    {
        //Utilizamos require_once para importar las constantes de global.php
        //Utilizamos require porque estas constantes son necesarias para que vaya
        //la aplicacion, ya que sin ellas no podríamos establecer conexión con la 
        //base de datos
        require_once "global.php";

        //Definimos conBD
        $conBD = null;

        //Englobamos el codigo en un try/catch para que en caso de error de conexión
        //se lance un objeto PDOException
        try {
            //Para establecer una conexion, creamos una instancia de la clase PDO.
            //Se le pasarán como argumentos el host, el nombre de la base de datos, 
            //el usuario y su contraseña en caso de que tuviese una.
            //En mi caso, no he especificado contrasenia porque no tengo.
            //Si usase contraseá, la añadiría después de $DB_USER
            return $conBD = new PDO("mysql:host=$DB_HOST;dbname=$DB_SCHEMA", $DB_USER);
        } catch (PDOException $e) {
            self::save_log_error("¡Error!: " . $e->getMessage());
            //Devolvemos $conBD, que será null si no se pudo realizar la conexion 
            //correctamente.
            return $conBD;
            //Alias de exit(), finaliza el script. 
            die();
        }
    }









    /***********************************************************************
     *                                                                     *
     *                         EXCEPCIONES - LOG                           *
     *                                                                     *
     ***********************************************************************/

    /*
     * Funcion para guardar las excepciones en un log
     */
    public static function save_log_error($error, $path = "../log/log.log")
    {
        //Utilizamos error_log que envia un mensaje de error según lo indicado
        //Le pasamos el error (que pasamos con print_r para que se vea más claro)
        //Indicamos que el tipo de registro es 3, lo que indica que el mensaje
        //se adjuntará al archivo de destino
        //Y por último la ruta del archivo
        //Utilizamos date para que saque la fecha y hora actual
        error_log(print_r(date("Y-m-d H:i:s") . ": " . $error . "\xA", true), 3, $path);
    }








    /***********************************************************************
     *                                                                     *
     *                         LIMPIEZA                                    *
     *                                                                     *
     ***********************************************************************/

    /**
     * Función que "limpia" una variable para evitar vulnerabilidades en la
     * seguridad de la aplicación
     * 
     * @return string 
     */
    public static function clean(string $data)
    {
        //Usamos trim para quitar los espacios en blanco del principio y del final
        $data = trim($data);
        //Además, llamamos a la funcion just_one_space para sustituir los espacios
        //entre las palabras por solo uno
        $data = self::just_one_space($data);
        //Usamos stripslashes que sirve para quitar las barras de un string con comillas
        //escapadas. Ejemplo:
        //$str = "Is your name O\'reilly?";
        // Salida: Is your name O'reilly?
        $data = stripslashes($data);
        //Empleamos htmlspecialchars para convertir caracteres especiales en entidades HTML
        //Ejemplo:
        //$new = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
        //echo $new;  &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;
        $data = htmlspecialchars($data, ENT_QUOTES);
        //Elimina todas las etiquetas HTML y PHP de una cadena
        $data = strip_tags($data);
        //Devolvemos $data
        return $data;
    }





    /**
     * Función que devuelve el número de telefono sin
     * ningún espacio ni guiónç
     * 
     * @param string $data
     * @return string Devuelve la cadena pasada como argumento sin espacios ni guiones
     */
    public static function format_tel(string $data)
    {
        //Usamos preg_replace para que si encuentra un espacio o 
        //un guión lo cambie por ''.
        return preg_replace('/([\s-])/', '', $data);
    }





    /**
     * Función que elimina los espacios (ya sea uno o más) y los 
     * sustituyen por uno solo
     * 
     * @param string $data Cadena pasada como argumento
     * @return string Cadena sin más de un espacio seguido
     * @AyraNixx
     */
    public static function just_one_space(string $data)
    {
        //Usamos preg_replace para que si encuentra un espacio o 
        //más de uno por ''
        return preg_replace('/\s+/', ' ', $data);
    }






    /**
     * Funcion que valida los valores de un array (y así no tener que hacerlo uno a uno)
     * 
     * @param array $data Array que queremos validar y limpiar
     * @return array Array ya validado y limpiado
     * 
     * @AyraNixx
     */
    public static function clean_array(array $data)
    {
        //Definimos variable para guardar el mensaje de error
        $alert = "";
        //Definimos una variable llamada succes que valdrá true,
        //si hay un error, pasará a valer false
        $success = true;

        //Recorremos el array
        foreach ($data as $key => $value) {

            //Si el valor es numérico
            if (is_numeric($value) && $key !== "salt" && $key !== "cod_activacion") {

                // Comprobamos el tipo de dato
                // Ponemos $key + 0, porque si el valor es una cadena aunque 
                // sea 30.23 va a decir que el tipo es string, al sumar 0,
                // lo considerará como un número
                if (gettype($value + 0) == "integer") {
                    // Vemos si el valor de la clave es numérica y mayor o igual que 0
                    if ($value >= 0) {
                        //Si lo es, 'limpiamos' el valor y lo filtramos con filter_var con 
                        //el filtro FILTER_VALIDATE_INT
                        $data[$key] = filter_var(self::clean($value), FILTER_VALIDATE_INT);
                    } else {
                        //En caso contrario, success pasa a valer false e indicamos
                        //el mensaje de error que queremos guardar en el log
                        $success = false;
                        $alert = "El valor de la llave \"$key\" debe ser un número entero positivo.";
                    }
                    // Si no lo es, miramos si el tipo de dato es double
                } elseif (gettype($value + 0) == "double") {
                    // Validamos que sea un float positivo
                    if ($value >= 0) {
                        //Limpiamos el valor y lo filtramos con filter_var con el filtro 
                        //FILTER_VALIDATE_FLOAT
                        $data[$key] = filter_var(self::clean($value), FILTER_VALIDATE_FLOAT);
                    } else {
                        //En caso contrario, success pasa a valer false e indicamos
                        //el mensaje de error que queremos guardar en el log
                        $success = false;
                        $alert = "El valor de la llave \"$key\" debe ser un número decimal positivo.";
                    }
                }
            // Si el valor es un string
            } elseif (is_string($value)) {
                // Vemos si la clave es "correo" o "email"
                if ($key == "correo" || $key == "email") {
                    //Si lo es, limpiamos y filtramos el correo
                    $data[$key] = filter_var(self::clean($value), FILTER_VALIDATE_EMAIL);

                    //Si tras filtrarlo nos devuelve false
                    if ($data[$key] == false) {
                        // Success pasa a valer false e indicamos el mensaje de error
                        // que queremos guardar en el log
                        $success = false;
                        $alert = "El valor de la llave \"$key\" debe ser un correo válido.";
                    }

                // Si la clave es telefono
                } elseif ($key == "telefono" || $key == "phone" || $key == "tel") {
                    //Limpiamos y ponemos el formato que deseamos que tengan todos
                    //los teléfonos en nuestra BD llamando a la funcion format_tel
                    $data[$key] = self::clean(self::format_tel($value));
                    // En caso contrario, simplemente limpiamos la cadena
                } else {
                    //Si no es ninguna de las claves anteriores, limpiamos la cadena
                    $data[$key] = filter_var(self::clean($value), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                }
            }
        }

        try {
            //Si success es false
            if (!$success) {
                //Lanzamos una nueva excepcion 
                throw new Exception($alert);
            }
        } catch (Exception $e) {
            //Y mandamos el error a nuestro log
            self::save_log_error($e->getMessage());
            //Devolvemos false
            return null;
        }
        //Si todo está correcto, devolvemos data validada
        return $data;
    }










    /***********************************************************************
     *                                                                     *
     *                         IMÁGENES                                    *
     *                                                                     *
     ***********************************************************************/
    /**
     * Funcion para guardar una imagen
     * @param array $file Array con los datos de la imagen.
     * @return mixed Devuelve la ruta en la que se encuentra la imagen, si existe un problema, devuelve false
     */
    public static function save_img(array $file)
    {
        //Creamos una constante que es para el tamaño máximo permitido
        define("MAX_FILE_SIZE", 2097152);
        //Definimos un array con posibles extensiones válidas para una imagen
        $extension = ["img/png", "img/jpeg", "img/gif"];
        //Comprobamos si es una imagen.
        if (!getimagesize($file["tmp_name"]) && !in_array($file["type"], $extension)) {
            return false;
        }

        //Comprobamos que el tamaño sea menor al tamaño máximo permitido
        if ($file["size"] > MAX_FILE_SIZE) {
            return false;
        }
        //Generamos un nombre único para la imagen
        //Utilizamos microtime para que nos devuelva la fecha Unix actual con microsegundos
        //y pasamos como argumento true para que en vez de una cadena, nos devuelva un
        //float que redondearemos con round.
        //Concatenamos el numero obtenido con el formato de imagen que obtenemos al 
        //usar explode con delimitador '.' y utilizar end para sacar el ultimo elemento
        //del array obtenido del explode
        $end = explode(".", $file["name"]);
        $file_name = round(microtime(true)) . "." . end($end);
        //Carpeta de destino
        $file_path = "../imgs/" . $file_name;

        //Usamos move_uploaded_file para mover el archivo subido a la carpeta indicada
        //Utilizamos $file["tmp_name] porque es la ubicación temporal donde se encuentra
        //el archivo subido, el segundo argumento es la ruta al repositorio
        move_uploaded_file($file["tmp_name"], $file_path);
        //Devolvemos la url
        return $file_path;
    }


    //Funcion para eliminar una imagen
    public static function delete_img(string $file_path)
    {
        //Utilizamos file_exist para comprobar que el archivo existe
        if (!file_exists($file_path)) {
            return false;
        }

        //Eliminamos la imagen
        return unlink($file_path);
    }








    /***********************************************************************
     *                                                                     *
     *                         CODE ACTIVACIÓN O SALT                      *
     *                                                                     *
     ***********************************************************************/
    /**
     * Función que genera un código aleatorio. Por defecto, está configurado
     * para que te salga una cadena de 16 caracteres en la que se mezclen 
     * caracteres alfanuméricos, perfecto para un SALT.
     * 
     * @param int $length Indica la longitud deseada de la cadena a generar.
     * @param bool $numeric Indica si queremos que la cadena sea solo numérica o no.
     * 
     * @return mixed Devuelve la cadena generada
     */
    public static function generate_code(int $length = 16, bool $numeric = false)
    {
        //Utilizamos la funcion array_merge para crear un array que contenga todas
        //las letras del abecedario, tanto mayúsculas como minúsculas, y todos los 
        //números del 0 al 9, 
        $chars = array_merge(range("a", "z"), range("A", "Z"), range(0, 9));
        $salt = null;

        //Utilizamos un bucle para generar el salt
        for ($i = 0; $i < $length; $i++) {
            //Si indicamos que queremos que el salt sea numérico, 
            if ($numeric) {                
                //Concatenamos dígitos aleatorios hasta la longitud deseada
                $salt .= rand(0, 9);
            } else {
                //Concatenamos el caracter aleatorio obtenido
                $salt .= $chars[rand(0, count($chars) - 1)];
            }
        }
        //Devolvemos el código obtenido
        return $salt;
    }













    /***********************************************************************
     *                                                                     *
     *                         PASSWORD                                    *
     *                                                                     *
     ***********************************************************************/

    //Funcion que encripta la contraseña en 256 bits
    // public static function to_hash(string $psswd, string $salt = "popeye")
    // {
    //     //Llamamos a la función generate_code para generar el salt.
    //     //Utilizamos un salt que se añade a la contraseña para que sea más dificil
    //     //averiguar la contraseña. Lo mejor es generarlo aleatoriamente y guardarlo
    //     //de forma que se pueda recuperar más tarde.
    //     ($salt == "popeye") ? $salt = self::generate_code() : $salt;


    //     //Devolvemos un array con el salt obtenido y la contraseña encriptada
    //     return ["salt" => $salt, "hash" => hash("sha256", $salt . $psswd)];
    // }

    public static function to_hash(string $psswd)
    {
        return hash("sha256", $psswd);
    }


    //Función que comprueba que las contraseñas sean coincidentes
    public static function psswd_verify(string $psswd, array $hash_array)
    {
        $hash = $hash_array["hash"];
        $salt = $hash_array["salt"];
        //Si el hash coincide con el resultado obtenido al usar la funcion to_hash
        //significa que es correcta.
        //Como to_hash devuelve un array, ponemos ["hash"] para indicar que queremos
        //el valor de la clave hash
        return ($hash == self::to_hash($psswd, $salt)["hash"]) ? true : false;
    }













    /***********************************************************************
     *                                                                     *
     *                         EMAIL                                       *
     *                                                                     *
     ***********************************************************************/
    public static function send_code(array $user)
    {
        // El remitente
        $to = $user["correo"];
        // Motivo del correo
        $subject = "Activación de Cuenta";

        // Cuerpo del mensaje
        $msg = "<h1>BIENVENID@</h1>";
        $msg .= "<p>Estimado@ " . $user["nombre"] . ", su cuenta ha sido creada ";
        $msg .= "el " . date("d-m-Y H:i:s") . ". Muchas gracias por confiar en nosotros.</p>";
        $msg .= "<p>Su código de activación es <b>" . $user["cod_activacion"] . "</b>.";

        $msg = '
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Activar cuenta</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
            </head>
            <body>
                <div class="container">
                    <h2 class="my-4">BIENVENID@</h2>
                    <p class="lead">Estimado ' . $user["nombre"] . ',</p>
                    <p class="mt-4">le informamos que su cuenta ha sido creada el ' . date("d-m-Y H:i:s") . '.</p>
                    <p class="mt-4">Su código de activación es <b>' . $user["cod_activacion"] . '</b>.</p>
                    <p class="mt-4">Para activar su cuenta, haga click en el siguiente enlace:</p>
                    <form action="http://localhost/DES/tienda_animales3/controller/Login.php" method="post">
                        <input type="hidden" name="correo" value="' . $user["correo"] . '">
                        <button type="submit" class="btn btn-primary" name="action" value="activation">Activar cuenta</button>
                    </form>
                    <p class="mt-4">Muchas gracias por confiar en nosotros</p>
                    <p class="mt-4">Saludos,</p>
                    <p>[nombre de la tienda de animales]</p>
                </div>
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            </body>
        </html>
    ';
        // Encabezado
        $header = "From: usertiendaanimalesDAW@gmail.com" . "\r\n";
        $header .= "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type: text/html" . "\r\n";

        // Enviamos el mensaje y guardamos la respuesta.
        // Devolverá true si se ha enviado con éxito y false, si no.
        $response = mail($to, $subject, $msg, $header);

        // Si se ha podido enviar el correo
        if($response)
        {
            return Utils::ACIERTO;
        }else{
            return Utils::FALLO;
        }
    }


    public static function send_email_change_password(string $email)
    {
        // El remitente
        $to = $email;
        // Motivo del correo
        $subject = "Restablecimiento de contraseña";

        // Cuerpo del mensaje
        $msg = '
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Restablecer contraseña</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            </head>
            <body>
                <div class="container">
                    <h2 class="my-4">Restablecimiento de contraseña</h2>
                    <p class="lead">Hola,</p>
                    <p class="mt-4">Hemos recibido una solicitud para restablecer la contraseña de tu cuenta, el ' . date("d-m-Y H:i:s") . '.</p>
                    <p class="mt-4">Si solicitó el cambio, haz click en el siguiente enlace para restablecer tu contraseña:</p>
                    <form action="http://localhost/DES/tienda_animales3/controller/Login.php" method="post">
                        <input type="hidden" name="correo" value="' . $email . '">
                        <button type="submit" class="btn btn-primary" name="action" value="change_passwd">Activar cuenta</button>
                    </form>                    
                    <p class="mt-4">Si usted no realizó esta petición, por favor, ignore este correo electrónico.</p>
                    <p class="mt-4">Saludos,</p>
                    <p>[nombre de la tienda de animales]</p>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
            </body>
        </html>
    ';
        // Encabezado
        $header = "From: usertiendaanimalesDAW@gmail.com" . "\r\n";
        $header .= "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type: text/html" . "\r\n";

        // Enviamos el mensaje y guardamos la respuesta.
        // Devolverá true si se ha enviado con éxito y false, si no.
        $response = mail($to, $subject, $msg, $header);

        // Si se ha podido enviar el correo
        if($response)
        {
            return Utils::ACIERTO;
        }else{
            return Utils::FALLO;
        }
    }
}
?>