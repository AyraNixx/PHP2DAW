<?php //El controlador enlaza la parte del modelo con la vista
use \models\Cliente;
use \models\Utils;

//Nos conectamos a la bd
$conexPDO = Utils::conectar();

//Una vez que nos conectamos, borramos el cliente
//Primero comprobamos que se ha pasado un idCliente
if (isset($_POST["idClientes"]) && isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["edad"]) && isset($_POST["sexo"])) {
    $client = ["idClientes" => $_POST["idClientes"], "nombre" => $_POST["nombre"], "email" => $_POST["email"], "edad" => $_POST["edad"], "sexo" => $_POST["sexo"]];

    $cliente["idClientes"] = $_POST["idClientes"];
    $cliente["nombre"] = $_POST["nombre"];
    $cliente["email"] = $_POST["email"];
    $cliente["edad"] = $_POST["edad"];
    $cliente["sexo"] = $_POST["sexo"];


    if(isset($_POST["modificar"]) && $_POST["modificar"] == false)
    {
    //Con los datos del cliente cargados, cargamos la vista
    include("../views/updateClient.php");

    }else{
        //Si modificar es true implica que nos ha llamado el formulario y nos ha pasado los
        //Para que los modifiquemos en BD
        require_once("../model/Cliente.php");
        require_once("../model/Utils.php");

        //Nos conectamos a la bd
        $conexPDO = Utils::conectar();
        //Modificamos el registro 
        $gestorCli->updateClien($cliente, $conexPDO);

        //Si ha ido bien el mensaje sera distint
        if($result != null)
        {
            $msg = "El cliente se actualizo correctamente";
        }else{
            $msg = "Ha habido un fallo al acceder a la BD.";
        }
    }


    //Si hubo un problema al guardarlo, guardamos un mensaje de error
    if ($result == null || $result == 0) {
        $msg = "¡Error al acceder a la base de datos!";
    } else {
        $msg = "¡Cliente eliminado con éxito!";
    }
} else {
    require_once("../model/Cliente.php");
    require_once("../model/Utils.php");


    $gestorCli = new Cliente();
}
