<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
</head>

<body>
    <main>

        <div class="container h-100" >

            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <i onclick="cargarDatos(2)"> 2   Pedro Suarez</i>
                </div>
                <!--Div en el que se van a mostrar los detalles-->
                <div class="col-lg-12 col-xl-11" id="details">
                    
                </div>
            </div>

        </div>

    </main>
    <script>

        function cargarDatos(idUser)
        {
            //En caso de que el usuario venga vacío, ponemos en blanco el id
            if(idUser == "")
            {
                //Borramos el contenido del div si no tenemos id del usuario
                document.getElementById("details").innerHTML = "";
            //En caso contrario, que tengamos un id de usuario
            }else{
                //Creamos un elemento ajax para poder cargar desde el servidor un
                //código sin tener que realizar una petición get o post completa
                var xmlHtmlDoc = new XMLHttpRequest();

                //Enviamos los resultados de nuestra httprequest al contenido del div con
                //id 'details'.
                if(xmlHtmlDoc.onreadystaState == 4 && this.status == 200)
                {
                    document.getElementById("details").innerHTML = this.responseText
                    
                }


            }
            //Primer argumento, el método de envío (GET O POST)
            //Segundo la página a la que se va enviar
            //El tercero, indica si es asíncrono.
            //Cuando se ejecute la petición http, llamamos a la página cargarDatos.php.
            //Enviandole el id de usuario y ejecutando de forma asíncona 
            xmlHtmlDoc.open("GET", "cargarDatos.php?idUser="+idUser, true);
            //Realiza la petición http
            xmlHtmlDoc.send();
        }
    </script>
</body>

</html>