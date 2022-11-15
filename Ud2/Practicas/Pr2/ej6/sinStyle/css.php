<?php
echo "<style>"?>
table,
td {
/*Llamamos a la variable $bg_color y la mostramos con echo
para obtener el color de fondo seleccionado*/
background: <?= $bg_color ?>;
border: 2px solid #fff;

margin: 10px;
padding: 10px;

/*Llamamos a la variable $font y la mostramos con echo
para obtener la fuente seleccionada*/
font-family : <?= $font ?>
}
<?php echo "</style>"?>