<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">    <script src=""></script>
</head>
<body>
    <div class="container mt-5">
        <!--FORMULARIO SENCILLO PARA INTRODUCIR LOS NOMBRES-->
        <!--Action: archivo al que envía los datos, method: forma de enviarlos-->
        <form action="ej5Datos.php" method="post">
            <div class="form-group m-2 text-center">
                <label for="player1"><strong>Jugador 1</strong></label>
                <input type="text" name="player1" id="player1" maxlength="50" placeholder="Introduce tu nombre">                             
            </div> 
            <div class="form-group m-2 text-center">
                <label for="player2"><strong>Jugador 2</strong></label>
                <input type="text" name="player2" id="player2" maxlength="50" placeholder="Introduce tu nombre">
            </div>
            <br/>   
            <div class="form-group m-2 text-center">
                <input type="submit" class="btn btn-secondary" name="submit" value="Tirar dados">
            </div>            
        </form>
    </div>      
</body>
</html>