    <div class="table-wrapper pl-0 my-3">
        <table class="table table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Foto/s</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                //Mostramos la informacion
                echo "<tr>";
                echo "<td>" . $data["id_producto"] . "</td>";
                echo "<td>" . $data["nombre"] . "</td>";
                echo "<td>" . $data["precio"] . "</td>";
                echo "<td>" . $data["stock"] . "</td>";
                echo "<td>" . $data["categoria"] . "</td>";
                echo "<td>";

                $imgs = unserialize($data["foto"]);

                for ($i = 0; $i < count($imgs); $i++) {
                    echo "<img src='".$imgs[$i]."' alt='foto' width=100px height=50px>";
                }

                echo "</td>";
                echo "<td></td>";
                echo "</tr>";
                ?>
            </tbody>
        </table>
    </div>