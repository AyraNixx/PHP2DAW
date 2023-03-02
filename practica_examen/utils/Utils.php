<?php
// "Apodo" para el directorio
namespace pexamen\utils;

// Usamos use para heredar las clases de PDO, PDOException y Exception
use \PDO;
use \PDOException;
use \Exception;


//Creamos la clase
class Utils
{



    /***********************************************************************
     *                                                                     *
     *                         CONEXIÓN BD                                 *
     *                                                                     *
     ***********************************************************************/
    /**
     * Funcion utilizada para iniciar conexión con una base de datos.
     * @return PDO Devuelve una conexion PDO
     */
    public static function connect()
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
            self::save_log_error($e->getMessage());
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
    public static function clean($data)
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
        return preg_replace('/([\s+])/', ' ', $data);
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
            if (is_numeric($value)) {

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
                    $data[$key] = filter_var(self::clean($value));
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
            return false;
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
     * Funcion para conectar con la base de datos y nos devuelve una conexion PDO 
     * activa
     * @AyraNixx
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
    //Creamos una función que genere un código aleatorio, pasando como parámetro
    //la cantidad de caracteres que queremos que tenga. Por ejemplo, para el salt
    //ponemos 16 y para el código de activación, pues 5
    //Por defecto, la longitud será de 16
    //Por defecto, ponemos que no queremos que el código sea numerico
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
}
