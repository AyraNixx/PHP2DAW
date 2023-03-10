<!DOCTYPE html>
<html>

<head>
    <title>Registro Usuario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8d125d2b91.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../view/css/css.css">
</head>

<body>

    <div class="container">

        <h1 class="text-color mt-5 mb-2 text-center">CREAR CUENTA</h1>

        <form method="POST" action="../controller/registerC.php">

            <div class="row justify-content-center">

                <div class="mx-5 col-lg-5 col-sm-7">

                    <!-- Margenes con mb mr ml mt -sm-distancia-->
                    <!-- Misma linea -->
                    <h3 class="text-color mt-5 mb-3">Datos personales</h3>
                    <div class="form-group row my-3">
                        <label for="nombre" class="sr-only">Nombre</label>
                        <div class="input-group col-lg-6">
                            <div class="input-group-text border-0 border-bottom rounded-0 bg-transparent h-100 p-0">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <input type="text" class="form-control border-0 border-bottom rounded-0 bg-transparent px-4" name="nombre" placeholder="Nombre" required />
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="apellidos" class="sr-only">Apellidos</label>
                        <div class="input-group col-lg-6">
                            <div class="input-group-text border-0 border-bottom rounded-0 bg-transparent h-100 p-0">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <input type="text" class="form-control border-0 border-bottom rounded-0 bg-transparent px-4" name="apellidos" placeholder="Apellidos" required />
                        </div>
                    </div>

                    <div class="form-group row  my-3">
                        <label for="direccion" class="sr-only">Direccion</label>
                        <div class="input-group col-lg-6">
                            <div class="input-group-text border-0 border-bottom rounded-0 bg-transparent h-100 p-0">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <input type="text" class="form-control border-0 border-bottom rounded-0 bg-transparent px-4" name="direccion" placeholder="C/Nombre, Portal Piso Puerta" required />
                        </div>
                    </div>


                    <h3 class="text-color mt-5">Contacto</h3>

                    <div class="form-group row my-3">
                        <label for="telefono" class="sr-only">Teléfono</label>
                        <div class="input-group col-lg-6">
                            <div class="input-group-text border-0 border-bottom rounded-0 bg-transparent h-100 p-0">
                                <i class="fa-solid fa-mobile-screen-button"></i>
                            </div>
                            <input type="tel" class="form-control border-0 border-bottom rounded-0 bg-transparent px-4" name="telefono" placeholder="XXX-XX-XX-XX" required pattern="^\d{3}(([\s-])?\d{2}){3}$"/>
                        </div>
                    </div>

                    <div class="form-group row  my-3">
                        <label for="correo" class="sr-only">Email</label>
                        <div class="input-group col-lg-6">
                            <div class="input-group-text border-0 border-bottom rounded-0 bg-transparent h-100 p-0">
                                <i class="fa-sharp fa-solid fa-envelope"></i>
                            </div>
                            <input type="email" class="form-control border-0 border-bottom rounded-0 bg-transparent px-4" name="correo" placeholder="user@domain.com" required pattern="^\w+([\.-_]?\w+)*@\w+([\.-_]?\w+)*(\.\w{2,4})+$" title="El correo debe tener un formato parecido a example@server.com"/>
                        </div>
                    </div>

                    <h3 class="text-color mt-5">Contraseña</h3>

                    <div class="form-group row  my-3">
                        <label for="passwd" class="sr-only">Contraseña</label>
                        <div class="input-group col-lg-6">
                            <div class="input-group-text border-0 border-bottom rounded-0 bg-transparent h-100 p-0">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            <input type="password" class="form-control border-0 border-bottom rounded-0 bg-transparent px-4" name="passwd" placeholder="Contraseña" required pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$" title="La contraseña debe tener al menos 8 caracteres y contener al menos una letra mayúscula, una letra minúscula y un número." />
                        </div>
                    </div>

                    <div class="form-group row my-3 mb-4">
                        <label for="passwd_2" class="sr-only">Repite la contraseña</label>
                        <div class="input-group col-lg-6">
                            <div class="input-group-text border-0 border-bottom rounded-0 bg-transparent h-100 p-0">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            <input type="password" class="form-control border-0 border-bottom rounded-0 bg-transparent px-4" name="passwd_2" placeholder="Repite la contraseña" required pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$" />
                        </div>
                    </div>

                    <button type="submit" class="text-color border p-2">
                        Crear cuenta
                        <i class="fa-solid fa-arrow-right-long px-1"></i>
                    </button>
                </div>
            </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="js/index.js"></script>
</body>

</html>