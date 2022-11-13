<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--ESTILO RÁPIDO PARA LA TABLA-->
    <style>
        table,
        td,
        th {
            font-family: Arial, Helvetica, sans-serif;
            font-size: small;

            border: 1px solid;
            padding: 3px;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <?php
    //Comprobamos que $_POST no está vacío
    if (isset($_POST)) {

        //Definimos una variable para guardar el nombre
        $name = $_POST["name"];

        //Definimos tres variables para guardar la selección del género, edad
        //y salario
        $sex = $_POST["sex"];
        $age = $_POST["age"];
        $salary = $_POST["salary"];


        //Creamos una función llamada background que recibe como parámetro una
        //variable.
        //En esta función comprobaremos qué celda de la tabla tiene un color distinto
        function background($variable)
        {
            global $sex, $age, $salary;

            //Con un condicional, comprobamos si la variable que se ha pasado 
            //concuerda con la del género
            if ($variable === $sex) {
                //Si concuerda, comparamos la variable con $sex, si no coinciden, devuelve
                //none. Si coincide, devuelve el siguiente color, #E8F8D1
                return (strcmp($variable, $sex)) ? 'none' : '#E8F8D1';
                //Si no es igual a género, comprobamos age y hacemos lo mismo que arriba
            } elseif ($variable === $age) {
                return (strcmp($variable, $age)) ? 'none' : '#E8F8D1';
                //Si tampoco es la de género vemos si es la de salario
            } elseif ($variable === $salary) {
                return (strcmp($variable, $salary)) ? 'none' : '#E8F8D1';
            }
        }
    } else {
        echo "Ha ocurrido un error";
    }
    ?>

    <table>
        <tr>
            <td colspan="2">NOMBRE</td>
            <td colspan="2"><?php echo $name; ?></td>
        </tr>
        <tr>
            <!--Llamamos a la función background desde el atributo style. Para ver si 
                el contenido de la celda coincide con el de los datos que nos han llegado,
                si coincide, se pintará la casilla de la tabla-->
            <td colspan="2" style="background-color: <?= background("hombre") ?>;">HOMBRE</td>
            <td colspan="2" style="background-color: <?= background("mujer") ?>;">MUJER</td>
        </tr>
        <tr class="salaryC">
            <td style="background-color: <?= background("0-1200") ?>;">0-1200</td>
            <td style="background-color: <?= background("12000-20000") ?>;">12000-20000</td>
            <td style="background-color: <?= background("21000-35000") ?>;">21000-35000</td>
            <td style="background-color: <?= background("+35000") ?>;">+35000</td>
        </tr>
        <tr class="ageC">
            <td style="background-color: <?= background("0-25") ?>;">0-25</td>
            <td style="background-color: <?= background("25-45") ?>;">25-45</td>
            <td style="background-color: <?= background("45-65") ?>;">45-65</td>
            <td style="background-color: <?= background("JUBILADO") ?>;">JUBILADO</td>
        </tr>
    </table>

</body>

</html>