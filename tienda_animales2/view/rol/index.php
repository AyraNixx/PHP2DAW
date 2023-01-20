<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles</title>
    <link rel="stylesheet" href="../view/css/css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8d125d2b91.js" crossorigin="anonymous"></script>
    <script>
        
        function action(option)
        {
            let data = new FormData(document.forms.data_form);
            //Creamos objeto xmlhttprequest
            let xhr = new XMLHttpRequest();
            //Lo inicializamos
            switch(option)
            {
                case 1:
                    data.append("option", 1);
                    break;
                case 2:
                    data.append("option", 2);
                    break;
                case 3:
                    data.append("option", 3);
                    break;

            }
            xhr.open("POST", "../controller/index.php");
            xhr.send(data);
            xhr.onload = () => alert(xhr.response);
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-tittle">
                <div class="row">
                    <div class="col-sm-8">
                        <h2><b>Roles</b></h2>
                    </div>
                    <div class="col-sm-4 text-end">
                        <button type="button" class="btn btn-success add-new" onclick="edit_or_add(1)">
                            Añadir
                        </button>
                    </div>
                </div>
            </div>
            <table class="table table-striped">
                <thead class="table-dark text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach($data_rol as $one_rol)
                    {
                    echo "<tr>";
                    echo "<td>" . $one_rol["id_rol"] . "</td>";
                    echo "<td>" . $one_rol["rol"] . "</td>";
                    echo "<td>" . $one_rol["descripcion"] . "</td>";
                    echo "<td>";
                    ?>
                    <a class="edit" onclick="action(2)">
                        <i class="fa-solid fa-marker"></i>
                    </a>
                    <i class="text-muted">|</i>
                    <a class="delete" onclick="action(3)">
                        <i class="fa-solid fa-trash-can"></i>
                    </a>
                    <form name="data_form">
                        <input type="hidden" name="id_rol" value="1">
                        <input type="hidden" name="rol"value="1">
                        <input type="hidden" name="descripcion"value="1">
                    </form>
                    <?php
                    echo "</td>";
                    echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="detUser"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>