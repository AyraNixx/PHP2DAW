<?php

namespace model;

use \PDO;
use \PDOException;


class Rol
{
    /**
     * 
     * 
     *              MÉTODOS
     * 
     * 
     */
    //Funcion que obtiene todos los roles de la base de datos
    function getRoles($conBD)
    {
        try {
            //Si la conexion no es nula
            if (isset($conBD)) {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.roles;";

                $sentence = $conBD->prepare($query);
                $sentence->execute();

                return $sentence->fetchAll();
            }
        } catch (PDOException $e) {
            print("¡Error! : " . $e->getMessage() . "<br/>");
        }
    }

    //Funcion que devuelve el rol indicado de la base de datos
    function getRol($conBD, $id_rol)
    {
        try {
            //Si la conexion no es nula
            if (isset($conBD)) {
                $query = "SELECT * FROM tienda_animales.roles WHERE id_rol = ?";
                $sentence = $conBD->prepare($query);
                $sentence->bindParam(1, $id_rol);
                $sentence->execute();

                return $sentence->fetch();
            }
        } catch (PDOException $e) {
            print("¡Error! : " . $e->getMessage() . "<br/>");
        }
    }

    //Funcion que muestra el contenido de la tabla Rol paginado
    //conBD -> conexion BD
    //ordAsc -> El sentido en el que queremos ordenar los resultados
    //fieldOrd -> que campo queremos tomar como referencia para ordenar la tabla
    //numPage -> indica el número de la página en la que nos encontramos
    //amount -> la cantidad de filas que queremos que aparezcan
    function rolPag($conBD, bool $ordAsc, $fieldOrd, int $numPag, int $amount)
    {
        //Si la conexion no es nula
        if (isset($conBD)) {
            try {
                //Sentencia a ejecutar
                $query = "SELECT * FROM tienda_animales.roles ORDER BY :fieldOrd";

                //Si ordAsc es true, significa que es ascendente, si es false, es DESC
                //y lo añadimos a la query.
                //LIMIT es una keyword utilizada para limitar el número de filas que se 
                //devuelven como resultado de una columna.

                ($ordAsc) ? ($query = $query . " LIMIT :amount OFFSET :offset;") : ($query = $query . " DESC LIMIT :amount OFFSET :offset;");
                //El tercer parámetro de la query, offset, lo calculamos restándole uno y 
                //multiplicándolo
                //por la cantidad de elementos (amount). Este parámetro indica desde qué registro
                //empieza la página actual.
                $offset = ($numPag - 1) * $amount;

                //Usamos prepare(), que prepara una sentencia para su ejecución por el método 
                //execute()
                $sentence = $conBD->prepare($query);

                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(":fieldOrd", $fieldOrd);
                //utilizamos PDO::PARAM_INT PARA INDICAR QUE ES 
                //UN NÚMERO ENTERO YA QUE PUEDE PASAR QUE LO DETECTE COMO UNA CADENA
                $sentence->bindParam(":amount", $amount, PDO::PARAM_INT);
                $sentence->bindParam(":offset", $offset, PDO::PARAM_INT);

                //Esto ayuda mucho para ver la consulta que has pasado. Yo lo he utilizado
                //porque no me salía bien y gracias a esto lo he arreglado.
                // print($sentence->queryString);

                //Ejecutamos la sentencia
                $sentence->execute();

                //Devolvemos todos los datos de la tabla roles
                return $sentence->fetchAll(); //devuelve un array
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<bd/>");
            }
        }
    }

    //Funcion que añade un nuevo rol
    function addRol($conBD, $rol)
    {
        //Si rol no es nulo, así como id_rol, rol y descripcion y tampoco la conexion
        if (isset($rol) != null && isset($rol["rol"]) && isset($rol["descripcion"]) && isset($conBD)) {
            try {
                //Consulta que vamos a pasar al prepare
                $query = "INSERT INTO tienda_animales.roles (rol, descripcion) VALUES (:rol, :descripcion)";
                //Usamos prepare(), que prepara una sentencia para su ejecución por el método 
                //execute()
                $sentence = $conBD->prepare($query);

                //Vinculamos los parametros al nombre de variable especificado 
                //(También podemos poner ? en la consulta y luego poner un número indicando
                //a que ? hacemos referencia)
                $sentence->bindParam(":rol", $rol["rol"]);
                $sentence->bindParam(":descripcion", $rol["descripcion"]);

                //Ejecutamos la sentencia
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<bd/>");
            }

            return null;
        }
    }


    //Funcion que actualiza un rol
    function updateRol($conBD, $rol)
    {
        //Si rol no es nulo, así como id_rol, rol y descripcion y tampoco la conexion
        if (
            isset($rol) != null && $rol["id_rol"] != null && $rol["rol"] != null
            && $rol["descripcion"] != null && $conBD != null
        ) {
            try {
                //Consulta que vamos a pasar al prepare
                $query = "UPDATE tienda_animales.roles set id_rol = :id_rol, rol = :rol, descripcion = :descripcion WHERE id_rol = :id_rol";
                //Usamos prepare(), que prepara una sentencia para su ejecución por el método 
                //execute()
                $sentence = $conBD->prepare($query);

                //Vinculamos los parametros al nombre de variable especificado 
                //(También podemos poner ? en la consulta y luego poner un número indicando
                //a que ? hacemos referencia)
                $sentence->bindParam(":id_rol", $rol["id_rol"]);
                $sentence->bindParam(":rol", $rol["rol"]);
                $sentence->bindParam(":descripcion", $rol["descripcion"]);

                //Ejecutamos la sentencia
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<bd/>");
            }
            return null;
        }
    }


    //Funcion que elimina un rol
    function deleteRol($conBD, $id_rol)
    {
        try {
            //Si la conexion no es nula
            if (isset($conBD)) {
                //
                $query = "DELETE FROM tienda_animales.roles WHERE id_rol = ?";
                $sentence = $conBD->prepare($query);
                $sentence->bindParam(1, $id_rol);
                return $sentence->execute();
            }
        } catch (PDOException $e) {
            print("¡Error! : " . $e->getMessage() . "<br/>");
        }
        return null;
    }
}