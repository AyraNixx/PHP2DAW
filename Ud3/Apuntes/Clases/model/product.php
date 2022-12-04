<?php
namespace Ud3\Classes\model;


/**
 * Clase Producto
 */

abstract class Product
{
    //                      ATRIBUTOS
    //El estándar es que la mayoría de los atributos sean privados y se accedan a 
    //ellos con getter y setters.
    //
    //El orden en programación es muy importante.
    //Primero definimos las variables y luego las funciones.


    //Si declaramos un atributo como público
    //se puede acceder a él sin ningñun problema cuando creamos un objeto
    public $name;
    //El iva es una variable estática, lo que implica que es compartida por todos
    //los objetos de esta clase    
    public static $ivaAdd = 16;
    //public $price;

    //El acceso a este atributo o función solo es posible desde las funciones
    //de su propia clase.
    private $codISB; 
    private $price;
    private $weight;
    private $size;
    private $amount;

    //protected. Se puede acceder desde la clase y desde sus subclases(?)

    //El acceso a atributos protegidos es posible desde la propia clase y sus
    //herederas
    protected $impuestos;


    //




    //              CONSTRUCTORES
    //Las funciones(?) especiales se llaman con dos guiones bajos
    //En PHP solo existe un constructor.
    /**
     * Constructor que recibe valores para los atributos(¿?)
     */
    public function __construct($name, $codISB, $price, $weight, $size, $amount, $ivaAdd)
    {
        $this->name = $name;
        $this->codISB = $codISB;
        $this->price = $price;
        $this->weight = $weight;
        $this->size = $size;
        $this->amount = $amount;
        self::$ivaAdd = $ivaAdd;
        
    }







    //                  GETTERS AND SETTERS
    public function getCodISB(){
        return $this->codISB;
    }

    public function setCodISB(string $cod)
    {
        $this->codISB = $cod;
    }


    public function getPrice(){
        return $this->price;
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
    }



    public function getWeight(){
        return $this->weight;
    }

    public function setWeight(float $weight)
    {
        $this->weight = $weight;
    }



    public function getSize(){
        return $this->size;
    }

    public function setSize(float $size)
    {
        $this->size = $size;
    }



    public function getAmount(){
        return $this->amount;
    }    

    public function setAmount(int $amount)
    {
        $this->amount = $amount;
    }





    //                  FUNCIONES



    //Si queremos indicar el tipo que se va a devolver ponemos dos puntos 
    //y el tipo a devolver
    function addIva() : float
    {
        return $this->price/100 * $this ->ivaAdd;
    }



    //              Funcion toString;
    /**
     * La función to_String 
     * objeto por pantalla
     */
    function __toString() : string
    {
        //Para acceder a las variables miembros estáticas desde la misma clase ç,
        //ponemso self::(nombrevariable)
        return "\n\t\t\t\tNombre: {$this->name}\n
        codISBN: {$this->codISB}\n
        Precio: {$this->price}\n
        Peso: {$this->weight}\n
        Tamaño: {$this->size}\n
        Cantidad: {$this->amount}\n
        IVA Añadido:". self::$ivaAdd ."\n
        ";
    }







    //Definimos en la clase padre un método abstractro
    //los hijos tienen la obligación de implementar esta funcion
    public abstract function calculoEnvio();
    
}

//Monitor es el objeto que se crea a partir de la clase.
//Para crearlo utilizamos new y el nombre de la clase
// $monitor  = new Product("Tears of Kingdom", "13219JDJJAJLA", 123.45, 12.4, 9.1, 3, 21);

//Para acceder a un atributo o función miembro de la clase,
//usamos ->
// $monitor->name = "Juan";
// $monitor->price = 123;

// print($monitor->name . "\n");
// print("El IVA del producto es {$monitor->addIva()}");


$tearOFK  = new Product("Tears of Kingdom", "13219JDJJAJLA", 123.45, 12.4, 9.1, 3, 21);
$marioRab  = new Product("Mario Rabbids Star", "13219JDJJAJLA", 123.45, 12.4, 9.1, 3, 21);

//Vemos si un objeto pertenece a una clase especificada
if($tearOFK instanceof Product)
    print("Pertenece a la clase Producto\n");

//La función get_class nos saca la clase a la que pertenece el objeto
print(get_class($marioRab) . "\n");

//Podemos comprobar que exista una propiedad en una clase
if(property_exists($marioRab, "size"))
{
    print("Existe la propiedad tamaño \n");
}

print($tearOFK);

//Para acceder a las variables estáticas, accedemos con dos puntos
$marioRab::$ivaAdd=34;

print($marioRab);

//En PHP se pueden hacer llamadas a funciones en forma escalonada, llamándolas
//directamente una tras otra. En mi humilde opinión, salvo en casos excepcionales,
//no ayuda a la legibilidad del código
// $tearOFK->setSize(3)->calculoImpuesto();


?>