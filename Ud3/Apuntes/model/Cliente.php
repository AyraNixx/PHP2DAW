<?php

namespace models;

require_once("Utils.php");

use \PDO;
use \PDOException;
class Cliente
{
    /**
     * Nos devuelve los clientes mayores de la edad mínima con el sexo incluido
     */
    public function getClienteSel($edadMin, $sexo, $conBD)
    {
        try {
            if (isset($edad) && is_numeric($edadMin) && ctype_alpha($sexo)) {
                //En vez de ? podemos poner nombres, por ejemplo, en vez de edad> ? ponemos
                //edad > :edad (nombre que le hemos querido dar)
                $sentence = $conBD->prepare("SELECT * FROM tienda.cliente WHERE edad > ? AND sexo = ?");

                //Aquí, en vez de 1, pondríamos :edad
                $sentence->bindParam(1, $edadMin);
                $sentence->bindParam(2, $sexo);

                $sentence->execute();

                //devolvemos 
                return $sentence->fetchAll();
            }
        } catch (PDOException $e) {
            print("Error al acceder a la base de datos: " . $e->getMessage());
        }
    }


    /**
     * Funcion que nos devuleve todos los clientes 
     */
    public function getClientes($conBD, $orden, $campoOrd, $numPag, $cantidadElem)
    {
        try {
            if ($conBD != NULL) {
                //En vez de ? podemos poner nombres, por ejemplo, en vez de edad> ? ponemos
                //edad > :edad (nombre que le hemos querido dar)
                $sentence = $conBD->prepare("SELECT * FROM tienda.cliente");
                $sentence->execute();

                //devolvemos 
                return $sentence->fetchAll();
            }
        } catch (PDOException $e) {
            print("Error al acceder a la base de datos: " . $e->getMessage());
        }
    }


    /**
     * Devuelve el cliente que coincida con el idCliente introducido
     */
    function getCliente($idCliente, $conBD)
    {
        try {
            if (isset($idCliente) && is_num($idCliente)) {
                if ($conBD != null) {
                    //Utilizamos el preparestatement         
                    //Introducimos la sentencia a ejecutar.
                    //Ponemos el lugar de valores directamente, interrrogaciones
                    //(los parametros que queramos usar en la SELECT, serán interrogaciones
                    //para luego asociar a cada interrogacion el valor que queremos poner
                    //realmente)        
                    $sentence = $conBD->prepare("SELECT * FROM tienda.cliente WHERE idCliente = ?;");
                    //Asociamos a cada interrogación el valor que queremos en su lugar
                    $sentence->bindParam(1, $idCliente);
                    //Ejecutamos la sentencia.
                    //Por defecto, en la sentencia se guarda el resultado de la ejecución
                    $sentence->execute();

                    //Solo te saca uno (?)
                    //Podemos usar fetchAll para que nos devuelva un array con todos los registros
                    //devueltos por la query
                    var_dump($sentence->fetch());
                }
            }
        } catch (PDOException $e) {
            print("Error al acceder a la base de datos: " . $e->getMessage());
        }
    }

    //Es mejor pasar como parámetro un array asociativo que enviar to
    function addCliente($cliente, $conBD)
    {
        $result = null;

        try {
            if (isset($cliente) && $conBD != NULL) {
                //Preparamos la sentencia
                $sentence = $conBD->prepare("INSERT INTO tienda.cliente (nombre, email, edad, sexo) VALUES (:nombre, :email, :edad, :sexo)");

                //Asociamos los valores a los parametros de la sentencia sql
                $sentence->bindParam(":nombre", $cliente["nombre"]);
                $sentence->bindParam(":email", $cliente["email"]);
                $sentence->bindParam(":edad", $cliente["edad"]);
                $sentence->bindParam(":sexo", $cliente["sexo"]);

                //Ejecutamos
                $result = $sentence->execute();
            }
        } catch (PDOException $e) {
            print("Error al insertar: " . $e->getMessage());
        }

        return $result;
    }


    /**
     *Funcion que elimina un cliente en funcion del idCliente que tenga 
     */
    function deleteCliente($idCliente, $conBD)
    {
        $result = false;

        try{

            if ($conBD != NULL && is_numeric($idCliente)) {
                //Preparamos la sentencia
                $sentence = $conBD->prepare("DELTE FROM tienda.cliente WHERE idCliente = :idCliente");

                //Asociamos los valores a los parametros de la sentencia sql
                $sentence->bindParam(":idCliente", $idCliente);

                //Ejecutamos
                return $sentence->execute();
            }

        } catch (PDOException $e) {
            print("Error al eliminar cliente: " . $e->getMessage());
        }

        return $result;
    }



    //Funcion para modificar los campos del cliente
    function updateCliente($cliente, $conBD)
    {
        
        $result = false;
        try{
            if(isset($cliente) && (isset($cliente["idCliente"]) && is_numeric($cliente["idCliente"])) && $conBD != NULL)
            {
                $sentence = $conBD->prepare("UPDATE tienda.cliente SET nombre=:nombre, email=:email, edad=:edad, sexo=:sexo WHERE idCliente = :idCliente");

                //Asociamos los valores a los parametros de la sentencia sql
                $sentence->bindParam(":idCliente", $cliente["idCliente"]);
                $sentence->bindParam(":nombre", $cliente["nombre"]);
                $sentence->bindParam(":email", $cliente["email"]);
                $sentence->bindParam(":edad", $cliente["edad"]);
                $sentence->bindParam(":sexo", $cliente["sexo"]);

                //Ejecutamos
                $result = $sentence->execute();
                return $result;
            }
        }catch(PDOException $e){
            print("Error al modificar este cliente: " . $e->getMessage());
        }

        return $result;
    }



    /**
     * Funcion que nos devuleve todos los clientes 
     */
    public function getClientesPag($conBD, $ordAsc, $campoOrd, $numPag, $cantidadElem)
    {
        try {
            if ($conBD != NULL) {
                //En vez de ? podemos poner nombres, por ejemplo, en vez de edad> ? ponemos
                //edad > :edad (nombre que le hemos querido dar)


                //Query inicial
                $query = "SELECT *  FROM tienda.clientes ORDER BY ?";

                //Si esta ordenada descentemente añadimos DESC
                if(!$ordAsc) $query .= "DESC";

                //Añadimos a la query la cantidad de elementos por página con LIMIT
                //y desde qué pagina empieza con OFFSET

                $query .= "LIMIT ? OFFSET ?";

                $sentence = $conBD->prepare($query);
                //el primer parametro es el campo a ordernar
                $sentence->bindParam(1, $campoOrd);
                //El segundo parametro es la cantidad de elementos por página para mostrar
                $sentence->bindParam(2, $cantidadElem);
                //El tercer parámetro es desde qué registro empieza a mostrar 
                //la página actual
                $offset = ($numPag - 1) * $cantidadElem;
                if($numPag != 1) $offset++;
                //PONEMOS PDO::PARAM_INT PARA INDICAR QE ES DE TIPO ENTERO
                $sentence->bindParam(3, $offset, PDO::PARAM_INT);

                /**
                 * queryString va con la sentencia a usar ??
                 */


                 
                $sentence->execute();

                //devolvemos 
                return $sentence->fetchAll();
            }
        } catch (PDOException $e) {
            print("Error al acceder a la base de datos: " . $e->getMessage());
        }
    }


    /**
     * EN MYSQL, PONEMOS LIMIT PARA DECIRLE CUANTOS ELEMENTOS QUEREMOS QUE NOS SAQUE 
     * EN LA CONSULTA.
     * CON OFFSET LE DECIMOS DESDE DONDE QUEREMOS QUE NOS SAQUE LA SIGUIENTE TANDA
     * CON ORDERBY, LE INDICAMOS COMO QUEREMOS QUE SE ORDENE (ASCENDENTE POR DEFECTO)
     * EJEMPLO--> SELECT *  FROM tienda.clientes ORDER BY EDAD DESC LIMIT 10 OFFSET 10.
     */
}


//  PRUEBAS QUE NO DEBERÍAN DE ESTAR AQUÍ

// $cliente = new Cliente();

// //Nos conectamos a la base de datos
// $conBD = Utils::conectar();

// var_dump($cliente->getCliente(1, $conBD));
// $resultado = $cliente->getClienteSel(18, "M", $conBD);
// $resultado2 = $cliente->getClientes($conBD, null, null, null, null);

// print("El nombre de la segunda mujer es " . $resultado[1]["nombre"]);
// $alvaro = ["nombre" => "Alvaro", "email" => "alvaro@gmail.com", "edad" => 24, "sexo" => "H"];

// var_dump($cliente->addCliente($alvaro, $conBD));





//Para hacer que la clave sea incremental en la base de datos, 

//Si hay huecos en la base de datos, el incremental lo ignora, es decir,
//si eliminamos el cliente con id6 y hay 7 clientes, quedaría un hueco
//(pasaría del cliente 5 al cliente id 7). Si insertamos un nuevo cliente, 
//el id que tendría es id 8, pero el id 6, no lo rellenaría.
