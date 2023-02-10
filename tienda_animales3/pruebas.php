<!-- <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script></script>
</head>

<body> -->





    <!--Debemos de indicar el tipo de encriptación o nos podemos olvidar de nuestras imágenes-->
    <!-- <form method='POST' enctype="multipart/form-data" action="#">
        <input type="file" name="img" accept="image/x-png,image/gif,image/jpeg">
        <input type="submit" value="Guardar" name="submit">
    </form> -->

    <?php 
    // use \utils\Utils;
    // require_once("./utils/Utils.php");

    // $conBD = Utils::conectar();

    //     if(isset($_POST["submit"]))
    //     {
    //         //Vemos si se mandó la imagen comprobando si tiene nombre
    //         if(isset($_FILES["img"]["name"]))
    //         {
    //             //Comrpobamos el tipo de archivo que se está subiendo para ver si
    //             //es una imagen
    //             echo $type = $_FILES["img"]["type"];
    //             echo "</br>";
    //             //Guardamos el nombre de la imagen
    //             echo $name = $_FILES["img"]["name"];
    //             echo "</br>";
    //             //Tamaño de la imagen
    //             echo $size = $_FILES["img"]["size"];
    //             //Necesitamos extraer los binarios de la imagena
    //             echo "<pre>";
    //             var_dump($_FILES["img"]);
    //             echo "</pre>";
    //             //tmp_name es el nombre temporal

    //             //Comprobamos que lo que el usuario está mandando es solo una imagen
    //             $img = getimagesize($_FILES["img"]["tmp_name"]);

    //             //Si getimagesize nos devuelve true, significa que es una imagen
    //             if($img !== false)
    //             {
    //                 //Definimos la carpeta destino
    //                 $carpeta_destino = "imgs/";
    //                 $archivo_subir = $carpeta_destino . $_FILES["img"]["name"];
    //                 //Con la funcion move_uploaded_file, subimos el archivo
    //                 move_uploaded_file($_FILES["img"]["tmp_name"], $archivo_subir);

    //             }
    //         }
    //     }
    
    ?> 
<!-- </body>

</html> -->


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <title>Login Page</title>
  </head>
  <body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-header">
              <h3>Login</h3>
            </div>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    aria-describedby="emailHelp"
                  />
                  <small id="emailHelp" class="form-text text-muted"
                    >We'll never share your email with anyone else.</small
                  >
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="password"
                  />
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="rememberMe" />
                  <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
