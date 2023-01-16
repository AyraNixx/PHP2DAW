<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="../view/css/css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body class="bg-img">
    <div class="container login">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 bg-login">
                <div class="col-md-12">
                    <form method="POST" action="" class="form">
                        <h3 class="text-center text-warning">Login</h3>
                        <div class="mb-3 form-group">
                            <label for="email" class="form-label text-warning">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="abc@mail.com">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="passwd" class="form-label text-warning">Password</label>
                            <input type="password" class="form-control" name="passwd" id="passwd" placeholder="***************">
                        </div>
                        <div class="text-right" style="text-align: right;">
                            <a href="#" class="text-warning">Sign up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>