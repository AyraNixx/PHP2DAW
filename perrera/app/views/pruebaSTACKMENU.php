<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    class Prueba
    {
        public static function save_img(array $file, $idusuario)
        {
            //Creamos una constante que es para el tamaño máximo permitido
            define("MAX_FILE_SIZE", 2097152);
            //Definimos un array con posibles extensiones válidas para una imagen
            $extension = ["img/png", "img/jpeg", "img/gif"];
            //Comprobamos si es una imagen.
            if (!getimagesize($file["tmp_name"]) && !in_array($file["type"], $extension)) {
                return false;
            }

            //Comprobamos que el tamaño sea menor al tamaño máximo permitido
            if ($file["size"] > MAX_FILE_SIZE) {
                return false;
            }
            //Generamos un nombre único para la imagen
            //Utilizamos microtime para que nos devuelva la fecha Unix actual con microsegundos
            //y pasamos como argumento true para que en vez de una cadena, nos devuelva un
            //float que redondearemos con round.
            //Concatenamos el numero obtenido con el formato de imagen que obtenemos al 
            //usar explode con delimitador '.' y utilizar end para sacar el ultimo elemento
            //del array obtenido del explode
            $end = explode(".", $file["name"]);
            $file_name = $idusuario . "-" . uniqid() . "." . end($end);
            //Carpeta de destino
            $file_path = "../src/imagenes/" . $file_name;

            //Usamos move_uploaded_file para mover el archivo subido a la carpeta indicada
            //Utilizamos $file["tmp_name] porque es la ubicación temporal donde se encuentra
            //el archivo subido, el segundo argumento es la ruta al repositorio
            move_uploaded_file($file["tmp_name"], $file_path);
            //Devolvemos la url
            return $file_path;
        }
    }

    if (isset($_POST)) {
        if (isset($_FILES['foto'])) {
            // Obtener los datos del formulario
            $foto = $_FILES['foto'];

            // Llamar a la función save_img de la clase Imagen
            $producto["foto"] = Prueba::save_img($foto, 1);

            if ($producto["foto"]) {
                // La imagen se ha subido correctamente
                echo "La imagen se ha subido correctamente. Ruta: " . $producto["foto"];
            } else {
                // Error al subir la imagen
                echo "Error al subir la imagen.";
            }
        }
    }

    ?>
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="file" name="foto" id="foto">
        <button type="submit" name="send">Enviar</button>
    </form>
</body>

</html>