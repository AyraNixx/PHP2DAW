<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="#">
        <input type="file" name="img" id="img">
        <input type="submit" value="Enviar" name="submit">
    </form>
    <?php
    if(isset($_POST["submit"]))
    {
        echo "<pre>";
        var_dump($_POST["img"]);
        echo "<pre>";
        echo $_FILES["img"]["name"];
        echo $_FILES["img"]["tmp_name"];
        echo $_FILES["img"]["type"];
        echo $_FILES["img"]["size"];
        echo $_FILES["img"]["error"];
    }
        
    ?>
</body>
</html>