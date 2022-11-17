<?php
$array1 = $array2 = array('IMG0.png', 'img12.png', 'img10.png', 'img2.png', 'img1.png', 'IMG3.png');

sort($array1);
echo "Ordenación estándar\n";
print_r($array1);
natcasesort($array2);
echo "\nOrdenación de orden natural (insensible a maý-mín)\n";
print_r($array2);
