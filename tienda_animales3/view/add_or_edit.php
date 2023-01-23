<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <form action="index.php" method="POST">
                <!--Si option es 1, no aparecerá el recuadro de id_rol-->
                <?php
                if ($option == 2) {
                    echo "<td><input type=text name=id_rol class=form-control value=" . $data_rol["id_rol"] . "></td>";
                }
                ?>
                <td>
                    <input type="text" name="rol" class="form-control" value="<?= ($option == 2) ? $data_rol["rol"] : "" ?>">
                </td>
                <td>
                    <input type="text" name="descripcion" class="form-control" value=<?= ($option == 2) ? $data_rol["descripcion"] : "" ?>>
                </td>
                <td></td>
                <td>
                    <input type="submit" value="Guardar" name="submit">
                </td>
            </form>
        </tr>
    </table>

</body>

</html>