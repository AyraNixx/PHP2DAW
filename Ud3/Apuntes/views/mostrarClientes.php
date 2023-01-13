<?php namespace viewsProduct; ?>

<!DOCTYPE html>
<html>

<head>
    <title>Prueba de Bootstrap</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <?php
        if(isset($msg != null) && isset($msg))
        {
            print("<script>alert('$msg')</script>");
        }
    ?>
</head>

<body>


    <?php
    //Array con arrays asociativos como elementos
    $datosClientes;
    ?>

    <form method="POST" action="#">

        <div class="container">

            <div class="row">

            <input type="submit" value="Añadir Cliente">

                <div class="col-lg-9 col-sm-9">

                    <table>
                        <thead>
                            <tr>
                                <th>idCliente</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            //Tenemos que generar una fila tr para cada cliente que tenga
                            //el array de datosClientes
                            for ($i = 0; $i < count($datosClientes); $i++) 
                            {
                                //Comienzo de fila
                                print("<tr>");

                                    //Id cliente
                                    print("<td>" . $datosClientes[$i]["idClientes"] . "</td>");
                                    //Nombre
                                    print("<td>" . $datosClientes[$i]["nombre"] . "</td>");
                                    //Email
                                    print("<td>" . $datosClientes[$i]["email"] . "</td>");
                                    //Edad
                                    print("<td>" . $datosClientes[$i]["edad"] . "</td>");
                                    //Sexo
                                    print("<td>" . $datosClientes[$i]["sexo"] . "</td>");

                                    //Para cada cliente creamos un boton para eleminar al sujeto
                                    //que llamará 
                                    print("<td>");
                                    //Si queremos enviar un dato por POST
                                        print("<form method='POST' action='../controller/deleteClient.php'>");
                                            print("<input type='hidden' name='idClientes' value='".$datosClientes[$i]["idClientes"]."'/>");                                
                                            print("<input type='submit' value='Eliminar'>");
                                        print("</form>");
                                    print("</td>");


                                    //Boton para actualizar
                                    print("<td>");
                                    //Si queremos enviar un dato por POST
                                        print("<form method='POST' action='../controller/updateClient.php'>");
                                            print("<input type='hidden' name='idClientes' value='".$datosClientes[$i]["idClientes"]."'/>");                                
                                            print("<input type='hidden' name='idClientes' value='".$datosClientes[$i]["nombre"]."'/>");   
                                            print("<input type='hidden' name='idClientes' value='".$datosClientes[$i]["email"]."'/>");                                
                                            print("<input type='hidden' name='idClientes' value='".$datosClientes[$i]["edad"]."'/>");    
                                            print("<input type='hidden' name='idClientes' value='".$datosClientes[$i]["sexo"]."'/>");                                                                                         
                                            print("<input type='submit' value='Modificar'>");
                                        print("</form>");
                                    print("</td>");

                                //Final de fila
                                print("</tr>");
                            }

                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </form>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>