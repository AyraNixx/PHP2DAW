<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8d125d2b91.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../view/css/css.css">
</head>

<body>

    <body class="bg-img">
        <div class="container login mt-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-6 col-md-6 col-lg-4 bg-login">
                    <div class="col-md-12">
                        <h1 class="text-color text-center">RECUPERAR CONTRASEÑA</h1>
                        <form action="POST" method="activationC.php">
                            <div class="my-4 form-group text-color">
                                <input type="email" class="form-control" name="correo" placeholder="user@domain.com" required pattern="^\w+([\.-_]?\w+)*@\w+([\.-_]?\w+)*(\.\w{2,4})+$" title="El correo debe tener un formato parecido a example@server.com" />
                            </div>
                            <button type="submit" class="text-color border p-2" name="submit">
                                Enviar correo
                                <i class="fa-solid fa-arrow-right-long px-1"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script language="JavaScript" type="text/javascript" src="../view/js/index.js"></script>
    </body>

</html>