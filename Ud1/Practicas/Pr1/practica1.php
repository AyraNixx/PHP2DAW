<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        # EJERCICIO 7
       $dado10 = rand(1, 10);
       $dado20 = rand(1, 20);
       $dado100 = rand(1, 100);

       echo "DADO 10 --> " . $dado10 . "<br>DADO 20 --> " . 
           $dado20 . "<br>DADO 100 --> " . $dado100;


    



        #EJERCICIO 8
        $random1 = rand(1, 1000) / 10;
        $random2 = rand(1, 1000) / 10;

        echo "<br> Los numeros obtenidos son: 
            <br> \t- Num 1 = " . $random1 . "<br> \t- Num 2 = " . $random2;

        echo "<br> Conversión directa: <br> \t- Num 1 = " . (int)$random1 . 
            "<br> \t- Num 2 = " . (int)$random2;

        echo "<br> Redondeo: <br> \t- Num 1 = " . round($random1) . 
            "<br> \t- Num 2 = " . round($random2);

            
    



        #EJERCICIO 9
        $name = "Juan";
        $direction = "Avd. de los Liberadores";

        echo "$name's address is $direction";     
        
        

        #EJERCICIO 10
        //Asignación de varios valores (Asociativos)
        //$alumnos = array("Juan" => 8, "Marina", 2.1);
        //echo $alumnos["Juan"];


        //EXAMEN --> VIERNES

        $notas = array(
            array("Matematicas", 8.712),
            array("Lengua", 2.718),
            array("Matematicas", 6.451),
            array("Matematicas", 9.011),
            array("Lengua", 5.819)
        );

        $mates = 0; $mc = 0;
        $leng = 0; $lc = 0;

        for($i = 0; $i < count($notas); $i++)
        {
            if($notas[$i][0] == "Matematicas")
            {
                $mates = $mates + $notas[$i][1];
                $mc++;
            }else{
                $leng = $leng + $notas[$i][1];
                $lc++;
            }
        }

        echo "Media Matemáticas: " . round(($mates/$mc), 1);
        echo "<br>Media Lengua: " . round(($leng/$lc), 1);


    ?>
</body>
</html>