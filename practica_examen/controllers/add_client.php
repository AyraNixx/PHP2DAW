<?php

use \pexamen\models\Cliente;
use \pexamen\utils\Utils;

require_once("../models/Cliente.php");
require_once("../utils/Utils.php");

// Instanciamos un objeto de la clase Cliente
$client = new Cliente();
$msg = null;

// Si las claves de $_POST no son nulas
if (isset($_POST["idClientes"]) && is_numeric($_POST["idClientes"]) && isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["edad"]) && isset($_POST["sexo"])) {

    // Creamos un nuevo array
    $data_client = [];

    // Almacenamos los valores
    $data_client["nombre"] = $_POST["nombre"];
    $data_client["email"] = $_POST["email"];
    $data_client["edad"] = $_POST["edad"];
    $data_client["sexo"] = $_POST["sexo"];

    // Insertamos el nuevo registro llamando a la funcion add
    // Se mostrará un mesaje u otro dependiendo de si 
    // la función add nos devuelve nulo o no
    if ($client->add(Utils::clean_array($data_client)) != null) {
        $msg = "¡Cliente añadido correctamente!";
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


    // Si alguna clave es nula
} else {
    // Definimos una variable para indicar la acción realizada
    $action = "add";

    // Cargamos la vista
    include("../views/add_or_edit_client.php");
}
?>
