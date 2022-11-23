<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=-, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

    //Recuperamos del Get el usuario
    if(isset($_GET["idUser"]))
    {
        $idUser = $_GET["idUser"];


        //Tendríamos que acceder a BD pero no lo hemos visto

        //Directamente, si id es 2, mostramos los datos de un 
        //usuario inventado
        if($idUser == 2)
        {
            print_r("Pedro Suarez vive en España y tiene 34 años");
        }

    }else{
        print_r("Error de carga");
    }
    
    
    ?>
</body>
</html>