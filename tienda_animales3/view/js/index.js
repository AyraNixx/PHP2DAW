//Funcion que muestra más detalles de un elemento seleccionado de la tabla
function details(id, url) {

    //Creamos objeto xmlhttprequest
    let xhr = new XMLHttpRequest();

    //Cada vez que haya un cambio de estado, se llama a la funcion
    xhr.onreadystatechange = () => {
        //Cuando el estado de nuestra peticion sea 4 (completa) y el estado sea 200
        //(éxito)
        if (xhr.readyState == 4 && xhr.status == 200) {
            //Mostramos la respuesta a la peticion en el elemento info_content
            $("#info_content").html(xhr.response);
        }
    }

    //Preparemos la peticion, indicando el metodo y la url
    xhr.open("POST", url, true);

    //Creamos un nuevo objeto de la clase FormData
    let data = new FormData();
    //Añadimos nuevos valores con sus claves
    data.append("submit", 4);
    data.append("id", id);


    // //Para poder ver el contenido de un formdata(por si tenemos algun problema)
    // // console.log(data.entries());
    // for(var par of data.entries())
    // {
    //     console.log(par);
    // }



    //Enviamos la peticion con los datos que queremos pasarle
    xhr.send(data);
}


$(document).on("click", function (e) {

    // //Si el elemento al que le hacemos click tiene la clase pag
    if ($(e.target).hasClass("filter")) {

        // //Obtenemos el numero de página que es aquel que tenga la clase active
        let page = $(".active").first().text();
        //Obtenemos la url del nodo padre (que es la etiqueta a)
        let url = $(e.target).parent().attr("href");

        //Si el nodo padre tiene la clase asc
        if ($(e.target).parent().hasClass("asc")) {

            //concatenamos la url
            url = url + ("&ord=DESC&page=" + page);
            //Le pasamos la nueva url
            $(e.target).parent().attr("href", url);

        } else if ($(e.target).parent().hasClass("desc")) {
            //concatenamos la url
            url = url + ("&ord=ASC&page=" + page);
            //Le pasamos la nueva url
            $(e.target).parent().attr("href", url);
        }
    }
});


$(document).on("ready", function () {

    //Se añadirán más a medida que se necesiten
    $("#form").on("submit", function () {
        let inputs = $(this).find(":input");

        //Recorremos el array
        for (let i = 0; i < inputs.length; i++) {
            //Guardamos el valor
            let val = $(inputs[i]).val();

            //Guardamos el tipo de input
            let type = $(inputs[i]).attr("type");



            //Si type es igual a email
            if (type == "email") {
                //Creamos la expresión regular (EXPLICADA ABAJO CON TODOS LOS DETALLES)
                //^-> Inicio
                //$-> Final
                //\w-> Caracter (a-zA-Z0-9)
                //+ -> una o más veces
                //() -> agrupaciones
                //[] -> set de posibles caracteres
                //\. -> Un punto normal, no se pone solo . porque esto indica un caracter
                //cualquiera
                //? -> Puede aparecer una vez o ninguna el caracter o agrupación anterior
                //* -> Cero o más de una vez.
                //{2,4} el rango de veces que puede salir el caracter, símbolo o agrupación
                //anterior
                if (!/^\w+([\.-_]?\w+)*@\w+([\.-_]?\w+)*(\.\w{2,4})+$/.test(val)) {
                    alert("Correo no válido. Ejemplo: example@server.com");
                    return false;
                }

            }

            //Si type es igual a tel
            if (type == "tel") {
                //Creamos la expresión regular (EXPLICADA ABAJO CON TODOS LOS DETALLES)
                //^-> Inicio
                //$-> Final
                //\d-> dígito (0-9)
                //{}-> El número de veces que queremos que se repita
                //() -> agrupaciones                
                //[] -> set de posibles caracteres
                //\s -> espacio en blanco
                //- -> guión
                //? -> Puede aparecer una vez o ninguna el caracter o agrupación anterior
                if (!/^\d{3}(([\s-])?\d{2}){3}$/.test(val)) {
                    alert("Formato de teléfono no válido!");
                    return false;
                }
            }

            // //Si type es igual a file
            // if (type == "file") {
            //     // Obtener el valor del campo de entrada de tipo file
            //     let fileInput = $(inputs[i]).get(0);
            //     let file = fileInput.files[0];

            //     // Verificar si el archivo está vacío
            //     if (!file) {
            //         alert("Seleccione un archivo antes de enviar el formulario.");
            //         return false;
            //     }
            // }
        }

        //En caso de que esté todo correcto
        return true;

    })
});


$(document).on("submit", function(){
    alert("hola");
})



