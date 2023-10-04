//------------------------------     DROPDOWN BUTTON    ------------------------------
// 
// 
// Si los elementos con btn-options tienen la clase show, la quitan, en caso contrario, la ponen
function show_btn_options() {

    $(".button-dropdown i").toggleClass("fa-caret-down fa-caret-up");
    $(".btn-dropdown-options").toggleClass("show-block");
}

// //Si hace click fuera del div, se cierra porque le quitamos la clase show-block
$(document).on("click", function (event) {
    if (!$(event.target).closest('.button-dropdown').length) {
        $(".button-dropdown i").removeClass("fa-caret-up").addClass("fa-caret-down");
        $(".btn-dropdown-options").removeClass("show-block");
    }
});


//-----------------------------     TABS    ------------------------------
//
//
function open_tab() {
    var tabName, tabContent;

    tabContent = $('.tab-content');
}



//----------------------------      FORM VALIDATIONS ------------------------
//
//
$(function () {       // when the page is ready
    // EMAIL VALIDATION
    $("input[type=email]").on("blur", function () {
        let emailPattern = /^[\w\.-]+@[a-zA-Z\d\.-]+\[a-zA-Z]{2,}$/;
        if (!emailPattern.test($(this).val())) {
            return false; // NEEDS TO BE MODIFIED
        }
    });


    // PASSWORD VALIDATION
    $("input[type=password]").on("blur", function () {
        let passwdPattern = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;
        if (!passwdPattern.test($(this).val())) {
            return false; // NEEDS TO BE MODIFIED
        }
    });


    // NAME VALIDATION
    $("input[type=password]").on("blur", function () {
        let passwdPattern = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;
        if (!passwdPattern.test($(this).val())) {
            return false; // NEEDS TO BE MODIFIED
        }
    });

    // TLF VALIDATION
    $("input[type=tel]").on("blur", function () {
        let tlfPattern = /^(\(\+?\d{2,3}\)[\*|\s|\-|\.]?(([\d][\*|\s|\-|\.]?){6})(([\d][\s|\-|\.]?){2})?|(\+?[\d][\s|\-|\.]?){8}(([\d][\s|\-|\.]?){2}(([\d][\s|\-|\.]?){2})?)?)$/;
        if (!tlfPattern.test($(this).val())) {
            return false; // NEEDS TO BE MODIFIED
        }
    });




});