<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src=""></script>
</head>

<body>
    <?php

    function maxMin()
    {
        $numbers = $_POST["numbers"];

        $numbers = explode(" ", $numbers);        

        $max = 0; $min = 0;

        $numeric = true;

        foreach($numbers as $number)
        {
            if(is_numeric($number))
            {
                continue;
            }else{
                $numeric = false;
                break;
            }
        }

        if($numeric)
        {                
            $max = max($numbers);
            $min = min($numbers);

            echo "Max: $max";
            echo "Min: $min";

        }else{
            echo "No todos son números";
        }
        
    }




    ?>
    <form method="POST" action="#">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <!-- Margenes con mb mr ml mt -sm-distancia-->
                    <!-- Misma linea -->
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <label for="numbers" class="col-lg-3 col-form-label">Números</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="numbers" name="numbers">
                        </div>
                    </div>
                    <!--Sombra shadow p-3 mb-5 bg-body rounded-->
                    <!-- btn btn-default boton por defecto-->
                    <!-- px-4 py-5 pading x e y -->
                    <button type="submit" class="btn btn-default mb-sm-2 shadow p-3 mb-5 bg-body rounded px-3 py-2" name="submit">Enviar</button>
                </div>
            </div>
        </div>
    </form>
    <div style="display:flex; justify-content:center;" class="mt-4">    
        <div style="border: 1px solid black;" class="p-3"> 
            <?php

            if (isset($_POST)) {
                if (isset($_POST["submit"])) {
                    maxMin();
                }
            }
            ?>
        </div>
    </div>
</body>

</html>