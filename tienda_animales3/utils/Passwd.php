<?php 
namespace utils;

class Passwd 
{
    //Diferencia entre hashing y encriptar (para el futuro). Hashing es el proceso
    //más recomendado para guardar contraseñas o información sensible en bases de datos
    //Esto genera una serie de caraacteres a partir de una cadena de texto y solo 
    //ocurre en una dirección, es decir, una cadena se convierte en hash pero esto no 
    //es reversible. En el encriptado, esta conversion es posible revertirlo.

    //Utilizamos un salt que se añade a la contraseña para que sea más dificil
    //averiguar la contraseña. Lo mejor es generarlo aleatoriamente y guardarlo
    //de forma que se pueda recuperar más tarde.
    //Yo por ahora voy a escribir uno fijo y más adelante lo intentaré cambiar.
    const SALT = "patataCaliente";

    //Funcion que devuelve una cadena de caracteres obtenida de la contraseña pasada
    public static function toHash($passwd)
    {
        //Utilizamos sha512 que es un complejo algoritmo que es más lento de crackear
        //que md5 y sha1
        return hash("sha512", self::SALT . $passwd);        
    }

    //Funcion que verifica que la contraseña introducida es la que tenemos en la 
    //base de datos
    public static function verify($passwd, $hash)
    {
        //Si el hash coincide con el resultado obtenido al usar la funcion toHash
        //significa que es correcta.
        return ($hash == self::toHash($passwd)) ? true : false;
    }

    public static function changePasswd($oldPasswd, $newPasswd)
    {
        
    }
}

$sha = new Passwd();

$sha->toHash("")
