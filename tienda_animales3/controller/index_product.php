<?php

use \model\Product;
use utils\Utils;

require_once("../model/Product.php");

//Creamos una clase controller (lo hago para que luego en el switch no sea tan lioso)
class ProductC
{
    //Lo ponemos privado para que solo se pueda acceder desde esta clase y estatico
    //para poder usarlo en funciones estaticas
    private $object;

    private $ord;
    private $field;
    private $num_page;
    private $amount;

    private $msg;


    //Inicializamos object para que se cree un nuevo objeto de Product
    function __construct(string $ord, string $field, int $num_page, int $amount)
    {
        $this->object = new Product();

        $this->ord = $ord;
        $this->field = $field;
        $this->num_page = $num_page;
        $this->amount = $amount;

        $this->msg = "";
    }

    //Funcion que guarda los datos paginados y muestra la página principal
    public function index()
    {
        $msg = $this->msg;
        //Almacenamos el orden y el campo por el que se ha ordenado actual
        $actual_ord = $this->ord;
        //Almacenamos la página actual 
        $actual_page = $this->num_page;
        //Almacenamos los datos
        $data = $this->object->pagination($this->ord, $this->field, $this->num_page, $this->amount);
        $total_page = $this->object->get_total_pages($this->amount);
        //Incluimos la vista del index.
        require_once("../view/index_product.php");
    }

    //Funcion que añade o modifica según la opcion elegida
    public function add_or_edit(int $option)
    {        
        //Si la opcion es 2, almacenamos en $data los valores pasados por POST
        if ($option == 2) {
            $data["id_producto"] = $_POST["id_producto"];
            $data["nombre"] = $_POST["nombre"];
            $data["precio"] = $_POST["precio"];
            $data["stock"] = $_POST["stock"];
            $data["categoria"] = $_POST["categoria"];
            $data["foto"] = $_POST["foto"];
        }
        //Incluimos la vista de añadir o modificar
        require_once("../view/add_or_edit_product.php");
    }


    //Funcion que guarda los datos recibidos en la base de datos
    public function save(array $object)
    {
        //Si hay una clave id_proveedor dentro del array que se ha pasaod
        if (isset($object["id_producto"]) && isset($object["new_id"])) {

            //Comprobamos que es numérica
            if (is_numeric(filter_var($object["new_id"], FILTER_VALIDATE_INT))) {

                //Guardamos su valor
                $data["id_producto"] = filter_var($object["id_producto"], FILTER_VALIDATE_INT);
                $data["new_id"] = filter_var($object["new_id"], FILTER_VALIDATE_INT);
            } else {
                $this->msg = "¡ERROR! La nueva clave no es numérica!";
                $this->index();
                return false;
            }
        }
        //Guardamos los valores del array
        $data["nombre"] = $object["nombre"];
        $data["precio"] = $object["precio"];
        $data["stock"] = $object["stock"];
        $data["categoria"] = $object["categoria"];
        $data["foto"] = $object["foto"];

        //Si la opcion es 1, se añade el nuevo proveedor
        if ($object["option"] == 1) {
            //Pasamos el array como argumento a la funcion add para añadirlo a nuestra base
            //de datos
            if ($this->object->add($data) != null) {
                //Mensaje a mostrar
                $this->msg = "Añadido con éxito!";
            } else {
                //Mensaje a mostrar
                $this->msg = "¡ERROR! Posible error de conexión";
            }
        } else {
            //Pasamos el array como argumento a la funcion add para añadirlo a nuestra base
            //de datos
            if ($this->object->update($data) != null) {
                //Mensaje a mostrar
                $this->msg = "Modificado con éxito!";
            } else {
                //Mensaje a mostrar
                $this->msg = "¡ERROR! Posible error de conexión o clave repetida";
            }
        }
        //Llamamos a la funcion index() para que nos lleve de vuelta a la página
        //principal
        $this->index();
    }

    //Funcion que elimina la categoria seleccionado
    public function delete(int $id_product)
    {
        //Si la funcion delete devuelve como resultado algo distinto de null
        if ($this->object->delete($id_product) != null) {
            //Guardamos el mensaje
            $this->msg = "¡Borrado con éxito!";
            //Llamamos a la funcion index
            $this->index();
        } else {
            $this->msg = "¡Error! ¡No se ha podido conectar con la base de datos!";
        }
    }

    //Funcion que muestra más detalles acerca del elemento seleccionado
    public function details(int $id_product)
    {
        //Guardamos en un array el resultado de la funcion get_one
        $data = $this->object->get_one($id_product);

        //Si data no es nulo, incluirá la vista de detalles categoria
        if ($data != null) {
            include("../view/details_product.php");
            //En caso contrario, se guarda un mensaje de error
        } else {
            $msg = "¡Error! ¡No se ha podido conectar con la base de datos!";
        }
    }
}













//Si el array $_REQUEST no está vacío
if (isset($_REQUEST)) {

    //Comprobamos sus valores
    if (isset($_REQUEST["field"])) {
        $field = filter_var($_REQUEST["field"], FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $field = "id_producto";
    }

    if (isset($_REQUEST["ord"])) {
        $ord = filter_var($_REQUEST["ord"], FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $ord = "ASC";
    }

    if (isset($_REQUEST["num_page"])) {
        $num_page = filter_var($_REQUEST["num_page"], FILTER_VALIDATE_INT);
    } else {
        $num_page = 1;
    }

    //Cantidad que queremos que salga
    $amount = 5;



    //Si la clave submit no es nula
    if (isset($_REQUEST["submit"])) {
        //Guardamos la opcion elegida y filtramos su valor con filter_var
        $option = filter_var($_REQUEST["submit"], FILTER_VALIDATE_INT);
        //En caso contrario, inicializamos option
    } else {
        $option = 0;
    }










    //Creamos un nuevo objeto de la clase productC
    $object = new productC($ord, $field, $num_page, $amount);








    //Creamos un switch para que dependiendo del valor de option se haga una cosa u otra
    switch ($option) {
            //Si es 0, llamamos al index
        case 0:
            $object->index();
            break;
            //Si es 1 (añadir) o 2 (modificar)
        case 1:
        case 2:
            //Llamamos a la funcion add_or_edit y le pasamos $option para que dependiendo
            //de la opcion elegida nos salga una cosa u otra
            $object->add_or_edit($option);
            break;
            //Si es 3, llamamos a la funcion delete
        case 3:
            //Si id_proveedor no es nulo y es numerico
            if (isset($_POST["id_producto"]) && is_numeric($_POST["id_producto"])) {
                //Se llama a la funcion delete
                $object->delete($_POST["id_producto"]);
            }
            break;
            //Si es 4, llamamos a la funcion details que nos mostrará más detalles acerca
            //del elemento que hayamos pinchado
        case 4:
            //Si el id_proveedor no está vacío y es un número
            if (isset($_POST["id"]) && is_numeric($_POST["id"])) {
                //Llamamos a la funcion details
                $object->details($_POST["id"]);
            }
            break;
            //La opcion 5, la obtenemos al enviar los datos del formulario de modificar
            //o añadir y lo que hará es llamar a la función save, pasándole el array $_POST
            //para su introduccion en la base de datos
        case 5:
            
            //Si el array $_FILES no es nulo
            if (isset($_FILES)) {
                //Definimos un array para guardar las direcciones de las imagenes
                //y llamamos a la funcion save_img que guardará las imágenes en la 
                //carpeta img y nos devolverá un array que contiene las urls de las
                //imagenes
                $url_img = Utils::save_img($_FILES["foto"]);
                
                $_POST["foto"] = $url_img;
            }
            $object->save($_POST);
    }
}
