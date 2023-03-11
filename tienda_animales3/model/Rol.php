<?php

namespace model;

use \utils\Utils;

require_once("../utils/Utils.php");

use \PDO;
use \PDOException;

class Rol
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


    //Función que devuelve todas las filas de la tabla roles
    function get_all()
    {
        try {
            //Definimos la consulta
            $query = "SELECT * FROM tienda_animales.roles;";
            //Preparamos la consulta para su ejecución
            $sentence = $this->conBD->prepare($query);
            //Ejecutamos la consulta
            $sentence->execute();
            //Devolvemos el resultado obtenido
            return $sentence->fetchAll();
        } catch (PDOException $e) {
            Utils::save_log_error($e->getMessage());
        }
        return null;
    }


    //Función que devuelve el rol indicado
    function get_one(int $id_rol)
    {
        //Si id no es nulo y es numerico
        if (isset($id_rol) && is_numeric($id_rol)) {
            try {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.roles WHERE id_rol = :id_rol";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(":id_rol", $id_rol);
                //Ejecutamos la consulta
                $sentence->execute();
                //Devolvemos el resultado obtenido
                return $sentence->fetch();
            } catch (PDOException $e) {
                Utils::save_log_error($e->getMessage());
            }
            return null;
        }
    }

    //Funcion que añade un nuevo rol
    function add(array $rol)
    {
        //Si $rol no es nulo, así como ningunao de sus valores
        if (isset($rol) && isset($rol["rol"]) && isset($rol["descripcion"])) {
            try {
                //Definimos la consulta
                $query = "INSERT INTO tienda_animales.roles (rol, descripcion) VALUES (:rol, :descripcion)";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $sentence->bindParam(":rol", $rol["rol"]);
                $sentence->bindParam(":descripcion", $rol["descripcion"]);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                return $sentence->execute();
            } catch (PDOException $e) {
                Utils::save_log_error($e->getMessage());
            }

            return null;
        }
    }


    //Funcion que actualiza un rol
    function update(array $rol)
    {
        //Comprobamos que no sea nulo
        if (isset($rol) && isset($rol["id_rol"]) && isset($rol["new_id"]) && isset($rol["rol"]) && isset($rol["descripcion"])) {
            try {
                //Definimos la consulta
                $query = "UPDATE tienda_animales.roles SET id_rol=:new_id, rol=:rol, descripcion=:descripcion WHERE id_rol=:id_rol";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $sentence->bindParam(":id_rol", $rol["id_rol"], PDO::PARAM_INT);
                $sentence->bindParam(":new_id", $rol["new_id"], PDO::PARAM_INT);
                $sentence->bindParam(":rol", $rol["rol"], PDO::PARAM_STR);
                $sentence->bindParam(":descripcion", $rol["descripcion"], PDO::PARAM_STR);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                return $sentence->execute();
            } catch (PDOException $e) {
                Utils::save_log_error($e->getMessage());
            }
            return null;
        }
    }



    //Funcion que elimina el rol indicado
    function delete($id_rol)
    {
        //Si id no es nulo y es numerico
        if (isset($id_rol) && is_numeric($id_rol)) {
            try {
                //Definimos la consulta
                $query = "DELETE FROM tienda_animales.roles WHERE id_rol=:id_rol";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $sentence->bindParam(":id_rol", $id_rol);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                return $sentence->execute();
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

            $query = "SELECT * FROM tienda_animales.roles ORDER BY $field $ordAsc LIMIT :amount OFFSET :offset";
            
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
            Utils::save_log_error($e->getMessage());
        }
        return null;
    }


    /**
     * Devuelve la cantidad total de páginas según la cantidad de elementos que 
     * se muestren en cada una de ellas.
     * 
     * @return int Páginas totales.
     */
    public function get_total_pages(int $amount)
    {
        // Contamos todos los elementos que hay en la tabla de roles y lo
        // dividimos por la cantidad de elementos que mostramos por página.
        // Luego redondeamos para arriba con ceil.
        return ceil(count(self::get_all()) / $amount);
    }
}

