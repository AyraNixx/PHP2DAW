<?php

namespace model;

use \PDO;
use \PDOException;

class Order
{
    //Funcion que devuelve todos los pedidos
    public function getOrders($conBD)
    {
        //Si la conexión no es nula
        if (isset($conBD)) {
            //Englobamos el código en un try/catch para manejar los errores
            try {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.pedidos";
                //Preparamos la sentencia
                $sentence = $conBD->prepare($query);
                //Ejecutamos la sentencia
                $sentence->execute();
                //Devolvemos los resultados obtenidos
                return $sentence->fetchAll();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<br/>");
            }
            //Devolvemos null en caso de que haya habido algún fallo
            return null;
        }
    }

    //Funcion que devuelve un pedido en especifico
    public function getOrder($conBD, $id_order)
    {
        //Si la conexión no es nula y el id_order tampoco
        if (isset($conBD) && isset($id_order) && is_num($id_order)) {
            //Englobamos el código en un try/catch para manejar los errores
            try {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.pedidos WHERE id_order = :id_order;";
                //Preparamos la sentencia
                $sentence = $conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(":id_order", $id_order);
                //Ejecutamos la sentencia
                $sentence->execute();
                //Devolvemos los resultados obtenidos
                return $sentence->fetch();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<br/>");
            }
            //Devolvemos null en caso de que haya habido algún fallo
            return null;
        }
    }

    //Function que devuelve los pedidos paginados
    public function orderPag($conBD, string $fieldOrg, bool $ord, int $num_pag, int $amount)
    {
        //Si la conexion no es nula
        if (isset($conBD)) {
            //Englobamos el código en un try/catch para manejar los errores
            try {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.pedidos ORDER BY :fieldOrg ";
                //Dependiendo se si $ord es true o false concatenamos a query una cosa u otra.
                ($ord) ? ($query . " LIMIT :amount OFFSET :offset ") : ($query . " DESC LIMIT :amount OFFSET :offset");
                //Calculamos offset, que es el registro desde el que empieza la página en la que
                //nos encontremos. Para calcularlo, le quitamos uno a $num_pag y lo multiplicamos
                //por la cantidad ($amount)
                $offset = ($num_pag - 1) * $amount;
                //Preparamos la sentencia
                $sentence = $conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(":fieldOrg", $fieldOrg);
                //Usamos PDO::PARAM_INT para indicar que represneta un dato integer
                $sentence->bindParam(":amount", $amount, PDO::PARAM_INT);
                $sentence->bindParam(":offset", $offset, PDO::PARAM_INT);
                //Ejecutamos la sentencia
                $sentence->execute();
                //Devolvemos los resultados obtenidos
                return $sentence->fetchAll();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<br/>");
            }
            //En caso de que algo salga mal, devolvemos null
            return null;
        }
    }

    //Funcion que inserta un nuevo pedido
    public function addOrder($conBD, $pedido)
    {
        //Si la conexión no es nula
        if (isset($conBD)) {
            //Englobamos el código en un try/catch para manejar los errores
            try {
                //Definimos la consulta
                $query = "INSERT INTO tienda_animales.pedidos (fecha_compra, precio_final, id_usuario) VALUES (:fecha_compra, :precio_final, :id_usuario)";
                //Preparamos la sentencia
                $sentence = $conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(":fecha_compra", $pedido["nombre"]);
                $sentence->bindParam(":precio_final", $pedido["precio_final"]);
                $sentence->bindParam(":id_usuario", $pedido["id_usuario"]);
                //Ejecutamos la sentencia y devolvemos lo obtenido
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<br/>");
            }
            //Devolvemos null en caso de que haya habido algún fallo
            return null;
        }
    }

    //Funcion que modifica un pedido
    public function updateOrder($conBD, $pedido)
    {
        //Si la conexión no es nula
        if (isset($conBD)) {
            //Englobamos el código en un try/catch para manejar los errores
            try {
                //Definimos la consulta
                $query = "UPDATE tienda_animales.pedidos SET fecha_compra=:fecha_compra, precio_final:=precio_final, id_usuario=:id_usuario";
                //Preparamos la sentencia
                $sentence = $conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(":fecha_compra", $pedido["nombre"]);
                $sentence->bindParam(":precio_final", $pedido["precio_final"]);
                $sentence->bindParam(":id_usuario", $pedido["id_usuario"]);
                //Ejecutamos la sentencia y devolvemos lo obtenido
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<br/>");
            }
            //Devolvemos null en caso de que haya habido algún fallo
            return null;
        }
    }

    //Funcion que elimina un pedido
    public function deleteOrder($conBD, $id_order)
    {
        //Si la conexión no es nula y el id_order tampoco
        if (isset($conBD) && isset($id_order) && is_num($id_order)) {
            //Englobamos el código en un try/catch para manejar los errores
            try {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.pedidos WHERE id_order=:id_order;";
                //Preparamos la sentencia
                $sentence = $conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(":id_order", $id_order);
                //Ejecutamos la sentencia
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<br/>");
            }
            //Devolvemos null en caso de que haya habido algún fallo
            return null;
        }
    }

}
