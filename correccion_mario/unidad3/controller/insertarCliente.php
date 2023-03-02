<?php

use \model\Cliente;
use \model\Utils;
//Creamos un array para guardar los datos del cliente


//Si nos llegan datos de un cliente, implica que es el formulario el que llama al controlador
if (isset($_POST["idClientes"]) && isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["edad"]) && isset($_POST["sexo"])) {
    //rellenamos los datos del cliente que le pasaremos a la vista

    $cliente = array();

    $cliente["idClientes"] = $_POST["idClientes"];
    $cliente["nombre"] = $_POST["nombre"];
    $cliente["email"] = $_POST["email"];
    $cliente["edad"] = $_POST["edad"];
    $cliente["sexo"] = $_POST["sexo"];


    //Añadimos el código del modelo
    require_once("../model/Cliente.php");
    require_once("../model/Utils.php");

    $gestorCli = new Cliente();

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    //Añadimos el registro
    $resultado = $gestorCli->addCliente($cliente, $conexPDO);

    //Si ha ido bien el mensaje sera distint
    if ($resultado != null)
        $mensaje = "El Cliente se Inserto Correctamente";
    else
        $mensaje = "Ha habido un fallo al acceder a la Base de Datos\n salte por la ventana ya!";

    //Recolectamos los datos de los clientes
    $datosClientes = $gestorCli->getClientesPag($conexPDO, true, "idClientes", 1, 10);


    //var_dump($datosClientes);
    include("../views/mostrarClientes.php");
} else {
    //Declaramos la accion para que el formulario 
    //Sepa a que controlador llamar con los datos
    $accion = "insertar";
    //Sin datos del  cliente cargados cargamos la vista
    include("../views/modificarClientes.php");
}
