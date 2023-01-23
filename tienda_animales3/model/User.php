<?php

namespace model;

use \utils\Utils;

require_once("../utils/Utils.php");

use \PDO;
use \PDOException;

class User
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


    //Función que devuelve todas las filas de la tabla usuarios
    function get_all()
    {
        try {
            //Definimos la consulta
            $query = "SELECT * FROM tienda_animales.usuarios;";
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


    //Función que devuelve el usuario indicado
    function get_one(int $id_usuario)
    {
        //Si id no es nulo y es numerico
        if (isset($id_usuario) && is_num($id_usuario)) {
            try {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.usuarios WHERE id_usuario=:id_usuario";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(":id_usuario", $id_usuario);
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
            $query = "SELECT * FROM tienda_animales.usuarios ORDER BY :fieldOrd";
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


    //Funcion que añade un nuevo usuario
    function add(array $usuario)
    {
        //Si $usuario no es nulo, así como ningunao de sus valores
        if (isset($usuario) && isset($usuario["nombre"]) && isset($usuario["apellidos"]) && isset($usuario["direccion"]) 
            && isset($usuario["telefono"]) && isset($usuario["correo"]) && isset($usuario["passwd"]) && isset($usuario["salt"]) 
            && isset($usuario["foto"]) && isset($usuario["activo"]) && isset($usuario["cod_activacion"])  && isset($usuario["id_rol"])) {
            try {
                //Definimos la consulta
                $query = "INSERT INTO tienda_animales.usuarios (nombre, apellidos, direccion, telefono, correo, passwd, salt, foto, activo, cod_activacion, id_rol) VALUES (:nombre, :apellidos, :direccion, :telefono, :correo, :passwd, :salt, :foto, :activo, :cod_activacion, :id_rol)";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $sentence->bindParam(":nombre", $usuario["nombre"]);
                $sentence->bindParam(":apellidos", $usuario["apellidos"]);
                $sentence->bindParam(":direccion", $usuario["direccion"]);
                $sentence->bindParam(":telefono", $usuario["telefono"]);
                $sentence->bindParam(":correo", $usuario["correo"]);
                $sentence->bindParam(":passwd", $usuario["passwd"]);
                $sentence->bindParam(":salt", $usuario["salt"]);
                $sentence->bindParam(":foto", $usuario["foto"]);
                $sentence->bindParam(":activo", $usuario["activo"]);
                $sentence->bindParam(":cod_activacion", $usuario["cod_activacion"]);
                $sentence->bindParam(":id_rol", $usuario["id_rol"]);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<bd/>");
            }

            return null;
        }
    }


    //Funcion que actualiza un usuario
    function update(array $usuario)
    {
        //Comprobamos que no sea nulo
        if (isset($usuario) && isset($usuario["nombre"]) && isset($usuario["apellidos"]) && isset($usuario["direccion"]) 
            && isset($usuario["telefono"]) && isset($usuario["correo"]) && isset($usuario["passwd"]) && isset($usuario["salt"]) 
            && isset($usuario["foto"]) && isset($usuario["activo"]) && isset($usuario["cod_activacion"])  && isset($usuario["id_rol"])) {
            try {
                //Definimos la consulta
                $query = "UPDATE tienda_animales.usuarios SET id_usuario=:id_usuario, nombre=:nombre, apellidos=:apellidos, direccion=:direccion, telefono=:telefono, correo=:correo, passwd=:passwd, salt=:salt, foto=:foto, activo=:activo, cod_activacion=:cod_activacion, id_rol=:id_rol WHERE id_usuario=:id_usuario";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $sentence->bindParam(":id_usuario", $usuario["id_usuario"]);
                $sentence->bindParam(":nombre", $usuario["nombre"]);
                $sentence->bindParam(":apellidos", $usuario["apellidos"]);
                $sentence->bindParam(":direccion", $usuario["direccion"]);
                $sentence->bindParam(":telefono", $usuario["telefono"]);
                $sentence->bindParam(":correo", $usuario["correo"]);
                $sentence->bindParam(":passwd", $usuario["passwd"]);
                $sentence->bindParam(":salt", $usuario["salt"]);
                $sentence->bindParam(":foto", $usuario["foto"]);
                $sentence->bindParam(":activo", $usuario["activo"]);
                $sentence->bindParam(":cod_activacion", $usuario["cod_activacion"]);
                $sentence->bindParam(":id_rol", $usuario["id_rol"]);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<bd/>");
            }
            return null;
        }
    }


    //Funcion que elimina el usuario indicado
    function delete(int $id_usuario)
    {
        //Si id no es nulo y es numerico
        if (isset($id_usuario) && is_num($id_usuario)) {
            try {
                //Definimos la consulta
                $query = "DELETE FROM tienda_animales.usuarios WHERE id_usuario = :id_usuario";
                //Preparamos la sentencia
                $sentence = $this->conBD->prepare($query);
                //Vinculamos los parametros al nombre de variable especificado
                $sentence->bindParam(":id_usuario", $id_usuario);
                //Devolvemos el resultado de la ejecucion (será un boolean true si todo ha ido bien)
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<br/>");
            }
            return null;
        }
    }
}
