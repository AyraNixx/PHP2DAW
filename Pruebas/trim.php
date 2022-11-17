<?php

$text   = "\t\tThese are a few words :) ...  ";
$binary = "\x09Example string\x0A";
$hello  = "Hello World";
var_dump($text, $binary, $hello);

print "\n";

$trimmed = trim($text);
var_dump($trimmed);

$trimmed = trim($text, " \t.");
var_dump($trimmed);

$trimmed = trim($hello, "Hdle");
var_dump($trimmed);

$trimmed = trim($hello, 'HdWr');
var_dump($trimmed);

// Elimina los caracteres de control ASCII al inicio y final de $binary
// (from 0 to 31 inclusive)
$clean = trim($binary, "\x00..\x1F");
var_dump($clean);

/*

Parámetros ¶
str
La cadena que será recortada.

character_mask
De manera opcional, los caracteres a ser eliminados pueden ser especificados usando el parámetro character_mask. Simplemente lista todos los caracteres que se quieran eliminar. Se puede especificar un rango de caracteres usando ...

*/
?>