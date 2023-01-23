<?php

use \model\Rol;

require_once("../model/Rol.php");

//Creamos una clase controller (lo hago para que luego en el switch no sea tan lioso)
class Controller
{
    //Lo ponemos privado para que solo se pueda acceder desde esta clase y estatico
    //para poder usarlo en funciones estaticas
    private $rol;
    private $ord;
    private $field;
    private $num_page;
    private $amount;

    //Inicializamos rol para que se cree un nuevo objeto de Rol
    function __construct(bool $ord, string $field, int $num_page, int $amount)
    {
        $this->rol = new Rol();
        $this->ord = $ord;
        $this->field = $field;
        $this->num_page = $num_page;
        $this->amount = $amount;
    }

    //Funcion que guarda los datos paginados y muestra la página principal
    public function index()
    {
        //Almacenamos los datos
        $data_rol = $this->rol->pagination($this->ord, $this->field, $this->num_page, $this->amount);
        $total_page = $this->rol->get_total_pages($this->amount);

        //Incluimos la vista del index.
        require_once("../view/index.php");
    }

    //Funcion que añade o modifica según la opcion elegida
    public function add_or_edit(int $option)
    {
        //Si la opcion es 2, almacenamos en $data_rol los valores pasados por POST
        if ($option == 2) {
            $data_rol["id_rol"] = $_POST["id_rol"];
            $data_rol["rol"] = $_POST["rol"];
            $data_rol["descripcion"] = $_POST["descripcion"];
        }
        //Incluimos la vista de añadir o modificar
        require_once("../view/add_or_edit.php");
    }


    //Funcion que guarda los datos recibidos en la base de datos
    public function save($rol)
    {
        //Si hay una clave id_rol dentro del array que se ha pasaod
        if (isset($rol["id_rol"])) {
            //Guardamos su valor
            $data_rol["id_rol"] = $rol["id_rol"];
        }
        //Guardamos los valores del array
        $data_rol["rol"] = $rol["rol"];
        $data_rol["descripcion"] = $rol["descripcion"];

        //Pasamos el array como argumento a la funcion add para añadirlo a nuestra base
        //de datos
        if ($this->rol->add($data_rol) != null) {
            //Llamamos a la funcion index() para que nos lleve de vuelta a la página
            //principal
            $this->index();
        }
    }

    //Funcion que elimina el rol seleccionado
    public function delete($id_rol)
    {
        //Si la funcion delete devuelve como resultado algo distinto de null
        if ($this->rol->delete($id_rol) != null) {
            //Guardamos el mensaje
            $msg = "¡Borrado con éxito!";
            //Llamamos a la funcion index
            $this->index();
        } else {
            $msg = "¡Error! ¡No se ha podido conectar con la base de datos!";
        }
    }

    //Funcion que muestra más detalles acerca del elemento seleccionado
    public function details($id_rol)
    {
        //Guardamos en un array el resultado de la funcion get_one
        $data_rol = $this->rol->get_one($id_rol);

        //Si data_rol no es nulo, nos llevará a la vista de detalles rol
        if ($data_rol != null) {
            include("../view/details_rol.php");
        //En caso contrario, se guarda un mensaje de error
        } else {
            $msg = "¡Error! ¡No se ha podido conectar con la base de datos!";
        }
    }
}


$msg = null;
$ord = "";
$field = "id_rol";
$num_page = 1;
$amount = 5;

$rol = new Controller($ord, $field, $num_page, $amount);


if (isset($_POST)) {
    if (isset($_POST["submit"])) {
        $option = $_POST["submit"];
    } else {
        $option = 0;
    }

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
            //Si id_rol no es nulo y es numerico
            if (isset($_POST["id_rol"]) && is_numeric($_POST["id_rol"])) {
                //Se llama a la funcion delete
                $rol->delete($_POST["id_rol"]);
            }
            break;
        //Si es 4, llamamos a la funcion details que nos mostrará más detalles acerca
        //del elemento que hayamos pinchado
        case 4:
            if (isset($_POST["id_rol"]) && is_numeric($_POST["id_rol"])) {
                $rol->details($_POST["id_rol"]);
            }
            break;
        //La opcion guardar, la obtenemos al enviar los datos del formulario de modificar
        //o añadir y lo que hará es llamar a la función save, pasándole el array $_POST
        //para su introduccion en la base de datos
        case "Guardar":
            $rol->save($_POST);
    }
}
