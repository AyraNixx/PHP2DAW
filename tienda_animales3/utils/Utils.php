<?php

namespace utils;

use \PDO;
use \PDOException;

class Utils
{

    /***********************************************************************
     *                                                                     *
     *                         CONEXIÓN BD                                 *
     *                                                                     *
     ***********************************************************************/
    /**
     * Funcion para conectar con la base de datos y nos devuelve una conexion PDO 
     * activa
     */
    public static function conectar()
    {
        //Utilizamos require_once para importar las constantes de global.php
        //Utilizamos require porque estas constantes son necesarias para que vaya
        //la aplicacion, ya que sin ellas no podríamos establecer conexión con la 
        //base de datos
        require_once("global.php");

        //Definimos conBD
        $conBD = null;

        //Englobamos el codigo en un try/catch para que en caso de error de conexión
        //se lance un objeto PDOException
        try {
            //Para establecer una conexion, creamos una instancia de la clase PDO.
            //Se le pasarán como argumentos el host, el nombre de la base de datos, 
            //el usuario y su contraseña en caso de que tuviese una.
            //En mi caso, no he especificado contrasenia porque no tengo.
            return $conBD = new PDO("mysql:host=$DB_HOST;dbname=$DB_SCHEMA", $DB_USER);
        } catch (PDOException $e) {
            print("¡Error! : " . $e->getMessage() . "<br/>");
            //Devolvemos $conBD, que será null si no se pudo realizar la conexion 
            //correctamente.
            return $conBD;
            //Alias de exit(), finaliza el script. 
            //DUDA?????????
            die();
        }
    }








    public static function limpiar_datos($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }








    /***********************************************************************
     *                                                                     *
     *                         IMÁGENES                                    *
     *                                                                     *
     ***********************************************************************/
    /**
     * Funcion para conectar con la base de datos y nos devuelve una conexion PDO 
     * activa
     */

    public static function save_img(array $file)
    {
        //Comprobamos que el elemento pasado es una imagen, para ello usamos la funcion
        //getimagesize. Si nos devuelve false, significa que el archivo no es una imagen válida
        if (getimagesize($file["tmp_name"])) {

            //Una vez comprobado que el archivo es una imagen, verificamos su tamaño
            if ($file["size"] > 2097152) {
                //Si es mayor de 2097152, pues devolvemos false.
                return false;

                //En caso contrario
            } else {

                //Generamos un nombre único para la imagen
                //Utilizamos microtime para que nos devuelva la fecha Unix actual con microsegundos
                //y pasamos como argumento true para que en vez de una cadena, nos devuelva un
                //float que redondearemos con round.
                //Concatenamos el numero obtenido con el formato de imagen que obtenemos al 
                //usar explode con delimitador '.' y utilizar end para sacar el ultimo elemento
                //del array obtenido del explode
                $file_name = round(microtime(true)) . "." . end(explode(".", $file["name"]));
                //Carpeta de destino
                $file_path = "../imgs/" . $file_name;
                //Usamos move_uploaded_file para mover el archivo subido a la carpeta indicada
                //Utilizamos $file["tmp_name] porque es la ubicación temporal donde se encuentra
                //el archivo subido, el segundo argumento es la ruta al repositorio
                move_uploaded_file($file["tmp_name"], $file_path);
                //Devolvemos la url para guardarla en la bd
                return $file_path;
            }
        } else {
            return false;
        }
    }


    //Funcion para eliminar una imagen
    public static function delete_img(string $file_path)
    {
        //Utilizamos file_exist para comprobar que el archivo existe
        if (file_exists($file_path)) {
            //La eliminamos
            return unlink($file_path);
        } else {
            return false;
        }
    }








    /***********************************************************************
     *                                                                     *
     *                         EXCEPCIONES - LOG                           *
     *                                                                     *
     ***********************************************************************/

    //Funcion para guardar las excepciones en un log
    public static function save_log($error, $path = "../log/log.log")
    {
        //Utilizamos error_log que envia un mensaje de error según lo indicado
        //Le pasamos el error (que pasamos con print_r para que se vea más claro)
        //Indicamos que el tipo de registro es 3, lo que indica que el mensaje
        //se adjuntará al archivo de destino
        //Y por último la ruta del archivo
        error_log(print_r($error . "\xA", true), 3, $path);
    }








    /***********************************************************************
     *                                                                     *
     *                         CODE ACTIVACIÓN O SALT                      *
     *                                                                     *
     ***********************************************************************/

    //Creamos una función que genere un código aleatorio, pasando como parámetro
    //la cantidad de caracteres que queremos que tenga. Por ejemplo, para el salt
    //ponemos 16 y para el código de activación, pues 5
    //Por defecto, la longitud será de 16
    //Por defecto, ponemos que no queremos que el código sea numerico
    public static function generate_code(int $lenth = 16, bool $numeric = false)
    {
        //Utilizamos la funcion array_merge para crear un array que contenga todas
        //las letras del abecedario, tanto mayúsculas como minúsculas, y todos los 
        //números del 0 al 9, 
        $chars = array_merge(range("a", "z"), range("A", "Z"), range(0, 9));
        $salt = null;

        //Utilizamos un bucle para generar el salt
        for ($i = 0; $i < $lenth; $i++) {
            //Si indicamos que queremos que el salt sea numérico, 
            if ($numeric) {
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
    public static function to_hash(string $psswd, string $salt = "popeye")
    {
        //Llamamos a la función generate_code para generar el salt.
        //Utilizamos un salt que se añade a la contraseña para que sea más dificil
        //averiguar la contraseña. Lo mejor es generarlo aleatoriamente y guardarlo
        //de forma que se pueda recuperar más tarde.
        ($salt == "popeye") ? $salt = self::generate_code() : $salt;
        

        //Devolvemos un array con el salt obtenido y la contraseña encriptada
        return ["salt" => $salt, "hash" => hash("sha256", $salt . $psswd)];
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
    public static function send_activation_code(array $user)
    {
        $activation_code = self::generate_code(5, true);
        $to = $user["correo"]; //Destinatario
        $subject = "Activación de cuenta"; //Motivo
        //Cuerpo del mensaje
        $msg = "<h2>Hola " . $user["nombre"] . ", gracias por registrarte en nuestro sitio web.</h2>";
        $msg .= "<p>Para activar su cuenta, introduzca el código: [" . $activation_code . "] en el siguiente enlace:</p>";
        $msg .= "<h4><a href='../view/login.php'>http://www.preuba.com</a></h4>";
        $header = "From: no-reply@example.com"; //cabecera
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        echo $msg;

        return $activation_code;
        //Si el correo se ha enviado correctamente, devolverá true. En caso contrario, false
        // if (mail($to, $subject, $msg, $header)) {
        //     return true;
        // } else {
        //     return false;
        // }
    }
}


// if (Utils::send_activation_code(["correo" => "thejokerjune@gmail.com", "nombre" => "paula"]));

// $hash = (Utils::to_hash("kesesoesoeskesokkesoesroquefort"));

// echo "<br>";

// var_dump(Utils::psswd_verify("kesesoesoeskesokkesoesroquefort", $hash));
