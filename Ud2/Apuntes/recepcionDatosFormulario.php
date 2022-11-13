<?php

//Siempre nos tenemos que asegurar primero si el parámetro que nos han enviado existe
//por lo que usamos la función isset() que nos dice si algo es nulo o no

//Un array que recibe todo lo enviado por GET(?)
//Es un array asociativo
//Para recuperar una variable que nos envía un formulario
//utilizamos la supervariable $_GET que contiene todos los datos
echo $_GET["name"];

//Para recuperar una variable que nos envia un formulario
//utilizamos la supervariable $_POST que contiene todos los datos
echo $_POST["name"];

//Supervariable que tiene tanto get como post
echo $_REQUEST["name"];


//Por qué diablos tenemos POST Y GET??
    // - Cuando enviamos algo por POST, no se ve nada en la url por lo que es más seguro
    //   por lo que, por defecto, usaremos POST.
    //   GET tiene un tamaño más limitado, por lo que si quieres enviar cosas como imágenes
    //   pues empleas POST.


//Antes de utilizar un valor de un formulario es importante comprobar que la variable 
//tiene contenido y también limpiarla de posibles códigos peligrosos y caracteres 
//extraños.

//Empleamos el condicional
if (isset($_POST["name"]))
{
    echo "Se ha pasado 'name' mediante POST y su valor es {$_POST["name"]}";
    //Este por ejemplo, se mostrará en el POST porque se ha realizado un post
}else{
    echo "El POST no tiene variable name";
    //Este por ejemplo, fallará en el get porque no se ha hecho un post
}

?>