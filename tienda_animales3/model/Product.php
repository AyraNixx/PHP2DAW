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
            print("¡Error! : " . $e->getMessage() . "<br/>");
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


    //Función que devuelve el producto indicado
    function get_one(int $id_producto)
    {
        //Si id no es nulo y es numerico
        if (isset($id_producto) && is_num($id_producto)) {
            try {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.productos WHERE id_producto=:id_producto";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(":id_producto", $id_producto);
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

    //Funcion que añade un nuevo producto
    function add(array $producto)
    {
        //Si $producto no es nulo, así como ningunao de sus valores
        if (isset($producto) && isset($producto["nombre"]) && isset($producto["precio"]) && isset($producto["stock"]) && isset($producto["categoria"]) && isset($producto["foto"])) {
            try {
                //Definimos la consulta
                $query = "INSERT INTO tienda_animales.productos (nombre, precio, stock, categoria, foto) VALUES (:nombre, :precio, :stock, :categoria, :foto)";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $sentence->bindParam(":nombre", $producto["nombre"]);
                $sentence->bindParam(":precio", $producto["precio"]);
                $sentence->bindParam(":stock", $producto["stock"]);
                $sentence->bindParam(":categoria", $producto["categoria"]);
                $sentence->bindParam(":foto", $producto["foto"]);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<bd/>");
            }

            return null;
        }
    }


    //Funcion que actualiza un producto
    function update(array $producto)
    {
        //Comprobamos que no sea nulo
        if (isset($producto) && isset($producto["nombre"]) && isset($producto["precio"]) && isset($producto["stock"]) && isset($producto["categoria"]) && isset($producto["foto"])) {
            try {
                //Definimos la consulta
                $query = "UPDATE tienda_animales.productos SET id_producto=:id_producto, nombre=:nombre, precio=:precio, stock=:stock, categoria=:categoria, foto=:foto WHERE id_producto=:id_producto";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $sentence->bindParam(":id_producto", $producto["id_producto"]);
                $sentence->bindParam(":nombre", $producto["nombre"]);
                $sentence->bindParam(":precio", $producto["precio"]);
                $sentence->bindParam(":stock", $producto["stock"]);
                $sentence->bindParam(":categoria", $producto["categoria"]);
                $sentence->bindParam(":foto", $producto["foto"]);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<bd/>");
            }
            return null;
        }
    }


    //Funcion que elimina el producto indicado
    function delete(int $id_producto)
    {
        //Si id no es nulo y es numerico
        if (isset($id_producto) && is_num($id_producto)) {
            try {
                //Definimos la consulta
                $query = "DELETE FROM tienda_animales.productos WHERE id_producto = :id_producto";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $sentence->bindParam(":id_producto", $id_producto);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                return $sentence->execute();
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
            $query = "SELECT * FROM tienda_animales.productos ORDER BY :fieldOrd";
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
            $sentence = $this->conBD->prepare($query);
            //Vinculamos los parámetros al nombre de la variable especificada
            $sentence->bindParam(":amount", $amount);
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


