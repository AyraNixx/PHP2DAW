<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Con Funciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <form method="POST" action="help.php">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <!--NOMBRE-->
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <label for="name" class="col-lg-3 col-form-label">Nombre</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <!--EDAD-->
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <label for="age" class="col-lg-3 col-form-label">Edad</label>
                        <div class="col-lg-6">
                            <select name="age" id="age">
                                <?php
                                for ($i = 1; $i <= 134; $i++) {
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>



                    <!--ESTADO-->
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <label for="age" class="col-lg-3 col-form-label">Estado civil</label>
                        <div class="col-lg-6">
                        <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' value='soltero' id='radio1' name='civil' checked>
                                <label class='form-check-label' for='radio1'>Soltero</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' value='casado' id='radio2' name='civil'>
                                <label class='form-check-label' for='radio2'>Casado</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' value='divorciado' id='radio3' name='civil'>
                                <label class='form-check-label' for='radio3'>Divorciado</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' value='viudo' id='radio4' name='civil'>
                                <label class='form-check-label' for='radio4'>Viudo</label>
                            </div>
                        </div>
                    </div>



                    <!--SUELDO-->
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <label for="salary" class="col-lg-3 col-form-label">Sueldo</label>
                        <div class="col-lg-6">
                            <select name="salary" id="salary">
                                <?php
                                for ($i = 0; $i <= 50000; $i += 10000) {
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!--HIJOS-->
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <label for="child" class="col-lg-3 col-form-label">Hijos</label>
                        <div class="col-lg-6">
                            <textarea name="child" cols="30" rows="10"></textarea>
                        </div>
                    </div>

                    <!--Domicilios-->
                    <div class="form-group row mb-sm-2 mt-sm-2">
                        <label for="addres" class="col-lg-3 col-form-label">Domicilio</label>
                        <div class="col-lg-6">
                            <textarea name="addres" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default mb-sm-2 shadow p-3 mb-5 bg-body rounded px-3 py-2" name="submit">Enviar</button>
                </div>
            </div>
        </div>
    </form>
    <div style="display:flex; justify-content:center;" class="mt-4">
        <div class="p-3">

        </div>
    </div>
</body>

</html>