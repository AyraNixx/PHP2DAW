<?php //El controlador enlaza la parte del modelo con la vista
use \models\Cliente;
use \models\Utils;


require_once("../model/Cliente.php");
require_once("../model/Utils.php");


$gestorCli = new Cliente();

//Nos conectamos a la bd
$conexPDO = Utils::conectar();

//Una vez que nos conectamos, borramos el cliente
//Primero comprobamos que se ha pasado un idCliente
if(isset($_POST["idClientes"]))
{
    //Borramos el resultado
    $result = $gestorCli->deleteCliente($_POST["idClientes"], $conexPDO);

    //Si hubo un problema al guardarlo, guardamos un mensaje de error
    if($result == null || $result == 0)
    {
        $msg = "¡Error al acceder a la base de datos!";
    }else{
        $msg = "¡Cliente eliminado con éxito!";
    }
}

include("../views/mostrarClientes.php");




?>