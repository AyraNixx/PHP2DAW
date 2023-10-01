<?php

namespace model;

use \model\Model;
use \utils\Utils;
use \PDO;
use \PDOException;
use \Exception;

require_once "Model.php";

class Animal extends Model
{


    // 
    // -- ATRIBUTOS
    // 
    private $animal;


    // --
    // -- GETTER AND SETTER --------------------
    // --



    /**
     * Get the value of animal
     */
    public function getAnimal()
    {
        return $this->animal;
    }

    /**
     * Set the value of animal
     *
     * @return  self
     */
    public function setAnimal($animal)
    {
        $this->animal = $animal;

        return $this;
    }






    // --
    // -- MÉTODOS --------------------
    // --



    /**
     * Inserta un nuevo animal a la base de datos.
     * 
     * @param array Registro que queremos insertar.
     * 
     * @return mixed Devuelve true si se ha insertado correctamente y null si no se ha podido
     */
    public function add()
    {
        try {
            // $query = "INSERT INTO animales (nombre, especies_id, raza, genero, tamanio, peso, colores, personalidad, fech_nac, estado_adopcion, estado_salud, necesidades_especiales, otras_observaciones, jaulas_id)
                //   VALUES (:nombre, :especies_id, :raza, :genero, :tamanio, :peso, :colores, :personalidad, :fech_nac, :estado_adopcion, :estado_salud, :necesidades_especiales, :otras_observaciones, :jaulas_id)";
            // Consulta
            $query = "INSERT INTO animales (
                nombre, 
                especies_id, 
                raza, 
                genero, 
                tamanio, 
                peso, 
                colores, 
                personalidad, 
                fech_nac, 
                estado_adopcion, 
                estado_salud, 
                necesidades_especiales, 
                otras_observaciones, 
                jaulas_id) 
            VALUE(
                :nombre,
                :especies_id,
                :raza,
                :genero,
                :tamanio,
                :peso,
                :colores,
                :personalidad,
                :fech_nac,
                :estado_adopcion,
                :estado_salud,
                :necesidades_especiales, 
                :otras_observaciones, 
                :jaulas_id)";

            //Preparamos la query
            $stm = $this->conBD->prepare($query);

            // $stm->bindParam(":nombre", $this->animal["nombre"]);
            // $stm->bindParam(":especies_id", $this->animal["especies_id"]);
            // $stm->bindParam(":raza", $this->animal["raza"]);
            // $stm->bindParam(":genero", $this->animal["genero"]);
            // $stm->bindParam(":tamanio", $this->animal["tamanio"]);
            // $stm->bindParam(":peso", $this->animal["peso"]);
            // $stm->bindParam(":colores", $this->animal["colores"]);
            // $stm->bindParam(":personalidad", $this->animal["personalidad"]);
            // $stm->bindParam(":fech_nac", $this->animal["fech_nac"]);
            // $stm->bindParam(":estado_adopcion", $this->animal["estado_adopcion"]);
            // $stm->bindParam(":estado_salud", $this->animal["estado_salud"]);
            // $stm->bindParam(":necesidades_especiales", $this->animal["necesidades_especiales"]);
            // $stm->bindParam(":otras_observaciones", $this->animal["otras_observaciones"]);
            // $stm->bindParam(":jaulas_id", $this->animal["jaulas_id"]);

            $stm->bindParam(":nombre", $this->animal["nombre"], PDO::PARAM_STR);
            $stm->bindParam(":especies_id", $this->animal["especies_id"], PDO::PARAM_STR);
            $stm->bindParam(":raza", $this->animal["raza"], PDO::PARAM_STR);
            $stm->bindParam(":genero", $this->animal["genero"], PDO::PARAM_STR);
            $stm->bindParam(":tamanio", $this->animal["tamanio"], PDO::PARAM_STR);
            $stm->bindParam(":peso", $this->animal["peso"], PDO::PARAM_STR);
            $stm->bindParam(":colores", $this->animal["colores"], PDO::PARAM_STR);
            $stm->bindParam(":personalidad", $this->animal["personalidad"], PDO::PARAM_STR);
            $stm->bindParam(":fech_nac", $this->animal["fech_nac"], PDO::PARAM_STR);
            $stm->bindParam(":estado_adopcion", $this->animal["estado_adopcion"], PDO::PARAM_STR);
            $stm->bindParam(":estado_salud", $this->animal["estado_salud"], PDO::PARAM_STR);
            $stm->bindParam(":necesidades_especiales", $this->animal["necesidades_especiales"], PDO::PARAM_STR);
            $stm->bindParam(":otras_observaciones", $this->animal["otras_observaciones"], PDO::PARAM_STR);
            $stm->bindParam(":jaulas_id", $this->animal["jaulas_id"], PDO::PARAM_STR);

            // Ejecutamos la query           
            // Devolvemos resultados
            return $stm->execute();
            // En caso de excepción, lo guardamos en el log
        } catch (PDOException $e) {
            // Guardamos el error en el log
            Utils::save_log_error("PDOException caught: " . $e->getMessage());
        } catch (Exception $e) {
            // Guardamos el error en el log
            Utils::save_log_error("Unexpected error caught: " . $e->getMessage());
        }
    }


    /**
     * Inserta un nuevo animal a la base de datos.
     * 
     * @param array Registro que queremos insertar.
     * 
     * @return mixed Devuelve true si se ha insertado correctamente y null si no se ha podido
     */
    public function update()
    {
        try {
            // Consulta
            $query = "UPDATE animales SET
                nombre = :nombre, 
                especies_id = :especies_id, 
                raza = :raza, 
                genero = :genero, 
                tamanio = :tamanio, 
                peso = :peso, 
                colores = :colores, 
                personalidad = :personalidad, 
                fech_nac = :fech_nac, 
                estado_adopcion = :estado_adopcion, 
                estado_salud = :estado_salud, 
                necesidades_especiales = :necesidades_especiales, 
                otras_observaciones = :otras_observaciones, 
                jaulas_id = :jaulas_id
                WHERE id = :id";

            //Preparamos la query
            $stm = $this->conBD->prepare($query);

            $stm->bindParam(":id", $this->animal["id"], PDO::PARAM_STR);
            $stm->bindParam(":nombre", $this->animal["nombre"], PDO::PARAM_STR);
            $stm->bindParam(":especies_id", $this->animal["especie"], PDO::PARAM_STR);
            $stm->bindParam(":raza", $this->animal["raza"], PDO::PARAM_STR);
            $stm->bindParam(":genero", $this->animal["genero"], PDO::PARAM_STR);
            $stm->bindParam(":tamanio", $this->animal["tamanio"], PDO::PARAM_STR);
            $stm->bindParam(":peso", $this->animal["peso"], PDO::PARAM_STR);
            $stm->bindParam(":colores", $this->animal["colores"], PDO::PARAM_STR);
            $stm->bindParam(":personalidad", $this->animal["personalidad"], PDO::PARAM_STR);
            $stm->bindParam(":fech_nac", $this->animal["fech_nac"], PDO::PARAM_STR);
            $stm->bindParam(":estado_adopcion", $this->animal["estado_adopcion"], PDO::PARAM_STR);
            $stm->bindParam(":estado_salud", $this->animal["estado_salud"], PDO::PARAM_STR);
            $stm->bindParam(":necesidades_especiales", $this->animal["necesidades_especiales"], PDO::PARAM_STR);
            $stm->bindParam(":otras_observaciones", $this->animal["otras_observaciones"], PDO::PARAM_STR);
            $stm->bindParam(":jaulas_id", $this->animal["jaula"], PDO::PARAM_STR);

            // Ejecutamos la query           
            // Devolvemos resultados
            return $stm->execute();
            // En caso de excepción, lo guardamos en el log
        } catch (PDOException $e) {
            // Guardamos el error en el log
            Utils::save_log_error("PDOException caught: " . $e->getMessage());
        } catch (Exception $e) {
            // Guardamos el error en el log
            Utils::save_log_error("Unexpected error caught: " . $e->getMessage());
        }
    }


    public function get_cages_available(String $especie)
    {
        // Rodeamos el código en un try catch para controlar las excepciones
        try {
            // Consulta
            $query = "SELECT j.id, j.ubicacion 
                        FROM perrera.jaulas j
                            INNER JOIN especies e ON e.id = j.especies_id
                                WHERE j.especies_id = :especie AND j.disponible = 1";

            // Preparamos la consulta para su ejecución
            $statement = $this->conBD->prepare($query);
            // Vinculamos los parámetros al nombre de la variable especificada
            $statement->bindParam(":especie", $especie, PDO::PARAM_STR);
            // Ejecutamos la consulta
            $statement->execute();
            //Devolvemos las filas resultantes
            return $statement->fetchAll();
        } catch (PDOException $e) {
            // Guardamos el error en el log
            Utils::save_log_error("PDOException caught: " . $e->getMessage());
        } catch (Exception $e) {
            // Guardamos el error en el log
            Utils::save_log_error("Unexpected error caught: " . $e->getMessage());
        }
        return null;
    }



    /**
     * Devuelve todas las filas visibles de la tabla animales junto con el nombre de la especie y su ubicación
     */
    public function pagination_visible_with_more_info(string $ord, string $field, int $page, int $amount)
    {
        // Rodeamos el código en un try catch para controlar las excepciones
        try {
            // Calculamos desde que línea se empieza
            $offset = ($page - 1) * $amount;

            // Consulta
            $query = "SELECT a.*, e.nombre as nombre_especie, j.ubicacion 
                        FROM perrera.animales a
                            INNER JOIN especies e ON a.especies_id = e.id
                            INNER JOIN jaulas j ON a.jaulas_id = j.id
                                WHERE a.disponible = 1 
                                    ORDER BY $field $ord LIMIT :amount OFFSET :offset";
            // Preparamos la consulta para su ejecución
            $statement = $this->conBD->prepare($query);
            // Vinculamos los parámetros al nombre de la variable especificada
            $statement->bindParam(":amount", $amount, PDO::PARAM_INT);
            $statement->bindParam(":offset", $offset, PDO::PARAM_INT);
            // Ejecutamos la consulta
            $statement->execute();
            //Devolvemos las filas resultantes
            return $statement->fetchAll();
        } catch (PDOException $e) {
            // Guardamos el error en el log
            Utils::save_log_error("PDOException caught: " . $e->getMessage());
        } catch (Exception $e) {
            // Guardamos el error en el log
            Utils::save_log_error("Unexpected error caught: " . $e->getMessage());
        }
        return null;
    }

    /**
     * Devuelve todas las filas visibles de la tabla animales junto con el nombre de la especie y su ubicación
     */
    public function pagination_all_with_more_info(string $ord, string $field, int $page, int $amount)
    {
        // Rodeamos el código en un try catch para controlar las excepciones
        try {
            // Calculamos desde que línea se empieza
            $offset = ($page - 1) * $amount;

            // Consulta
            $query = "SELECT a.*, e.nombre as nombre_especie, j.ubicacion 
                        FROM perrera.animales a 
                            INNER JOIN especies e ON a.especies_id = e.id
                            INNER JOIN jaulas j ON a.jaulas_id = j.id
                                    ORDER BY $field $ord LIMIT :amount OFFSET :offset";
            // Preparamos la consulta para su ejecución
            $statement = $this->conBD->prepare($query);
            // Vinculamos los parámetros al nombre de la variable especificada
            $statement->bindParam(":amount", $amount, PDO::PARAM_INT);
            $statement->bindParam(":offset", $offset, PDO::PARAM_INT);
            // Ejecutamos la consulta
            $statement->execute();
            //Devolvemos las filas resultantes
            return $statement->fetchAll();
        } catch (PDOException $e) {
            // Guardamos el error en el log
            Utils::save_log_error("PDOException caught: " . $e->getMessage());
        } catch (Exception $e) {
            // Guardamos el error en el log
            Utils::save_log_error("Unexpected error caught: " . $e->getMessage());
        }
        return null;
    }
}

$animalM = new Animal();
// // var_dump($animal->get_all("animales"));
// $animal->setAnimal([
//     "id" => "001100292511104238040",
//     "nombre" => "prueba_video",
//     "especie" => "00B100292511104237965",
//     "raza" => "husky",
//     "genero" => "M",
//     "tamanio" => "40cm",
//     "peso" => "30,5",
//     "colores" => "blanco",
//     "personalidad" => "Alegre",
//     "fech_nac" => "1999-03-20",
//     "estado_adopcion" => "1",
//     "estado_salud" => "bien",
//     "necesidades_especiales" => "no",
//     "otras_observaciones" => "",
//     "jaula" => "00J100292511104237972"
// ]);
// var_dump($animal->update());
// echo "<pre>";
// var_dump($animalM->filter_data("animales", "especies_id", "00B100292511104237965"));
// echo "</pre>";