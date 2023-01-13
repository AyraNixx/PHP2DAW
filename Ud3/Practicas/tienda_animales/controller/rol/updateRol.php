<?php
require_once("../../utils/Utils.php");
require_once("../../model/Rol.php");

use \utils\Utils;
use \model\Rol;

//Creamos un array para almacenar los valores pasados por POST
$rol = [];

$updateRol = new Rol();
$conBD = Utils::conectar();

//Si las variables que nos han pasado por $_POST no son nulas
if (isset($_POST["id_rol"]) && isset($_POST["rol"]) && isset($_POST["descripcion"])) {
    //Almacenamos sus valores en $rol
    $rol["id_rol"] = $_POST["id_rol"];
    $rol["rol"] = $_POST["rol"];
    $rol["descripcion"] = $_POST["descripcion"];

    //cargamos la vista
    include("../../view/rol/updateRol.php");

    if (isset($_POST["submit"])) {
        if (($updateRol->updateRol($conBD, $rol)) != null) {

            header("Location:../../controller/rol/mainRol.php");
        }
    }
} else {
    header("Location:../../controller/rol/mainRol.php");
}
