<?php

// Damos un apodo al directorio
namespace controller;

use \utils\Utils;
// use \utils\Route;
use \model\ModeloEjemplo;
use \Exception;

include "../models/ModeloEjemplo.php";
$modelo = new ModeloEjemplo();
$action = isset($_POST['action']) ? $_POST['action'] : '';
var_dump($_POST);
if ($action == 'obtener_registros') {
    $orden = isset($_POST['orden']) ? $_POST['orden'] : 'ASC';
    $registros = $modelo->get_registros($orden);
    echo json_encode($registros);
} elseif ($action == 'agregar_registro') {
    $rol = isset($_POST['rol']) ? $_POST['rol'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $modelo->add(["rol"=>$rol, "descripcion"=>$descripcion]);
} elseif ($action == 'borrar_registro') {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $modelo->soft_delete("perrera.roles", $id);
}

?>