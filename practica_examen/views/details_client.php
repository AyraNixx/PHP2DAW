</br>
<div class="table-wrapper pl-0 my-3">
    <table class="table table-striped">
        <tr>
            <th class="table-dark text-center">#</th>
            <td scope="col"><?= $data_clients["idClientes"] ?></td>
        </tr>
        <tr>
            <th class="table-dark text-center">Nombre</th>
            <td scope="col"><?= $data_clients["nombre"] ?></td>
        </tr>
        <tr>
            <th class="table-dark text-center">Precio</th>
            <td scope="col"><?= $data_clients["email"] ?></td>
        </tr>
        <tr>
            <th class="table-dark text-center">Stock</th>
            <td scope="col"><?= $data_clients["edad"] ?></td>
        </tr>
        <tr>
            <th class="table-dark text-center">Categoría</th>
            <td scope="col" id="more_details"><?= $data_clients["sexo"] ?></td>
        </tr>
    </table>
</div>