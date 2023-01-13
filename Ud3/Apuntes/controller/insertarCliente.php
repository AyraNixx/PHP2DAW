<?php
use models\Cliente;
use models\Utils;

if()
{
    if($resultado != null)
{
    $msg = "El cliente se ha insertado correctamente";
    $datosClientes = $gestorCli->getClientesPag($conexPDO, true, "idClientes", 1, 10);
    include("../views/modificarClientes.php");
}
}
else{
    include("../views/modificarClientes.php");
}
?>