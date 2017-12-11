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
});

function verifPattern(field, pattern = "") {
	if ((pattern) && (field.value) && (!new RegExp(pattern).test(field.value))) {
        $(field).addClass("input-invalid");
        if ($(field).parent().hasClass('input-group')) {
            $(field).parent().addClass('input-group-invalid');
        }
    } else {
        $(field).removeClass("input-invalid");
        if ($(field).parent().hasClass('input-group')) {
            $(field).parent().removeClass('input-group-invalid');
        }
    }
}

function verifPassword(password, field, pattern = "") {
	if (password.value) {
		if ((pattern) && (!new RegExp(pattern).test(password.value))) {
			$(password).addClass("input-invalid");
			$(field).addClass("input-invalid");
		} else {
			$(password).removeClass("input-invalid");
			if ((password.value.length > 0) && (password.value != field.value)) {
				$(field).addClass("input-invalid");
			} else {
				$(field).removeClass("input-invalid");
			}
		}
	} else {
		$(password).removeClass("input-invalid");
		if (field.value.length > 0) {
			$(field).addClass("input-invalid");
		} else {
			$(field).removeClass("input-invalid");
		}
	}
}
