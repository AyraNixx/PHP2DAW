//------------------------------     DROPDOWN BUTTON    ------------------------------
// 
// 
// Si los elementos con btn-options tienen la clase show, la quitan, en caso contrario, la ponen
function show_btn_options()
{

    $(".button-dropdown i").toggleClass("fa-caret-down fa-caret-up");    
    $(".btn-dropdown-options").toggleClass("show-block");
}

// //Si hace click fuera del div, se cierra porque le quitamos la clase show-block
$(document).on("click", function(event) {
    if (!$(event.target).closest('.button-dropdown').length) {
        $(".button-dropdown i").removeClass("fa-caret-up").addClass("fa-caret-down");
        $(".btn-dropdown-options").removeClass("show-block");
    }
});


//-----------------------------     TABS    ------------------------------
//
//
function open_tab()
{
    var tabName, tabContent;

    tabContent = $('.tab-content');
}
