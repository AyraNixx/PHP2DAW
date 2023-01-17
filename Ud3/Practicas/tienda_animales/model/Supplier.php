<?php

namespace model;

use \PDO;
use \PDOException;

class Supplier
{
    //Funcion que devuelve todos los proveedores
    public function getSuppliers($conBD)
    {
        //Si la conexión no es nula
        if (isset($conBD)) {
            //Englobamos el código en un try/catch para manejar los errores
            try {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.proveedores";
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

    //Funcion que devuelve un proveedor en especifico
    public function getSupplier($conBD, $id_supplier)
    {
        //Si la conexión no es nula y el id_proveedor tampoco
        if (isset($conBD) && isset($id_supplier) && is_num($id_supplier)) {
            //Englobamos el código en un try/catch para manejar los errores
            try {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.proveedores WHERE id_proveedor = :id_supplier;";
                //Preparamos la sentencia
                $sentence = $conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(":id_supplier", $id_supplier);
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

    //Function que devuelve los proveedores paginados
    public function supplierPag($conBD, string $fieldOrg, bool $ord, int $num_pag, int $amount)
    {
        //Si la conexion no es nula
        if (isset($conBD)) {
            //Englobamos el código en un try/catch para manejar los errores
            try {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.proveedores ORDER BY :fieldOrg ";
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

    //Funcion que inserta un nuevo proveedor
    public function addSupplier($conBD, $supplier)
    {
        //Si la conexión no es nula
        if (isset($conBD)) {
            //Englobamos el código en un try/catch para manejar los errores
            try {
                //Definimos la consulta
                $query = "INSERT INTO tienda_animales.proveedores (nombre, direccion, telefono, correo) VALUES (:nombre, :direccion, :telefono, :correo)";
                //Preparamos la sentencia
                $sentence = $conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(":nombre", $supplier["nombre"]);
                $sentence->bindParam(":direccion", $supplier["direccion"]);
                $sentence->bindParam(":telefono", $supplier["telefono"]);
                $sentence->bindParam(":correo", $supplier["correo"]);
                //Ejecutamos la sentencia y devolvemos lo obtenido
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<br/>");
            }
            //Devolvemos null en caso de que haya habido algún fallo
            return null;
        }
    }

    //Funcion que modifica un proveedor
    public function updateSupplier($conBD, $supplier)
    {
        //Si la conexión no es nula
        if (isset($conBD)) {
            //Englobamos el código en un try/catch para manejar los errores
            try {
                //Definimos la consulta
                $query = "UPDATE tienda_animales.proveedores SET nombre=:nombre, direccion=:direccion, telefono=:telefono, correo=:correo";
                //Preparamos la sentencia
                $sentence = $conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(":nombre", $supplier["nombre"]);
                $sentence->bindParam(":direccion", $supplier["direccion"]);
                $sentence->bindParam(":telefono", $supplier["telefono"]);
                $sentence->bindParam(":correo", $supplier["correo"]);
                //Ejecutamos la sentencia y devolvemos lo obtenido
                return $sentence->execute();
            } catch (PDOException $e) {
                print("¡Error! : " . $e->getMessage() . "<br/>");
            }
            //Devolvemos null en caso de que haya habido algún fallo
            return null;
        }
    }

    //Funcion que elimina un proveedor
    public function deleteSupplier($conBD, $id_supplier)
    {
        //Si la conexión no es nula y el id_proveedor tampoco
        if (isset($conBD) && isset($id_supplier) && is_num($id_supplier)) {
            //Englobamos el código en un try/catch para manejar los errores
            try {
                //Definimos la consulta
                $query = "SELECT * FROM tienda_animales.proveedores WHERE id_proveedor=:id_supplier;";
                //Preparamos la sentencia
                $sentence = $conBD->prepare($query);
                //Vinculamos los parametros al nombre de la variable especificada
                $sentence->bindParam(":id_supplier", $id_supplier);
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
