<?php //El controlador enlaza la parte del modelo con la vista
use \models\Cliente;
use \models\Utils;


require_once("../model/Cliente.php");
require_once("../model/Utils.php");


$gestorCli = new Cliente();
$msg = null;

//Nos conectamos a la bd
$conexPDO = Utils::conectar();

//Recolectamos los datos de los clientes
$datosClientes = $gestorCli->getClientesPag($conexPDO, true, "idClientes", 1, 10);


include("../views/mostrarClientes.php");




?>