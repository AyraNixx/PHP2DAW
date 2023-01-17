<?php

namespace model;

require_once("Utils.php");

use \PDO;
use \PDOException;

class Usuarios
{
    //  CTRL + D

    /**Funcion que nos devuelve todos los usuarios */
    public function getUsuarios($conexPDO)
    {

        if ($conexPDO != null) {
            try {
                //Primero introducimos la sentencia a ejecutar con prepare
                //Ponemos en lugar de valores directamente, interrogaciones
                $sentencia = $conexPDO->prepare("SELECT * FROM tienda.usuarios");
                //Ejecutamoclientess la sentencia
                $sentencia->execute();

                //Devolvemos los datos del cliente
                return $sentencia->fetchAll();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }
    }

    /**
     * Devuelve el cliente asociado a la clave primaria introducida
     */
    public function getUsuario($idUsuario, $conexPDO)
    {
        if (isset($idUsuario) && is_numeric($idUsuario)) {


            if ($conexPDO != null) {
                try {
                    //Primero introducimos la sentencia a ejecutar con prepare
                    //Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("SELECT * FROM tienda.usuarios where idUsuario=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $idUsuario);
                    //Ejecutamos la sentencia
                    $sentencia->execute();

                    //Devolvemos los datos del cliente
                    return $sentencia->fetch();
                } catch (PDOException $e) {
                    print("Error al acceder a BD" . $e->getMessage());
                }
            }
        }
    }

    function addCliente($usuario, $conexPDO)
    {

        $result = null;
        if (isset($usuario) && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("INSERT INTO tienda.usuarios (nombre, email, edad,sexo, passwd, salt, activo, cod_activacion) VALUES ( :nombre, :email, :edad, :sexo, :passwd, :salt, :activo, :cod_activacion)");

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":nombre", $usuario["nombre"]);
                $sentencia->bindParam(":email", $usuario["email"]);
                $sentencia->bindParam(":edad", $usuario["edad"]);
                $sentencia->bindParam(":sexo", $usuario["sexo"]);
                $sentencia->bindParam(":passwd", $usuario["nombre"]);
                $sentencia->bindParam(":salt", $usuario["email"]);
                $sentencia->bindParam(":activo", $usuario["edad"]);
                $sentencia->bindParam(":cod_activacion", $usuario["cod_activacion"]);

                //Ejecutamos la sentencia
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

    function delCliente($idUsuario, $conexPDO)
    {
        $result = null;

        if (isset($idUsuario) && is_numeric($idUsuario)) {


            if ($conexPDO != null) {
                try {
                    //Borramos el cliente asociado a dicho id
                    $sentencia = $conexPDO->prepare("DELETE  FROM tienda.usuarios where idUsuario=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $idUsuario);
                    //Ejecutamos la sentencia
                    $result = $sentencia->execute();
                } catch (PDOException $e) {
                    print("Error al borrar" . $e->getMessage());
                }
            }
        }

        return $result;
    }

    function updateCliente($usuario, $conexPDO)
    {

        $result = null;
        if (isset($usuario) && isset($usuario["idUsuario"]) && is_numeric($usuario["idUsuario"])  && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("UPDATE tienda.usuarios set nombre=:nombre, email=:email, edad=:edad,sexo=:sexo, passwd=:passwd,  where idUsuario=:idUsuario");

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":nombre", $usuario["nombre"]);
                $sentencia->bindParam(":email", $usuario["email"]);
                $sentencia->bindParam(":edad", $usuario["edad"]);
                $sentencia->bindParam(":sexo", $usuario["sexo"]);
                $sentencia->bindParam(":passwd", $usuario["nombre"]);
                $sentencia->bindParam(":salt", $usuario["email"]);
                $sentencia->bindParam(":activo", $usuario["edad"]);
                $sentencia->bindParam(":cod_activacion", $usuario["cod_activacion"]);

                //Ejecutamos la sentencia
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }
}

/* Pruebas que no deberían estar aqui

$gestorCli = new Usuario();

//Nos conectamos a la Bd
$conexPDO = Utils::conectar();

//$gestorCli->getCliente(1,$conexPDO);
$resultado = $gestorCli->getClienteSel(18, "M", $conexPDO);

$resultado2 = $gestorCli->getClientes($conexPDO, null, null, null, null);

//var_dump($resultado2);

print("El nombre de la segunda mujer es" . $resultado[1]["nombre"]);

$alvaro = ["nombre" => "alvaro", "email" => "alvaro@gmail.com", "edad" => 24, "sexo" => "H"];
//Probamos la insercion
//var_dump($gestorCli->addCliente($alvaro, $conexPDO));

//Modificamos la edad de alvaro
$alvaro["edad"] = 13;
$alvaro["idUsuario"] = 13;

//print("Resultado actualizacion: " . $gestorCli->updateCliente($alvaro, $conexPDO));


//var_dump($gestorCli->delCliente(6,$conexPDO));


$resultado2 = $gestorCli->getClientesPag($conexPDO, false, "sexo", 2, 5);

var_dump($resultado2);
*/