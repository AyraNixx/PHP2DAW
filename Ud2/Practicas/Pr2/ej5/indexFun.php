<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Con Funciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src=""></script>
</head>

<body>
    <?php

    //Funcion que comprueba que todos los elementos de un array sean
    //numeros
    function is_num($numbers)
    {
        //Recorremos el array para comprobar que todos son números
        foreach ($numbers as $number) {
            //Si no es un número, devuelve false
            if (!is_numeric($number)) {
                return false;
            }
        }
        //Si todos son números devuelve true
        return true;
    }

    //Función que recibe como parámetro un array de números
    function maxMin($numbers)
    {
        //Obtenemos el máximo y el mínimo con las funciones 
        //max() y min()
        $max = max($numbers);
        $min = min($numbers);

        echo "<p class = 'm-0'>Máximo: $max</p>";
        echo "<p class = 'm-0'>Mínimo: $min</p>";
    }




    ?>
    <form method="POST" action="#">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <label for="numbers" class="col-lg-3 col-form-label">Números</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="numbers" name="numbers">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default mb-sm-2 shadow p-3 mb-5 bg-body rounded px-3 py-2" name="submit">Enviar</button>
                </div>
            </div>
        </div>
    </form>
    <div style="display:flex; justify-content:center;" class="mt-4">
        <div class="p-3">
            <?php
            //Si se ha pulsado al boton de enviar
            if (isset($_POST["submit"])) {
                //Vemos si $_POST["numbers] no está vacío
                if (isset($_POST["numbers"])) {
                    //Si no lo está, almacenamos el valor
                    $numbers = explode(" ", trim($_POST["numbers"]));

                    //Si todos los elementos son números
                    if (is_num($numbers)) {
                        echo "<p>" . $_POST["numbers"] . "</p>";
                        //Pasamos $numbers como argumento a la funcion maxMin
                        maxMin($numbers);
                    }else{
                        echo "<p>No todos son números</p>";
                    }
                }
            }
            ?>
        </div>
    </div>
</body>

</html>