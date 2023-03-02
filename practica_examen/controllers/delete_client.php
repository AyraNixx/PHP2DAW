<?php 

use \pexamen\models\Cliente;
use pexamen\utils\Utils;

require_once("../models/Cliente.php");

// Definimos la variable msg para almacenar el mensaje resultante de las acciones
$msg = null;
// Intanciamos un objeto de la clase Cliente
$client = new Cliente();

// Si en $_REQUEST, la clave page no es nula
if(isset($_REQUEST["idClientes"]))
{
    // Almacenamos el id limpiado y validado
    $id_client = filter_var(Utils::clean($_REQUEST["idClientes"]), FILTER_VALIDATE_INT);

    // Dependiendo de si el método delete nos devuelve nulo o no, guardamos 
    // un mensaje u otro.
    if($client->delete($id_client) != null)
    {
        $msg = "¡Cliente eliminado correctamente!";
    }else{
        $msg = "¡Error! No se ha podido conectar con la base de datos";
    }  
}

// Igualamos page a uno
$page = 1;
// Almacenamos los datos de los clientes paginados
$data_clients = $client->pagination("ASC", "nombre", $page, 10);
// Obtenemos el total de páginas
$pages = $client->total_pages(10);


//Incluimos el archivo index_clients.php
include("../views/index_clients.php");

?>