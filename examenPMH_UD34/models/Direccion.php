<?php

// "Apodo" para el directorio
namespace examenPMH\models;

// Incluimos el archivo Utils.php
require_once("../utils/Utils.php");

// Usamos use para heredar las clases de PDO, PDOException y Exception
use examenPMH\utils\Utils;
use \PDO;
use \PDOException;


class Direccion
{
    /**
     * Devuelve todas las direcciones que contengan el país indicado
     * 
     * @param PDO $conBD objeto PDO con conexión activa
     * @param int $id Código del país a buscar
     * 
     * @return array Devuelve un array con las direcciones que tengan el país indicado
     */
    public function getDireccionesPais(PDO $conBD, int $id)
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

    /**
     * Devuelve todas las direcciones que contengan la provincia indicada
     * 
     * @param PDO $conBD objeto PDO con conexión activa
     * @param int $id Código de la provincia a buscar
     * 
     * @return array Devuelve un array con las direcciones que tengan la provincia indicada
     */
    public function getDireccionesProv(PDO $conBD, int $id)
    {
        //Rodeamos el código en un try catch para controlar las excepciones
        try {
            //  Consulta
            $query = "SELECT direccion.calle, direccion.numero, direccion.codigoPostal, 
            provincia.nombre AS prov_nombre, pais.nombre AS pais_nombre FROM tienda.pais 
            INNER JOIN tienda.direccion ON pais.id = direccion.idPais 
            INNER JOIN tienda.provincia ON provincia.codProv = direccion.codProvincia
            WHERE direccion.codProvincia = :id;";
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