    <div class="table-wrapper pl-0 my-3">
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
                //Mostramos la informacion
                echo "<tr>";
                echo "<td>" . $data["id_rol"] . "</td>";
                echo "<td>" . $data["rol"] . "</td>";
                echo "<td>" . $data["descripcion"] . "</td>";
                echo "<td>";
                echo "</td>";
                echo "</tr>";
                ?>
            </tbody>
        </table>
    </div>