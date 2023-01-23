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

    public function add_or_edit(int $option)
    {
        if ($option != 1) {
            $data_rol["id_rol"] = $_POST["id_rol"];
            $data_rol["rol"] = $_POST["rol"];
            $data_rol["descripcion"] = $_POST["descripcion"];
        }
        require_once("../view/add_or_edit.php");
    }

    public function save($rol)
    {
        (isset($rol["id_rol"])) ? "" : $data_rol["id_rol"] = $rol["id_rol"];
        $data_rol["rol"] = $rol["rol"];
        $data_rol["descripcion"] = $rol["descripcion"];

        if ($this->rol->add($data_rol) != null) {
            $option = 0;
            include("../view/index.php");
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

    public function details($id_rol)
    {
        $data_rol = $this->rol->get_one($id_rol);

        if($data_rol != null)
        {
            include("../view/details_rol.php");
        }else{
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

    switch ($option) {
        case 0:
            $rol->index();
            break;
        case 1:
        case 2:
            $rol->add_or_edit($option);
            break;
        case 3:
            //Si id_rol no es nulo y es numerico
            if (isset($_POST["id_rol"]) && is_numeric($_POST["id_rol"])) {
                //Se llama a la funcion delete
                $rol->delete($_POST["id_rol"]);
            }
            break;
        case 4:            
            if (isset($_POST["id_rol"]) && is_numeric($_POST["id_rol"])) {
                $rol->details($_POST["id_rol"]);
            }
            break;
    }
}
