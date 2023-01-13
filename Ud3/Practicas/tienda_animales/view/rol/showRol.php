<?php
namespace views;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Lista de Roles</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<?php

if (isset($msg))
{
    print("<script>alert('" . $msg . "');</script>");
}

?>

</head>

<body>

    <form method="POST" action="#">

        <div class="container">

            <div class="row mt-5">                
                <div class="col-lg-9 col-sm-9">
                    <table class="table  text-center">
                        <thead class="table-dark border border-dark">
                            <tr>
                                <th scope="col">Id_Rol</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="border border-end-secondary">

                            <?php

                                //Generamos una fila para cada rol que haya en el 
                                //array de dataRoles
                                foreach($dataRoles as $rol)
                                {
                                    //Iniciamos la fila
                                    echo "<tr>";
                                        //Id_rol
                                        echo "<td>" . $rol["id_rol"] . "</td>";
                                        //Rol
                                        echo "<td>" . $rol["rol"] . "</td>";
                                        //Descripcion
                                        echo "<td>" . $rol["descripcion"] . "</td>";

                                        //Para cada rol, añadiremos botones para eliminar o modificar el rol
                                        
                                        //PARA ELIMINAR 
                                        echo "<td>";
                                            echo "<form method='POST' action='../../controller/rol/deleteRol.php'>";                                     
                                                //Pasamos el id_rol con un campo hidden
                                                echo "<input type='hidden' name='id_rol' value='" . $rol["id_rol"] . "'/>";
                                                echo "<button class='btn btn-danger'>Eliminar</button>";
                                            echo "</form>";
                                        echo "</td>";

                                        //PARA MODIFICAR
                                        echo "<td>";
                                            echo "<form method='POST' action='../../controller/rol/updateRol.php'>";                                     
                                                //Pasamos el rol con un campo hidden
                                                echo "<input type='hidden' name='id_rol' value='". $rol["id_rol"] . "'/>";
                                                echo "<input type='hidden' name='rol' value='". $rol["rol"] . "'/>";
                                                echo "<input type='hidden' name='descripcion' value='". $rol["descripcion"] . "'/>";
                                                echo "<button class='btn btn-secondary'>Modificar</button>";
                                            echo "</form>";
                                        echo "</td>";
                                    echo "</tr>";
                                }


                            ?>
                        </tbody>
                        <tfoot>
                            <td colspan="4" class="border-bottom-0"></td>
                            <td class="bg-dark border-0">
                                <a href="../../controller/rol/addRol.php" class="btn btn-dark"> Añadir rol</a>
                            </td>
                        </tfoot>
                    </table>


                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>