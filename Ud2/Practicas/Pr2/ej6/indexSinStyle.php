<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
</head>

<body>
    <h1 class="m-4">CREAR UN FORMULARIO</h1>
    <!--examen formulario en el que vas a tener que utilizar funciones, hacer bucles para 
        sacar máximos y mínimos, sacar datros, etc. -->
    <form method="POST" action="sinStyleV.php">
        <div class="container mt-5">
            <div class="row">



                <div class="col-lg-12 col-sm-12">

                    <!-- SELECT PARA EL NUMERO DE COLUMNAS -->
                    <div class="form-group">
                        <label for="cols">Selecccione el n.º de columnas</label>
                        <select class="form-select w-25" id="cols" name="cols">
                            <?php
                            for ($i = 1; $i < 13; $i++) {
                                echo "<option value = '$i'> $i </option>";
                            }
                            ?>
                        </select>
                    </div>





                    <br/>
                    <!--SELECT PARA EL NUMERO DE FILAS-->
                    <div class="form-group">
                        <label for="rows">N.º de filas</label>
                        <select class="form-select w-25" id="rows" name="rows">
                            <?php
                            for ($i = 1; $i < 8; $i++) {
                                echo "<option value = '$i'> $i </option>";
                            }
                            ?>
                        </select>
                    </div>





                    <!--SELECT PARA ELEGIR EL TIPO DE LETRA-->
                    <br/>
                    <div class="form-group">
                        <label for="font">Tipo de letra</label>
                        <select class="form-select w-25" id="font" name="font">
                            <option value="Arial, sans-serif" style="font-family: Arial, sans-serif;" >Arial</option>   
                            <option value="'Copperplate, Papyrus, fantasy" style="font-family: Copperplate, Papyrus, fantasy;">Brush Script MT</option>                            
                            <option value="'Brush Script MT', cursive" style="font-family:'Brush Script MT', cursive;">Brush Script MT</option>
                            <option value="Georgia, serif" style="font-family:Georgia, serif">Georgia</option>
                            <option value="Verdana, sans-serif" style="font-family: Lucida Handwriting, cursive;" class="p-2">Lucida Handwriting</option>              
                            <option value="monospace" style="font-family: monospace;">Monospace</option>      
                            <option value="Times New Roman, serif" style="font-family:'Times New Roman', serif ">Times New Roman</option>     
                            <option value="Verdana, sans-serif" style="font-family: Verdana, sans-serif;">Verdana</option>              
                        </select>
                    </div>






                    <!--INPUT COLOR PARA SELECCIONAR EL COLOR DE FONDO DE LA TABLA-->
                    <br/>
                    <div class="form-group">
                        <label for="bg_color">Color de fondo</label>
                        <br/>
                        <input type="color" name="bg_color" id="bg_color" value="#cce1f5">
                    </div>




                    <br/>
                    <label for="options[]">Añadir</label>
                    <br/>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="age" id="age" name="options[]">
                        <label class="form-check-label" for="age">
                            Edad
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="sex" id="sex" name="options[]">
                        <label class="form-check-label" for="sex">
                            Sexo
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="remark" id="remark" name="options[]">
                        <label class="form-check-label" for="remark">
                            Observaciones
                        </label>
                    </div>

                    <br/>
                    <button type="submit" class="btn btn-default mb-sm-2 shadow p-3 mb-5 mt-3 bg-body rounded px-3 py-2" name="submit">Enviar</button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>