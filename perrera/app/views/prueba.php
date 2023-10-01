<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MenuTESTV2</title>
    <link rel="shortcut icon" href="../../public/imgs/logos/logo1.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/8d125d2b91.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../views/css/sass.css">
</head>

<body>
    <div class="container-fluid" style="min-height: 100vh;">
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
            <!-- <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasLabel">Offcanvas with body scrolling</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div> -->
            <div class="offcanvas-body">
                <div class="menu-user">
                    <span>Nombre</span>
                    <br />
                    <span>Administrador</span>
                </div>
                <div class="menu-opt d-flex flex-column">
                    <hr class="menu-hr">
                    <a href="" class="menu-link pt-1">
                        <i class="fa-solid fa-house"></i>
                        Inicio
                    </a>
                    <details class="pt-2">
                        <summary class="text-primary">Animales</summary>
                        <a href="../controllers/AnimalC.php?action=index" class="menu-link px-3">
                            Animales
                        </a>
                    </details>

                    <details class="pt-2">
                        <summary class="text-primary">Empleados</summary>
                        <a href="" class="menu-link px-3">
                            Usuarios
                        </a>
                        <br />
                        <a href="" class="menu-link px-3">
                            Perfiles
                        </a>
                    </details>
                </div>
                <div class="settings">
                    <hr class="menu-hr">
                    <a href="">
                        <i class="fa-solid fa-gear"></i>
                        Ajustes
                    </a>
                </div>
                <div class="logout">
                    <hr class="menu-hr">
                    <a href="../controllers/LoginC.php?action=logout">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        Cerrar sesión
                    </a>
                </div>
            </div>
        </div>
        <div class="position-absolute end-0" style="padding: inherit; min-height:100%;">
            <!-- ENCABEZADO -->
            <header class="w-100 navbar border-0 border-bottom border-secondary bg-white position-relative top-0 start-0">
                <a class="d-flex align-items-center navbar-brand ms-3" href="./V_Home-Page.php">
                    <!-- Usamos la etiqueta object para que en caso de que un navegador no permita visualizar svg
                         tenga como alternativa una imagen con extensión png. -->
                    <object data="../../public/imgs/logos/logo1.svg" type="image/svg+xml" width="30" height="30" class="d-inline-block align-top" style="margin-right:.8rem;" alt="Logo perrera">
                        <img src="../../public/imgs/logos/logo1.png">
                    </object>
                    Patas arriba
                </a>
                <button class="h-100 border-0 bg-transparent position-relative me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas" id="menu">
                    <div class="hamburguer-inner position-absolute start-50">
                        <span class="hamburguer-line w-100 top-0"></span>
                        <span class="hamburguer-line top-50"></span>
                        <span class="hamburguer-line top-100"></span>
                    </div>
                </button>
            </header>
            <main class="h-100 position-relative" id="main">
                <h1>HOLAAAAA</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum totam ratione ipsam corporis pariatur voluptas quo repellendus error tenetur quam cupiditate, suscipit consequuntur! Necessitatibus dolorem iure harum sequi numquam voluptas praesentium, enim, ipsum nihil a beatae voluptatum consequatur provident exercitationem, placeat quasi eius laborum error eveniet! Assumenda nemo reprehenderit ratione.</p>
            </main>
        </div>
    </div>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#menu").click(function() {
                widthMenu();
            });

            function widthMenu() {
                if ($("#offcanvas").hasClass("show")) {
                    $("#main").css({
                        "width": "100%",
                        "left": "0",
                        "transition": "left 0.3s ease-in-out, width 0.3s ease-in-out"
                    });

                } else {
                    let widthOffCnvs = $("#offcanvas").outerWidth();
                    $("#main").css({
                        "left": widthOffCnvs + "px",
                        "width": "calc(100% - " + widthOffCnvs + "px)",
                        "transition": "left 0.3s ease-in-out, width 0.3s ease-in-out"
                    });
                }
            }
        });
    </script>
</body>

</html>