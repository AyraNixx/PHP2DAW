<?php

// "Apodo" para el directorio
namespace pexamen\models;

// Incluimos el archivo Utils.php
require_once("../utils/Utils.php");

// Usamos use para heredar las clases de PDO, PDOException y Exception
use pexamen\utils\Utils;
use \PDO;
use \PDOException;


class Producto
{
    // Definimos como producto privado $conBD
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
     * Devuelve todas las filas de la tabla productos de 
     * la base de datos 'tienda'.
     * 
     * @return array Devuelve en forma de array toda la información contenida en la tabla productos de la base de datos tienda
     */
    public function get_all()
    {
        //Rodeamos el código en un try catch para controlar las excepciones
        try {
            //  Consulta
            $query = "SELECT * FROM tienda.productos";
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
     * Devuelve el producto especificado 
     * 
     * @param int $id Identificador del producto.
     * 
     * @return array Array que contiene todos los datos del producto indicado.
     */
    public function get_one(int $id)
    {
        //Rodeamos el código en un try catch para controlar las excepciones
        try {
            //  Consulta
            $query = "SELECT * FROM tienda.productos WHERE idProductos = :id";
            // Preparamos la consulta para su ejecución
            $statement = $this->conBD->prepare($query);
            // Vinculamos los parámetros al nombre de la variable especificada
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            //  Ejecutamos la consulta
            $statement->execute();
            // Devolvemos todos los datos obtenidos
            return $statement->fetch();
        } catch (PDOException $e) {
            // Guardamos el error en el log
            Utils::save_log_error($e->getMessage());
        }
        return null;
    }


    /**
     * Inserta un nuevo producto a la base de datos.
     * 
     * @param array $product Producto que queremos insertar.
     * 
     * @return mixed Devuelve true si se ha insertado correctamente y null si no se ha podido
     */
    public function add(array $product)
    {        
        //Rodeamos el código en un try catch para controlar las excepciones
        try {
            //  Consulta
            $query = "INSERT INTO tienda.productos (name, descripcion, peso, tamano, cantidad, preciO) VALUES (:name, :descripcion, :peso, :tamano, :cantidada, :precio)";
            // Preparamos la consulta para su ejecución
            $statement = $this->conBD->prepare($query);
            // Vinculamos los parámetros al nombre de la variable especificada
            $statement->bindParam(":name", $product["name"], PDO::PARAM_STR);
            $statement->bindParam(":descripcion", $product["descripcion"], PDO::PARAM_STR);
            $statement->bindParam(":peso", $product["peso"], PDO::PARAM_INT);
            $statement->bindParam(":tamano", $product["tamano"], PDO::PARAM_INT);
            $statement->bindParam(":cantidad", $product["cantidad"], PDO::PARAM_INT);
            $statement->bindParam(":precio", $product["precio"], PDO::PARAM_STR);
            //  Ejecutamos la consulta
            return $statement->execute();
        } catch (PDOException $e) {
            // Guardamos el error en el log
            Utils::save_log_error($e->getMessage());
        }
        return null;
    }


    /**
     * Modifica un producto en específico
     * 
     * @param array $product Producto que queremos modificar
     * 
     * @return mixed Devuelve true si se ha insertado correctamente y null si no se ha podido
     */
    public function update(array $product)
    {
        //Rodeamos el código en un try catch para controlar las excepciones
        try {
            //  Consulta
            $query = "UPDATE tienda.productos SET idProductos = :new_id, name = :name, descripcion = :descripcion, peso = :peso, tamano = :tamano, cantidad = :cantidad, precio = :precio where idProductos= :id";
            // Preparamos la consulta para su ejecución
            $statement = $this->conBD->prepare($query);
            // Vinculamos los parámetros al nombre de la variable especificada
            $statement->bindParam(":new_id", $product["new_id"], PDO::PARAM_INT);
            $statement->bindParam(":id", $product["idProductos"], PDO::PARAM_INT);
            $statement->bindParam(":name", $product["name"], PDO::PARAM_STR);
            $statement->bindParam(":descripcion", $product["descripcion"], PDO::PARAM_STR);
            $statement->bindParam(":peso", $product["peso"], PDO::PARAM_INT);
            $statement->bindParam(":tamano", $product["tamano"], PDO::PARAM_INT);
            $statement->bindParam(":cantidad", $product["cantidad"], PDO::PARAM_INT);
            $statement->bindParam(":precio", $product["precio"], PDO::PARAM_STR);
            //  Ejecutamos la consulta
            return $statement->execute();
        } catch (PDOException $e) {
            // Guardamos el error en el log
            Utils::save_log_error($e->getMessage());
        }
        return null;
    }


    /**
     * Elimina el producto especificado 
     * 
     * @param int $id Identificador del producto.
     * 
     * @return bool Devuelve true si se ha eliminado con éxito.
     */
    public function delete(int $id)
    {
        //Rodeamos el código en un try catch para controlar las excepciones
        try {
            //  Consulta
            $query = "DELETE FROM tienda.productos WHERE idProductos = :id";
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
     * Devuelve todas las filas de la tabla productos de 
     * la base de datos 'tienda' paginada.
     * 
     * @return array Devuelve en forma de array toda la información contenida en la tabla productos de la base de datos tienda, de forma paginada
     */
    public function pagination(string $ordAsc, string $field, int $page, int $amount)
    {
        try {
            // Calculamos desde que línea se empieza
            $offset = ($page - 1) * $amount;

            // Consulta
            $query = "SELECT * FROM tienda.productos ORDER BY $field $ordAsc LIMIT :amount OFFSET :offset";
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
        // Contamos todos los elementos que hay en la tabla de productos y lo
        // dividimos por la cantidad de elementos que mostramos por página.
        // Luego redondeamos para arriba con ceil.
        return ceil(count(self::get_all())/$amount);
    }
}
?>
