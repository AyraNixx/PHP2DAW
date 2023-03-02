<?php

//Iniciamos la sesion
session_start();
//Ejemplo añadimos un id ficticio a la sesion
$_SESSION['id']=12345;

use \model\Cliente;
use \model\Utils;

//Añadimos el código del modelo
require_once("../model/Cliente.php");
require_once("../model/Utils.php");
$mensaje=null;
$gestorCli = new Cliente();

//Nos conectamos a la Bd
$conexPDO = Utils::conectar();
//Recolectamos los datos de los clientes
$datosClientes = $gestorCli->getClientesPag($conexPDO, true, "idClientes", 1, 10);

//var_dump($datosClientes);
include("../views/mostrarClientes.php");

?>
