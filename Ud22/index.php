<?php

//Para incluir un fichero tenemos include y require. La diferencia es que include coge 
//el fichero y lo mete, si no lo encuentra, pasa de ti y no mete el fichero y sigue 
//adelante. El require en cambio, te obliga a meterlo, si no lo encuentra para el php

//Ponemos la ruta del fichero al que queremos acceder.

// switch ($main_content) {
//     case MAIN_FORM:
//         include("php/body1.php");
//         break;
//     case MAIN_WELCOME:
//         include("php/body1.php");
//         break;
//     case MAIN_CATALOG:

//         include("php/body1.php");
//         break;
// }

include("php/header2.php");
include("php/body2.php");
include("php/footer2.php");
