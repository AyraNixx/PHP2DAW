<?php

namespace model;

require_once("Utils.php");

use \PDO;
use \PDOException;

class Cliente
{

    /**
     * Nos devuelve los clientes mayores de la edad minima con el sexo introducido
     */
    public function getClienteSel($edadMin, $sexo, $conexPDO)
    {

        if (isset($edadMin) && is_numeric($edadMin) && isset($sexo) && is_string($sexo)) {


            if ($conexPDO != null) {

                try {
                    //Primero introducimos la sentencia a ejecutar con prepare
                    //Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("SELECT * FROM tienda.clientes where edad>:edad and sexo=:sexo");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(":edad", $edadMin);
                    $sentencia->bindParam(":sexo", $sexo);
                    //Ejecutamos la sentencia
                    $sentencia->execute();

                    //Devolvemos los datos del cliente
                    return $sentencia->fetchAll();
                } catch (PDOException $e) {
                    print("Error al Acceder a BD" . $e->getMessage());
                }
            }
        }
    }

    /**Funcion que nos devuelve todos los clientes */
    public function getClientes($conexPDO)
    {

        if ($conexPDO != null) {
            try {
                //Primero introducimos la sentencia a ejecutar con prepare
                //Ponemos en lugar de valores directamente, interrogaciones
                $sentencia = $conexPDO->prepare("SELECT * FROM tienda.clientes ORDER BY idClientes");
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
     * Funcion que nos devuelve todos los clientes con paginacion
     * */
    public function getClientesPag($conexPDO, $ordAsc, string $campoOrd, int $numPag, int $cantElem)
    {

        if ($conexPDO != null) {
            try {
                //Primero introducimos la sentencia a ejecutar con prepare
                //Ponemos en lugar de valores directamente, interrogaciones

                //En los order by no se pueden poner valores, son nombres de campos de BD
                //hay que poner directamente el campo por el cual se ordena
                //es recomendable controlar que el campo sea uno de los de la tabla

                //Query inicial
                $query = "SELECT * FROM tienda.clientes ORDER BY $campoOrd ";

                //si esta ordenada descentemente añadimos DESC
                if (!$ordAsc) $query = $query . "DESC ";

                //Añadimos a la query la cantidad de elementos por página con LIMIT
                //Y desde que página empieza con OFFSET
                $query = $query . "LIMIT ? OFFSET ?";

                $sentencia = $conexPDO->prepare($query);
                
                //El segundo parametro es la cantidad de elementos por pagina
                $sentencia->bindParam(1, $cantElem, PDO::PARAM_INT);
                //El tercer parametro es desde que registro empieza a partir de la
                //pagina actual
                $offset = ($numPag - 1) * $cantElem;
                if ($numPag != 1)
                    $offset++;

                $sentencia->bindParam(2, $offset, PDO::PARAM_INT);

                //INTERESANTE 
                //queryString contiene la sentencia sql a ejecutar
                //print($sentencia->queryString);

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
     * Devuelve el cliente asociado a la clave primaria introducida
     */
    public function getCliente($idCliente, $conexPDO)
    {
        if (isset($idCliente) && is_numeric($idCliente)) {


            if ($conexPDO != null) {
                try {
                    //Primero introducimos la sentencia a ejecutar con prepare
                    //Ponemos en lugar de valores directamente, interrogaciones
                    $sentencia = $conexPDO->prepare("SELECT * FROM tienda.clientes where idClientes=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $idCliente);
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

    function addCliente($cliente, $conexPDO)
    {

        $result = null;
        if (isset($cliente) && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("INSERT INTO tienda.clientes (nombre, email, edad,sexo) VALUES ( :nombre, :email, :edad, :sexo)");

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":nombre", $cliente["nombre"]);
                $sentencia->bindParam(":email", $cliente["email"]);
                $sentencia->bindParam(":edad", $cliente["edad"]);
                $sentencia->bindParam(":sexo", $cliente["sexo"]);

                //Ejecutamos la sentencia
                $result = $sentencia->execute();
            } catch (PDOException $e) {
                print("Error al acceder a BD" . $e->getMessage());
            }
        }

        return $result;
    }

    function delCliente($idCliente, $conexPDO)
    {
        $result = null;

        if (isset($idCliente) && is_numeric($idCliente)) {


            if ($conexPDO != null) {
                try {
                    //Borramos el cliente asociado a dicho id
                    $sentencia = $conexPDO->prepare("DELETE  FROM tienda.clientes where idClientes=?");
                    //Asociamos a cada interrogacion el valor que queremos en su lugar
                    $sentencia->bindParam(1, $idCliente);
                    //Ejecutamos la sentencia
                    $result = $sentencia->execute();
                } catch (PDOException $e) {
                    print("Error al borrar" . $e->getMessage());
                }
            }
        }

        return $result;
    }


    function updateCliente($cliente, $conexPDO)
    {

       
        $result = null;
        if (isset($cliente) && isset($cliente["idClientes"]) && is_numeric($cliente["idClientes"])  && $conexPDO != null) {

            try {
                //Preparamos la sentencia
                $sentencia = $conexPDO->prepare("UPDATE tienda.clientes set nombre=:nombre, email=:email, edad=:edad,sexo=:sexo where idClientes=:idClientes");

                //print($sentencia->queryString);

                //Asociamos los valores a los parametros de la sentencia sql
                $sentencia->bindParam(":idClientes", $cliente["idClientes"]);
                $sentencia->bindParam(":nombre", $cliente["nombre"]);
                $sentencia->bindParam(":email", $cliente["email"]);
                $sentencia->bindParam(":edad", $cliente["edad"]);
                $sentencia->bindParam(":sexo", $cliente["sexo"]);

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

$gestorCli = new Cliente();

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
$alvaro["idClientes"] = 13;

//print("Resultado actualizacion: " . $gestorCli->updateCliente($alvaro, $conexPDO));


//var_dump($gestorCli->delCliente(6,$conexPDO));


$resultado2 = $gestorCli->getClientesPag($conexPDO, false, "sexo", 2, 5);

var_dump($resultado2);


$gestorCli = new Cliente();

//Nos conectamos a la Bd
$conexPDO = Utils::conectar();

for ($i=0;$i<10;$i++)
{
$alvaro = ["nombre" => "alvaro$i", "email" => "alvaro$i@gmail.com", "edad" => random_int(1,120), "sexo" => (random_int(1,100)>50?"H":"M")];

$gestorCli->addCliente($alvaro, $conexPDO);

}
*/

