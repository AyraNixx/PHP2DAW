<?php

use utils\Utils;
use model\User;

require_once("../utils/Utils.php");
require_once("../model/User.php");

class Login
{
    const ERROR_BD = "¡ERROR! No se ha podido conectar con la base de datos";
    const ERROR_LOGIN = "¡ERROR! Email no encontrado o contraseña errónea";
    const ERROR_CHANGE_PASSWD_EMAIL = "¡ERROR! Correo no enviado.";
    const ERROR_CHANGE_PASSWD = "¡ERROR! No se ha podido cambiar la contraseña.";
    const ERROR_DIFFERENT_CODE = "¡ERROR! El código insertado no coincide con el de la base de datos.";
    const ERROR_ACTIVATION = "¡ERROR! No se ha podido activar la cuenta.";

    const INFO_ACTIVATION_STATUS = "Cuenta no activada. Introduzca el código de activación";
    const INFO_VERIFY_PASSWD = "La contraseña y su confirmación no coinciden.";

    const SUCCESS_EMAIL = "Correo enviado";
    const SUCCESS_CHANGE_PASSWD = "La contraseña ha sido restablecida";

    const VIEW_LOGIN = "../login.php";
    const VIEW_ACTIVATION = "../view/activation.php";
    const VIEW_CHANGE_PASSWD_EMAIL = "../view/change_passwd_email.php";
    const VIEW_CHANGE_PASSWD = "../view/change_passwd.php";
    const VIEW_INDEX_ADMIN = "../view/index_admin.php";
    const VIEW_INDEX_USER = "../view/index_usuario.php";




    // 
    // -- ATRIBUTOS
    // 
    private $user;



    // 
    // -- CONSTRUCTOR
    // 

    function __construct()
    {
        $this->user = new User();
    }



    // 
    // -- MÉTODOS
    // 

    /**
     * Inicia la sesión si el usuario se encuentra en la base de datos.
     * 
     * @param array $data_login Array con los datos introducidos en la vista Login
     * 
     */
    public function login(array $data_login)
    {
        try {

            // Guardamos el resultado obtenido al llamar a la función user_found(),
            // que devuelve un array con los datos del usuario si lo ha encontrado
            // o null si no.
            $data_user = self::user_found($data_login["correo"]);

            // Si nos ha devuelto null
            if ($data_user === null) {
                // Guardamos el mensaje a mostrar
                $msg = self::ERROR_BD;
                // Mostramos la página de login
                require_once(self::VIEW_LOGIN);
                return;
            }

            // Comprobamos si la contraseña pasada, coincide con la contraseña en nuestra
            // base de datos. Si no coinciden, guardamos el mensaje y mostramos el Login
            $passwd_login = $data_user["salt"] . $data_login["passwd"];

            if (!self::verify_password($data_user["passwd"], $passwd_login, true)) {
                // Guardamos el mensaje a mostrar
                $msg = self::ERROR_LOGIN;
                // Mostramos la página de login
                require_once(self::VIEW_LOGIN);
                return;
            }

            // Comprobamos si se trata de una cuenta activa
            if ($data_user["cod_activacion"] != 0) {
                $msg = self::INFO_ACTIVATION_STATUS;
                // Mostramos la página de login
                require_once(self::VIEW_ACTIVATION);
                return;
            }

            // Iniciamos sesión
            session_start();
            // Guardamos las siguientes variables en la session
            $_SESSION["login"] = true;
            $_SESSION["id_usuario"] = $data_user["id_usuario"];
            $_SESSION["nombre"] = $data_user["nombre"];
            $_SESSION["correo"] = $data_user["correo"];

            // Dependiendo del rol asignado al usuario, le llevamos a una vista u otra
            // 1- El usuario es un administrador
            // 2- Es un usuario normal
            $view = ($data_user["id_rol"] == 1) ? self::VIEW_INDEX_ADMIN : self::VIEW_INDEX_USER;

            header("Location:" . $view);
            exit();
        } catch (Exception $e) {
            Utils::save_log_error($e->getMessage());
        }
    }


    /**
     * Cierra la sesión del usuario
     */
    public function logout()
    {
        // Para terminar una sesión, necesitamos eliminar las variables
        // de sesión y, luego, eliminar la sesión

        // Podemos eliminar las variables de la sesion con 
        // session_unset()
        session_unset();
        // Ahora, destruimos la sesion
        session_destroy();
        // Borramos la cookie de sesión del cliente
        if (ini_get("session.use_cookies")) 
        {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        // Redireccionamos a la vista de Login
        header("Location:" . self::VIEW_LOGIN);
        exit();
    }



    /**
     * Función que comprueba si dos contraseñas son iguales
     * 
     * @param string $passwd Contraseña
     * @param string $passwd_2 Contraseña que queremos comparar
     * @param bool $hash Parámetro opcional para indicar si queremos que se encripte la 
     * segunda contraseña introducida. Sirve, por ejemplo, para comparar la contraseña
     * introducida en el Login.
     * 
     */
    public function verify_password(string $passwd, string $passwd_2, bool $hash = false)
    {
        if ($hash) {
            return ($passwd == hash("sha256", $passwd_2)) ? (true) : (false);
        } else {
            return ($passwd == $passwd_2) ? (true) : (false);
        }
    }


    /**
     * Función que comprueba si existe un usuario en la base de datos, 
     * si existe lo devuelve
     * 
     * @param string $email Email del usuario a buscar
     * 
     * @return mixed Devuelve array si se ha encontrado el usuario o null si no.
     */
    public function user_found(string $email)
    {
        try {
            // Guardamos el resultado obtenido de llamar a la función $data_user
            $data_user = $this->user->get_one($email);

            // Si data user es nulo
            if ($data_user === false) {
                // Tiramos una excepción
                throw new Exception(self::ERROR_BD);
            }
            // Devolvemos el usuario encontrado, si todo ha ido bien,
            // con todos sus datos validados y limpiados
            return Utils::clean_array($data_user);
        } catch (Exception $e) {
            // Guardamos el mensaje de error
            Utils::save_log_error($e->getMessage());
        }
        return null;
    }


    /**
     * Función que envía un mensaje para el restablecimiento de contraseña
     * del usuario indicado
     * 
     * @param string $email Email del usuario al que se le va a enviar el correo
     */
    public function send_email_change_passwd(string $correo)
    {
        // Comprobamos si existe el correo en la base de datos
        $user_found = $this->user_found($correo);

        // Si $user_found es igual a null
        if ($user_found === null) {
            // Guardamos el mensaje a mostrar
            $msg = self::ERROR_BD;
            // Mostramos la página de login
            require_once(self::VIEW_CHANGE_PASSWD_EMAIL);
            return;
        }
        // Enviamos el correo para restablecer la contraseña con la funcion
        // send_email_change_password().
        $success = Utils::send_email_change_password($correo);

        // Si nos devuelve 2, significa que ha habido un problema a la hora de enviar el
        // correo, guardamos el mensaje
        if ($success == 2) {
            $msg = self::ERROR_CHANGE_PASSWD_EMAIL;
        }

        // Si todo ha ido bien 
        $msg = self::SUCCESS_EMAIL;
        // Incluimos la vista change_passwd_email.php
        require_once(self::VIEW_CHANGE_PASSWD_EMAIL);
    }

    /**
     * Función que cambia la contraseña en la base de datos
     * 
     * @param array $user Array que contiene los datos necesarios para realizar el cambio de contraseña
     * 
     * @return mixed Devuelve null si no se ha podido cambiar la contraseña y true si ha sido un éxito.
     */
    public function change_password(array $data_login)
    {
        // Envolvemos el código en un try/catch para controlar las excepciones
        try {
            // Comprobamos que existe el correo introducido en la base de datos
            $data_user_bd = $this->user_found($data_login["correo"]);

            // Si $data_user_bd es nulo
            if ($data_user_bd === null) {
                // Guardamos mensaje de error
                $msg = self::ERROR_BD;
                // Inlcuimos la vista de change_password
                require_once(self::VIEW_CHANGE_PASSWD);
                // Tiramos una nueva excepción
                throw new Exception(self::ERROR_BD);
                return;
            }

            // Si la contraseña y su confirmación no son iguales
            if (!$this->verify_password($data_login["passwd"], $data_login["passwd_2"])) {
                // Guardamos mensaje de error
                $msg = self::INFO_VERIFY_PASSWD;
                // Inlcuimos la vista de change_password
                require_once(self::VIEW_CHANGE_PASSWD);
                // Tiramos una nueva excepción
                throw new Exception(self::ERROR_BD);
                return;
            }

            // Encriptamos la nueva contraseña
            $new_passwd = hash("sha256", $data_user_bd["salt"] . $data_login["passwd"]);

            // Almacenamos el resultado obtenido al llamar a la función change_field_value() 
            // que cambia el valor de la columna indicada del correo pasado
            $result = $this->user->change_field_value($data_login["correo"], "passwd", $new_passwd);

            // Si no nos devuelve true
            if ($result == 0) {
                // Guardamos mensaje de error
                $msg = self::ERROR_CHANGE_PASSWD;
                // Inlcuimos la vista de change_password
                require_once(self::VIEW_CHANGE_PASSWD);
                // Tiramos una nueva excepcion 
                throw new Exception(self::ERROR_CHANGE_PASSWD);
                return;
            }
            // Mostramos la página de Login para que el usuario inicie sesión con su nueva 
            // contraseña
            $msg = self::SUCCESS_CHANGE_PASSWD;
            require_once(self::VIEW_LOGIN);
        } catch (Exception $e) {
            // Almacenamos la excepción en el log si fuese necesario
            Utils::save_log_error($e->getMessage());
        }
    }


    /**
     * Comprueba si el codigo de activación introducido coincide con el de la base de 
     * datos. Si coinciden, cambia el codigo de activación de la base de datos a 0.
     * 
     * @param array Array que contiene el correo y el código de activación
     *
     */
    public function account_activation(array $data_login)
    {

        // Englobamos el código en un try/catch para controlar posibles excepciones
        try {
            // Obtenemos los datos del usuario con el correo pasado
            // Validamos y limpiamos los valores del array obtenido 
            $cod_activation_bd = Utils::clean_array($this->user->get_one($data_login["correo"]));

            // Si nos devuelve nulo, algo ha salido mal
            if ($cod_activation_bd === null) {
                // Guardamos mensaje
                $msg = self::ERROR_BD;
                // Incluimos la vista de activacion
                require_once(self::VIEW_ACTIVATION);
                // Tiramos una nueva excepción
                throw new Exception(self::ERROR_BD);
                return;
            }

            // Guardamos el rol de usuario
            $rol_user = $cod_activation_bd["id_rol"];

            // Si todo ha ido bien, guardamos el código de activación de la base de datos
            $cod_activation_bd = $cod_activation_bd["cod_activacion"];

            // Si el código de activación pasado como argumento es igual que el que 
            // tenemos en la base de datos. Definimos una variable llamada $code que
            // será true, en caso contrario, será false
            ($data_login["cod_activacion"] == $cod_activation_bd) ? ($code = true) : ($code = false);

            // Si $code es true, cambiamos el código de activación, si no lo es, 
            // tiramos una nueva excepción
            if (!$code) {
                // Guardamos mensaje
                $msg = self::ERROR_DIFFERENT_CODE;
                // Incluimos la vista de activacion
                require_once(self::VIEW_ACTIVATION);
                // Tiramos una nueva excepción
                throw new Exception(self::ERROR_DIFFERENT_CODE);
                return;
            }

            // Guardamos el resultado obtenido de llamar a la función change_field_value
            $success = $this->user->change_field_value($data_login["correo"], "cod_activacion", 0);

            // Si nos devuelve 0, ha habido un problema al intentar cambiarlo
            if ($success == 0) {
                // Guardamos mensaje
                $msg = self::ERROR_BD;
                // Incluimos la vista de activacion
                require_once(self::VIEW_ACTIVATION);
                // Tiramos una nueva excepción
                throw new Exception(self::ERROR_BD);
                return;
            }

            // Dependiendo del rol asignado al usuario, le llevamos a una vista u otra
            // 1- El usuario es un administrador
            // 2- Es un usuario normal
            $view = ($rol_user == 1) ? self::VIEW_INDEX_ADMIN : self::VIEW_INDEX_USER;

            header("Location:" . $view);
        } catch (Exception $e) {
            // Guardamos la excepción en el log
            Utils::save_log_error($e->getMessage());
        }
    }
}





// Comprobamos que la clave action se encuentra dentro del array de $_REQUEST
$action = (isset($_REQUEST["action"])) ? Utils::clean($_REQUEST["action"]) : "";



// Intanciamos un nuevo objeto de la clase Login()
$login = new Login();
// Definimos un nuevo array
$data_login = [];




// Dependiendo del valor de $action, realizamos una cosa u otra
switch ($action) {



    case "login":
        // Comprobamos que estén las claves correo y passwd en el array $_REQUEST
        if (!isset($_REQUEST["correo"]) || !isset($_REQUEST["passwd"])) {
            // Cambiamos el valor al atributo msg
            $msg = "Contraseña o correo no encontrados";
            // Incluimos la vista login
            require_once("../view/login.php");
            break;
        }

        // Llamamos a la función login y le pasamos como parámetro los valores 
        // limpiados y validados        
        $data_login["correo"] = $_REQUEST["correo"];
        $data_login["passwd"] = $_REQUEST["passwd"];

        $data_login = Utils::clean_array($data_login);

        $login->login($data_login);

        break;



        // Si lo que se va hacer es activar la cuenta
    case "activation":
        
        // Comprobamos que esté la clave de correo y que solo haya dos elementos en el
        // array, la clave correo y la clave action.
        // Si es así, mostramos la vista sin mensaje alguno
        if (!isset($_REQUEST["correo"]) || count($_REQUEST) == 2) {
            // Incluimos la vista login
            require_once("../view/activation.php");
            break;
        }

        // Si están, las almacenamos, limpiamos y validamos las variables y 
        // pasamos el array como argumento a la función account_activation
        // Si todo va bien, nos enviará a la página principal (index_usuario.php si
        // el usuario tiene un rol normal e index_admin.php si es administrador)
        $data_login["correo"] = $_REQUEST["correo"];
        $data_login["cod_activacion"] = $_REQUEST["cod_activacion"];

        $data_login = Utils::clean_array($data_login);

        $login->account_activation($data_login);

        break;



        // Si action vale change_passwd_email, mostraremos la vista de change_passwd_email
        // para insertar el correo al que queremos que nos envíe el correo
    case "change_passwd_email":

        if (!isset($_REQUEST["correo"])) {
            // Incluimos la vista change_passwd_email.php
            require_once("../view/change_passwd_email.php");
            break;
        }
        // Si existe la clave, la guardamos 
        $correo = filter_var(Utils::clean($_REQUEST["correo"]), FILTER_VALIDATE_EMAIL);

        // Llamamos a la función send_email_change_passwd() para enviar el correo
        $login->send_email_change_passwd($correo);
        break;





        // Si action vale change_passwd, mostraremos la vista de change_passwd
        // para introducir la nueva contraseña
    case "change_passwd":

        // Si existe la clave correo y es la única clave del array
        if (isset($_REQUEST["correo"]) && count($_REQUEST) == 2) {
            // Guardamos el correo
            $correo = filter_var(Utils::clean($_REQUEST["correo"]), FILTER_VALIDATE_EMAIL);
            // Incluimos la vista change_passwd_email.php
            require_once("../view/change_passwd.php");
            break;
        }

        // Comprobamos que estén las claves correo, passwd y passwd_2 en el array $_REQUEST
        if (!isset($_REQUEST["correo"]) || !isset($_REQUEST["passwd"]) || !isset($_REQUEST["passwd_2"])) {
            // Cambiamos el valor al atributo msg
            $msg = "¡ERROR! Datos no encontrados";
            // Incluimos la vista login
            // require_once("../view/login.php");
            break;
        }

        // Si están, las almacenamos, limpiamos y validamos las variables y 
        // pasamos el array como argumento a la función account_activation
        // Si todo va bien, nos enviará a la página de Login
        $data_login["correo"] = $_REQUEST["correo"];
        $data_login["passwd"] = $_REQUEST["passwd"];
        $data_login["passwd_2"] = $_REQUEST["passwd_2"];

        $data_login = Utils::clean_array($data_login);

        $login->change_password($data_login);

        break;



        // Si $action tiene como valor "logout"
    case "logout":
        // Llamamos a la función logout para finalizar la sesión
        $login->logout();
        break;



    default:
        // Incluimos la vista de Login
        header("Location:../login.php");
        exit();
        break;
}
