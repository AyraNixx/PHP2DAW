<?php

use pexamen\utils\Utils;
require_once("utils/Utils.php");


    // La contraseña que se pone en sendemail.ini
    // tiene que ser una contraseña de aplicación.
    // Para que te aparezca esta opción en el correo electronico,
    // tienes que activar la verificación en dos pasos:
    // Gestionar tu cuenta de Google > Verificación en dos pasos > Acceder su contraseña 
    // y otorgar un numero telefónico.
    // Una vez hecho esto, volvemos a Gestionar tu cuenta de Google y buscamos
    // Generar una contraseña de aplicación.
    // En aplicación pones Visual Studio Code (? me ha funcionado con esto, no sé si será así)
    // y el tipo de dispositivo Ordenador con Windows

        $cod_activation = Utils::generate_code(5, true);
        // El remitente
        $to = 'thejokerjune@gmail.com';
        // Motivo del correo
        $subject = "Activación de Cuenta";

        // Cuerpo del mensaje
        $msg = "<h1>BIENVENID@</h1>";
        $msg .= "<p>Estimado@ 'Pepa', su cuenta ha sido creada ";
        $msg .= "el " . date("d-m-Y H:i:s") . ". Muchas gracias por confiar en nosotros.</p>";
        $msg .= "<p>Para confirmar tu cuenta, introduzca $cod_activation en la siguiente ";
        $msg .= "página: </p>";
        $msg .= "<button><a style='text-decoration:none; color:black;' href=''>Activar Cuenta</button>";

        echo $msg;
        // Encabezado
        $header = "From: usertiendaanimalesDAW@gmail.com" . "\r\n";
        $header .= "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type: text/html" . "\r\n";

        $response = mail($to, $subject, $msg, $header);

        var_dump($response);
        // Si se ha enviado con éxito
        if($response != false)
        {
            return $cod_activation;
        }else{
            echo "no";
        }

        ?>
