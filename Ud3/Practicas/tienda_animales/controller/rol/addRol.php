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

//cargamos la vista
include("../../view/rol/addRol.php");

//Si rol y descripcion no son nulos
if(isset($_POST["rol"]) && isset($_POST["descripcion"]))
{
    //Añadimos el nuevo rol
    if(($rol->addRol($conBD, ["rol" => $_POST["rol"], "descripcion" => $_POST["descripcion"]])) != null)
    {
        //Redirigimos con header (BUSCAR SI ES ASÍ O NO)
        header("Location:../../controller/rol/mainRol.php");
    }
}

?>