<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script></script>
</head>

<body>





    <!--Debemos de indicar el tipo de encriptación o nos podemos olvidar de nuestras imágenes-->
    <!-- <form method='POST' enctype="multipart/form-data" action="#">
        <input type="file" name="img" accept="image/x-png,image/gif,image/jpeg">
        <input type="submit" value="Guardar" name="submit">
    </form> -->

    <!-- <?php 
    use \utils\Utils;
    require_once("./utils/Utils.php");

    $conBD = Utils::conectar();

        if(isset($_POST["submit"]))
        {
            //Vemos si se mandó la imagen comprobando si tiene nombre
            if(isset($_FILES["img"]["name"]))
            {
                //Comrpobamos el tipo de archivo que se está subiendo para ver si
                //es una imagen
                echo $type = $_FILES["img"]["type"];
                echo "</br>";
                //Guardamos el nombre de la imagen
                echo $name = $_FILES["img"]["name"];
                echo "</br>";
                //Tamaño de la imagen
                echo $size = $_FILES["img"]["size"];
                //Necesitamos extraer los binarios de la imagena
                echo "<pre>";
                var_dump($_FILES["img"]);
                echo "</pre>";
                //tmp_name es el nombre temporal

                //Comprobamos que lo que el usuario está mandando es solo una imagen
                $img = getimagesize($_FILES["img"]["tmp_name"]);

                //Si getimagesize nos devuelve true, significa que es una imagen
                if($img !== false)
                {
                    //Definimos la carpeta destino
                    $carpeta_destino = "imgs/";
                    $archivo_subir = $carpeta_destino . $_FILES["img"]["name"];
                    //Con la funcion move_uploaded_file, subimos el archivo
                    move_uploaded_file($_FILES["img"]["tmp_name"], $archivo_subir);

                }
            }
        }
    
    ?> -->
</body>

</html>