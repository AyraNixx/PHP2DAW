<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="table mt-5 p-4">
        <form action="ej6Datos.php" method="POST">
            <div class="form-group row">
                <label for="name" class="col-2">NOMBRE</label>
                <input type="text" name="name" id="name" class="col">
            </div>
            <div class="form-group row">
                <label for="sex" class="col-2">SEXO</label>
                <div class="form-check form-check-inline col-4">
                    <input class="form-check-input" type="radio" value="hombre" id="radio1" name="sex">
                    <label class="form-check-label" for="radio1">HOMBRE</label>
                </div>
                <div class="form-check form-check-inline col-4">
                    <input class="form-check-input" type="radio" value="mujer" id="radio2" name="sex">
                    <label class="form-check-label" for="radio2">MUJER</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="salary" class="col-2">Sueldo</label>
                <select name="salary" id="salary" class="col">
                    <option value="0-1200">0-1200</option>
                    <option value="12000-20000">12000-20000</option>
                    <option value="21000-35000">21000-35000</option>
                    <option value="+35000">+35000</option>
                </select>
            </div>
            <div class="form-group row">
                <label for="age" class="col-2">Edad</label>
                <select name="age" id="age" class="col">
                    <option value="0-25">0-25</option>
                    <option value="25-45">25-45</option>
                    <option value="45-65">45-65</option>
                    <option value="JUBILADO">JUBILADO</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary col-4 mt-2" value="Enviar">
        </form>
    </div>
</body>

</html>