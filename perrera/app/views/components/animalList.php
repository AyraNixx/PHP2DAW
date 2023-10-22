<div class="w-100" style="overflow: auto; max-height:700px;">
    <table id="list-container" class="table table-striped mb-0" style="vertical-align:middle">
        <thead>
            <tr>
                <th style="width:12em;">
                    <div class="d-flex align-items-end justify-content-start">
                        <span>Nombre</span>
                        <button class="btn btn-link sort-btn p-0" data-field="nombre" data-ord="asc">
                            <i class="fas fa-sort"></i>
                        </button>
                    </div>
                </th>
                <th>
                    <div class="d-flex align-items-end justify-content-start">
                        <span>Especie</span>
                        <button class="btn btn-link sort-btn p-0" data-field="nombre_especie" data-ord="asc">
                            <i class="fas fa-sort"></i>
                        </button>
                    </div>
                </th>
                <th>
                    <div class="d-flex align-items-end justify-content-start">
                        <span>Raza</span>
                        <button class="btn btn-link sort-btn p-0" data-field="raza" data-ord="asc">
                            <i class="fas fa-sort"></i>
                        </button>
                    </div>
                </th>
                <th>
                    <div class="d-flex align-items-end justify-content-start">
                        <span style="width: max-content;">Fecha de nacimiento</span>
                        <button class="btn btn-link sort-btn p-0" data-field="fech_nac" data-ord="asc">
                            <i class="fas fa-sort"></i>
                        </button>
                    </div>
                </th>
                <th>
                    <span class="d-flex" style="width: max-content;">Estado adopción</span>
                </th>
                <th>Jaula</th>
                
                <th class='text-center' colspan="2"></th>
                <!-- <th class='text-center' colspan="2"></th> -->
            </tr>
        </thead>
        <tbody>

            <?php

            //Recorremos el array data
            foreach ($data_visible as $dato) {
                $url = "AnimalC.php"; //URL destino

                echo "<tr>";
                echo "<td id='showRegister' value='" . $dato["id"] . "'>" . $dato["nombre"] . "</td>";
                echo "<td>" . $dato["nombre_especie"] . "</td>";
                echo "<td>" . $dato["raza"] . "</td>";
                echo "<td>" . $dato["fech_nac"] . "</td>";
                echo "<td>" . $dato["estado_adopcion"] . "</td>";
                echo "<td>" . $dato["ubicacion"] . "</td>";
                echo "<td class='ps-4 pe-2'>";
            ?>
                <form action="<?= $url ?>" method="post" class="p-0">
                    <input type="hidden" name="id" value="<?= $dato["id"] ?>">
                    <button value="add_or_update" name="action" class="border-0 bg-transparent text-success">
                        <i class="fa-solid fa-marker"></i>
                    </button>
                </form>
                <?php
                echo "</td>";
                echo "<td>|</td>";
                echo "<td class='ps-2 pe-4'>";
                ?>
                <form action="<?= $url ?>" method="POST" class="p-0">
                    <input type="hidden" name="id" value="<?= $dato["id"] ?>">
                    <button value="sdelete" name="action" class="border-0 bg-transparent text-danger">
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