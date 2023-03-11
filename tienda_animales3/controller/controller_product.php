<?php

use \model\Product;
use utils\Utils;

require_once("../model/Product.php");

//Creamos una clase controller (lo hago para que luego en el switch no sea tan lioso)
class ProductC
{
    //Lo ponemos privado para que solo se pueda acceder desde esta clase
    private $product;

    private $ord;
    private $field;
    private $page;
    private $amount;

    private $msg;


    //Inicializamos element para que se cree un nuevo objeto de Product
    function __construct(string $ord, string $field, int $page, int $amount)
    {
        $this->product = new Product();

        $this->ord = $ord;
        $this->field = $field;
        $this->page = $page;
        $this->amount = $amount;

        $this->msg = "";
    }



    /**********************************************************************
     *                                                                    *
     *                              MÉTODOS                               *
     *                                                                    *
     **********************************************************************/
    //Funcion que guarda los datos paginados y muestra la página principal
    public function index()
    {
        //Almacenamos los datos
        $data_product = $this->product->pagination($this->ord, $this->field, $this->page, $this->amount);
        $total_page = $this->product->get_total_pages($this->amount);
        //Incluimos la vista del index.
        require_once("../view/index_product.php");
    }




    //Funcion que añade o modifica según la opcion elegida
    public function add_or_edit(int $option)
    {
        //Si la opcion es 2, almacenamos en $data_product los valores pasados por POST
        if ($option == 2) {
            $data_product["id_producto"] = $_POST["id_producto"];
            $data_product["nombre"] = $_POST["nombre"];
            $data_product["precio"] = $_POST["precio"];
            $data_product["stock"] = $_POST["stock"];
            $data_product["categoria"] = $_POST["categoria"];
            $data_product["prev_img"] = $_POST["prev_img"];

            //Validamos los campos
            $data_product = Utils::clean_array($data_product);

            //En caso de que haya un problema con la validación
            if ($data_product == false) {
                $this->msg = "¡ERROR! ¡Hay un problema con los datos!";
                $this->index();
            }
        }
        //Incluimos la vista de añadir o modificar
        require_once("../view/add_or_edit_product.php");
    }





    //Funcion que guarda los datos recibidos en la base de datos
    public function save(array $data_product)
    {

        //Validamos los campos
        $data_product = Utils::clean_array($data_product);

        //Si data es distinta de false
        if ($data_product != false) {



            //Si la clave name del array $_FILES[img] no es nula
            if (!empty($_FILES["new_img"]["tmp_name"])) {
                //Guardamos el array
                $img = $_FILES["new_img"];

                //Si option es 2, significa que estamos modificando la imagen ya guardada
                //Por lo que borramos la anterior imagen para luego guardar la nueva            
                if ($data_product["option"] == 2) {
                    $this->msg = Utils::delete_img($data_product["prev_img"]) ? "" : "¡Imagen previamente eliminada!";
                }
                //Guardamos la imagen en la carpeta imgs con el método save_img que nos
                //devolverá la url   
                $data_product["img"] = Utils::save_img($img);
            } else {
                //Si option es igual a 2;
                if ($data_product["option"] == 2) {
                    //PSi no se ha seleccionado una nueva imagen, la clave name estará vacía, por lo
                    //que guardamos el valor de la clave prev_img del array element
                    $data_product["img"] = $data_product["prev_img"];
                } else {
                    //En caso contrario, significa que la opcion es añadir y que no han
                    //metido ninguna imagen así que le ponemos una imagen por defecto
                    $data_product["img"] = "../imgs/default.jpeg";
                }
            }



            //Si la opcion es 1, se añade el nuevo proveedor
            if ($data_product["option"] == 1) {
                //Pasamos el array como argumento a la funcion add para añadirlo a nuestra base
                //de datos
                if ($this->product->add($data_product) != null) {
                    //Mensaje a mostrar
                    $this->msg = "Añadido con éxito!";
                } else {
                    //Mensaje a mostrar
                    $this->msg = "¡ERROR! Posible error de conexión";
                }
            } else {
                //Pasamos el array como argumento a la funcion add para añadirlo a nuestra base
                //de datos
                if ($this->product->update($data_product) != null) {
                    //Mensaje a mostrar
                    $this->msg = "Modificado con éxito!";
                } else {
                    //Mensaje a mostrar
                    $this->msg = "¡ERROR! Posible error de conexión o clave repetida";
                }
            }
        } else {
            $this->msg = "¡ERROR! ¡Revise los datos!";
        }
        //Llamamos a la funcion index() para que nos lleve de vuelta a la página
        //principal
        $this->index();
    }




    //Funcion que elimina el producto seleccionado
    public function delete(int $id_product, string $url_img)
    {
        //Si la funcion delete devuelve como resultado algo distinto de null
        if ($this->product->delete(filter_var(Utils::clean($id_product)), FILTER_VALIDATE_INT) != null) {
            Utils::delete_img($url_img);
            //Guardamos el mensaje
            $this->msg = "¡Borrado con éxito!";
        } else {
            $this->msg = "¡Error! ¡No se ha podido conectar con la base de datos!";
        }
        //Llamamos a la funcion index
        $this->index();
    }





    //Funcion que muestra más detalles acerca del elemento seleccionado
    public function details_product(int $id_product)
    {
        //Guardamos en un array el resultado de la funcion get_one
        $data_product = $this->product->get_one(filter_var(Utils::clean($id_product)), FILTER_VALIDATE_INT);

        //Si data no es nulo, incluirá la vista de detalles producto
        if ($data_product != null) {
            include("../view/details_product.php");
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










    //Creamos un nuevo objeto de la clase productC
    $product = new productC($ord, $field, $page, $amount);








    //Creamos un switch para que dependiendo del valor de option se haga una cosa u otra
    switch ($option) {
            //Si es 0, llamamos al index
        case 0:
            $product->index();
            break;
            //Si es 1 (añadir) o 2 (modificar)
        case 1:
        case 2:
            //Llamamos a la funcion add_or_edit y le pasamos $option para que dependiendo
            //de la opcion elegida nos salga una cosa u otra
            $product->add_or_edit($option);
            break;
            //Si es 3, llamamos a la funcion delete
        case 3:
            //Si id_proveedor no es nulo y es numerico
            if (isset($_POST["id_producto"]) && is_numeric($_POST["id_producto"])) {
                //Se llama a la funcion delete
                $product->delete($_POST["id_producto"], $_POST["img"]);
            } else {
                $product->index();
            }
            break;
            //Si es 4, llamamos a la funcion details que nos mostrará más detalles acerca
            //del elemento que hayamos pinchado
        case 4:
            //Si el id_proveedor no está vacío y es un número
            if (isset($_POST["id"]) && is_numeric($_POST["id"])) {
                //Llamamos a la funcion details
                $product->details_product($_POST["id"]);
            } else {
                $product->index();
            }
            break;
            //La opcion 5, la obtenemos al enviar los datos del formulario de modificar
            //o añadir y lo que hará es llamar a la función save, pasándole el array $_POST
            //para su introduccion en la base de datos
        case 5:
            $product->save($_POST);
    }
}
?>