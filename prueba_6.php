<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<marquee behavior="" direction="">Hola</marquee>
    <form action="prueba_6D.php" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">
        <br>
        <label for="radio1">H</label>
        <input type="radio" name="sexo" value="H" id="radio1">
        <label for="radio2">M</label>
        <input type="radio" name="sexo" value="M" id="radio2">
        <br>
        <label for="Edad"></label>
        <select name="edad">
            <option value="1">0-25</option>
            <option value="2">25-45</option>
            <option value="3">45-65</option>
            <option value="4">Jubilado</option>
        </select>
        <br>
        <label for="Sueldo"></label>
        <select name="sueldo">
            <option value="1">0-12000</option>
            <option value="2">12000-20000</option>
            <option value="3">21000-35000</option>
            <option value="4">+35000</option>
        </select>
        <br>
        <button type="submit">Enviar</button>
    </form>

</body>

</html>