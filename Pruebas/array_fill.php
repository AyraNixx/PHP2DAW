<?php 

    //No entiendo esto, según el manual de php, la primera
    //clave debería de ser -2 y luego empezar 0, 1, 2...
    //pero va -2, -1, 0, 1, ...
    var_dump(array_fill(-2, 9, mt_rand(1, 10)));

?>