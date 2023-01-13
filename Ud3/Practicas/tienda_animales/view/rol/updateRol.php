<!DOCTYPE html>
<html>

<head>
  <title>Modificar Rol</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>

  <form method="POST" action="../../controller/rol/updateRol.php">

    <div class="container">

      <div class="row">


        <div class="col-lg-9 col-sm-9">

          <!-- Margenes con mb mr ml mt -sm-distancia-->
          <!-- Misma linea -->
          <div class="form-group row mb-sm-2 mt-sm-2">
            <label for="rol" class="col-lg-3 col-form-label">Id_rol</label>
            <div class="col-lg-6">
              <input type="text" class="form-control" id="id_rol" name="id_rol"
               value=<?=(isset($rol) ? $rol["id_rol"] : "") ?>>
            </div>
          </div>
          <br>
          <div class="form-group row mb-sm-2 mt-sm-2">
            <label for="rol" class="col-lg-3 col-form-label">Rol</label>
            <div class="col-lg-6">
              <input type="text" class="form-control" id="rol" name="rol"
               value=<?=(isset($rol) ? $rol["rol"] : "") ?>>
            </div>
          </div>

          <br>

          <div class="form-group row mb-sm-2 mt-sm-2">
            <label for="descripcion" class="col-lg-3 col-form-label">Descripción</label>
            <div class="col-lg-6">
              <input type="text" class="form-control" id="descripcion" name="descripcion"
               value=<?=(isset($rol) ? $rol["descripcion"] : "") ?>>
            </div>
          </div>       
     
           <br>
   
          <button type="submit" class="btn btn-default mb-sm-2 shadow p-3 mb-5 bg-body rounded px-3 py-2" name="submit">Enviar</button>

        </div>
      </div>
    </div>
  </form>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>