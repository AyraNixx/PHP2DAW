<?php

namespace model;

use \utils\Utils;

require_once("../utils/Utils.php");

use \PDO;
use \PDOException;

class Order
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


    //Función que devuelve todas las filas de la tabla pedidos
    function get_all()
    {
        try {
            //Definimos la consulta
            $query = "SELECT * FROM tienda_animales.pedidos";
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


    //Función que devuelve el pedido indicado
    function get_one(int $id_pedido)
    {
        //Si id no es nulo y es numerico
        if (isset($id_pedido) && is_num($id_pedido)) {
            try {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.pedidos WHERE id_pedido=:id_pedido";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(":id_pedido", $id_pedido);
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
            $query = "SELECT * FROM tienda_animales.pedidos ORDER BY :fieldOrd";
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


    //Funcion que añade un nuevo pedido
    function add(array $pedido)
    {
        //Si $pedido no es nulo, así como ningunao de sus valores
        if (isset($pedido) && isset($pedido["fecha_compra"]) && isset($pedido["precio_final"]) && isset($pedido["id_usuario"])) {
            try {
                //Definimos la consulta
                $query = "INSERT INTO tienda_animales.pedidos (fecha_compra, precio_final, id_usuario) VALUES (:fecha_compra, :precio_final, :id_usuario)";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $sentence->bindParam(":fecha_compra", $pedido["fecha_compra"]);
                $sentence->bindParam(":precio_final", $pedido["precio_final"]);
                $sentence->bindParam(":id_usuario", $pedido["id_usuario"]);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<bd/>");
            }

            return null;
        }
    }


    //Funcion que actualiza un pedido
    function update(array $pedido)
    {
        //Comprobamos que no sea nulo
        if (isset($pedido) && isset($pedido["id_pedido"]) && isset($pedido["fecha_compra"]) && isset($pedido["precio_final"]) && isset($pedido["id_usuario"])) {
            try {
                //Definimos la consulta
                $query = "UPDATE tienda_animales.pedidos SET id_pedido=:id_pedido, fecha_compra=:fecha_compra, precio_final=:precio_final, id_usuario=:id_usuario WHERE id_pedido=:id_pedido";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $sentence->bindParam(":id_pedido", $pedido["id_pedido"]);
                $sentence->bindParam(":fecha_compra", $pedido["fecha_compra"]);
                $sentence->bindParam(":precio_final", $pedido["precio_final"]);
                $sentence->bindParam(":id_usuario", $pedido["id_usuario"]);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<bd/>");
            }
            return null;
        }
    }


    //Funcion que elimina el pedido indicado
    function delete(int $id_pedido)
    {
        //Si id no es nulo y es numerico
        if (isset($id_pedido) && is_num($id_pedido)) {
            try {
                //Definimos la consulta
                $query = "DELETE FROM tienda_animales.pedidos WHERE id_pedido = :id_pedido";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $sentence->bindParam(":id_pedido", $id_pedido);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<br/>");
            }
            return null;
        }
    }
}
