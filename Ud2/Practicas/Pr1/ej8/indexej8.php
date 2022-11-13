<?php
//Comprobamos que el POST no venga vacío
if (isset($_POST)) {

    $header = $_POST["header"];
    $body = $_POST["body"];
    $footer = $_POST["footer"];
    $style = $_POST["style"];

    require("global/global.php");

    //Hacemos un switch para que dependiendo de que elijamos se ponga una cabecera u otra
    switch ($header) {
        case HEADER_1:
            include("php/header1.php");
            break;
        case HEADER_2:
            include("php/header2.php");
            break;
        case HEADER_3:
            include("php/header3.php");
            break;
    }
    switch ($style) {
        case STYLE_1:            
            echo "<link rel='stylesheet' href='css/style1.css'>";
            echo "</head>";
            break;
        case STYLE_2: 
            echo "<link rel='stylesheet' href='css/style2.css'>";
            echo "</head>";
            break;
        case STYLE_3: 
            echo "<link rel='stylesheet' href='css/style3.css'>";
            echo "</head>";
            break;
    }
    //Hacemos un switch para que dependiendo de que elijamos se ponga un cuerpo u otro
    switch ($body) {
        case BODY_1:
            include("php/body1.php");
            break;
        case BODY_2:
            include("php/body2.php");
            break;
        case BODY_3:
            include("php/body3.php");
            break;
    }
    //Hacemos un switch para que dependiendo de que elijamos se ponga un footer u otro
    switch ($footer) {
        case FOOTER_1:
            include("php/footer1.php");
            break;
        case FOOTER_2:
            include("php/footer2.php");
            break;
        case FOOTER_3:
            include("php/footer3.php");
            break;
    }
}
