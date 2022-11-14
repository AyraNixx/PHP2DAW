<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1″ />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fecha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <?php
    ?>
    <form method="POST" action="#">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <div class="col-lg-6">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <div class="col-lg-6">
                            <label for="date">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                    </div>
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <div class="col-lg-6">
                            <label for="time">Hora</label>
                            <input type="time" class="form-control" id="time" name="time">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3 mx-1">
                <button type="submit" class="btn btn-primary w-25" name="submit">Enviar</button>
            </div>
        </div>
    </form>
    <div class="container mt-3 text-center">
        <!--Llamamos a la funcion y mostramos el resultado-->
        <?php
        //Si se ha pulsado el botón de enviar 
        if (isset($_POST["submit"])) {
            //Comprobamos que la cadena no esté vacía
            if (isset($_POST["date"]) && isset($_POST["time"])) {

                $name = $_POST["name"];

                $date = $_POST["date"];
                $time = $_POST["time"];

                echo show_message($date, $time);
            }
        }
        ?>

    </div>
</body>

</html>