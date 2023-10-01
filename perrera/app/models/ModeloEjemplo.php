<?php 

namespace model;

use \model\Model;
use \utils\Utils;
use \PDO;
use \PDOException;
use \Exception;

require_once "Model.php";

class ModeloEjemplo extends Model
{
    private $profile;

    

    /**
     * Get the value of profile
     */ 
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Set the value of profile
     *
     * @return  self
     */ 
    public function setProfile($profile)
    {
        $this->profile = $profile;

        return $this;
    }


    public function get_registros($ord = "ASC")
    {
        $query = "SELECT * FROM perrera.roles ORDER BY rol :ord";
        $stm = $this->conBD->prepare($query);
        $stm->bindParam(":ord", $ord, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function add($array)
    {
        $query = "INSERT INTO roles (rol, descripcion) VALUES (:rol, :descripcion)";
        $stm = $this->conBD->prepare($query);
        $stm->bindParam(":rol", $array["rol"], PDO::PARAM_STR);
        $stm->bindParam(":descripcion", $array["descripcion"], PDO::PARAM_STR);
        var_dump($stm->execute());
    }

}

// $m = new ModeloEjemplo();

// $m->add(["rol"=>"eeeee", "descripcion" => "wwww"]);
