<?php 

class Empleado
{
    private $name;
    private $surname;
    private $salary;
    
    private $num_phones = array();


    public function __construct($name, $surname, $salary, $num_phones)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->salary = $salary;
        $this->num_phones = $num_phones;
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
        if($this->getSalary() > 3333)
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

$paco = new Empleado("Paco", "Martinez", 20000, array(601324456, 613986201));

print("Empleado: " . $paco->getNombreCompleto());

if($paco->debePagarImpuestos())
{
    print("\nA pagar perra");
}

//Mostramos la lista de teléfonos
print($paco->listarTelefonos());
//Añadimos un nuevo telefono
$paco->anyadirTelefono(671340471);
//Mostramos la lista
print("\n" . $paco->listarTelefonos());
//Vaciamos el array
$paco->vaciarTelefonos();
//Mostramos la lista. Si hay un hueco, significa que no hay telefonos
print("\n" . $paco->listarTelefonos());


?>