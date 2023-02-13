<?php

namespace model;

use \utils\Utils;

require_once("../utils/Utils.php");

use \PDO;
use \PDOException;

class Supplier
{
    private $conBD;

    function __construct()
    {
        try {
            //Iniciamos conexion con la base de datos
            $this->conBD = Utils::conectar();
        } catch (PDOException $e) {
            Utils::save_log($e->getMessage());
        }
    }


    /**
     * 
     *      MÉTODOS
     * 
     */


    //Función que devuelve todas las filas de la tabla proveedores
    function get_all()
    {
        try {
            //Definimos la consulta
            $query = "SELECT * FROM tienda_animales.proveedores;";
            //Preparamos la consulta para su ejecución
            $sentence = $this->conBD->prepare($query);
            //Ejecutamos la consulta
            $sentence->execute();
            //Devolvemos el resultado obtenido
            return $sentence->fetchAll();
        } catch (PDOException $e) {
            Utils::save_log($e->getMessage());
        }
        return null;
    }


    //Función que devuelve el proveedor indicado
    function get_one(int $id_proveedor)
    {
        //Si id no es nulo y es numerico
        if (isset($id_proveedor) && is_numeric($id_proveedor)) {
            try {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.proveedores WHERE id_proveedor = :id_proveedor";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(":id_proveedor", $id_proveedor, PDO::PARAM_INT);
                //Ejecutamos la consulta
                $sentence->execute();
                //Devolvemos el resultado obtenido
                return $sentence->fetch();
            } catch (PDOException $e) {
                Utils::save_log($e->getMessage());
            }
            return null;
        }
    }

    //Funcion que añade un nuevo proveedor
    function add(array $supplier)
    {
        //Si $supplier no es nulo, así como ningunao de sus valores
        if (isset($supplier) && isset($supplier["nombre"]) && isset($supplier["direccion"]) && isset($supplier["telefono"]) && isset($supplier["correo"])) {
            try {
                //Definimos la consulta
                $query = "INSERT INTO tienda_animales.proveedores (nombre, direccion, telefono, correo) VALUES (:nombre, :direccion, :telefono, :correo)";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $sentence->bindParam(":nombre", $supplier["nombre"], PDO::PARAM_STR);
                $sentence->bindParam(":direccion", $supplier["direccion"], PDO::PARAM_STR);
                $sentence->bindParam(":telefono", $supplier["telefono"], PDO::PARAM_STR);
                $sentence->bindParam(":correo", $supplier["correo"], PDO::PARAM_STR);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<bd/>");
            }

            return null;
        }
    }


    //Funcion que actualiza un nombre
    function update(array $supplier)
    {
        //Comprobamos que no sea nulo
        if (isset($supplier) && isset($supplier["id_proveedor"]) && isset($supplier["new_id"]) && isset($supplier["nombre"]) && isset($supplier["direccion"]) && isset($supplier["telefono"]) && isset($supplier["correo"])) {
            try {
                //Definimos la consulta
                $query = "UPDATE tienda_animales.proveedores SET id_proveedor=:new_id, nombre=:nombre, direccion=:direccion, telefono=:telefono, correo=:correo WHERE id_proveedor=:id_proveedor";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $sentence->bindParam(":id_proveedor", $supplier["id_proveedor"], PDO::PARAM_INT);
                $sentence->bindParam(":new_id", $supplier["new_id"], PDO::PARAM_INT);
                $sentence->bindParam(":nombre", $supplier["nombre"], PDO::PARAM_STR);
                $sentence->bindParam(":direccion", $supplier["direccion"], PDO::PARAM_STR);
                $sentence->bindParam(":telefono", $supplier["telefono"], PDO::PARAM_STR);
                $sentence->bindParam(":correo", $supplier["correo"], PDO::PARAM_STR);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                return $sentence->execute();
            } catch (PDOException $e) {
                Utils::save_log($e->getMessage());
            }
            return null;
        }
    }



    //Funcion que elimina el nombre indicado
    function delete(int $id_proveedor)
    {
        //Si id no es nulo y es numerico
        if (isset($id_proveedor) && is_numeric($id_proveedor)) {
            try {
                //Definimos la consulta
                $query = "DELETE FROM tienda_animales.proveedores WHERE id_proveedor=:id_proveedor";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $sentence->bindParam(":id_proveedor", $id_proveedor, PDO::PARAM_INT);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                return $sentence->execute();
            } catch (PDOException $e) {
                Utils::save_log($e->getMessage());
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

            $query = "SELECT * FROM tienda_animales.proveedores ORDER BY $field $ordAsc LIMIT :amount OFFSET :offset";
            
            //Preparamos la consulta
            $sentence = $this->conBD->prepare($query);
            //Por alguna razón que desconozco con mis escasos conocimientos, el bindparam 
            // Vinculamos los parámetros al nombre de la variable especificada
            // Utilizamos PDO::PARAM_INT para indicar que se trata de un número entero
            // ya que en ocasiones puede contarlo como una cadena.
            $sentence->bindValue(":amount", $amount, PDO::PARAM_INT);
            $sentence->bindValue(":offset", $offset, PDO::PARAM_INT);

            //No quito lo de debugDumpParams porque es algo interesante
            // echo "<pre>";
            // var_dump($sentence->debugDumpParams());
            // echo "</pre>";
          
            $sentence->execute();
            //Devolvemos las filas resultantes
            return $sentence->fetchAll();
        } catch (PDOException $e) {
            print("¡Error! : " . $e->getMessage() . "<bd/>");
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
            $query = "SELECT CEILING(COUNT(*)/:amount) AS pages FROM tienda_animales.proveedores";
            //Preparamos la sentencia
            $sentence = $this->conBD->prepare($query);
            //Vinculamos los parámetros al nombre de la variable especificada
            $sentence->bindParam(":amount", $amount, PDO::PARAM_INT);
            //Ejecutamos la consulta
            $sentence->execute();
            //Devolvemos el total de páginas (como la funcion fetch nos devuelve un array
            //asociativo, pongo pages para que me devuelva el valor de la clave pages)
            return $sentence->fetch()["pages"];
        } catch (PDOException $e) {
            print("¡Error! : " . $e->getMessage() . "<bd/>");
        }
        return null;
    }
}

