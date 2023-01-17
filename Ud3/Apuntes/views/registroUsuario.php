<!DOCTYPE html>
<html>

<head>
  <title>Registrar usuario</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>

    <?php $url_destino = "../controller/registro.php"?>

  <form method="POST" action="../controller/registro.php">

    <div class="container">

      <div class="row">


        <div class="col-lg-9 col-sm-9">

          <!-- Margenes con mb mr ml mt -sm-distancia-->
          <!-- Misma linea -->
          <div class="form-group row mb-sm-2 mt-sm-2">
            <label for="nombre" class="col-lg-3 col-form-label">Nombre:</label>
            <div class="col-lg-6">
              <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
          </div>

          <div class="form-group row mb-sm-2 mt-sm-2">
            <label for="email" class="col-lg-3 col-form-label">Email:</label>
            <div class="col-lg-6">
              <input type="email" class="form-control" id="email" name="email">
            </div>
          </div>

          <div class="form-group row mb-sm-2 mt-sm-2">
            <label for="passwd" class="col-lg-3 col-form-label">Contraseña:</label>
            <div class="col-lg-6">
              <input type="password" class="form-control" id="passwd" name="passwd">
            </div>
          </div>

          <div class="form-group row mb-sm-2 mt-sm-2">
            <label for="passwd2" class="col-lg-3 col-form-label">Confirma contraseña:</label>
            <div class="col-lg-6">
              <input type="password" class="form-control" id="passwd2" name="passwd2">
            </div>
          </div>

          <div class="mb-3">
            <label for="edad">Edad</label>
            <select class="form-control w-25" id="edad" name="edad">
            <?php
            //Generamos las option del select edad
            for($i=1;$i<=120;$i++)
            {
              print ("<option value='$i' ");
              print(">$i</option>\n");
            }
            ?>
            </select>
          </div>

          <br>
          <label class="form-check-label" >
              Sexo
            </label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" value="H" id="radio1" name="sexo" 
            >
            <label class="form-check-label" for="radio1">
              Hombre
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" value="M" id="radio2" name="sexo"
            >
            <label class="form-check-label" for="radio2">
             Mujer
            </label>
          </div>
        
     
           <br>
   
          <button type="submit" class="btn btn-default mb-sm-2 shadow p-3 mb-5 bg-body rounded px-3 py-2">Enviar</button>

        </div>
      </div>
    </div>
  </form>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>