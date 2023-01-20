<?php

use \model\Rol;

require_once("../model/Rol.php");

//Creamos un nuevo objeto perteneciente a la clase Rol
$rol = new Rol();

//Si option no es nulo
if (isset($_POST["option"])) {
    //Comprobamos que el resto de los campos tampoco lo sean
    if (isset($_POST["id_rol"]) && $_POST["rol"] && $_POST["descripcion"]) {
        //Almacenamos en un array los valores para pasarlos
        $data_rol["id_rol"] = ($_POST["id_rol"]);
        $data_rol["rol"] = $_POST["rol"];
        $data_rol["descripcion"] = $_POST["descripcion"];
        //Dependiendo de la opcion, se llamará a una funcion u otra
        switch ($_POST["option"]) {
                //Si option es 1, llama a la funcion de añadir un nuevo rol       
            case 1:
                $rol->add($new_rol);
                break;
                //Si option es 2, llama a la funcion de modificar un rol
            case 2:
                $rol->update($data_rol);
                break;
                //Si option es 3, llama a la funcion de eliminar un rol
            case 3:
                $rol->delete($data_rol["id_rol"]);
                break;
        }
    }
} else {
    //Almacenamos los datos de los clientes
    $data_rol = $rol->pagination(true, "rol", 1, 5);
    include("../view/rol/index.php");
}
