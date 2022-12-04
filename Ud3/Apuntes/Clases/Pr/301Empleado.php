<?php 

class Empleado
{
    private $name;
    private $surname;
    private $salary;


    public function __construct($name, $surname, $salary)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->salary = $salary;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }





    /**
     * Get the value of surname
     */ 
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set the value of surname
     *
     * @return  self
     */ 
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
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



    //                  FUNCIONES
    function getNombreCompleto() : string 
    {
        return $this->getName() . " " . $this->getSurname();
    }

    function debePagarImpuestos() : bool 
    {
        if($this->getSalary() > 3333)
        {
            return true;
        }else{
            return false;
        }
    }
}

$paco = new Empleado("Paco", "Martinez", 20000);

print($paco->getNombreCompleto());

if($paco->debePagarImpuestos())
{
    print("\nA pagar perra");
}


?>