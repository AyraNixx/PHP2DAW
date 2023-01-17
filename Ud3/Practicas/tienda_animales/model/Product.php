<?php

namespace model;

use \PDO;
use \PDOException;

class Product
{
    //Funcion que devuelve todos los productos
    public function getProducts($conBD)
    {
        //Si la conexión no es nula
        if (isset($conBD)) {
            //Englobamos el código en un try/catch para manejar los errores
            try {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.productos";
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

    //Funcion que devuelve un producto en especifico
    public function getProduct($conBD, $id_product)
    {
        //Si la conexión no es nula y el id_product tampoco
        if (isset($conBD) && isset($id_product) && is_num($id_product)) {
            //Englobamos el código en un try/catch para manejar los errores
            try {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.productos WHERE id_producto = :id_producto;";
                //Preparamos la sentencia
                $sentence = $conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(":id_producto", $id_product);
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

    //Function que devuelve los productos paginados
    public function productPag($conBD, string $fieldOrg, bool $ord, int $num_pag, int $amount)
    {
        //Si la conexion no es nula
        if (isset($conBD)) {
            //Englobamos el código en un try/catch para manejar los errores
            try {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.productos ORDER BY :fieldOrg ";
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

    //Funcion que inserta un nuevo producto
    public function addProduct($conBD, $product)
    {
        //Si la conexión no es nula
        if (isset($conBD)) {
            //Englobamos el código en un try/catch para manejar los errores
            try {
                //Definimos la consulta
                $query = "INSERT INTO tienda_animales.productos (nombre, precio, stock, categoria) VALUES (:nombre, :precio, :stock, :categoria)";
                //Preparamos la sentencia
                $sentence = $conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(":nombre", $product["nombre"]);
                $sentence->bindParam(":precio", $product["precio"]);
                $sentence->bindParam(":stock", $product["stock"]);
                $sentence->bindParam(":categoria", $product["categoria"]);
                //Ejecutamos la sentencia y devolvemos lo obtenido
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<br/>");
            }
            //Devolvemos null en caso de que haya habido algún fallo
            return null;
        }
    }

    //Funcion que modifica un producto
    public function updateProduct($conBD, $product)
    {
        //Si la conexión no es nula
        if (isset($conBD)) {
            //Englobamos el código en un try/catch para manejar los errores
            try {
                //Definimos la consulta
                $query = "UPDATE tienda_animales.productos SET nombre=:nombre, precio=:precio, stock=:stock, categoria=:categoria";
                //Preparamos la sentencia
                $sentence = $conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(":nombre", $product["nombre"]);
                $sentence->bindParam(":precio", $product["precio"]);
                $sentence->bindParam(":stock", $product["stock"]);
                $sentence->bindParam(":categoria", $product["categoria"]);
                //Ejecutamos la sentencia y devolvemos lo obtenido
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<br/>");
            }
            //Devolvemos null en caso de que haya habido algún fallo
            return null;
        }
    }

    //Funcion que elimina un producto
    public function deleteProduct($conBD, $id_product)
    {
        //Si la conexión no es nula y el id_product tampoco
        if (isset($conBD) && isset($id_product) && is_num($id_product)) {
            //Englobamos el código en un try/catch para manejar los errores
            try {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.productos WHERE id_producto=:id_producto;";
                //Preparamos la sentencia
                $sentence = $conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(":id_producto", $id_product);
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
