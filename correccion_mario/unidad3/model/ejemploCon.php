<?php


$conPDO=null;
try {
    require_once("../global.php");
    $conPDO = new PDO("mysql:host=".$DB_SERVER."dbname=".$DB_SCHEMA."tienda", $DB_USER, $DB_PASSWD);
 } catch (PDOException $e) {
    print "¡Error al conectar!: " . $e->getMessage() . "<br/>";
    return $conPDO;
    die();
}


