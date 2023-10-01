<?php


namespace utils;

use \PDO;
use \PDOException;
use \Exception;

class Utils
{


    /**
     * Inicia conexión con una base de datos.
     * @return PDO Devuelve una conexión PDO
     */
    public static function connectBD()
    {
        require_once "global.php";
        // Definimos conBD
        $conBD = null;

        //Englobamos el codigo en un try/catch para que en caso de error de conexión
        //se lance un objeto PDOException
        try {
            //Para establecer una conexion, creamos una instancia de la clase PDO.
            //Se le pasarán como argumentos el host, el nombre de la base de datos, 
            //el usuario y su contraseña en caso de que tuviese una.
            //En mi caso, no he especificado contrasenia porque no tengo.
            //Si usase contraseá, la añadiría después de $DB_USER
            return $conBD = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_SCHEMA, DB_USER);
        } catch (PDOException $e) {
            //Llamamos a la funcion save_log_error de la misma clase
            self::save_log_error($e->getMessage());
            //Devolvemos $conBD, que será null si no se pudo realizar la conexion 
            //correctamente.
            return $conBD;
            //Alias de exit(), finaliza el script. 
            die();
        } catch (Exception $e) {
            //Llamamos a la funcion save_log_error de la misma clas
            self::save_log_error($e->getMessage());
            //Devolvemos $conBD, que será null si no se pudo realizar la conexion 
            //correctamente.
            return $conBD;
            //Alias de exit(), finaliza el script. 
            exit();
        }
    }









    /***********************************************************************
     *                                                                     *
     *                         EXCEPCIONES - LOG                           *
     *                                                                     *
     ***********************************************************************/

    /**
     * Guarda las excepciones en un log, indicando la fecha y hora en el que se produjo
     */
    public static function save_log_error($error, $path = "../logs/log.log")
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
     *                         CODE ACTIVACIÓN O SALT                      *
     *                                                                     *
     ***********************************************************************/










    public static function send_email($data)
    {
        // URL de la API
        $url = 'https://api.sendinblue.com/v3/smtp/email';

        // API KEY
        $apiKey = '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';

        // VARIABLES NECESARIAS PARA EL CORREO ELECTRÓNICO
        $subject = 'Código de activación'; // ASUNTO
        // CONTENIDO HTML
        // $htmlContent = '<p>Tu código de activación es: '.$data["codActivacion"].'</p>';
        $htmlContent = self::reset_passwd_email();
        $senderEmail = 'info@patas-arriba.com';
        $senderName = 'Patas arriba - Perrera';
        $recipientEmail = $data["email"];

        $data = array(
            'sender' => array('name' => $senderName, 'email' => $senderEmail),
            'to' => array(array('email' => $recipientEmail)),
            'subject' => $subject,
            'htmlContent' => $htmlContent
        );

        $data_string = json_encode($data);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'api-key: ' . $apiKey
        ));

        $response = curl_exec($ch);

        curl_close($ch);

        $result = json_decode($response, true);
    }


    public static function reset_passwd_email()
    {
        return '
    <!DOCTYPE html>
    <html lang="es">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recuperar contraseña</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="../../public/imgs/logos/logo1.png" type="image/x-icon">
        <style>
            body {
                margin: 0;
                padding: 0;
                background-color: #ffffff;
                color: #000000;
                font-family: "Lato", sans-serif;
                font-size: 16px;
                line-height: 1.5;
            }

            .container {
                width: 100%;
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
            }

            .logo {
                text-align: center;
                margin-bottom: 20px;
                height: 70px;
                background: #a8b9e0;
                width: 70px;
                padding: 1.3em;
                border-radius: 50%;
                box-sizing: border-box;
                margin:0 auto;
            }

            .logo img {
                object-fit: contain;
                width: 100%;
                height: 100%;
            }

            .header
            {
                padding:1em;
                background: #a8b9e0;
                border-bottom: 5px solid #425C81;                
            }

            .header h1
            {
                font-size: 1.5rem;
                color: #fbfbfb;
                letter-spacing: .5em;
                font-weight: 300;
            }

            .title h3
            {
                font-size: 1.3rem;
                color: #426081;
            }

            .title, .header {
                margin: 0 auto;
                text-align: center;
                margin-bottom: 20px;
                font-weight: bold;
                text-transform: uppercase;
            }

            .content {
                padding: 30px;
                border-radius: 4px;
                margin-bottom: 20px;
            }

            .message {
                margin-bottom: 20px;
                color: gray;
                font-size:.8em;
            }

            .button-container {
                text-align: center;
                margin: 3em;
            }

            .button {
                display: inline-block;
                background-color: #426081;
                padding: 12px 24px;
            }

            .button-container a 
            {
                text-decoration:none;
                color:white;
                text-transform: uppercase;
                font-size: 1rem;
                padding: 1em;
            }

            .footer {
                background-color: #a8b9e0;
                padding: 20px;
                text-align: center;
                color: #ffffff;
            }

            .footer p {
                margin: 0;
                padding: 0;
                font-size: 14px;
            }
        </style>
    </head>
    
    <body>
        <div class="container">
            <div class="header">                
                <h1>PATAS ARRIBA</h1>
            </div>
            <div class="title">
                <div class="logo">
                    <img src="https://www.pngkit.com/png/full/333-3331142_white-lock-png-download-white-padlock-icon-png.png" alt="Logo" />
                </div>
                <h3>Restablece tu contraseña<h3>
            </div>
            <div class="content">
                <p class="message">Hola $array["nombre"],</p>
                <p class="message">Te hemos enviado este email en respuesta a tu petición de restablecer tu contraseña.</p>
                <p class="message">Para restablecer tu contraseña, haz clic en el siguiente enlace:</p>
                <div class="button-container">
                    <a href="https://facebook.com" class="button">Restablecer Contraseña</a>
                </div>
                <i class="message fst-italic">Por favor, ignora este mensaje si no has solicitado cambiar tu contraseña.</i>
            </div>
            <div class="footer">
                <p>Patas Arriba</p>
                <p>C/ No existente 4, nº 3G</p>
                <p>+111223344</p>
            </div>
        </div>
    </body>
    
    </html>';

    }

    public static function save_imgTEST(array $file, $idusuario)
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
        $file_name = $idusuario ."-". uniqid() . "." . end($end);
        //Carpeta de destino
        $file_path = "../src/imagenes/" . $file_name;

        //Usamos move_uploaded_file para mover el archivo subido a la carpeta indicada
        //Utilizamos $file["tmp_name] porque es la ubicación temporal donde se encuentra
        //el archivo subido, el segundo argumento es la ruta al repositorio
        move_uploaded_file($file["tmp_name"], $file_path);
        //Devolvemos la url
        return $file_path;
    }
}


Utils::send_email(["name" => "Pepe", "email" => "thejokerjune@gmail.com", "codActivacion" => "122"]);
