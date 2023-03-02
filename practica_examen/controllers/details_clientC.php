<?php 

use \pexamen\models\Cliente;
use pexamen\utils\Utils;

require_once("../models/Cliente.php");

//Definimos la variable msg para almacenar el mensaje resultante de las acciones
$msg = null;
//Intanciamos un objeto de la clase Cliente
$client = new Cliente();

if(isset($_REQUEST["id"]) && is_numeric($_REQUEST["id"]))
{
    //Almacenamos la info del cliente obtenida al llamar la funcion get_one
    $data_clients = $client->get_one(filter_var(Utils::clean($_REQUEST["id"]), FILTER_VALIDATE_INT));

    //Si $data_clients es distinto de nulo
    if($data_clients != null)
    {
    //Incluimos el archivo details_client.php de vistas
    include("../views/details_client.php");
    // En caso contrario
    }else{
        echo "¡ERROR! No se han podido mostrar más detalles.";
    }

// En caso contrario
}else{
    echo "¡ERROR! No se han podido mostrar más detalles.";
}

?>
