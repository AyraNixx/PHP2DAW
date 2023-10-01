<?php

namespace controller;

use \model\Usuario;
use \model\Utils;
use \model\Producto;
//Creamos un array para guardar los datos del cliente
session_start();
//Añadimos el código del modelo
require_once("../model/Usuario.php");
require_once("../model/Utils.php");
require_once("../model/Producto.php");


//Si nos llegan datos de un cliente, implica que es el formulario el que llama al controlador
// var_dump($_POST["tipo"]);
if (isset($_POST["titulo"]) && isset($_POST["descripcion"]) && isset($_POST["precio"]) && isset($_POST["tipo"])) {

    $producto = array();

    //Limpiamos los datos de posibles caracteres o codigo malicioso
    //Segun los asignamos al array de datos del usuario a registrar
    $producto["producto_id"] = $_POST["producto_id"];
    $producto["titulo"] = $_POST["titulo"];
    $producto["descripcion"] = $_POST["descripcion"];
    $producto["precio"] = $_POST["precio"];
    $producto["tipo"] = $_POST["tipo"];
    $producto["usuario_id"] = $_POST["usuario_id"];
    $producto["img_previa"] = $_POST["img_previa"];

    
    // Si files no está nulo, es que han enviado algo
    if(isset($_FILES['foto'])) {
        // Obtener los datos del formulario
        $foto = $_FILES['foto'];

        // Borramos la imagen previa
        Utils::delete_img($producto["img_previa"]);

        // Obtenemos la nueva ruta
        $producto["foto"] = Utils::save_img($foto,$_SESSION['id']);


        if($producto["foto"]) {
            // La imagen se ha subido correctamente
            echo "La imagen se ha subido correctamente. Ruta: " . $producto["foto"];
        } else {
            // Error al subir la imagen
            echo "Error al subir la imagen.";
        }
    // Si ES nula, es que no hemos seleccionado una nueva imagen, así que pasamos la 
    // ruta original guardada en $producto["img_previa"]
    } else{
        $producto["foto"] = $producto["img_previa"];
    }   

    
    if(isset($_POST["editar"]) && $_POST["editar"] == "false"){

        // var_dump($producto);
        include("../views/editProducto.php");


    } else {

        var_dump($producto);
        $gestorProducto = new Producto();

        //Nos conectamos a la Bd
        $conexPDO = Utils::conectar();

        //Añadimos el registro
        $comprobar = $gestorProducto->updateProducto($producto, $conexPDO);

        // var_dump($comprobar);
        header("Location: ../controller/misProductosC.php");
        exit();
    }
} else{

    include("../controller/indexController.php");
}