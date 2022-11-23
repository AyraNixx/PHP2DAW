<?php



/**
 * Clase Producto
 */

class Product
{
    //El estándar es que la mayoría de los atributos sean privados y se accedan a 
    //ellos con getter y setters.


    //Si declaramos un atributo como público
    //se puede acceder a él sin ningñun problema cuando creamos un objeto
    public $name = "";

    //El acceso a este atributo o función solo es posible desde las funciones
    //de su propia clase.
    private $codISB; 

    //protected. Se puede acceder desde la clase y desde sus subclases(?)

    //El acceso a atributos protegidos es posible desde la propia clase y sus
    //herederas
    protected $precio;

}

?>