</br>
<div class="table-wrapper pl-0 my-3">
    <table class="table table-striped">
        <tr>
            <th class="table-dark text-center">#</th>
            <td scope="col"><?= $data["id_producto"] ?></td>
        </tr>
        <tr>
            <th class="table-dark text-center">Nombre</th>
            <td scope="col"><?= $data["nombre"] ?></td>
        </tr>
        <tr>
            <th class="table-dark text-center">Precio</th>
            <td scope="col"><?= $data["precio"] ?></td>
        </tr>
        <tr>
            <th class="table-dark text-center">Stock</th>
            <td scope="col"><?= $data["stock"] ?></td>
        </tr>
        <tr>
            <th class="table-dark text-center">Categoría</th>
            <td scope="col" id="more_details"><?= $data["categoria"] ?></td>
        </tr>
        <tr>
            <?php
            echo "<th class='table-dark text-center'>Foto/s</th>";
            echo "<td scope='col' class='text-center'>";
            echo "<img src='" . $data["foto"] . "' alt='img' width=350px >";
            echo "</td>";
            ?>
        </tr>
    </table>
</div>