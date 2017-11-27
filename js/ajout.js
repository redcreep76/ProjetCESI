var array = $("select");
for (var i = 0; i < array.length; i++) {
    array[i].selectedIndex = -1;
}

//console.log($("input.name"));

$("input.price").on("input", function(evt) {
    validate(evt.target);
});

$(document).ready(function() {
    //console.log($(".input-group > input"));
    $(".input-group > input").focus(function(e){
            $(this).parent().addClass("input-group-focus");
        }).blur(function(e) {
            $(this).parent().removeClass("input-group-focus");
        });
});





function verifName(input) {
    if (input.value.length == 0) {
        $(input).css("background", "#eee");
    } else {
        $(input).css("background", "#fff");
    }
}

function verifSelect(input) {
}

function validate(field) {
    $(field).css("background", (field.value ? "#fff" : "#eee"));

    if (((field.getAttribute("required")) && (!field.value)) || ((field.getAttribute("pattern")) && (field.value) && (!new RegExp(field.getAttribute("pattern")).test(field.value)))) {
        field.setAttribute("aria-invalid", "true");
    } else {
        field.removeAttribute("aria-invalid");
    }
}
