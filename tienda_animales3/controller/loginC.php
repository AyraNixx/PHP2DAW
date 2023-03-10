<?php

use utils\Utils;
use model\User;

require_once("../utils/Utils.php");
require_once("../model/User.php");

// Si $_REQUEST está vacío
if (empty($_REQUEST)) {
    // Usamos header para redireccionar a la página de Login
    header("Location:../view/login.php");
    exit();
}


// Si la clave action tiene como valor "logout"
if ($_REQUEST["action"] === "logout") {
    // Para terminar una sesión, necesitamos eliminar las variables
    // de sesión y, luego, eliminar la sesión

    // Podemos eliminar las variables de la sesion con 
    // session_unset()
    session_unset();
    // Ahora, destruimos la sesion
    session_destroy();
}

// Creamos un objeto de la clase User
$user = new User();
// Guardamos los valores del $_REQUEST limpiados y validados 
$data_login = Utils::clean_array($_REQUEST);

// Guardamos el resultado obtenido al llamar a la función get_one
$data_user = $user->get_one($data_login["correo"]);
try {
    // Si no se ha encontrado el usuario en la base de datos
    if ($data_user === null) {
        // Guardamos el mensaje a mostrar
        // Ponemos que el usuario o la contraseña son erróneos 
        // para evitar dar más información
        $msg = "El correo electrónico o la contraseña son incorrectos";
        // Incluimos el archivo register.php
        require_once("../view/login.php");
        // Tiramos una nueva excepcion indicando que el correo ya existe en la base
        // de datos 
        throw new Exception("¡Error! Usuario o contraseña erróneos");
    }
// Si la clave action tiene como valor "activation"
    if ($_REQUEST["action"] === "activation") {

        echo $data_user["cod_activacion"];
        // Si el código de activación no coincide con el código de activación
        // guardado en la base de datos
        if ($data_login["cod_activacion"] !== $data_user["cod_activacion"]) {
            
            var_dump($data_user);
            // Guardamos el mensaje a mostrar
            // Ponemos que el usuario o la contraseña son erróneos 
            // para evitar dar más información
            $msg = "Código de activación no válido";
            // Incluimos el archivo register.php
            require_once("../view/change_passwd.php");
            // Tiramos una nueva excepcion indicando que el correo ya existe en la base
            // de datos 
            throw new Exception("¡Error! El código de activación introducido no coincide con el enviado.");
        }

    // Si la clave action tiene como valor "change_passwd"
    if ($_REQUEST["action"] === "change_passwd") {
        // Si no existe la clave change o si esta es igual a false
        if (!isset($_REQUEST["change"]) || $_REQUEST["change"] === "false") {
            // Redireccionamos a la vista para cambiar la contraseña
            header("Location:../view/change_passwd.php");
            exit();
        }

        // Cómo ya se ha mirado antes si el correo existe en la base de datos
        // Enviamos un email al remitente para que pueda cambiar su contraseña
        // Guardamos lo devuelto por la función
        $send_email = Utils::send_email_change_password($data_login["correo"]);

        if ($send_email === 2) {
            // Guardamos el mensaje a mostrar
            $msg = "Lo sentimos, no se ha podido enviar el correo para el restablecimiento de su contraseña.";
            // Incluimos el archivo register.php
            require_once("../view/change_passwd.php");
            // Tiramos una nueva excepcion indicando que no se ha podido enviar el correo
            throw new Exception("¡Error! No se ha podido enviar el correo electrónico.");
        }

        // Si la contraseña no coincide con su confirmación
        if ($data_login["passwd"] !== $data_login["passwd_2"]) {
            // Guardamos el mensaje a mostrar
            // Ponemos que el usuario o la contraseña son erróneos 
            // para evitar dar más información
            $msg = "La contraseña no coincide con su confirmación.";
            // Incluimos el archivo register.php
            require_once("../view/change_passwd.php");
            // Tiramos una nueva excepcion indicando que el correo ya existe en la base
            // de datos 
            throw new Exception("¡Error! La contraseña no coincide con su confirmación");
        }

        // Encriptamos la nueva contraseña y la guardamos en la base de datos
        // llamando a la funcion change_field_value
        $new_passwd = hash("sha256", $data_user["salt"] . $data_login["passwd"]);

        $result = $user->change_field_value($data_login["correo"], "passwd", $new_passwd);

        // Si se no se ha podido cambiar la contraseña
        if ($result === null) {
            // Guardamos el mensaje a mostrar
            $msg = "No se ha podido restablecer la contraseña.";
            // Incluimos el archivo register.php
            require_once("../view/change_passwd.php");
            // Tiramos una nueva excepcion indicando que el correo ya existe en la base
            // de datos 
            throw new Exception("¡Error! No se ha podido restablecer la contraseña");
        }
    }
        // Si coinciden, cambiamos el código en la base de datos a 0

        $result = $user->change_field_value($data_login["correo"], "cod_activacion", 0);

        // Si se no se ha podido cambiar la contraseña
        if ($result === null) {
            // Guardamos el mensaje a mostrar
            $msg = "No se ha podido activar la cuenta.";
            // Incluimos el archivo register.php
            require_once("../view/change_passwd.php");
            // Tiramos una nueva excepcion indicando que el correo ya existe en la base
            // de datos 
            throw new Exception("¡Error! No se ha podido modificar el código de activación. Cuenta no activada.");
        }
    }

    // Si $data_user no es nulo, guardamos la contraseña del array user
    // pasado como argumento, encriptada junto con el salt del usuario
    // en la base de datos
    $passwd_login = hash("sha256", $data_user["salt"] . $data_login["passwd"]);

    // Si la contraseña no coincide con la guardada en la base de datos
    if ($passwd_login !== $data_user["passwd"]) {
        // Guardamos el mensaje a mostrar
        // Ponemos que el usuario o la contraseña son erróneos 
        // para evitar dar más información
        $msg = "El correo electrónico o la contraseña son incorrectos";
        // Incluimos el archivo register.php
        require_once("../view/login.php");
        // Tiramos una nueva excepcion indicando que el correo ya existe en la base
        // de datos 
        throw new Exception("¡Error! Usuario o contraseña erróneos");
    }

    // Comprobamos si $data_user["cod_activacion"] es distinto de 0. Si lo es, 
    // significa que la cuenta aún no ha sido activada
    if ($data_user["cod_activacion"] !== 0) {
        // Guardamos el mensaje a mostrar
        $msg = "Esta cuenta aún no ha sido activada";
        // Incluimos la vista para activar el código de activación
        require_once("../view/activation.php");
    }

    // Iniciamos sesión
    session_start();
    $_SESSION["login"] = true;
    $_SESSION["id_usuario"] = $data_user["id_usuario"];
    $_SESSION["nombre"] = $data_user["nombre"];
    $_SESSION["correo"] = $data_user["correo"];

    // Redireccionamos a una página u otra, dependiendo del rol que tenga el usuario
    // que ha iniciado sesión
    // Si $data_user["id_rol"] es 1, significa que es un administrador, por lo que
    // será enviado a la vista index.php
    if ($data_user["id_rol"] == 1) {
        header("Location:../view/index.php");
        exit();
        // Si es 2, significa que es un usuario normal, lo enviamos a index_user.php
    } elseif ($data_user["id_rol"] == 2) {
        header("Location:../view/index_user.php");
        exit();
    }
} catch (Exception $e) {
    // Guardamos los errores
    Utils::save_log_error($e->getMessage());
}
?>