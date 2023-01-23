<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles</title>
    <link rel="stylesheet" href="../view/css/css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">    
    <script src="https://kit.fontawesome.com/8d125d2b91.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="table-wrapper">
            <div class="table-tittle">
                <div class="row">
                    <div class="col-sm-8">
                        <h2><b>Roles</b></h2>
                    </div>
                    <div class="col-sm-4 text-end">
                        <form action="index.php" method="POST">
                            <button name="submit" value="1" class="btn btn-success add-new">
                                Añadir
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-striped">
                <thead class="table-dark text-center">
                    <tr>
                        <th scope="col">#<i class="fa-sharp fa-solid fa-arrow-down-short-wide"></i></th>
                        <th scope="col">Rol<i class="fa-sharp fa-solid fa-arrow-down-short-wide"></i></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $i = 1;
                    foreach ($data_rol as $one_rol) {
                        $i += 1;
                        echo "<tr>";
                        echo "<td id='" . $i . "'>" . $one_rol["id_rol"] . "</td>";
                        echo "<td><a onclick=details(" . $i . ")>" . $one_rol["rol"] . "</a></td>";
                        echo "<td>";                        
                    ?>
                        <form action="index.php" method="POST" class="d-inline-block">
                            <input type="hidden" name="id_rol" value='<?= $one_rol["id_rol"] ?>'>
                            <input type="hidden" name="rol" value='<?= $one_rol["rol"] ?>'>
                            <input type="hidden" name="descripcion" value='<?= $one_rol["descripcion"] ?>'>
                            <button value="2" name="submit" class="border-0 bg-transparent text-warning">
                                <i class="fa-solid fa-marker"></i>
                            </button>
                        </form>

                        <i class="text-muted">|</i>

                        <form action="index.php" method="POST" class="d-inline-block">
                            <input type="hidden" name="id_rol" value='<?= $one_rol["id_rol"] ?>'>
                            <button value="3" name="submit" class="border-0 bg-transparent text-danger">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    <?php
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="m-4">
            <nav>
                <ol class="pagination" style="list-style-type: none;" name="num_page">
                    <?php
                    for ($i = 1; $i <= $total_page; $i++) {

                        echo "<li class='page-item " . (($i == 1) ? ("active") : ("")) . "' value='$i' onclick='pagination()'><a href='#' class='page-link'>$i</a></li>";
                    }
                    ?>
                </ol>
            </nav>
        </div>
    </div>
    <div id="info_content"></div>
    <!-- <div name="pepe" id="pepe" onclick="pagination()">eeeee</div>
    <script src="../view/js/index.js"></script> -->
    <script src="../view/js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</body>

</html>