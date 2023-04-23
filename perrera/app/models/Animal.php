<?php

use \model\Model;
use \utils\Utils;

require_once "Model.php";

class Animal extends Model
{


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
    public function insert(array $animal)
    {
        try {
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

            $stm->bindParam(":nombre", $animal["nombre"], PDO::PARAM_STR);
            $stm->bindParam(":especies_id", $animal["especies_id"], PDO::PARAM_INT);
            $stm->bindParam(":raza", $animal["raza"], PDO::PARAM_STR);
            $stm->bindParam(":genero", $animal["genero"], PDO::PARAM_STR);
            $stm->bindParam(":tamanio", $animal["tamanio"], PDO::PARAM_STR);
            $stm->bindParam(":peso", $animal["peso"], PDO::PARAM_STR);
            $stm->bindParam(":colores", $animal["colores"], PDO::PARAM_STR);
            $stm->bindParam(":personalidad", $animal["personalidad"], PDO::PARAM_BOOL);
            $stm->bindParam(":fech_nac", $animal["fech_nac"], PDO::PARAM_STR);
            $stm->bindParam(":estado_adopcion", $animal["estado_adopcion"], PDO::PARAM_STR);
            $stm->bindParam(":estado_salud", $animal["estado_salud"], PDO::PARAM_STR);
            $stm->bindParam(":necesidades_especiales", $animal["necesidades_especiales"], PDO::PARAM_STR);
            $stm->bindParam(":otras_observaciones", $animal["otras_observaciones"], PDO::PARAM_STR);
            $stm->bindParam(":jaulas_id", $animal["jaulas_id"], PDO::PARAM_INT);

            // Ejecutamos la query           
            // Devolvemos resultados
            return $stm->execute();
            // En caso de excepción, lo guardamos en el log
        } catch (PDOException $e) {
            echo "todo mal";
            // Guardamos el error en el log
            Utils::save_log_error("PDOException caught: " . $e->getMessage());
        } catch (Exception $e) {
            echo "todo mal";
            // Guardamos el error en el log
            Utils::save_log_error("Unexpected error caught: " . $e->getMessage());
        }
    }
}

// $animal = new Animal();
// var_dump($animal->get_all("animales"));
// var_dump($animal->insert([
//     "nombre"=>"Prueba", 
//     "especies_id"=>"1",
//     "raza"=>"husky",
//     "genero"=>"M",
//     "tamanio"=>"40cm",
//     "peso"=>"30,5",
//     "colores"=>"blanco", 
//     "personalidad"=>"Alegre",
//     "fech_nac"=>"1999-03-20",
//     "estado_adopcion" => "1", 
//     "estado_salud" => "bien", 
//     "necesidades_especiales" => "no", 
//     "otras_observaciones" => "", 
//     "jaulas_id" => 1
// ]));