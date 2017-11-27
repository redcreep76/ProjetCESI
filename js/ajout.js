$(document).ready(function() {
    var array = $("select");
    for (var i = 0; i < array.length; i++) {
        array[i].selectedIndex = -1;
    }

    $(".input-group > input").focus(function(e){
        $(this).parent().addClass("input-group-focus");
    }).blur(function(e) {
        $(this).parent().removeClass("input-group-focus");
    });

    $("input").on("input", function(evt) {
        validate(evt.target);
    });
});

function validate(field) {
    if (((field.getAttribute("required")) && (!field.value)) || ((field.getAttribute("pattern")) && (field.value) && (!new RegExp(field.getAttribute("pattern")).test(field.value)))) {
        field.setAttribute("aria-invalid", "true");
        if ($(field).parent().hasClass('input-group')) {
            $(field).parent().addClass('input-group-invalid');
        }
    } else {
        field.removeAttribute("aria-invalid");
        if ($(field).parent().hasClass('input-group')) {
            $(field).parent().removeClass('input-group-invalid');
        }
    }
}
