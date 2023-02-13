    <div class="table-wrapper pl-0 my-3">
        <table class="table table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                //Mostramos la informacion
                echo "<tr>";
                    echo "<td>" . $data["id_proveedor"] . "</td>";
                    echo "<td>" . $data["nombre"] . "</td>";
                    echo "<td>" . $data["direccion"] . "</td>";
                    echo "<td>" . $data["telefono"] . "</td>";
                    echo "<td>" . $data["correo"] . "</td>";
                    echo "<td></td>";
                echo "</tr>";
                ?>
            </tbody>
        </table>
    </div>