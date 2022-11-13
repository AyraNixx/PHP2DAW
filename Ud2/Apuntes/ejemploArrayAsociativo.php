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
        $juego = ["titulo" => "Zelda", "año" => 1999, "puntuacion" => 8];

    ?>

    <ul>
        <?php 
            $juego["type"] = "Hola";
            print ("<li>{$juego["titulo"]}</li>");
            print ("<li>{$juego["año"]}</li>");
            print ("<li>{$juego["puntuacion"]}</li>");
            print ("<li>{$juego["type"]}</li>");
        ?>
    </ul>
</body>
</html>