<?php

use model\Category;

require_once("../model/Category.php");

//Creamos una clase controller (lo hago para que luego en el switch no sea tan lioso)
class CategoryC
{
    //Lo ponemos privado para que solo se pueda acceder desde esta clase y estatico
    //para poder usarlo en funciones estaticas
    private $category;
    private $ord;
    private $field;
    private $num_page;
    private $amount;

    //Inicializamos category para que se cree un nuevo objeto de Category
    function __construct(bool $ord, string $field, int $num_page, int $amount)
    {
        $this->category = new Category();

        $this->ord = $ord;
        $this->field = $field;
        $this->num_page = $num_page;
        $this->amount = $amount;
    }

    //Funcion que guarda los datos paginados y muestra la página principal
    public function index()
    {
        //Almacenamos el orden y el campo por el que se ha ordenado actual
        $actual_ord = $this->ord;
        //Almacenamos la página actual 
        $actual_page = $this->num_page;
        //Almacenamos los datos
        $data_category = $this->category->pagination($this->ord, $this->field, $this->num_page, $this->amount);
        $total_page = $this->category->get_total_pages($this->amount);
        
        //Incluimos la vista del index.
        require_once("../view/index_category.php");
    }

    //Funcion que añade o modifica según la opcion elegida
    public function add_or_edit(int $option)
    {
        //Si la opcion es 2, almacenamos en $data_category los valores pasados por POST
        if ($option == 2) {
            $data_category["id_categoria"] = $_POST["id_categoria"];
            $data_category["nombre"] = $_POST["nombre"];
            $data_category["descripcion"] = $_POST["descripcion"];
        }
        //Incluimos la vista de añadir o modificar
        require_once("../view/add_or_edit_category.php");
    }


    //Funcion que guarda los datos recibidos en la base de datos
    public function save($category)
    {
        //Si hay una clave id_categoria dentro del array que se ha pasaod
        if (isset($category["id_categoria"])) {
            //Guardamos su valor
            $data_category["id_categoria"] = $category["id_categoria"];
        }
        //Guardamos los valores del array
        $data_category["nombre"] = $category["nombre"];
        $data_category["descripcion"] = $category["descripcion"];

        if ($category["prev_option"] == 1) {
            //Pasamos el array como argumento a la funcion add para añadirlo a nuestra base
            //de datos
            if ($this->category->add($data_category) != null) {
                //Llamamos a la funcion index() para que nos lleve de vuelta a la página
                //principal
                $this->index();
            }
        }else{
            //Pasamos el array como argumento a la funcion add para añadirlo a nuestra base
            //de datos
            if ($this->category->update($data_category) != null) {
                //Llamamos a la funcion index() para que nos lleve de vuelta a la página
                //principal
                $this->index();
            }
        }
    }

    //Funcion que elimina el rol seleccionado
    public function delete($id_categoria)
    {
        //Si la funcion delete devuelve como resultado algo distinto de null
        if ($this->category->delete($id_categoria) != null) {
            //Guardamos el mensaje
            $msg = "¡Borrado con éxito!";
            //Llamamos a la funcion index
            $this->index();
        } else {
            $msg = "¡Error! ¡No se ha podido conectar con la base de datos!";
        }
    }

    //Funcion que muestra más detalles acerca del elemento seleccionado
    public function details($id_categoria)
    {
        //Guardamos en un array el resultado de la funcion get_one
        $data_category = $this->category->get_one($id_categoria);

        //Si data_category$data_category no es nulo, incluirá la vista de detalles rol
        if ($data_category != null) {
            include("../view/details_category.php");
            //En caso contrario, se guarda un mensaje de error
        } else {
            $msg = "¡Error! ¡No se ha podido conectar con la base de datos!";
        }
    }
}

//Creamos una variable llamada msg para guardar el mensaje resultante
$msg = null;

//Si el array $_REQUEST no está vacío
if (isset($_REQUEST)) {
    //Comprobamos que sus valores tampoco lo estén
    if (isset($_REQUEST["ord"]) && isset($_REQUEST["field"]) && isset($_REQUEST["num_page"])) {

        //Almacenamos los valores y usamos filter_var para filtrar las variables con los
        //filtros especificados
        $ord = filter_var($_REQUEST["ord"], FILTER_VALIDATE_BOOLEAN);
        $field = ($_REQUEST["field"]);
        $num_page = filter_var($_REQUEST["num_page"], FILTER_VALIDATE_INT);
        $amount = 5;
        //Si son nulos
    } else {
        //Inicializamos las variables
        $ord = "";
        $field = "id_categoria";
        $num_page = 1;
        $amount = 5;
    }

    //Si la clave submit no es nula
    if (isset($_REQUEST["submit"])) {
        //Guardamos la opcion elegida y filtramos su valor con filter_var
        $option = filter_var($_REQUEST["submit"], FILTER_VALIDATE_INT);
        //En caso contrario, inicializamos option
    } else {
        $option = 0;
    }

    //Creamos un nuevo objeto de la clase CategoryC
    $rol = new CategoryC($ord, $field, $num_page, $amount);

    //Creamos un switch para que dependiendo del valor de option se haga una cosa u otra
    switch ($option) {
            //Si es 0, llamamos al index
        case 0:
            $rol->index();
            break;
            //Si es 1 (añadir) o 2 (modificar)
        case 1:
        case 2:
            //Llamamos a la funcion add_or_edit y le pasamos $option para que dependiendo
            //de la opcion elegida nos salga una cosa u otra
            $rol->add_or_edit($option);
            break;
            //Si es 3, llamamos a la funcion delete
        case 3:
            //Si id_categoria no es nulo y es numerico
            if (isset($_POST["id_categoria"]) && is_numeric($_POST["id_categoria"])) {
                //Se llama a la funcion delete
                $rol->delete($_POST["id_categoria"]);
            }
            break;
            //Si es 4, llamamos a la funcion details que nos mostrará más detalles acerca
            //del elemento que hayamos pinchado
        case 4:            
            //Si el id_categoria no está vacío y es un número
            if (isset($_POST["id"]) && is_numeric($_POST["id"])) {
                //Llamamos a la funcion details
                $rol->details($_POST["id"]);
            }
            break;
            //La opcion 5, la obtenemos al enviar los datos del formulario de modificar
            //o añadir y lo que hará es llamar a la función save, pasándole el array $_POST
            //para su introduccion en la base de datos
        case 5:
            $rol->save($_POST);
    }
}
