<?php

// Indicamos el direcctorio 
use model\User;
use utils\Utils;

// Incluimos el archivo Utils.php 
require_once("../utils/Utils.php");
// Incluimos el archivo User.php 
require_once("../model/User.php");



// En caso de que alguna de las claves no esté definida,
// nos redireccionará a la vista del formulario registro.
// De esta manera, si entramos desde el controlador de registro
// sin antes pasar por la vista, nos llevará a la vista
if (
    !isset($_POST["nombre"]) || !isset($_POST["apellidos"]) ||
    !isset($_POST["direccion"]) || !isset($_POST["telefono"]) ||
    !isset($_POST["correo"]) || !isset($_POST["passwd"]) ||
    !isset($_POST["passwd_2"])
) {
    // Usamos header para redireccionar a la página del formulario
    // de registro
    header("Location:../view/register.php");
    exit();
}




// Instanciamos un objeto de la clase User
$user = new User();

try {


    // Comprobamos si ya existe un usuario en la base de datos que tenga 
    // el correo introducido.
    // Si devuelve null, es que no existe ningun usuario en la base de datos
    // que tenga dicho email.
    if ($user->get_one($_POST["correo"]) !== false) {
        // Guardamos el mensaje a mostrar
        $msg = "¡Error! Ya existe este correo en la base de datos";
        // Incluimos el archivo register.php
        require_once("../view/register.php");
        // Tiramos una nueva excepcion indicando que el correo ya existe en la base
        // de datos 
        throw new Exception("¡Error! Ya existe este correo en la base de datos");
    }


    // Lo primero que haremos es volver a comprobar,
    // por seguridad (aunque esté hecho en la parte cliente), que la contraseña
    // y la confirmación de la contraseña son iguales. Si no lo son, se tira 
    // una nueva excepción y se muestra de nuevo la vista de registro
    if ($_POST["passwd"] !== $_POST["passwd_2"]) {
        // Guardamos el mensaje a mostrar
        $msg = "¡Error! Las contraseñas no coinciden";
        // Incluimos el archivo register.php
        require_once("../view/register.php");
        // Tiramos una nueva excepcion indicando que las contraseñas no coinciden
        throw new Exception("¡Error! Las contraseñas no coinciden");
    }

    // Eliminamos el valor correspondiente a passwd2 porque no nos interesa
    // tener la confirmación de la contraseña una vez que hemos comprobado
    // antes de enviar el formulario que coincidían.
    // En este caso, lo hago de esta manera porque me interesa guardar todos
    // los valores menos este.
    unset($_POST["passwd_2"]);

    // Guardamos los valores ya validados y limpiados
    $new_user = Utils::clean_array($_POST);

    // Si $new_user es null, algo ha ido mal en la validación
    if ($new_user === null) {
        // Guardamos mensaje de error
        $msg = "Se ha encontrado un problema al validar los datos, revise la información";
        // Incluimos el archivo register.php
        require_once("../view/register.php");
        // Tiramos una nueva excepcion indicando que algo ha ido mal en la validación 
        // de datos
        throw new Exception("¡Error! Ha ocurrido un error durante la validación de datos");
    }


    // Guardamos en new_user, la salt y el código de activación que generamos
    // con el método generate_code de la clase Utils
    $new_user["salt"] = Utils::generate_code();
    $new_user["cod_activacion"] = Utils::generate_code(5, true);
    // Guardamos el rol que tiene este usuario. Por defecto, será 2
    // que indica que es un usuario normal y no un administrador
    $new_user["id_rol"] = 2;

    $new_user["foto"] = "../imgs/default.jpg";
    // Encriptamos la contraseña junto con el salt y la guardamos
    // en la base de datos con la función hash. En ella indicaremos
    // el tipo de encriptación como primer argumento y de segundo,
    // le pasamos la contraseña y el salt concatenados
    $new_user["passwd"] = hash("sha256", $new_user["salt"] . $new_user["passwd"]);

    // Insertamos el usuario en la base de datos con el método
    // add de la clase User.
    // Si nos devuelve null
    if ($user->add($new_user) === null) {
        // Guardamos el mensaje de error
        $msg = "¡Error! No se ha podido conectar con la base de datos";
        // Incluimos register.php
        require_once("../view/register.php");
        // Tiramos una nueva excepcion indicando que ha habido un problema al 
        // conectar con la base de datos
        throw new Exception("¡Error! No se ha podido conectar con la base de datos");
    }


    // Enviamos un correo con el código de activación al usuario
    // Si nos devuelve 1, significa que se ha enviado con éxito.
    // Si devuelve 2, no se ha podido enviar
    $success = Utils::send_code($new_user);

    if ($success == 2) {
        $msg = "¡Error! No se ha podido enviar el código de activación, lo sentimos";
        // Incluimos register.php
        require_once("../view/register.php");
        // Tiramos una nueva excepcion indicando que ha habido un problema al 
        // conectar con la base de datos
        throw new Exception("¡Error! No se ha podido enviar el código de activación");
    }

    // Redirigimos a la página de activación
    require_once("../view/activation.php");
    
} catch (Exception $e) {
    // Guardamos el error en nuestro log
    Utils::save_log_error($e->getMessage());
}
?>
