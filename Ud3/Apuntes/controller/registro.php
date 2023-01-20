<?php
namespace controller;

use \model\Usuarios;
use \utilsA\Utils;

/**
 * Los datos que llegan de la vista registro por Post ya deberían de estar 
 * validados en javascript, forma email, contraseña correcta, contraseñas iguales,
 * telefono etc.
 */

if(isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["passwd"]) && isset($_POST["edad"]))
{
    //Definimos un array que es lo que vamos a pasar a la funcion que inserta un usuario en la 
    //base de datos
    $usuario = [];


    //Primero hacemos una validacion 
    //htmlspecialchars lo que hace es que cuando encuentra ?????
    //lo cambia por ???? paraa que cuando el codigo sea ejecutado
    //no de errores
    //stripslashes quita la barra de la izquierda(?)

    //Limpiamos los datos de posibles caracteres o código malicioso
    $usuario["nombre"] = Utils::limpiar_datos($_POST["nombre"]);
    $usuario["email"] = Utils::limpiar_datos($_POST["email"]);
    $usuario["passwd"] = Utils::limpiar_datos($_POST["passwd"]);
    $usuario["sexo"] = Utils::limpiar_datos($_POST["sexo"]);

    //Generamos una salt de 16 posiciones
    $salt = Utils::generar_salt((16));
    $usuario["salt"] = $salt;

    //La encriptcion es un mundo.
    //Encriptamos el password del formulario con la funcion crypt
    //utilizando la salt generada y SHA-512
    $usuario["passwd"] = crypt($_POST["passwd"], '$6$rounds=5000$'.$salt.'$');
    //Ponemos que el usuario activo sea 0,m es decir, desactivado
    $usuario["activo"]=0;

    //generamos el codigo de act
    $usuario["codActivacion"] = $cod_acti = Utils::generar_cod_act();

    $user = new Usuarios();
    //nos conectamos a la bd
    $conBD = Utils::conectar();
    //Añadimos el registro
    $result = $user->addCliente($usuario, $conBD);

    //Si ha ido bien el mensajera sera distinto 
    


}
