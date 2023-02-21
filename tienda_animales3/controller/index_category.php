<?php

use \model\Category;
use \utils\Utils;

require_once("../model/Category.php");

//Creamos una clase controller (lo hago para que luego en el switch no sea tan lioso)
class CategoryC
{
    //Lo ponemos privado para que solo se pueda acceder desde esta clase y estatico
    //para poder usarlo en funciones estaticas
    private $element;

    private $ord;
    private $field;
    private $page;
    private $amount;

    private $msg;


    //Inicializamos element para que se cree un nuevo objeto de Category
    function __construct(string $ord, string $field, int $page, int $amount)
    {
        $this->element = new Category();

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
        $data = $this->element->pagination($this->ord, $this->field, $this->page, $this->amount);
        $total_page = $this->element->get_total_pages($this->amount);
        //Incluimos la vista del index.
        require_once("../view/index_category.php");
    }




    //Funcion que añade o modifica según la opcion elegida
    public function add_or_edit(int $option)
    {
        //Si la opcion es 2, almacenamos en $data los valores pasados por POST
        if ($option == 2) {
            $data["id_categoria"] = $_POST["id_categoria"];
            $data["nombre"] = $_POST["nombre"];
            $data["descripcion"] = $_POST["descripcion"];


            //Validamos los campos
            $data = Utils::clean_array($data);

            //En caso de que haya un problema con la validación
            if ($data == false) {
                $this->msg = "¡ERROR! ¡Hay un problema con los datos!";
                $this->index();
            }
        }
        //Incluimos la vista de añadir o modificar
        require_once("../view/add_or_edit_category.php");
    }


    //Funcion que guarda los datos recibidos en la base de datos
    public function save(array $data)
    {
        //Validamos los campos
        $data = Utils::clean_array($data);

        //Si data es distinta de false
        if ($data != false) {
            //Si la opcion es 1, se añade la nueva categoria
            if ($data["option"] == 1) {
                //Pasamos el array como argumento a la funcion add para añadirlo a nuestra base
                //de datos
                if ($this->element->add($data) != null) {
                    //Mensaje a mostrar
                    $this->msg = "Añadido con éxito!";
                } else {
                    //Mensaje a mostrar
                    $this->msg = "¡ERROR! Posible error de conexión";
                }
            } else {
                //Pasamos el array como argumento a la funcion add para añadirlo a nuestra base
                //de datos
                if ($this->element->update($data) != null) {
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
    public function delete(int $id_category)
    {
        //Si la funcion delete devuelve como resultado algo distinto de null
        if ($this->element->delete(filter_var(Utils::clean($id_category)), FILTER_VALIDATE_INT) != null) {
            //Guardamos el mensaje
            $this->msg = "¡Borrado con éxito!";
            //Llamamos a la funcion index
            $this->index();
        } else {
            $this->msg = "¡Error! ¡No se ha podido conectar con la base de datos!";
        }
    }

    //Funcion que muestra más detalles acerca del elemento seleccionado
    public function details(int $id_category)
    {
        //Guardamos en un array el resultado de la funcion get_one
        $data = $this->element->get_one(filter_var(Utils::clean($id_category)), FILTER_VALIDATE_INT);

        //Si data no es nulo, incluirá la vista de detalles categoria
        if ($data != null) {
            include("../view/details_category.php");
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
        $field = "id_categoria";
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










    //Creamos un nuevo objeto de la clase CategoryC
    $element = new CategoryC($ord, $field, $page, $amount);








    //Creamos un switch para que dependiendo del valor de option se haga una cosa u otra
    switch ($option) {
            //Si es 0, llamamos al index
        case 0:
            $element->index();
            break;
            //Si es 1 (añadir) o 2 (modificar)
        case 1:
        case 2:
            //Llamamos a la funcion add_or_edit y le pasamos $option para que dependiendo
            //de la opcion elegida nos salga una cosa u otra
            $element->add_or_edit($option);
            break;
            //Si es 3, llamamos a la funcion delete
        case 3:
            //Si id_categoria no es nulo y es numerico
            if (isset($_POST["id_categoria"]) && is_numeric($_POST["id_categoria"])) {
                //Se llama a la funcion delete
                $element->delete($_POST["id_categoria"]);
            } else {
                $this->msg = "Clave no numérica!";
                $element->index();
            }
            break;
            //Si es 4, llamamos a la funcion details que nos mostrará más detalles acerca
            //del elemento que hayamos pinchado
        case 4:
            //Si el id_categoria no está vacío y es un número
            if (isset($_POST["id"]) && is_numeric($_POST["id"])) {
                //Llamamos a la funcion details
                $element->details($_POST["id"]);
            } else {
                $this->msg = "Clave no numérica!";
                $element->index();
            }
            break;
            //La opcion 5, la obtenemos al enviar los datos del formulario de modificar
            //o añadir y lo que hará es llamar a la función save, pasándole el array $_POST
            //para su introduccion en la base de datos
        case 5:
            $element->save($_POST);
    }
}
