<?php
use pexamen\models\Cliente;
use pexamen\utils\Utils;

require_once("../utils/Utils.php");
require_once("../models/Cliente.php");

// Objeto cliente
$cliente = new Cliente();
echo "<pre>";
var_dump($cliente->update(["idClientes"=>2, "new_id"=>1,"nombre"=>"Juanito","email"=>"pedro@gmail.com", "edad"=>24, "sexo"=>"M"]));
echo "</pre>";
// echo Utils::generate_code();
// echo $cliente->total_pages(5);

?>