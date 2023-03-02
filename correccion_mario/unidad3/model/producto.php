<?php
namespace unidad3\model;

/**
 * Clase Producto
 */
abstract class Producto{

    //Si declaramos un atributo como publico
    //Se puede acceder a el sin ningun problema
    //Cuando creamos un objeto
    public $nombre="";
    //El iva es una variable estatica
    //lo que implica que es compartida por todos los objetos
    //de esta clase
    static public $ivaAplicado;
    
    //El accesso a este atributo o funcion solo es posible
    //desde las funciones de su propia clase
    private $codISBN;
    private $precio;
    private $peso;
    private $tamano;
    private $cantidad;

    //El accesso a atributos protegidos es posible desde la 
    //propia clase y sus herederas
    protected $impuestos=16;



    /**
     * Constructor que recibe valores para todos los atributos de la clase
     */
    public function __construct($nombre,$precio,$peso,$tamano,$cantidad,$ivaAplicado)
    {
        $this->nombre=$nombre;
        $this->precio=$precio;
        $this->peso=$peso;
        $this->tamano=$tamano;
        $this->cantidad=$cantidad;
        //Para acceder a un atributo estatico utilizamos self::
        self::$ivaAplicado=$ivaAplicado;
    }


    function getCodIsbn()
    {
        return $this->codISBN;
    }

    function setCodIsbn(string $cod)
    {
        $this->codISBN=$cod;
    }

    function getPrecio()
    {
        return $this->precio;
    }

    function setPrecio(float $precio)
    {
        $this->precio=$precio;
    }

    function getPeso()
    {
        return $this->peso;
    }
    
    function setPeso(float $peso)
    {
        $this->peso=$peso;
    }

        /**
     * Get the value of tamano
     */ 
    public function getTamano()
    {
        return $this->tamano;
    }

    /**
     * Set the value of tamano
     *
     * @return  self
     */ 
    public function setTamano($tamano)
    {
        $this->tamano = $tamano;

        return $this;
    }

    function calculoImpuestos():float
    {
        //Para acceder a una variable miembro utilizamos
        //el operador $this
        return $this->precio/100*$this->ivaAplicado;
    }

    /**
     * La funcion __toString muestra por pantalla los contenidos del objeto
     * de forma formateada, se la llama automaticamente cuando sacamos el 
     * objeto por pantalla o en cualquier sitio
     */
    function __toString(): string
    {
        //Para acceder a las variables miembro estaticas desde la clase 
        //accedemos utilizando self::
        return ("Nombre: {$this->nombre}\nPrecio: {$this->precio} \nPeso: {$this->peso} \nIva Aplicado:".self::$ivaAplicado);
    }

    //Definimos en la clase padre un funcion abstracto
    //los hijos tienen la obligacion de implementar esta funcion
    abstract public function calculoEnvio(): string;





}

//monitor es un objeto de la clase producto
//para crearlo utilizamos new y el nombre de la clase
$tearOfK = new Producto("Tears of Kingdom",100,0.4,0.4,200,21);
$marioRab = new Producto("Mario Rabbids Stars",45,0.4,0.4,200,21);

//con instanceof podemos comprobar la clase
if ($tearOfK instanceof Producto)
 print ("Pertenece a la clase Producto\n");

 //getclass nos devuelve el nombre de la clase
 print get_class($marioRab)."\n";

 //Podemos comprobar si existe una propiedad en una clase
 if (property_exists($marioRab,"tanaño"))
 {
    print ("existe la propiedad tamaño");
 }

//Para acceder a las variables estaticas accedemos con ::
$marioRab::$ivaAplicado=34;

//Para acceder a un atributo miembro de un objeto se accede con -> y 
//El atributo va sin $
//$monitor->nombre ="Juan";
//$monitor->precio =123;

//En php se pueden hacer llamadas a funciones de forma escalonada
//llamandolas directamente una detras de otra
//en mi humilde opinion excepto en casos particulares
//no ayuda a la legibilidad de código para nada
print $tearOfK->setTamano(3)->calculoImpuestos();

//print ($monitor->nombre);
//print("El iva del producto es {$monitor->calculoIva()}");

print $tearOfK;

?>