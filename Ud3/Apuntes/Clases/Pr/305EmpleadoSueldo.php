<?php 

class Empleado
{
    public static $sueldo_tope = 3333;

    private $name;
    private $surname;
    private $salary;

    
    private $num_phones;


    public function __construct($name, $surname, $salary = 1000)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->salary = $salary;
    }




    /**
     * Get the value of sueldo_tope
     */ 
    public function getSueldo_tope()
    {
        return self::$sueldo_tope;
    }

    /**
     * Set the value of sueldo_tope
     *
     * @return  self
     */ 
    public function setSueldo_tope($sueldo_tope)
    {
        self::$sueldo_tope = $sueldo_tope;
    }










    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }





    /**
     * Get the value of surname
     */ 
    public function getSurname()
    {
        return $this->surname;
    }





    /**
     * Get the value of salary
     */ 
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set the value of salary
     *
     * @return  self
     */ 
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }

    
    /**
     * Get the value of num_phones
     */ 
    public function getNum_phones()
    {
        return $this->num_phones;
    }

    /**
     * Set the value of num_phones
     *
     * @return  self
     */ 
    public function setNum_phones($num_phones)
    {
        $this->num_phones = $num_phones;

        return $this;
    }




    //                  FUNCIONES
    function getNombreCompleto() : string 
    {
        return $this->getName() . " " . $this->getSurname();
    }

    function debePagarImpuestos() : bool 
    {
        //Se llama a la constante con self::
        if($this->getSalary() > self::$sueldo_tope)
        {
            return true;
        }else{
            return false;
        }
    }

    function anyadirTelefono(int $tel) : void 
    {   
        //Obtenemos el array de telefonos
        $array = $this->getNum_phones();

        //Añadimos el nuevo telefono al final del array
        array_push($array, $tel);

        //Le damos un nuevo valor a num_phones
        $this->setNum_phones($array);
    }

    function listarTelefonos() : string 
    {
        //Convertimos el array en string
        return implode(", ", $this->getNum_phones());
    }

    function vaciarTelefonos() : void 
    {
        //Iniciamos de nuevo num_phones para eliminar todo
        $this->setNum_phones(array());
    }
}

$paco = new Empleado("Paco", "Martinez");

print("Empleado: " . $paco->getNombreCompleto());

if($paco->debePagarImpuestos())
{
    print("\nA pagar perra");
}

$paco->setSueldo_tope(1000);
print($paco->getSueldo_tope());


?>