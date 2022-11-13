<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <!--Por seguridad no tengass ni rutas ni nombres de ficheros-->
        <form action="indexej8.php" method="POST">
            <select name="header" id="header">
                <option value="1">Encabezado 1</option>
                <option value="2">Encabezado 2</option>
                <option value="3">Encabezado 3</option>
            </select>
            <select name="body" id="body">
                <option value="1">Cuerpo 1</option>
                <option value="2">Cuerpo 2</option>
                <option value="3">Cuerpo 3</option>
            </select>
            <select name="footer" id="footer">
                <option value="1">Pie 1</option>
                <option value="2">Pie 2</option>
                <option value="3">Pie 3</option>
            </select>
            <select name="style" id="style">
                <option value="1">Estilo 1</option>
                <option value="2">Estilo 2</option>
                <option value="3">Estilo 3</option>
            </select>
            <br/>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>

</html>