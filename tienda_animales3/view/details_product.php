</br>
<div class="table-wrapper pl-0 my-3">
    <table class="table table-striped">
        <tr>
            <th class="table-dark text-center">#</th>
            <td scope="col"><?= $data_product["id_producto"] ?></td>
        </tr>
        <tr>
            <th class="table-dark text-center">Nombre</th>
            <td scope="col"><?= $data_product["nombre"] ?></td>
        </tr>
        <tr>
            <th class="table-dark text-center">Precio</th>
            <td scope="col"><?= $data_product["precio"] ?></td>
        </tr>
        <tr>
            <th class="table-dark text-center">Stock</th>
            <td scope="col"><?= $data_product["stock"] ?></td>
        </tr>
        <tr>
            <th class="table-dark text-center">Categoría</th>
            <td scope="col" id="more_details"><?= $data_product["categoria"] ?></td>
        </tr>
        <tr>
            <?php
            echo "<th class='table-dark text-center'>Foto/s</th>";
            echo "<td scope='col' class='text-center'>";
            echo "<img src='" . $data_product["foto"] . "' alt='img' width=350px >";
            echo "</td>";
            ?>
        </tr>
    </table>
</div>