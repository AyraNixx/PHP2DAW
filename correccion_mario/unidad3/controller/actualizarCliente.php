<?php

use \model\Cliente;
use \model\Utils;
//Creamos un array para guardar los datos del cliente
$cliente = array();


if (isset($_POST["idClientes"]) && isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["edad"]) && isset($_POST["sexo"])) {
    //rellenamos los datos del cliente que le pasaremos a la vista

    $cliente["idClientes"] = $_POST["idClientes"];
    $cliente["nombre"] = $_POST["nombre"];
    $cliente["email"] = $_POST["email"];
    $cliente["edad"] = $_POST["edad"];
    $cliente["sexo"] = $_POST["sexo"];


    if (isset($_POST["modificar"]) && $_POST["modificar"] == "false") {
        //Declaramos la accion para que el formulario 
        //Sepa a que controlador llamar con los datos
        $accion = "modificar";
        //Con los datos del cliente cargados cargamos la vista
        include("../views/modificarClientes.php");
    } else {

        //Si modificar es true implica que nos ha llamado el formulario y nos ha pasado los datos cambiados
        //Para que los modifiquemos en BD.
        //Añadimos el código del modelo
        require_once("../model/Cliente.php");
        require_once("../model/Utils.php");

        $gestorCli = new Cliente();

        //Nos conectamos a la Bd
        $conexPDO = Utils::conectar();

        $totalClientes = $gestorCli->getClientes($conexPDO);
        $numeroPaginacion = count($totalClientes) / 10;
        $redondeo = round($numeroPaginacion) + 1;

        //Modificamos el registro
        $resultado = $gestorCli->updateCliente($cliente, $conexPDO);

        //Si ha ido bien el mensaje sera distint
        if ($resultado != null)
            $mensaje = "El Cliente se Actualizo Correctamente";
        else
            $mensaje = "Ha habido un fallo al acceder a la Base de Datos\n salte por la ventana ya!";

        //Recolectamos los datos de los clientes
        try {
            $posicion[] = $_POST['Pag'];
            if ($posicion[0] == null) {
                $_POST['Pag'] = 1;
                $datosClientes = $gestorCli->getClientesPag($conexPDO, true, "idClientes", $_POST['Pag'], 10);
                //var_dump($datosClientes);
                include("../views/mostrarClientes.php");
            } else {
                $datosClientes = $gestorCli->getClientesPag($conexPDO, true, "idClientes", $_POST['Pag'], 10);
                //var_dump($datosClientes);
                include("../views/mostrarClientes.php");
            }
        } catch (\Throwable $th) {
            print("Error al pintar los Datos" . $th->getMessage());
        }
    }
} else {

    //Añadimos el código del modelo
    require_once("../model/Cliente.php");
    require_once("../model/Utils.php");

    $gestorCli = new Cliente();

    //Nos conectamos a la Bd
    $conexPDO = Utils::conectar();

    //Recolectamos los datos de los clientes
    try {
        $posicion[] = $_POST['Pag'];
        if ($posicion[0] == null) {
            $_POST['Pag'] = 1;
            $datosClientes = $gestorCli->getClientesPag($conexPDO, true, "idClientes", $_POST['Pag'], 10);
            //var_dump($datosClientes);
            include("../views/mostrarClientes.php");
        } else {
            $datosClientes = $gestorCli->getClientesPag($conexPDO, true, "idClientes", $_POST['Pag'], 10);
            //var_dump($datosClientes);
            include("../views/mostrarClientes.php");
        }
    } catch (\Throwable $th) {
        print("Error al pintar los Datos" . $th->getMessage());
    }


    //var_dump($datosClientes);
    include("../views/mostrarClientes.php");
}
