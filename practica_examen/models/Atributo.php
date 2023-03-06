<?php

// "Apodo" para el directorio
namespace pexamen\models;

// Incluimos el archivo Utils.php
require_once("../utils/Utils.php");

// Usamos use para heredar las clases de PDO, PDOException y Exception
use pexamen\utils\Utils;
use \PDO;
use \PDOException;


class Atributo
{
    // Definimos como atributo privado $conBD
    private $conBD;

    //Constructor
    function __construct()
    {
        try {
            //Iniciamos conexion con la base de datos
            $this->conBD = Utils::connect();
            // Si no se ha podido iniciar la conexión, mandamos el error al log
        } catch (PDOException $e) {
            Utils::save_log_error($e->getMessage());
        }
    }




    // --
    // -- MÉTODOS --------------------
    // --


    /**
     * Devuelve todas las filas de la tabla atributos de 
     * la base de datos 'tienda'.
     * 
     * @return array Devuelve en forma de array toda la información contenida en la tabla atributos de la base de datos tienda
     */
    public function get_all()
    {
        //Rodeamos el código en un try catch para controlar las excepciones
        try {
            //  Consulta
            $query = "SELECT * FROM tienda.atributos";
            // Preparamos la consulta para su ejecución
            $statement = $this->conBD->prepare($query);
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
     * Devuelve el atributo especificado 
     * 
     * @param int $id Identificador del atributo.
     * 
     * @return array Array que contiene todos los datos del atributo indicado.
     */
    public function get_one(int $id)
    {
        //Rodeamos el código en un try catch para controlar las excepciones
        try {
            //  Consulta
            $query = "SELECT * FROM tienda.atributos WHERE idAtributos = :id";
            // Preparamos la consulta para su ejecución
            $statement = $this->conBD->prepare($query);
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
     * Inserta un nuevo atributo a la base de datos.
     * 
     * @param array $attribute Atributo que queremos insertar.
     * 
     * @return mixed Devuelve true si se ha insertado correctamente y null si no se ha podido
     */
    public function add(array $attribute)
    {        
        //Rodeamos el código en un try catch para controlar las excepciones
        try {
            //  Consulta
            $query = "INSERT INTO tienda.atributos (nombre, descripcion, tipo, valor) VALUES (:nombre, :descripcion, :tipo, :valor)";
            // Preparamos la consulta para su ejecución
            $statement = $this->conBD->prepare($query);
            // Vinculamos los parámetros al nombre de la variable especificada
            $statement->bindParam(":nombre", $attribute["nombre"], PDO::PARAM_STR);
            $statement->bindParam(":descripcion", $attribute["descripcion"], PDO::PARAM_STR);
            $statement->bindParam(":tipo", $attribute["tipo"], PDO::PARAM_INT);
            $statement->bindParam(":valor", $attribute["valor"], PDO::PARAM_STR);
            //  Ejecutamos la consulta
            return $statement->execute();
        } catch (PDOException $e) {
            // Guardamos el error en el log
            Utils::save_log_error($e->getMessage());
        }
        return null;
    }


    /**
     * Modifica un atributo en específico
     * 
     * @param array $attribute Atributo que queremos modificar
     * 
     * @return mixed Devuelve true si se ha insertado correctamente y null si no se ha podido
     */
    public function update(array $attribute)
    {
        //Rodeamos el código en un try catch para controlar las excepciones
        try {
            //  Consulta
            $query = "UPDATE tienda.atributos SET idAtributos = :new_id, nombre = :nombre, descripcion = :descripcion, tipo = :tipo, valor = :valor where idAtributos= :id";
            // Preparamos la consulta para su ejecución
            $statement = $this->conBD->prepare($query);
            // Vinculamos los parámetros al nombre de la variable especificada
            $statement->bindParam(":new_id", $attribute["new_id"], PDO::PARAM_INT);
            $statement->bindParam(":id", $attribute["idAtributos"], PDO::PARAM_INT);
            $statement->bindParam(":nombre", $attribute["nombre"], PDO::PARAM_STR);
            $statement->bindParam(":descripcion", $attribute["descripcion"], PDO::PARAM_STR);
            $statement->bindParam(":tipo", $attribute["tipo"], PDO::PARAM_INT);
            $statement->bindParam(":valor", $attribute["valor"], PDO::PARAM_STR);
            //  Ejecutamos la consulta
            return $statement->execute();
        } catch (PDOException $e) {
            // Guardamos el error en el log
            Utils::save_log_error($e->getMessage());
        }
        return null;
    }


    /**
     * Elimina el atributo especificado 
     * 
     * @param int $id Identificador del atributo.
     * 
     * @return bool Devuelve true si se ha eliminado con éxito.
     */
    public function delete(int $id)
    {
        //Rodeamos el código en un try catch para controlar las excepciones
        try {
            //  Consulta
            $query = "DELETE FROM tienda.atributos WHERE idAtributos = :id";
            // Preparamos la consulta para su ejecución
            $statement = $this->conBD->prepare($query);
            // Vinculamos los parámetros al nombre de la variable especificada
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            //  Ejecutamos la consulta
            return $statement->execute();
        } catch (PDOException $e) {
            // Guardamos el error en el log
            Utils::save_log_error($e->getMessage());
        }
        return null;
    }


    /**
     * Devuelve todas las filas de la tabla atributos de 
     * la base de datos 'tienda' paginada.
     * 
     * @return array Devuelve en forma de array toda la información contenida en la tabla atributos de la base de datos tienda, de forma paginada
     */
    public function pagination(string $ordAsc, string $field, int $page, int $amount)
    {
        try {
            // Calculamos desde que línea se empieza
            $offset = ($page - 1) * $amount;

            // Consulta
            $query = "SELECT * FROM tienda.atributos ORDER BY $field $ordAsc LIMIT :amount OFFSET :offset";
            // Preparamos la consulta para su ejecución
            $statement = $this->conBD->prepare($query);
            // Vinculamos los parámetros al nombre de la variable especificada
            $statement->bindParam(":amount", $amount, PDO::PARAM_INT);
            $statement->bindParam(":offset", $offset, PDO::PARAM_INT);
            // Ejecutamos la consulta
            $statement->execute();
            //Devolvemos las filas resultantes
            return $statement->fetchAll();
        } catch (PDOException $e) {
            // Guardamos el error en el log
            Utils::save_log_error($e->getMessage());
        }
        return null;
    }

    /**
     * Devuelve la cantidad de páginas que hay según la cantidad de elementos que 
     * se muestren en cada página.
     * 
     * @return int Páginas totales.
     */
    public function total_pages(int $amount)
    {
        // Contamos todos los elementos que hay en la tabla de atributos y lo
        // dividimos por la cantidad de elementos que mostramos por página.
        // Luego redondeamos para arriba con ceil.
        return ceil(count(self::get_all())/$amount);
    }
}
?>
