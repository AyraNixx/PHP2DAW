<?php

//Iniciamos la sesion
//session_start();
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

$totalClientes = $gestorCli->getClientes($conexPDO);
$numeroPaginacion = count($totalClientes)/10;
$redondeo = round($numeroPaginacion)+1;
try {
    $posicion[] = $_POST['Pag'];
    if ($posicion[0] == null) {
        $_POST['Pag'] = 1;
        $datosClientes = $gestorCli->getClientesPag($conexPDO, true, "idClientes",$_POST['Pag'], 10);
        //var_dump($datosClientes);
        include("../views/mostrarClientes.php");
    } else{
        $datosClientes = $gestorCli->getClientesPag($conexPDO, true, "idClientes",$_POST['Pag'], 10);
        //var_dump($datosClientes);
        include("../views/mostrarClientes.php");
    }
} catch (\Throwable $th) {
    print("Error al pintar los Datos" . $th->getMessage());
}

