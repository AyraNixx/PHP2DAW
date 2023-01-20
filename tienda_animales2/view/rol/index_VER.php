<?php
$num_page = 1;
//Recuperamos del get el usuario

if (isset($_GET["idUser"])) {
    $num_page = $_GET["idUser"];
}

if(isset($_GET["ord"]))
{

}