<?php 

require_once("../../utils/Utils.php");
require_once("../../model/Rol.php");

use \utils\Utils;
use \model\Rol;

//Creamos un objeto de la clase Rol
$rol = new Rol();

//Nos conectamos a la base de datos, usamos el metodo conectar de la clase Utils
//que nos devuelve un objeto PDO
$conBD = Utils::conectar();

//Si id_rol no es nulo o si no se ha escrito nada
if(isset($_POST["id_rol"]) && $_POST["id_rol"] != "")
{
    //Eliminamos el rol
    $msg = ($rol->deleteRol($conBD, $_POST["id_rol"])) ? "Eliminado con éxito" : "Error al acceder a la base de datos";
    header("Location:../../controller/rol/mainRol.php");//??????
}

?>