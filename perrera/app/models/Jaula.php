<?php

use \model\Model;
use \utils\Utils;

require_once "Model.php";
/*


    Yo me voy apuntando cualquier idea que se me vaya ocurriendo xd.

    Cuando se le otorgue una jaula a un animal, su estado tiene que pasar directamente a
    ocupada o podría decir que cada jaula tiene X espacio y que cada vez que se añada un
    animal, el espacio disponible vaya bajando.

    Bueno, ya veré




*/

class Jaula extends Model
{


    // --
    // -- MÉTODOS --------------------
    // --




    /**
     * Inserta una nueva jaula a la base de datos.
     * 
     * @param array Registro que queremos insertar.
     * 
     * @return mixed Devuelve true si se ha insertado correctamente y null si no se ha podido
     */
    public function insert(array $jaula)
    {
        try {
            // Consulta
            $query = "INSERT INTO jaulas (ubicacion, tamanio, ocupada, estado_comida, estado_limpieza, otros_comentarios) 
            VALUE(:ubicacion, :tamanio, :ocupada, :estado_comida, :estado_limpieza, :otros_comentarios)";

            //Preparamos la query
            $stm = $this->conBD->prepare($query);

            $stm->bindParam(":ubicacion", $jaula["ubicacion"], PDO::PARAM_STR);
            $stm->bindParam(":tamanio", $jaula["tamanio"], PDO::PARAM_INT);
            $stm->bindParam(":ocupada", $jaula["ocupada"], PDO::PARAM_INT);
            $stm->bindParam(":estado_comida", $jaula["estado_comida"], PDO::PARAM_INT);
            $stm->bindParam(":estado_limpieza", $jaula["estado_limpieza"], PDO::PARAM_INT);
            $stm->bindParam(":otros_comentarios", $jaula["otros_comentarios"], PDO::PARAM_STR);

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

// $jaula = new Jaula();
// var_dump($jaula->get_all("jaulas"));
// var_dump($jaula->insert(["ubicacion"=>"Prueba", "tamanio"=>"1", "ocupada"=>"1", 
// "estado_comida"=>"1", "estado_limpieza"=>"1","tamanio" =>"40","otros_comentarios"=>"30,5"]));