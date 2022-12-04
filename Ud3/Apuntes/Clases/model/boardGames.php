<?php
namespace Ud3\Classes\model;




//Con extends ya tenemos todos los atributos de producto añadidos
class boardGames extends Product{
    private $num_players;
    private $min_age;

    public function __construct($name,
    $codISB,
    $price,
    $weight,
    $size,
    $amount,
    $ivaAdd, $num_players, $min_age)
    {
        //Para llamar a las propiedades de la clase padre, ponemos 
        //parent::
        //Llamo al constructor de la clase padre con parent:: para inicializar
        //los atributos heredados.
        parent::__construct($name, $codISB, $price, $weight, $size, $amount, $ivaAdd);

        //Inicializamos los atributos propios de nuestra clase
        $this->num_players = $num_players;
        $this->min_age = $min_age;
    }





    /**
     * Get the value of num_players
     */ 
    public function getNum_players()
    {
        return $this->num_players;
    }

    /**
     * Set the value of num_players
     *
     * @return  self
     */ 
    public function setNum_players($num_players)
    {
        $this->num_players = $num_players;

        return $this;
    }
    /**
     * Get the value of min_age
     */ 
    public function getMin_age()
    {
        return $this->min_age;
    }

    /**
     * Set the value of min_age
     *
     * @return  self
     */ 
    public function setMin_age($min_age)
    {
        $this->min_age = $min_age;

        return $this;
    }


    function calculoImpuestos( ) : float{
        return parent::addIva() + 0.8;
    }


    //Este método es obligatorio de implementar para las clases hijas de 
    //Producto al ser abstracta en la clase Padre
    function calculoEnvio() : string
    {
        $cat_envio = "N";
        if ($this->getWeight() < 5)
        {
            return $cat_envio = "A";

        }elseif ($this->getWeight() < 10)
        {
            return $cat_envio = "B";
        }else{
            return $cat_envio = "C";
        }
    }

    //Las clases abstractas están hechas para que las implementen las clases
    //hijos
}
