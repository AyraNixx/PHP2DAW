<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script>
        function cargarDatos(idUser) {

            if (idUser == "") {
                //Borramos el contenido del div si no tenemos id de usuario
                document.getElementById("detUser").innerHTML = "";
            } else {

               
                //Creamos un elemento ajax para poder cargar
                //desde el servidor codigo sin tener que realizar una
                //peticion post o get completa
                var xmlHttpDoc = new XMLHttpRequest();

                //Enviamos los resultados de nuestra httprequest al contenido
                //del div con id detUser
                xmlHttpDoc.onreadystatechange = function() {
                   
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("detUser").innerHTML = this.responseText;
                    }
                };
                //Cuando se ejecute la peticion http, llamamos a la pagina cargarDatos.php
                //Enviandole el id de usuario y ejecutando de forma asincrona (ultimo parametro)
                xmlHttpDoc.open("GET","cargarDatos.php?idUser="+idUser,true);
                //Realiza la peticion http
                xmlHttpDoc.send();


            }
        }
    </script>

</head>

<body>
    <main>

        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">

                    <a  onclick="cargarDatos(2)">2 Pedro Suarez</a>

                </div>
                <div id="detUser"  class="row d-flex justify-content-center align-items-center h-100">



                </div>

            </div>

        </div>

    </main>


</body>

</html>