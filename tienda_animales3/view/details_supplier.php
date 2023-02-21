    <br>    
    <div class="table-wrapper pl-0 my-3">
        <table class="table table-striped">
            <tr>
                <th class="table-dark text-center col-1" >#</th>
                <td scope="col"><?= $data["id_proveedor"] ?></td>
            </tr>
            <tr>
                <th class="table-dark text-center col-1">Nombre</th>
                <td scope="col"><?= $data["nombre"] ?></td>
            </tr>
            <tr>
                <th class="table-dark text-center col-1">Dirección</th>
                <td scope="col"><?= $data["direccion"] ?></td>
            </tr>
            <tr>
                <th class="table-dark text-center col-1">Teléfono</th>
                <td scope="col"><?= $data["telefono"] ?></td>
            </tr>
            <tr>
                <th class="table-dark text-center col-1">Correo</th>
                <td scope="col"><?= $data["correo"] ?></td>
            </tr>
        </table>
    </div>