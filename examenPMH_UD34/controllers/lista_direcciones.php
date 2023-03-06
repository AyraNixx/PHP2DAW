<?php

use \examenPMH\models\Pais;
use \examenPMH\models\Provincia;

use examenPMH\utils\Utils;

require_once("../models/Pais.php");
require_once("../models/Provincia.php");

//Definimos la variable msg para almacenar el mensaje resultante de las acciones
$msg = null;
//Definimos un array para guardar direcciones
$data_direcciones = null;
//Intanciamos un objeto de la clase Pais
$pais = new Pais();
//Intanciamos un objeto de la clase Provincia
$provincia = new Provincia();
//Nos conectamos a la Bd
$conBD = Utils::connect();
//Obtenemos todos los elementos de la tabla pais
$data_pais = $pais->getPaises($conBD);
//Obtenemos todos los elementos de la tabla provincia
$data_provincia = $provincia->getProvincias($conBD);

// Si la clave opcion no es nula
if (isset($_POST["opcion"])) {

    //  Vemos la opción elegida
    switch ($_POST["opcion"]) {
            // Si es pais
        case "pais":
            // Obtenemos todas las direcciones del país seleccionado
            $data_direcciones = $pais->getDireccionesPais($conBD, $_POST["pais"]);
            // Si es distinto de nulo
            if ($data_direcciones == null) {
                echo "no";
                // Guardamos el mensaje de error
                $msg = "¡Error! No se ha podido acceder a la base de datos.";
            }
            break;

            // Si es provincia
        case "prov":
            // Obtenemos todas las direcciones del país seleccionado
            $data_direcciones = $provincia->getDireccionesProv($conBD, $_POST["prov"]);

            // Si es distinto de nulo
            if ($data_direcciones == null) {
                // Guardamos el mensaje de error
                $msg = "¡Error! No se ha podido acceder a la base de datos.";
            }
            break;
    }
}

// Si es distinto de nulo
if ($data_pais != null && $data_provincia != null) {
    //Incluimos el archivo index_clients.php
    include("../views/mostrar_direcciones.php");
} else {
    Utils::save_log_error("No se ha podido acceder a la Base de Datos");
}
