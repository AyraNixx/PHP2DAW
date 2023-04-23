<?php

// Damos un apodo al directorio
namespace model;

require_once "../utils/Utils.php";

use \utils\Utils;
use \PDO;
use \mysqli;
use \PDOException;
use \Exception;


// Creamos una clase Model que contendrá los métodos delete y pagination que heredarán 
// el resto de clases
class Model
{


    // --
    // -- MÉTODOS --------------------
    // --




    protected $conBD;

    // Constructor
    function __construct()
    {
        try {
            // Iniciamos la conexión con la bd
            $this->conBD = Utils::connectBD();
            // En caso de excepción, lo guardamos en el log
        } catch (PDOException $e) {
            echo "todo mal";
            // Guardamos el error en el log
            Utils::save_log_error("PDOException caught: " . $e->getMessage());
        } catch (Exception $e) {
            echo "todo mal";
            // Guardamos el error en el log
            Utils::save_log_error("Unexpected error caught: " . $e->getMessage());
        }
    }


    /**
     * Devuelve todos los registros de una tabla
     * 
     * @param String table
     */
    public function get_all(String $table)
    {
        // Rodeamos el código en un try catch para controlar las excepciones
        try {
            // Query
            $query = "SELECT * FROM $table";
            // Preparamos la consulta para su ejecución
            $stm = $this->conBD->prepare($query);
            // Ejecutamos la consulta
            $stm->execute();
            // Devolvemos resultado obtenido
            return $stm->fetchAll();
        } catch (PDOException $e) {
            // Guardamos el error en el log
            Utils::save_log_error("PDOException caught: " . $e->getMessage());
        } catch (Exception $e) {
            // Guardamos el error en el log
            Utils::save_log_error("Unexpected error caught: " . $e->getMessage());
        }
    }

    /**
     * Devuelve un registro de la tabla indicada
     * 
     * @param String table
     * @param int $id;
     */
    public function get_one(String $table, int $id)
    {
        // Rodeamos el código en un try catch para controlar las excepciones
        try {
            // Query
            $query = "SELECT * FROM $table WHERE id = :id";
            // Preparamos la consulta para su ejecución
            $stm = $this->conBD->prepare($query);
            // Vinculamos los parámetros al nombre de la variable especificada
            $stm->bindParam(":id", $id, PDO::PARAM_STR);
            // Ejecutamos la consulta
            $stm->execute();
            // Devolvemos resultado obtenido
            return $stm->fetch();
        } catch (PDOException $e) {
            // Guardamos el error en el log
            Utils::save_log_error("PDOException caught: " . $e->getMessage());
        } catch (Exception $e) {
            // Guardamos el error en el log
            Utils::save_log_error("Unexpected error caught: " . $e->getMessage());
        }
    }

    /**
     * Elimina un elemento de la tabla indicada como argumento mediante su id
     * 
     * @param String table
     * @param int $id;
     */
    public function delete(String $table, int $id)
    {
        // Rodeamos el código en un try catch para controlar las excepciones
        try {
            // Query
            $query = "DELETE FROM $table WHERE id = :id";
            // Preparamos la consulta para su ejecución
            $stm = $this->conBD->prepare($query);
            // Vinculamos los parámetros al nombre de la variable especificada
            $stm->bindParam(":id", $id, PDO::PARAM_INT);
            // Ejecutamos la consulta y devolvemos resultado obtenido
            return $stm->execute();
        } catch (PDOException $e) {
            // Guardamos el error en el log
            Utils::save_log_error("PDOException caught: " . $e->getMessage());
        } catch (Exception $e) {
            // Guardamos el error en el log
            Utils::save_log_error("Unexpected error caught: " . $e->getMessage());
        }
    }


    /**
     * Devuelve todas las filas de la tabla usuarios de 
     * la base de datos 'tienda_animales' paginada.
     * 
     * @return array Devuelve en forma de array toda la información contenida en la tabla usuarios de la base de datos tienda_animales, de forma paginada
     */
    public function pagination(String $table, string $ord, string $field, int $page, int $amount)
    {
        // Rodeamos el código en un try catch para controlar las excepciones
        try {
            // Calculamos desde que línea se empieza
            $offset = ($page - 1) * $amount;

            // Consulta
            $query = "SELECT * FROM $table ORDER BY $field $ord LIMIT :amount OFFSET :offset";
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
            Utils::save_log_error("PDOException caught: " . $e->getMessage());
        } catch (Exception $e) {
            // Guardamos el error en el log
            Utils::save_log_error("Unexpected error caught: " . $e->getMessage());
        }
        return null;
    }

    /**
     * Devuelve el total de páginas que hay en una tabla según la cantidad de elementos
     * que se quiera enseñar en cada una
     */
    public function total_pages(String $table, int $amount)
    {
        // Contamos todos los elementos que hay en la tabla de usuarios y lo
        // dividimos por la cantidad de elementos que mostramos por página.
        // Luego redondeamos para arriba con ceil.
        return ceil(count(self::get_all($table)) / $amount);
    }
}

?>