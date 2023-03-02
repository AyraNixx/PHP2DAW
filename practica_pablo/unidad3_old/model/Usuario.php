<?php

namespace model;

require_once("Utils.php");

use \PDO;
use \PDOException;

class Usuario
{

  
    /**Funcion que nos devuelve todos los usuarios */
    public function getUsuarios($conexPDO)
    {

        if ($conexPDO != null) {
            try {
                //Primero introducimos la sentencia a ejecutar con prepare
                //Ponemos en lugar de valores directamente, interrogaciones
                $sentencia = $conexPDO->prepare("SELECT * FROM tienda.usuarios");
                //Ejecutamos la sentencia
                $sentencia->execute();

                //Devolvemos los datos del cliente
                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }


    /**
     * Devuelve el usuario asociado a la clave primaria introducida
     */
    public function getUsuario($idUsuario, $conexPDO)
    {
        if (isset($idUsuario) && is_numeric($idUsuario)) {


            if ($conexPDO != null) {
                try {
                    //Primero introducimos la sentencia a ejecutar con prepare
                    //Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("SELECT * FROM tienda.Usuarios where idUsuario=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $idUsuario);
                    //Ejecutamos la sentencia
                    $sentencia->execute();

                    //Devolvemos los datos del Usuario
                    return $sentencia->fetch();
                } catch (PDOException $e) {
                    print("Error al acceder a BD" . $e->getMessage());
                }
            }
        }
    }

    function addUsuario($usuario, $conexPDO)
    {

        $result = null;
        if (isset($usuario) && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("INSERT INTO tienda.Usuarios (nombre, email, edad,sexo,password,salt,activo,codActivacion) VALUES ( :nombre, :email, :edad, :sexo,:password,:salt,:activo,:codActivacion)");

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":nombre", $usuario["nombre"]);
                $sentencia->bindParam(":email", $usuario["email"]);
                $sentencia->bindParam(":edad", $usuario["edad"]);
                $sentencia->bindParam(":sexo", $usuario["sexo"]);
                $sentencia->bindParam(":password", $usuario["password"]);
                $sentencia->bindParam(":salt", $usuario["salt"]);
                $sentencia->bindParam(":activo", $usuario["activo"]);
                $sentencia->bindParam(":codActivacion", $usuario["codActivacion"]);

                //Ejecutamos la sentencia
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }


}