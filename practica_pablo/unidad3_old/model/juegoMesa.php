<?php

namespace model;
// $file_path = realpath('../model/producto.php');
// echo $file_path;
// $file_contents = file_get_contents($file_path);
// echo "<br>".$file_contents;
require_once('producto.php');


class JuegoMesa extends Producto {


    private $numJugadores;
    private $edadRecomendada;
    
    public function __construct($nombre, $precio, $peso, $tamano, $cantidad, $ivaAplicado,$numJugadores,$edadRecomendada)
    {
        //llamo al constructor de la clase padre con parent:: para inicializar
        //los atributos heredados
        parent::__construct($nombre,$precio,$peso,$tamano,$cantidad,$ivaAplicado);

        //Inicializamos los atributos propios de nuestra clase.
        $this->numJugadores = $numJugadores;
        $this->edadRecomendada = $edadRecomendada;
    }


    /**
     * Get the value of numJugadores
     */ 
    public function getNumJugadores()
    {
        return $this->numJugadores;
    }

    /**
     * Set the value of numJugadores
     *
     * @return  self
     */ 
    public function setNumJugadores($numJugadores)
    {
        $this->numJugadores = $numJugadores;

        return $this;
    }

    /**
     * Get the value of edadRecomendada
     */ 
    public function getEdadRecomendada()
    {
        return $this->edadRecomendada;
    }

    /**
     * Set the value of edadRecomendada
     *
     * @return  self
     */ 
    public function setEdadRecomendada($edadRecomendada)
    {
        $this->edadRecomendada = $edadRecomendada;

        return $this;
    }

    //Sobreescritura de fucniones, se llaman igual que los de la 
    //clase padre, pero tienen una funcionalidad algo distinta
    function calculoImpuestos(): float
    {
            //Llamamos a la funcion del padre y la utilizamos 
            //en el calculo
        return parent::calculoImpuestos()+0.8;
    }

    //Este metodo es obligatorio de implementar
    //en las clases hijas de producto al ser abstracta en el padre
    public function calculoEnvio(): string
    {
        $catEnvio="N";
       if ($this->getPeso()<5){

            $catEnvio="A";
        }
        else
        if ($this->getPeso()<10){

            $catEnvio="B";
        }
        else 
        $catEnvio="C";

        return $catEnvio;
  

    }


}



?>