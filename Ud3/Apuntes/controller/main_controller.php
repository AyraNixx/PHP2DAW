<?php //El controlador enlaza la parte del modelo con la vista
//Iniciamos sesion
session_start();
//Ejemplo, añadamos un id ficticio a la sesion

$_SESSION["id"] = 12345;
//Existe un session close
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

//Cookies muy parecidas a la sesion, diferencia, se guarda en el navegador por lo que 
//hay que tener cuidado con lo que guardamos en el 
//Las cookies es mejor para cuando no hacemos login(?)
//Cuando la creemos podemos indicar la fecha de expiracion
//argumento nombre, valor, tiempo de expiracion, etc
//para acceder a ella se accede con $_COOKIE
//Si está el id en cookie pues hacemos esto sino hacemos lo otro (explicacion chorra
//para hacer un condicional)


?>