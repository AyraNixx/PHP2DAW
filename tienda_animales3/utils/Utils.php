<?php

namespace utils;

use \PDO;
use \PDOException;

class Utils
{ 
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

    public static function save_img($file)
    {
        //Comprobamos que el elemento pasado es una imagen, para ello usamos la funcion
        //getimagesize
        if (getimagesize($file["tmp_name"])) {
            //Definimos una variable con la ruta de la carpeta en la que guardamos las 
            //imagenes subidas
            $destinatation_folder = "../imgs/";
            //Definimos otra variable en la que vamos a concatenar la ruta de la carpeta
            //con el nombre de la imagen
            $upload_file = $destinatation_folder . $file["name"];
            //usamos la funcion move_uploaded_file para mover el archivo subido 
            //a la carpeta en la que queremos que se encuentre
            move_uploaded_file($file["tmp_name"], $upload_file);
            return $upload_file;
        }
    }

    public static function create_dir_img($name_folder)
    {

    }

    public static function delete_dir_img($name_folder)
    {

    }
}



?>
