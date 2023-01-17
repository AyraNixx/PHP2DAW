<?php

namespace model;

use \PDO;
use \PDOException;


class User
{
    /**
     * 
     * 
     *              MÉTODOS
     * 
     * 
     */
    //Funcion que obtiene todos los usuarios de la base de datos
    function getUsers($conBD)
    {
        //Si la conexion no es nula
        if (isset($conBD)) {
            //Rodeamos el código en un try/catch para manejar las excepciones
            try {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.usuarios;";
                //Preparamos la sentencia para su ejecución
                $sentence = $conBD->prepare($query);
                //Ejecutamos la consulta
                $sentence->execute();

                //Devolvemos un array que contiene todas las filas de la tabla usuarios
                return $sentence->fetchAll();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<br/>");
            }
            //En caso de que no se haya conseguido, se devuelve null
            return null;
        }
    }

    //Funcion que devuelve el user indicado de la base de datos
    function getUser($conBD, $id_usuario)
    {
        //Si la conexion no es nula
        if (isset($conBD)) {
            //Rodeamos el código en un try/catch para manejar las excepciones
            try {
                //Escribimos la consulta para sacar todas las filas que tengan el id_usuario
                //que hayamos pasado (el id_usuario no se repite así que solo muestra a uno)
                $query = "SELECT * FROM tienda_animales.usuarios WHERE id_usuario = :id_usuario";
                //Preparamos la sentencia para su ejecución
                $sentence = $conBD->prepare($query);
                //Vinculamos el parámetro al nombre de variable especificado
                $sentence->bindParam("id_usuario", $id_usuario);
                //Ejecutamos
                $sentence->execute();

                //Devolvemos la fila obtenida
                return $sentence->fetch();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<br/>");
            }
            //En caso de que no se haya conseguido, se devuelve null
            return null;
        }
    }

    //Funcion que muestra el contenido de la tabla Usuarios paginado
    //conBD -> conexion BD
    //ordAsc -> El sentido en el que queremos ordenar los resultados
    //fieldOrd -> que campo queremos tomar como referencia para ordenar la tabla
    //numPage -> indica el número de la página en la que nos encontramos
    //amount -> la cantidad de filas que queremos que aparezcan
    function userPag($conBD, bool $ordAsc, $fieldOrd, int $numPag, int $amount)
    {
        //Si la conexion no es nula
        if (isset($conBD)) {
            //Rodeamos el código en un try/catch para manejar las excepciones
            try {
                //Sentencia a ejecutar
                $query = "SELECT * FROM tienda_animales.usuarios ORDER BY :fieldOrd";

                //Si ordAsc es true, significa que es ascendente, si es false, es DESC
                //y lo añadimos a la query.
                //LIMIT es una keyword utilizada para limitar el número de filas que se 
                //devuelven como resultado de una columna.
                ($ordAsc) ? ($query = $query . " LIMIT :amount OFFSET :offset;") : ($query = $query . " DESC LIMIT :amount OFFSET :offset;");
                //El tercer parámetro de la query, offset, lo calculamos restándole uno y 
                //multiplicándolo
                //por la cantidad de elementos (amount). Este parámetro indica desde qué registro
                //empieza la página actual
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
                //porque no me salía bien y gracias a esto lo he arreglado, se me había puesto
                //poner espacios antes de concatenar la query.
                // print($sentence->queryString);

                //Ejecutamos la sentencia
                $sentence->execute();

                //Devolvemos todos los datos de la tabla usuarios que se hayan obtenido de la consulta
                return $sentence->fetchAll(); //devuelve un array
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<bd/>");
            }
            //En caso de que no se haya conseguido, se devuelve null
            return null;
        }
    }

    //POR HACER!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    //Funcion que añade un nuevo user
    function addUser($conBD, $user)
    {
        //Si $user no es nulo ni tampoco los valores de cada clave del array asociativo ni la conexion
        if (
            isset($user) && isset($user["nombre"]) && isset($user["apellidos"])
            && isset($user["direccion"]) && isset($user["telefono"]) && isset($user["correo"])
            && isset($user["passwd"]) && isset($user["salt"]) && isset($user["foto"]) && isset($conBD)
        ) {
            //Rodeamos el código en un try/catch para manejar las excepciones
            try {
                //Consulta que vamos a pasar al prepare
                $query = "INSERT INTO tienda_animales.roles (nombre, apellidos, direccion, telefono, correo, passwd, foto, Roles_id_rol) VALUES (:nombre, :apellidos, :direccion, :telefono, :correo, :passwd, :foto, :Roles_id_rol)";
                //Usamos prepare(), que prepara una sentencia para su ejecución por el método 
                //execute()
                $sentence = $conBD->prepare($query);

                //Vinculamos los parametros al nombre de variable especificado 
                //(También podemos poner ? en la consulta y luego poner un número indicando
                //a que ? hacemos referencia)
                $sentence->bindParam(":nombre", $user["nombre"]);
                $sentence->bindParam(":apellidos", $user["apellidos"]);
                $sentence->bindParam(":direccion", $user["direccion"]);
                $sentence->bindParam(":telefono", $user["telefono"]);
                $sentence->bindParam(":correo", $user["correo"]);
                $sentence->bindParam(":passwd", $user["passwd"]);
                $sentence->bindParam(":foto", $user["foto"]);
                $sentence->bindParam(":Roles_id_rol", $user["Roles_id_rol"]);

                //Ejecutamos la sentencia
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<bd/>");
            }

            return null;
        }
    }


    //POR HACER!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    //Funcion que actualiza un user
    function updateUser($conBD, $user)
    {
        //Si user no es nulo
        if (
            isset($user) && isset($user["nombre"]) && isset($user["apellidos"])
            && isset($user["direccion"]) && isset($user["telefono"]) && isset($user["correo"])
            && isset($user["passwd"]) && isset($user["foto"]) && isset($user["Roles_id_rol"]) && isset($conBD)
        ) {
            try {
                //Consulta que vamos a pasar al prepare
                $query = "UPDATE tienda_animales.usuarios set id_user = :id_user, nombre = :nombre, apellidos = :apellidos, direccion = :direccion, 
                telefono = :telefono, correo = :correo, passwd = :passwd, foto = :foto, Roles_id_rol = :Roles_id_rol
                WHERE id_rol = :id_rol";
                //Usamos prepare(), que prepara una sentencia para su ejecución por el método 
                //execute()
                $sentence = $conBD->prepare($query);

                //Vinculamos los parametros al nombre de variable especificado 
                //(También podemos poner ? en la consulta y luego poner un número indicando
                //a que ? hacemos referencia)
                $sentence->bindParam(":id_user", $user["id_user"]);
                $sentence->bindParam(":nombre", $user["nombre"]);
                $sentence->bindParam(":apellidos", $user["apellidos"]);
                $sentence->bindParam(":direccion", $user["direccion"]);
                $sentence->bindParam(":telefono", $user["telefono"]);
                $sentence->bindParam(":correo", $user["correo"]);
                $sentence->bindParam(":passwd", $user["passwd"]);
                $sentence->bindParam(":foto", $user["foto"]);
                $sentence->bindParam(":Roles_id_rol", $user["Roles_id_rol"]);

                //Ejecutamos la sentencia
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<bd/>");
            }
            return null;
        }
    }


    //Funcion que elimina un user
    function deleteUser($conBD, $id_user)
    { 
        //Si la conexion no es nula
        if (isset($conBD)) {
            //Rodeamos el código en un try/catch para manejar las excepciones
            try {
                //Definimos la consulta
                $query = "DELETE FROM tienda_animales.usuarios WHERE id_user = :id_user";
                //Preparamos la sentencia para su ejecución
                $sentence = $conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(1, $id_user);
                //Devolvemos lo obtenido de su ejecución 
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<br/>");
            }
        }
        //En caso de que no se haya conseguido, se devuelve null
        return null;
    }
}
