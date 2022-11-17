<?php
$números = range(1, 20);
shuffle($números);
foreach ($números as $número) {
    echo "$número ";
}
?>