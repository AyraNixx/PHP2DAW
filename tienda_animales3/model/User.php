<?php

// "Apodo" para el directorio
namespace model;

// Incluimos el archivo Utils.php
require_once("../utils/Utils.php");

// Usamos use para heredar las clases de PDO, PDOException y Exception
use \utils\Utils;
use \PDO;
use \PDOException;

// Creamos la clase User
class User
{
    // Definimos como atributo privado $conBD
    private $conBD;

    // Constructor
    function __construct()
    {
        try {
            // Iniciamos conexion con la base de datos
            $this->conBD = Utils::conectar();
            // Si no se ha podido iniciar la conexión, mandamos el error al log
        } catch (PDOException $e) {
            Utils::save_log_error($e->getMessage());
        }
    }




    // --
    // -- MÉTODOS --------------------
    // --


    /**
     * Devuelve todas las filas de la tabla usuarios de 
     * la base de datos 'tienda_animales'.
     * 
     * @return array Devuelve en forma de array toda la información contenida en la tabla usuarios de la base de datos tienda_animales
     */
    public function get_all()
    {
        //Rodeamos el código en un try catch para controlar las excepciones
        try {
            //  Consulta
            $query = "SELECT * FROM tienda_animales.usuarios";
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
     * Devuelve el usuario especificado 
     * 
     * @param string $email Email del usuario.
     * 
     * @return mixed Devuelve un array que contiene todos los datos del uduario indicado o un boolean si no se ha encontrado
     */
    public function get_one(string $email)
    {
        //Rodeamos el código en un try catch para controlar las excepciones
        try {
            //  Consulta
            $query = "SELECT * FROM tienda_animales.usuarios WHERE correo = :email";
            // Preparamos la consulta para su ejecución
            $statement = $this->conBD->prepare($query);
            // Vinculamos los parámetros al nombre de la variable especificada
            $statement->bindParam(":email", $email, PDO::PARAM_STR);
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
     * Inserta un nuevo usuario a la base de datos.
     * 
     * @param array $user Usuario que queremos insertar.
     * 
     * @return mixed Devuelve true si se ha insertado correctamente y null si no se ha podido
     */
    public function add(array $user)
    {
        //Rodeamos el código en un try catch para controlar las excepciones
        try {
            //  Consulta
            $query = "INSERT INTO tienda_animales.usuarios (nombre, apellidos, direccion, telefono, correo, passwd, salt, cod_activacion, id_rol) VALUES (:nombre, :apellidos, :direccion, :telefono, :correo, :passwd, :salt, :cod_activacion, :id_rol)";
            // Preparamos la consulta para su ejecución
            $statement = $this->conBD->prepare($query);
            // Vinculamos los parámetros al nombre de la variable especificada
            $statement->bindParam(":nombre", $user["nombre"], PDO::PARAM_STR);
            $statement->bindParam(":apellidos", $user["apellidos"], PDO::PARAM_STR);
            $statement->bindParam(":direccion", $user["direccion"], PDO::PARAM_STR);
            $statement->bindParam(":telefono", $user["telefono"], PDO::PARAM_STR);
            $statement->bindParam(":correo", $user["correo"], PDO::PARAM_STR);
            $statement->bindParam(":passwd", $user["passwd"], PDO::PARAM_STR);
            $statement->bindParam(":salt", $user["salt"], PDO::PARAM_STR);
            $statement->bindParam(":cod_activacion", $user["cod_activacion"], PDO::PARAM_STR);
            $statement->bindParam(":id_rol", $user["id_rol"], PDO::PARAM_STR);

            //  Ejecutamos la consulta
            return $statement->execute();
        } catch (PDOException $e) {
            // Guardamos el error en el log
            Utils::save_log_error($e->getMessage());
        }
        return null;
    }


    /**
     * Modifica un usuario en específico
     * 
     * @param array $user usuario que queremos modificar
     * 
     * @return mixed Devuelve true si se ha insertado correctamente y null si no se ha podido
     */
    public function update(array $user)
    {
        //Rodeamos el código en un try catch para controlar las excepciones
        try {
            //  Consulta
            $query = "UPDATE tienda_animales.usuarios SET id_usuario = :new_id, nombre = :nombre, apellidos = :apellidos, 
            direccion = :direccion, telefono = :telefono, correo = :correo, passwd = :passwd, salt = :salt,
            cod_activacion = :cod_activacion, id_rol = :id_rol where id_usuario= :id";
            // Preparamos la consulta para su ejecución
            $statement = $this->conBD->prepare($query);
            // Vinculamos los parámetros al nombre de la variable especificada
            $statement->bindParam(":new_id", $user["new_id"], PDO::PARAM_INT);
            $statement->bindParam(":id", $user["id"], PDO::PARAM_INT);
            $statement->bindParam(":nombre", $user["nombre"], PDO::PARAM_STR);
            $statement->bindParam(":apellidos", $user["apellidos"], PDO::PARAM_STR);
            $statement->bindParam(":direccion", $user["direccion"], PDO::PARAM_STR);
            $statement->bindParam(":telefono", $user["telefono"], PDO::PARAM_STR);
            $statement->bindParam(":correo", $user["correo"], PDO::PARAM_STR);
            $statement->bindParam(":passwd", $user["passwd"], PDO::PARAM_STR);
            $statement->bindParam(":salt", $user["salt"], PDO::PARAM_STR);
            $statement->bindParam(":cod_activacion", $user["cod_activacion"], PDO::PARAM_INT);
            $statement->bindParam(":id_rol", $user["id_rol"], PDO::PARAM_INT);
            //  Ejecutamos la consulta
            return $statement->execute();
        } catch (PDOException $e) {
            // Guardamos el error en el log
            Utils::save_log_error($e->getMessage());
        }
        return null;
    }


    /**
     * Modifica un campo en específico del usuario indicado
     * 
     * @param string $email Email del usuario.
     * @param string $field_name Campo al que se desea modificar su valor.
     * @param mixed $field_value Nuevo valor para el campo indicado.
     * 
     * @return mixed Devuelve true si se ha insertado correctamente y null si no se ha podido
     */
    function change_field_value(string $email, string $field_name, mixed $field_value)
    {
        // Rodeamos el código en un try catch para controlar las excepciones
        try {
            // Consulta
            $query = "UPDATE tienda_animales.usuarios SET " . $field_name . " = :field_value WHERE correo = :email";
            // Preparamos la consulta para su ejecución
            $statement = $this->conBD->prepare($query);
            // Vinculamos los parámetros al nombre de la variable especificada
            $statement->bindParam(":email", $email, PDO::PARAM_STR);
            $statement->bindParam(":field_value", $field_value, PDO::PARAM_STR);
            // Ejecutamos la consulta
            $statement->execute();
            // Devolvemos el número de filas afectadas
            return $statement->rowCount();
        } catch (PDOException $e) {
            // Guardamos el error en el log
            Utils::save_log_error($e->getMessage());
        }
        return null;
    }


    /**
     * Elimina el usuario especificado 
     * 
     * @param int $id Identificador del usuario.
     * 
     * @return bool Devuelve true si se ha eliminado con éxito.
     */
    public function delete(int $id)
    {
        //Rodeamos el código en un try catch para controlar las excepciones
        try {
            //  Consulta
            $query = "DELETE FROM tienda_animales.usuarios WHERE id_usuario = :id";
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
     * Devuelve todas las filas de la tabla usuarios de 
     * la base de datos 'tienda_animales' paginada.
     * 
     * @return array Devuelve en forma de array toda la información contenida en la tabla usuarios de la base de datos tienda_animales, de forma paginada
     */
    public function pagination(string $ordAsc, string $field, int $page, int $amount)
    {
        // Rodeamos el código en un try catch para controlar las excepciones
        try {
            // Calculamos desde que línea se empieza
            $offset = ($page - 1) * $amount;

            // Consulta
            $query = "SELECT * FROM tienda_animales.usuarios ORDER BY $field $ordAsc LIMIT :amount OFFSET :offset";
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
     * Devuelve la cantidad total de páginas según la cantidad de elementos que 
     * se muestren en cada una de ellas.
     * 
     * @return int Páginas totales.
     */
    public function total_pages(int $amount)
    {
        // Contamos todos los elementos que hay en la tabla de usuarios y lo
        // dividimos por la cantidad de elementos que mostramos por página.
        // Luego redondeamos para arriba con ceil.
        return ceil(count(self::get_all()) / $amount);
    }
}
?>