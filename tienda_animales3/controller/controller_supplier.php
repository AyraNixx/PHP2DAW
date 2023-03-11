<?php

use \model\Supplier;
use \utils\Utils;

require_once("../model/Supplier.php");

//Creamos una clase controller (lo hago para que luego en el switch no sea tan lioso)
class SupplierC
{
    //Lo ponemos privado para que solo se pueda acceder desde esta clase y estatico
    //para poder usarlo en funciones estaticas
    private $supplier;

    private $ord;
    private $field;
    private $page;
    private $amount;

    private $msg;


    //Inicializamos supplier para que se cree un nuevo objeto de Supplier
    function __construct(string $ord, string $field, int $page, int $amount)
    {
        $this->supplier = new Supplier();

        $this->ord = $ord;
        $this->field = $field;
        $this->page = $page;
        $this->amount = $amount;

        $this->msg = "";
    }





    //Funcion que guarda los datos paginados y muestra la página principal
    public function index()
    {
        //Almacenamos los datos
        $data_supplier = $this->supplier->pagination($this->ord, $this->field, $this->page, $this->amount);
        $total_page = $this->supplier->get_total_pages($this->amount);
        //Incluimos la vista del index.
        require_once("../view/index_supplier.php");
    }








    //Funcion que añade o modifica según la opcion elegida
    public function add_or_edit(int $option)
    {
        //Si la opcion es 2, almacenamos en $data_supplier los valores pasados por POST
        if ($option == 2) {
            $data_supplier["id_proveedor"] = $_POST["id_proveedor"];
            $data_supplier["nombre"] = $_POST["nombre"];
            $data_supplier["direccion"] = $_POST["direccion"];
            $data_supplier["telefono"] = $_POST["telefono"];
            $data_supplier["correo"] = $_POST["correo"];

            //Validamos los campos
            $data_supplier = Utils::clean_array($data_supplier);

            //En caso de que haya un problema con la validación
            if ($data_supplier == false) {
                $this->msg = "¡ERROR! ¡Hay un problema con los datos!";
                $this->index();
            }
        }
        //Incluimos la vista de añadir o modificar
        require_once("../view/add_or_edit_supplier.php");
    }







    //Funcion que guarda los datos recibidos en la base de datos
    public function save(array $data_supplier)
    {

        //Validamos los campos
        $data_supplier = Utils::clean_array($data_supplier);

        //Si data es distinta de false
        if ($data_supplier != false) {

            //Si la opcion es 1, se añade el nuevo proveedor
            if ($data_supplier["option"] == 1) {
                //Pasamos el array como argumento a la funcion add para añadirlo a nuestra base
                //de datos
                if ($this->supplier->add($data_supplier) != null) {
                    //Mensaje a mostrar
                    $this->msg = "Añadido con éxito!";
                } else {
                    //Mensaje a mostrar
                    $this->msg = "¡ERROR! Posible error de conexión";
                }
            } else {
                //Pasamos el array como argumento a la funcion add para añadirlo a nuestra base
                //de datos
                if ($this->supplier->update($data_supplier) != null) {
                    //Mensaje a mostrar
                    $this->msg = "Modificado con éxito!";
                } else {
                    //Mensaje a mostrar
                    $this->msg = "¡ERROR! Posible error de conexión o clave repetida";
                }
            }
        } else {
            $this->msg = "¡ERROR! Revise los datos";
        }
        //Llamamos a la funcion index() para que nos lleve de vuelta a la página
        //principal
        $this->index();
    }





    //Funcion que elimina la categoria seleccionado
    public function delete(int $id_supplier)
    {
        //Si la funcion delete devuelve como resultado algo distinto de null
        if ($this->supplier->delete(filter_var(Utils::clean($id_supplier)), FILTER_VALIDATE_INT) != null) {
            //Guardamos el mensaje
            $this->msg = "¡Borrado con éxito!";
            //Llamamos a la funcion index
            $this->index();
        } else {
            $this->msg = "¡Error! ¡No se ha podido conectar con la base de datos!";
        }
    }

    //Funcion que muestra más detalles acerca del suppliero seleccionado
    public function details(int $id_supplier)
    {
        //Guardamos en un array el resultado de la funcion get_one
        $data_supplier = $this->supplier->get_one(filter_var(Utils::clean($id_supplier)), FILTER_VALIDATE_INT);

        //Si data no es nulo, incluirá la vista de detalles categoria
        if ($data_supplier != null) {
            include("../view/details_supplier.php");
            //En caso contrario, se guarda un mensaje de error
        } else {
            $msg = "¡Error! ¡No se ha podido conectar con la base de datos!";
        }
    }
}






//Comprobamos que la sesion esta iniciada
session_start();

//Si no tenemos guardado login 
if (!isset($_SESSION["login"])) {
    header("Location:../controller/Login.php");
    exit();
}






//Si el array $_REQUEST no está vacío
if (isset($_REQUEST)) {

    //Comprobamos sus valores
    if (isset($_REQUEST["field"])) {
        $field = filter_var($_REQUEST["field"], FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $field = "nombre";
    }

    if (isset($_REQUEST["ord"])) {
        $ord = filter_var($_REQUEST["ord"], FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $ord = "ASC";
    }

    if (isset($_REQUEST["page"])) {
        $page = filter_var($_REQUEST["page"], FILTER_VALIDATE_INT);
    } else {
        $page = 1;
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










    //Creamos un nuevo objeto de la clase SupplierC
    $supplier = new SupplierC($ord, $field, $page, $amount);








    //Creamos un switch para que dependiendo del valor de option se haga una cosa u otra
    switch ($option) {
            //Si es 0, llamamos al index
        case 0:
            $supplier->index();
            break;
            //Si es 1 (añadir) o 2 (modificar)
        case 1:
        case 2:
            //Llamamos a la funcion add_or_edit y le pasamos $option para que dependiendo
            //de la opcion elegida nos salga una cosa u otra
            $supplier->add_or_edit($option);
            break;
            //Si es 3, llamamos a la funcion delete
        case 3:
            //Si id_proveedor no es nulo y es numerico
            if (isset($_POST["id_proveedor"]) && is_numeric($_POST["id_proveedor"])) {
                //Se llama a la funcion delete
                $supplier->delete($_POST["id_proveedor"]);
            } else {
                $this->msg = "Clave no numérica!";
                $supplier->index();
            }
            break;
            //Si es 4, llamamos a la funcion details que nos mostrará más detalles acerca
            //del suppliero que hayamos pinchado
        case 4:
            //Si el id_proveedor no está vacío y es un número
            if (isset($_POST["id"]) && is_numeric($_POST["id"])) {
                //Llamamos a la funcion details
                $supplier->details($_POST["id"]);
            } else {
                $this->msg = "Clave no numérica!";
                $supplier->index();
            }
            break;
            //La opcion 5, la obtenemos al enviar los datos del formulario de modificar
            //o añadir y lo que hará es llamar a la función save, pasándole el array $_POST
            //para su introduccion en la base de datos
        case 5:
            $supplier->save($_POST);
    }
}
