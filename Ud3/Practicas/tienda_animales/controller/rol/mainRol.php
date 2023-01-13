<?php 

require_once("../../utils/Utils.php");
require_once("../../model/Rol.php");

use \utils\Utils;
use \model\Rol;

$msg = null;

//Creamos un nuevo objeto perteneciente a la clase Rol
$rol = new Rol();

//Nos conectamos a la base de datos
$conBD = Utils::conectar();

//Obtenemos un array con los datos de los primeros 10 roles
$dataRoles = $rol->rolPag($conBD, true, "id_rol", 1, 10);
include("../../view/rol/showRol.php");

?>