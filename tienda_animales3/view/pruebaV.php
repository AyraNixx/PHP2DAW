<?php

namespace views;


session_start();
// if (!isset($_SESSION["activo"]) || null !== $_SESSION["activo"] && $_SESSION["activo"] !== 1) {
//     header("Location: ../views/login.php");
// }
// var_dump($producto["usuario_id"]);
// var_dump("OLA:". $datosMiProducto["tipo"]);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Editar producto</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />

    <link
      href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" type="image/png" href="../src/logoIcon.png" />
    <link rel="stylesheet" href="../style.css" />
  </head>
  <body>

  <!-- HEADER -->
  <?php include_once "../views/componentes/header.php"; ?>

  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 rounded">
        <h1 class="text-center mb-4">Añadir producto</h1>
        <form action="../controller/editProductoC.php" method="post" enctype="multipart/form-data">
            <input type='hidden' name='producto_id' value='<?= $producto["producto_id"] ?>'/>
            <input type='hidden' name='usuario_id' value='<?= $producto["usuario_id"] ?>'/>

            <div class="mb-4">
                <div class="input-container">
                    <img src="<?=$producto["foto"]?>" alt="Imagen actual" width="200" height="200">
                    <input type="file" class="form-control" id="foto" name="foto" required />
                    <input type="hidden" name="img_previa">
                    <label for="foto">Foto</label>
                </div>
            </div>
            <div class="mb-4">
                <div class="input-container">
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?=$producto["titulo"]?>" required />
                    <label for="titulo"><?=$producto["rutaimg"]?></label>
                </div>
            </div>
            <div class="mb-4">
                <div class="input-container">
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?=$producto["descripcion"]?></textarea>
                    <label for="descripcion">Descripción</label>
                </div>
            </div>
            <div class="mb-4">
                <div class="input-container">
                    <input type="number" class="form-control" id="precio" name="precio"  value="<?=$producto["precio"]?>" required />
                    <label for="numero">Precio</label>
                </div>
            </div>
            <div class="mb-4">
                <div class="input-container">
                    <select class="form-control custom-select" id="tipo" name="tipo" required>
                        <option value="" disabled>Seleccione una opción</option>
                        <option value="objeto" <?php if ($producto['tipo'] == 'objeto') echo 'selected'; ?>>Objeto</option>
                        <option value="comida" <?php if ($producto['tipo'] == 'comida') echo 'selected'; ?>>Comida</option>
                        <option value="ropa" <?php if ($producto['tipo'] == 'ropa') echo 'selected'; ?>>Ropa</option>
                        <option value="mueble" <?php if ($producto['tipo'] == 'mueble') echo 'selected'; ?>>Mueble</option>
                        <option value="otro" <?php if ($producto['tipo'] == 'otro') echo 'selected'; ?>>Otro</option>
                    </select>
                    <label for="tipo">Tipo</label>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" name="editar" value="true" class="btn btn-primary">
                    Editar artículo
                </button>
            </div>
        </form>
    </div>
  </div>

  <!-- FOOTER -->
  <?php include_once "../views/componentes/footer.php"; ?>
    
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script>
      const inputFields = document.querySelectorAll(".form-control");

      inputFields.forEach((input) => {
        input.addEventListener("focus", () => {
          input.parentNode.classList.add("focused");
        });

        input.addEventListener("blur", () => {
          if (input.value === "") {
            input.parentNode.classList.remove("focused");
          }
        });
      });

      function updateFileName(input) {
        var fileName = input.files[0].name;
        document.getElementById("file-name").textContent = fileName;
      }
    </script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <!-- import de los iconos -->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
  </body>
</html>