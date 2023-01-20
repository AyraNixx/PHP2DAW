<?php

namespace utilsA;

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

    /**
     * Funcion que genera una cadena aleatoria
     */
    public static function generar_salt($tam)
    {
        //Definimos un array de caracteres
        $chars = "abcdefghijklmnopqrstuvwyxzABCDEFGHIJKLMNOPQRSTUVWYXZ1234567890";
        $salt = "";
        for ($i = 0; $i < $tam; $i++) {
            $salt .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $salt;
    }

    //La funcion genera un codigo de 4 digitos aleatorios
    public static function generar_cod_act()
    {
        return rand(1111, 9999);
    }

    //Funcion que envia el correo de registro
    public static function correo_registro($usuario)
    {
        //copiar y pegar
    }
}
//El filter input ejecuta todas las que vienen en el input(?)
//Solo se usa cuando viene en el get o en el post
// if (!filter_input(INPUT_GET, "email@gmail.com",  FILTER_VALIDATE_EMAIL)) {
//     echo "email is not valid<br><br>";
// } else {
//     echo "email is valid<br><br>";
// }


// if (filter_var("email@gmail.com",  FILTER_VALIDATE_EMAIL)) {
//     echo "email is not valid<br>";
// } else {
//     echo "email is valid<br>";
// }

//Las sesiones son como arrays asociativos y see guardan los datos en un array llamado
//$_SESSION
//Siempre hay que hacer session_start() al principio
//La sesion tiene un tiempo de vida