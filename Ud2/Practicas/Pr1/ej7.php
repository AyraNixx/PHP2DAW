<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cartaspoker/css/poker.css">
</head>

<body>
    <?php require("ej7funciones.php") ?>
    <div class="container">
        <form action="#" method="POST">
            <?php generarSelects($cartas) ?>
            <input type="submit" name="submit" value="Enviar">
        </form>

        <?php
            //Si hay submit
            if (isset($_POST["submit"])) {

                //Guardamos en un array las cartas seleccionadas
                $cartasSelect = [$_POST["carta1"], $_POST["carta2"], $_POST["carta3"], $_POST["carta4"], $_POST["carta5"]];

                //Una vez que comprobamos que las cartas han sido seleccionadas correctamente
                if ($cartasSelect[0] !== "" && $cartasSelect[1] !== "" && $cartasSelect[2] !== "" && $cartasSelect[3] !== "" && $cartasSelect[4] !== "") {
                    //Comprobamos que ninguna esté repetida
                    if (cartaRepetida($cartasSelect)) {
                        //mostramos cartas
                        mostrarCarta($cartasSelect);
                        //Si la funcion color devuelve true, significa que la mano es color    
                        if (color($cartasSelect)) {
                            //Si hay escalera de color, nos devuelve true
                            if (escalera($cartasSelect)) {
                                echo "<br/><h1>ESCALERA DE COLOR</h1>";
                                //Si no hay escalera de color, nos devuelve y por lo tanto solo es Color
                            } else {
                                echo "<br/><h1>COLOR</h1>";
                            }
                        } elseif(poker($cartas, $cartasSelect)) {
                            echo "<br/><h1>POKER</h1>";
                        }else{
                            echo "<br/><h1>VAYA BIRRIA DE MANO!</h1>";
                        }
                    } else {
                        echo "<h1>CARTAS REPETIDAS, ELIGE DE NUEVO</h1>";
                    }
                }else{
                    echo "<h1>NO HAS INTRODUCIDO NINGUNA CARTA!</h1>";                  
                }
            }
        ?>

    </div>

</body>

</html>