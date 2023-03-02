<?php
use \model\Cliente;
use \model\Utils;

//Añadimos el código del modelo
require_once("../model/Cliente.php");
require_once("../model/Utils.php");

$gestorCli = new Cliente();

//Nos conectamos a la Bd
$conexPDO = Utils::conectar();

$totalClientes = $gestorCli->getClientes($conexPDO);
$numeroPaginacion = count($totalClientes)/10;
$redondeo = round($numeroPaginacion)+1;

//Borramos el cliente
if (isset($_POST["idClientes"]))
{
    //Borramos y guardamos el resultado
    $resultado = $gestorCli->delCliente($_POST["idClientes"],$conexPDO);

    //Si hubo un problema al borrarlo guardamos un mensaje de error
    if ($resultado==null || $resultado==0)
    {
        $mensaje="Error al acceder a la Base de Datos";
    }
    else
    {
        $mensaje="Cliente Eliminado Correctamente";
    }


}


//Recolectamos los datos de los clientes
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




?>