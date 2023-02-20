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
})



