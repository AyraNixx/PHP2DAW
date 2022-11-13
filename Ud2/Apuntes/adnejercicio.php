<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    <script src=""></script>
</head>

<body>

    <?php
    $secuenciaComplementaria = "";
    //Empleamos el condicional
    if (isset($_POST["adn"])) {

        $secuencia = strtoupper($_POST["adn"]);

        //Array asociativo, le decimos que la clave A va a tener el valor T
        //El array asociativo está poco recomendado, solo se debe de utilizar
        //para cosas pequeña no para datos grandes
        $trans = array('A' => 'T', 'T' => 'A', 'G' => 'C', 'C' => 'G');
        //STRTR convierte caracteres o reemplaza substrings
        $secuenciaComplementaria = strtr($secuencia, $trans);
        
    } else {
        echo "El POST no tiene variable name";
    }


    ?>
    <form method="POST" action="#">
        <label for="adn">Secuencia de ADN</label>
        <input type="text" name="adn" id="adn">
        <br />
        <label for="comp">Secuencia complementaria</label>
        <?php echo $secuenciaComplementaria ?>
        <br />
        <input type="submit" value="Enviar">
    </form>

</body>

</html>