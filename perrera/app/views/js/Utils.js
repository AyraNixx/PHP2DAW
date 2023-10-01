//------------------------------     DROPDOWN BUTTON    ------------------------------
// 
// 
// Si los elementos con btn-options tienen la clase show, la quitan, en caso contrario, la ponen
function show_btn_options()
{
    $(".btn-dropdown-options").toggleClass("show-block");
}

// //Si hace click fuera del div, se cierra porque le quitamos la clase show-block
// $(document).on("click", function(event) {
//     if($(".btn-dropdown-options").hasClass("show-block"))
//     {
//         $(".btn-dropdown-options").removeClass("show-block");
//     }
// });

