<?php 

require_once("../../utils/Utils.php");
require_once("../../model/User.php");

use \utils\Utils;
use \model\User;

$msg = null;

//Creamos un nuevo objeto perteneciente a la clase Rol
$user = new User();

//Nos conectamos a la base de datos
$conBD = Utils::conectar();

//Obtenemos un array con los datos de los primeros 10 roles
$dataUsers = $user->userPag($conBD, true, "id_user", 1, 10);
include("../../view/admin/showUser.php");

?>