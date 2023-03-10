<?php

// En caso de que no exista la clave change en $_POST
if(!isset($_POST["change"]) || !isset($_POST["correo"]))
{
    // Redireccionamos a la página forget_password.php para que el usuario
    // introduzca el email al que deberemos de enviar el enlace para 
    // cambiar su antigua contraseña.
    header("Location: ../view/forget_password");
    exit();
}

// Comprobamos que 




?>