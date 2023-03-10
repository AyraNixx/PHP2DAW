<?php

namespace model;

use \utils\Utils;

require_once("../utils/Utils.php");

use \PDO;
use \PDOException;

class Product
{
    private $conBD;

    function __construct()
    {
        try {
            //Iniciamos conexion con la base de datos
            $this->conBD = Utils::conectar();
        } catch (PDOException $e) {
            Utils::save_log_error($e->getMessage());
        }
    }


    /**
     * 
     *      MÉTODOS
     * 
     */


    //Función que devuelve todas las filas de la tabla productos
    function get_all()
    {
        try {
            //Definimos la consulta
            $query = "SELECT * FROM tienda_animales.productos;";
            //Preparamos la consulta para su ejecución
            $statement = $this->conBD->prepare($query);
            //Ejecutamos la consulta
            $statement->execute();
            //Devolvemos el resultado obtenido
            return $statement->fetchAll();
        } catch (PDOException $e) {
            Utils::save_log_error($e->getMessage());
        }
        return null;
    }


    //Función que devuelve el producto indicado
    function get_one(int $id_producto)
    {
        //Si id no es nulo y es numerico
        if (isset($id_producto) && is_numeric($id_producto)) {
            try {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.productos WHERE id_producto = :id_producto";
                //Preparamos la sentencia
                $statement = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $statement->bindParam(":id_producto", $id_producto, PDO::PARAM_INT);
                //Ejecutamos la consulta
                $statement->execute();
                //Devolvemos el resultado obtenido
                return $statement->fetch();
            } catch (PDOException $e) {
                Utils::save_log_error($e->getMessage());
            }
            return null;
        }
    }

    //Funcion que añade un nuevo producto
    function add(array $product)
    {
        //Si $product no es nulo, así como ningunao de sus valores
        if (isset($product) && isset($product["nombre"]) && isset($product["precio"]) && isset($product["stock"]) && isset($product["categoria"]) && isset($product["img"])) {
            try {                
                //Definimos la consulta
                $query = "INSERT INTO tienda_animales.productos (nombre, precio, stock, categoria, foto) VALUES (:nombre, :precio, :stock, :categoria, :img)";
                //Preparamos la sentencia
                $statement = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $statement->bindParam(":nombre", $product["nombre"], PDO::PARAM_STR);
                $statement->bindParam(":precio", $product["precio"], PDO::PARAM_STR);
                $statement->bindParam(":stock", $product["stock"], PDO::PARAM_INT);
                $statement->bindParam(":categoria", $product["categoria"], PDO::PARAM_INT);                
                $statement->bindParam(":img", $product["img"], PDO::PARAM_STR);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                return $statement->execute();
            } catch (PDOException $e) {
                Utils::save_log_error($e->getMessage());
            }

            return null;
        }
    }


    //Funcion que actualiza un nombre
    function update(array $product)
    {
        //Comprobamos que no sea nulo
        if (isset($product["id_producto"]) && isset($product["new_id"]) && isset($product["nombre"]) && isset($product["precio"]) && isset($product["stock"]) && isset($product["categoria"]) && isset($product["img"])) {
            try {
                //Definimos la consulta
                $query = "UPDATE tienda_animales.productos SET id_producto=:new_id, nombre=:nombre, precio=:precio, stock=:stock, categoria=:categoria, foto=:img WHERE id_producto=:id_producto";
                //Preparamos la sentencia
                $statement = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $statement->bindParam(":id_producto", $product["id_producto"], PDO::PARAM_INT);
                $statement->bindParam(":new_id", $product["new_id"], PDO::PARAM_INT);
                $statement->bindParam(":nombre", $product["nombre"], PDO::PARAM_STR);
                $statement->bindParam(":precio", $product["precio"], PDO::PARAM_STR); //Utilizamos PDO::PARAM_STR PORQUE NO HAY PARA FLOAT
                $statement->bindParam(":stock", $product["stock"], PDO::PARAM_INT);
                $statement->bindParam(":categoria", $product["categoria"], PDO::PARAM_INT);
                $statement->bindParam(":img", $product["img"], PDO::PARAM_STR);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                $result = $statement->execute();
                return $result;
            } catch (PDOException $e) {
                Utils::save_log_error($e->getMessage());
                return null;
            }
        }
    }



    //Funcion que elimina el nombre indicado
    function delete(int $id_producto)
    {
        //Si id no es nulo y es numerico
        if (isset($id_producto) && is_numeric($id_producto)) {
            try {
                //Definimos la consulta
                $query = "DELETE FROM tienda_animales.productos WHERE id_producto=:id_producto";
                //Preparamos la sentencia
                $statement = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $statement->bindParam(":id_producto", $id_producto, PDO::PARAM_INT);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                return $statement->execute();
            } catch (PDOException $e) {
                Utils::save_log_error($e->getMessage());
            }
            return null;
        }
    }


    //Funcion que devuelve la tabla paginada
    function pagination(string $ordAsc, string $field, int $numPag, int $amount)
    {
        try {
            //Calculamos desde que línea se empieza
            $offset = ($numPag - 1) * $amount;

            $query = "SELECT * FROM tienda_animales.productos ORDER BY $field $ordAsc LIMIT :amount OFFSET :offset";
            
            //Preparamos la consulta
            $statement = $this->conBD->prepare($query);
            //Por alguna razón que desconozco con mis escasos conocimientos, el bindparam 
            // Vinculamos los parámetros al nombre de la variable especificada
            // Utilizamos PDO::PARAM_INT para indicar que se trata de un número entero
            // ya que en ocasiones puede contarlo como una cadena.
            $statement->bindValue(":amount", $amount, PDO::PARAM_INT);
            $statement->bindValue(":offset", $offset, PDO::PARAM_INT);

            //No quito lo de debugDumpParams porque es algo interesante
            // echo "<pre>";
            // var_dump($statement->debugDumpParams());
            // echo "</pre>";
          
            $statement->execute();
            //Devolvemos las filas resultantes
            return $statement->fetchAll();
        } catch (PDOException $e) {
            Utils::save_log_error($e->getMessage());
        }
        return null;
    }


    //Funcion que devuelve el total de páginas que tendremos en función de la cantidad
    //de elementos que queramos mostrar en cada una de llas
    function get_total_pages(int $amount)
    {
        try {
            //Definimos la consulta (usamos count para que cuente el total de filas de la tabla,
            //lo dividimos entre la cantidad de elementos que queremos por cada página y usamos
            //round para que nos redondee el resultado obtenido)
            $query = "SELECT CEILING(COUNT(*)/:amount) AS pages FROM tienda_animales.productos";
            //Preparamos la sentencia
            $statement = $this->conBD->prepare($query);
            //Vinculamos los parámetros al nombre de la variable especificada
            $statement->bindParam(":amount", $amount, PDO::PARAM_INT);
            //Ejecutamos la consulta
            $statement->execute();
            //Devolvemos el total de páginas (como la funcion fetch nos devuelve un array
            //asociativo, pongo pages para que me devuelva el valor de la clave pages)
            return $statement->fetch()["pages"];
        } catch (PDOException $e) {
            Utils::save_log_error($e->getMessage());
        }
        return null;
    }
}

