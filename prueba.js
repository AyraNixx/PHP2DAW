// $(document).on("ready", function(){

//     $("#form").on("submit",  function () 
//     {
//         let inputs = $(this).find(":input");
        
//         //Recorremos el array
//         for(let i = 0; i < inputs.length; i++)
//         {
//             //Guardamos el valor
//             let val = $(inputs[i]).val();
            
//             //Guardamos el tipo de input
//             let type = $(inputs[i]).attr("type");

            

//             //Si type es igual a email
//             if(type == "text")
//             {
//                 //Creamos la expresión regular (EXPLICADA ABAJO CON TODOS LOS DETALLES)
//                 //^-> Inicio
//                 //$-> Final
//                 //\w-> Caracter (a-zA-Z0-9)
//                 //+ -> una o más veces
//                 //() -> agrupaciones
//                 //[] -> set de posibles caracteres
//                 //\. -> Un punto normal, no se pone solo . porque esto indica un caracter
//                 //cualquiera
//                 //? -> Puede aparecer una vez o ninguna el caracter o agrupación anterior
//                 //* -> Cero o más de una vez.
//                 //{2,4} el rango de veces que puede salir el caracter, símbolo o agrupación
//                 //anterior
//                 if(!/^\w+([\.-_]?\w+)*@\w+([\.-_]?\w+)*(\.\w{2,4})+$/.test(val))
//                 {
//                     alert("Correo no válido. Ejemplo: example@server.com");
//                     return false;
//                 }
                
//             }

//         }

//         //En caso de que esté todo correcto
//         return true;

//     })
// });