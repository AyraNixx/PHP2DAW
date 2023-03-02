<?php

namespace controller;

use \model\Usuario;
use \model\Utils;
//Creamos un array para guardar los datos del cliente

//Añadimos el código del modelo
require_once("../model/Usuario.php");
require_once("../model/Utils.php");

/**
 * Los datos que llegan de la vista registro por POST ya deberían de estar validados
 * en javascript, forma email, contraseña correcta, contraseñas iguales, telefono etc
 */

//Si nos llegan datos de un cliente, implica que es el formulario el que llama al controlador
if (isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["edad"]) && isset($_POST["sexo"]) && isset($_POST["password"])) {
    $usuario = array();

    //Limpiamos los datos de posibles caracteres o codigo malicioso
    //Segun los asignamos al array de datos del usuario a registrar
    $usuario["nombre"] = Utils::limpiar_datos($_POST["nombre"]);
    $usuario["email"] = Utils::limpiar_datos($_POST["email"]);
    $usuario["edad"] = Utils::limpiar_datos($_POST["edad"]);
    $usuario["sexo"] = Utils::limpiar_datos($_POST["sexo"]);

    //Generamos una salt de 16 posiciones
    $salt = Utils::generar_salt(16);
    $usuario["salt"] = $salt;
    //Encriptamos el password del formulario con la funcion crypt
    //utilizando la salt generada y SHA-512
    $usuario["password"] = crypt($_POST["password"],'$6$rounds=5000$'.$salt.'$');
    //Por defecto el usuario esta deshabilitado
    $usuario["activo"]=0;
    //Generamos el codigo de activacion
    $usuario["codActivacion"]=Utils::generar_codigo_activacion();

    $gestorUsu = new Usuario();

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    //Añadimos el registro
    $resultado = $gestorUsu->addUsuario($usuario, $conexPDO);

    //Si ha ido bien el mensaje sera distint
    if ($resultado != null)
        $mensaje = "El Usuario se Registro Correctamente";
    else
        $mensaje = "Ha habido un fallo al acceder a la Base de Datos\n salte por la ventana ya!";

    //var_dump($datosClientes);
    include("../views/loginView.php");
} 
