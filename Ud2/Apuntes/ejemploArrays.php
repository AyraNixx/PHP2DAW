<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?php
    $diasSema = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];

    $modulos = [["DES", "EINEM", "DEC", "IMP", "DIS"], ["DES", "EINEM", "DEC", "IMP", "DIS"], ["DES", "EINEM", "DEC", "IMP", "DIS"], ["DES", "EINEM", "DEC", "IMP", "DIS"], ["DES", "EINEM", "DEC", "IMP", "DIS"]];
    ?>

    <table>
        <!--Primera fila-->
        <thead>
            <tr>
                <?php

                //Ponemos primero el array y despues la variable en la que se va a ir
                //metiendo cada elemento del array
                foreach ($diasSema as $dia) {
                    print("<th> $dia </th>");
                }

                ?>
            </tr>
        </thead>

        <tr>
            <?php
            //Ponemos primero el array y despues la variable en la que se va a ir
            //metiendo cada elemento del array
            foreach ($modulos[0] as $clase) {
                print("<td> $clase </td>");
            }
            ?>
        </tr>
        <?php
        //UNA FORMA DE HACERLO
        for ($i = 0; $i < count($modulos); $i++) {
            print("<tr>");
            //Ponemos primero el array y despues la variable en la que se va a ir
            //metiendo cada elemento del array
            foreach ($modulos[$i] as $clase) {
                print("<td> $clase </td>");
            }
            print("</tr>");
        }

        //OTRA FORMA 
        //Cogemos el array modulos y guardamos cada elemento en la variable clases. 
        //Recordemos que los elementos que componen el array modulos son arrays.
        foreach ($modulos as $clases) {
            //Creamos la etiqueta tr para cada elemento
            print("<tr>");
            //Ponemos primero el array y despues la variable en la que se va a ir
            //metiendo cada elemento del array
            //Recorremos el array elemento del array de modulos
            foreach ($clases as $clase) {
                print("<td> $clase </td>");
            }
            print("</tr>");
        }
        ?>
    </table>
</body>

</html>