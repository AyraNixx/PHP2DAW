<?php 

use \pexamen\models\Cliente;

require_once("../models/Cliente.php");

//Definimos la variable msg para almacenar el mensaje resultante de las acciones
$msg = null;
//Intanciamos un objeto de la clase Cliente
$client = new Cliente();

//Si en $_REQUEST, la clave page no es nula
if(isset($_REQUEST["page"]))
{
    // Guardamos la página
    $page = $_REQUEST["page"];
}else{
    // Si no, ponemos la primera página
    $page = 1;
}

//Obtenemos todos los elementos de la tabla cliente paginados llamando a la 
//función pagination
$data_clients = $client->pagination("ASC", "nombre", $page, 10);

//Obtenemos el total de páginas que hay para la tabla
$pages = $client->total_pages(10);

//Incluimos el archivo index_clients.php
include("../views/index_clients.php");

?>