<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8d125d2b91.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../view/css/css.css">
</head>

<body class="bg-img">

    <!-- MODAL -->
    <div id="aviso" class="modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Aviso</h5>
                    <button type="button" class="btn-close" id="cerrarModalBtn" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p><?= !isset($msg) ? "" : $msg ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container login mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-6 col-md-5 col-lg-3 bg-login">
                <div class="col-md-12">
                    <form method="POST" action="../controller/Login.php" class="form">
                        <h3 class="text-center text-color">Login</h3>
                        <div class="my-4 form-group text-color">
                            <label for="correo" class="form-label">Email</label>
                            <input type="email" class="form-control" name="correo" placeholder="abc@mail.com" required pattern="^\w+([\.-_]?\w+)*@\w+([\.-_]?\w+)*(\.\w{2,4})+$">
                        </div>
                        <div class="my-4 form-group text-color">
                            <label for="passwd" class="form-label">Password</label>
                            <input type="password" class="form-control" name="passwd" id="passwd" placeholder="************" required pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$">
                        </div>
                        <div class="my-4 form-group">
                            <a href="../controller/Login.php?action='change_passwd'" class="link-dark">Restablecer contraseña</a>
                        </div>
                        <div class="my-4 form-group d-flex text-color justify-content-between">
                            <button type="submit" class="border p-2" name="action" value="login">
                                Sign up
                                <i class="fa-solid fa-arrow-right-long px-1"></i>
                            </button>
                            <button class="border p-2">
                                <a href="../controller/registerC.php" class="text-decoration-none text-color">Sign in</a>
                                <i class="fa-solid fa-arrow-right-long px-1"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <?php
    if (isset($msg) && $msg != "") { ?>

        <script>
            $(document).on("ready", function() {
                $("#aviso").modal("show");
            })
        </script>
    <?php
    }
    ?>
</body>

</html>