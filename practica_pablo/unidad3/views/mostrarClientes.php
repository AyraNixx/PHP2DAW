<?php
namespace views;
//Comprobamos que la sesion esta iniciada
session_start();

if (!isset($_SESSION['id']))
{
  print "Sesion no valida, redireccionando a la pagina principal";
}
else{
  print "el id de sesion es ".$_SESSION['id'];
}



?>

<!DOCTYPE html>
<html>

<head>
  <title>Lista de Clientes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>

  <div id="aviso" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Aviso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p><?= $mensaje ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <form method="POST" action="#">

    <div class="container">

      <div class="row">


        <div class="col-lg-9 col-sm-9">
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th scope="col">Id Cliente</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Edad</th>
                <th scope="col">Sexo</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>

              <?php

              //Tenemos que generar una fila tr para cada cliente
              //que tenga el array de datosClientes
              for ($i = 0; $i < count($datosClientes); $i++) {
                //Comienzo de fila
                print("<tr>\n");

                //Id de cliente
                print("<td scope='row'>" . $datosClientes[$i]["idClientes"] . "</td>\n");
                //Nombre
                print("<td>" . $datosClientes[$i]["nombre"] . "</td>\n");
                //Email
                print("<td>" . $datosClientes[$i]["email"] . "</td>\n");
                //Edad
                print("<td>" . $datosClientes[$i]["edad"] . "</td>\n");
                //Sexo
                print("<td>" . $datosClientes[$i]["sexo"] . "</td>\n");

                //Para cada cliente creamos un boton para eliminarlo
                //que llamara al controlador borrarCliente y le pasara el id
                print("<td>\n");
                print("<form method='POST' action='../controller/borrarCliente.php'>");
                print("<input type='hidden' name='idClientes' value='" . $datosClientes[$i]["idClientes"] . "'/>");
                print("<button class='btn btn-danger'>Eliminar</button>");
                print("</form>");
                print("</td>\n");

                print("<td>\n");
                print("<form method='POST' action='../controller/actualizarCliente.php'>");
                print("<input type='hidden' name='idClientes' value='" . $datosClientes[$i]["idClientes"] . "'/>");
                print("<input type='hidden' name='nombre' value='" . $datosClientes[$i]["nombre"] . "'/>");
                print("<input type='hidden' name='email' value='" . $datosClientes[$i]["email"] . "'/>");
                print("<input type='hidden' name='edad' value='" . $datosClientes[$i]["edad"] . "'/>");
                print("<input type='hidden' name='sexo' value='" . $datosClientes[$i]["sexo"] . "'/>");

                print("<button name='modificar' value='false' class='btn btn-primary'>Modificar</button>");
                print("</form>");
                print("</td>\n");
                //Final de fila
                print("</tr>\n");
              }


              ?>


            </tbody>
          </table>


        </div>
        <?php
        print("<form method='POST' action='../controller/insertarCliente.php'>");
        print("<button class='btn btn-success'>Insertar Clientes..</button>");
        print("</form>");
        ?>

      </div>
    </div>
  </form>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <?php
  //Si llega el mensaje implica que se ha modificado o borrado un cliente
  if ($mensaje != null && isset($mensaje)) {
    print("<script>
    \$(document).ready(function(){
        \$('#aviso').modal({show:true});
    });
</script>");
  }
  ?>
</body>

</html>