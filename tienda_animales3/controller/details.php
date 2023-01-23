<?php
//Como desde index_rol hemos pasado los valores del formulario que incluía todos los campos
//de la tabla, no hace falta que llamemos a la funcion get_one del modelo

//Si el array pasado por POST no es nulo

use model\Rol;

var_dump($_POST);
if(isset($_POST) && isset($_POST["id_rol"]))
{
    $rol = new Rol();
    $data_rol = $rol->get_one($_POST["id_rol"]);
    //Incluimos la vista detalles
    include("../view/details_rol.php");

}else{
    //En caso de que no se haya podido realizar, se guarda un mensaje y se muestra
    $msg = "Ha ocurrido un error, no se han podido mostrar más detalles";
    echo $msg;
}


?>;