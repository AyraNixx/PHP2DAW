<?php

use \pexamen\models\Cliente;
use \pexamen\utils\Utils;

require_once("../models/Cliente.php");

// Instanciamos un objeto de la clase Cliente
$client = new Cliente();
$msg = null;

// Si las claves de $_POST no son nulas
if (isset($_POST["idClientes"]) && isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["edad"]) && isset($_POST["sexo"])) {


    // Creamos un nuevo array
    $data_client = [];

    // Almacenamos los valores
    $data_client["idClientes"] = $_POST["idClientes"];
    $data_client["nombre"] = $_POST["nombre"];
    $data_client["email"] = $_POST["email"];
    $data_client["edad"] = $_POST["edad"];
    $data_client["sexo"] = $_POST["sexo"];

    
    // Si la clave update es nula y false
    if (isset($_POST["update"]) && $_POST["update"] == "false") {
       
        // Indicamos que la acción a realizar es modificar (update)
        // y cargamos la vista
        $action = "update";

        include("../views/add_or_edit_client.php");

        // En caso contrario
    } else {
        // Modificamos el registro llamando al método update.
        // Se mostrará un mesaje u otro dependiendo de si 
        // la función update nos devuelve nulo o no
        if ($client->update(Utils::clean_array($_POST)) != null) {
            $msg = "¡Cliente modificado correctamente!";
        } else {
            $msg = "¡Error! No se ha podido acceder correctamente";
        }

        // Igualamos page a uno
        $page = 1;
        // Almacenamos los datos de los clientes paginados
        $data_clients = $client->pagination("ASC", "nombre", $page, 10);
        // Obtenemos el total de páginas
        $pages = $client->total_pages(10);

        // Incluimos el archivo index_clients.php
        include("../views/index_clients.php");
    }

    // Si alguna clave es nula
} else {
    // Igualamos page a uno
    $page = 1;
    // Almacenamos los datos de los clientes paginados
    $data_clients = $client->pagination("ASC", "nombre", $page, 10);
    // Obtenemos el total de páginas
    $pages = $client->total_pages(10);

    // Incluimos el archivo index_clients.php
    include("../views/index_clients.php");
}
