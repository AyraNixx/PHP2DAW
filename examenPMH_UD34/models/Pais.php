<?php

// "Apodo" para el directorio
namespace examenPMH\models;

// Incluimos el archivo Utils.php
require_once("../utils/Utils.php");

// Usamos use para heredar las clases de PDO, PDOException y Exception
use examenPMH\utils\Utils;
use \PDO;
use \PDOException;


class Pais
{
    /**
     * Devuelve todas las filas de la tabla pais de 
     * la base de datos 'tienda'.
     * 
     * @return array Devuelve en forma de array toda la información contenida en la tabla pais de la base de datos tienda
     */
    public function getPaises($conBD)
    {
        //Rodeamos el código en un try catch para controlar las excepciones
        try {
            //  Consulta
            $query = "SELECT * FROM tienda.pais";
            // Preparamos la consulta para su ejecución
            $statement = $conBD->prepare($query);
            //  Ejecutamos la consulta
            $statement->execute();
            // Devolvemos todos los datos obtenidos
            return $statement->fetchAll();
        } catch (PDOException $e) {
            // Guardamos el error en el log
            Utils::save_log_error($e->getMessage());
        }
        return null;
    }

    public function getDireccionesPais($conBD, $id)
    {
        //Rodeamos el código en un try catch para controlar las excepciones
        try {
            //  Consulta
            $query = "SELECT direccion.calle, direccion.numero, direccion.codigoPostal, 
            provincia.nombre AS prov_nombre, pais.nombre AS pais_nombre FROM tienda.pais 
            INNER JOIN tienda.direccion ON pais.id = direccion.idPais 
            INNER JOIN tienda.provincia ON provincia.codProv = direccion.codProvincia
            WHERE direccion.idPais = :id;";
            // Preparamos la consulta para su ejecución
            $statement = $conBD->prepare($query);
            // Vinculamos los parámetros al nombre de la variable especificada
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            //  Ejecutamos la consulta
            $statement->execute();
            // Devolvemos todos los datos obtenidos
            return $statement->fetchAll();
        } catch (PDOException $e) {
            // Guardamos el error en el log
            Utils::save_log_error($e->getMessage());
        }
        return null;
    }
}
?>