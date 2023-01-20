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
            print("¡Error! : " . $e->getMessage() . "<br/>");
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
            print("¡Error! : " . $e->getMessage() . "<br/>");
        }
        return null;
    }


    //Función que devuelve el proveedor indicado
    function get_one(int $id_proveedor)
    {
        //Si id no es nulo y es numerico
        if (isset($id_proveedor) && is_num($id_proveedor)) {
            try {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.proveedores WHERE id_proveedor=:id_proveedor";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(":id_proveedor", $id_proveedor);
                //Ejecutamos la consulta
                $sentence->execute();
                //Devolvemos el resultado obtenido
                return $sentence->fetch();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<br/>");
            }
            return null;
        }
    }

    //Funcion que devuelve la tabla paginada
    function pagination(bool $ordAsc, string $fieldOrd, int $numPag, int $amount)
    {
        try {
            //Definimos la consulta
            $query = "SELECT * FROM tienda_animales.proveedores ORDER BY :fieldOrd";
            //Si ordAsc es true concatenamos sin poner DESC en la otra cadena. En caso contrario,
            //se pondrá DESC en la otra cadena para indicar que el orden será descendente
            ($ordAsc) ? ($query = $query . " LIMIT :amount OFFSET :offset;") : ($query = $query . " DESC LIMIT :amount OFFSET :offset;");
            //La variable offset indica la primera fila de cada página.
            //Calculamos su valor restando uno a la página en la que nos encontremos para
            //luego multiplicarlo por la cantidad de objetos que queremos en cada página.
            //Ejemplo --> Si estamos en la página 1 y queremos que nos muestren 10 filas
            //la primera fila será la 0 ((1-1) * 10 = 0), en la página dos, la primera fila
            //será la 10 ((2-1) * 10 = 10).
            $offset = ($numPag - 1) * $amount;
            //Preparamos la consulta
            $sentence = $this->conBD->prepare($query);
            //Vinculamos los parámetros al nombre de la variable especificada
            $sentence->bindParam(":fieldOrd", $fieldOrd);
            //Utilizamos PDO::PARAM_INT para indicar que se trata de un número entero
            //ya que en ocasiones puede contarlo como una cadena.
            $sentence->bindParam(":amount", $amount, PDO::PARAM_INT);
            $sentence->bindParam(":offset", $offset, PDO::PARAM_INT);
            //Ejecutamos la consulta
            $sentence->execute();
            //Devolvemos las filas resultantes
            return $sentence->fetchAll();
        } catch (PDOException $e) {
            print("¡Error! : " . $e->getMessage() . "<bd/>");
        }
        return null;
    }


    //Funcion que añade un nuevo proveedor
    function add(array $proveedor)
    {
        //Si $proveedor no es nulo, así como ningunao de sus valores
        if (isset($proveedor) && isset($proveedor["nombre"]) && isset($proveedor["direccion"]) && isset($proveedor["telefono"]) && isset($proveedor["correo"])) {
            try {
                //Definimos la consulta
                $query = "INSERT INTO tienda_animales.proveedores (nombre, direccion, telefono, correo) VALUES (:nombre, :direccion, :telefono, :correo)";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $sentence->bindParam(":nombre", $proveedor["nombre"]);
                $sentence->bindParam(":direccion", $proveedor["direccion"]);
                $sentence->bindParam(":telefono", $proveedor["telefono"]);
                $sentence->bindParam(":correo", $proveedor["correo"]);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<bd/>");
            }

            return null;
        }
    }


    //Funcion que actualiza un proveedor
    function update(array $proveedor)
    {
        //Comprobamos que no sea nulo
        if (isset($proveedor) && isset($proveedor["nombre"]) && isset($proveedor["direccion"]) && isset($proveedor["telefono"]) && isset($proveedor["correo"])) {
            try {
                //Definimos la consulta
                $query = "UPDATE tienda_animales.proveedores SET id_proveedor=:id_proveedor, nombre=:nombre, direccion=:direccion, telefono=:telefono, correo=:correo WHERE id_proveedor=:id_proveedor";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $sentence->bindParam(":id_proveedor", $proveedor["id_proveedor"]);
                $sentence->bindParam(":nombre", $proveedor["nombre"]);
                $sentence->bindParam(":direccion", $proveedor["direccion"]);
                $sentence->bindParam(":telefono", $proveedor["telefono"]);
                $sentence->bindParam(":correo", $proveedor["correo"]);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<bd/>");
            }
            return null;
        }
    }


    //Funcion que elimina el proveedor indicado
    function delete(int $id_proveedor)
    {
        //Si id no es nulo y es numerico
        if (isset($id_proveedor) && is_num($id_proveedor)) {
            try {
                //Definimos la consulta
                $query = "DELETE FROM tienda_animales.proveedores WHERE id_proveedor = :id_proveedor";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $sentence->bindParam(":id_proveedor", $id_proveedor);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<br/>");
            }
            return null;
        }
    }
}
