<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej4: Dados</title>
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    <script src=""></script>
</head>
<body>
    <?php 
        //Definimos las variables
        $dado1 = rand(1, 6);
        $dado2 = rand(1, 6);

        //Mostramos la tirada con echo usando la etiqueta img
        echo "<h2>Dado 1: </h2><br/>";
        echo "<img src='caradado/dice".$dado1.".png' border='0' width='auto' height='auto'>";
        echo "<h2>Dado 2: </h2><br/>";
        echo "<img src='caradado/dice".$dado2.".png' border='0' width='auto' height='auto'><br/>";

        //Condicional que comprueba si la tirada es igual (empate) o si 
        //uno es mayor que el otro
        if ($dado1 === $dado2)
        {
            echo "<br/><h1>Se ha obtenido el mismo valor en ambos dados.</h1>";
        }elseif($dado1 > $dado2){
            echo "<br/><h1>El primer dado ha sacado el valor más alto.</h1>";
        }else{
            echo "<br/><h1>El segundo dado ha sacado el valor más alto.</h1>";
        }
    ?>
</body>
</html>