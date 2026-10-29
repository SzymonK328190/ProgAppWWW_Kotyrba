let animation1_bigger = false;
document.getElementById("button-1").setAttribute("aria-pressed", animation1_bigger);

$('#button-1').on("click", function() {
    $(this).stop(true, false);
    if(!animation1_bigger) {
        $(this).animate({
            width: "240",
            height: "160"
        }, 300, function() {});
    } else {
        $(this).animate({
            width: "160",
            height: "80"
        }, 300, function() {});
    }
    animation1_bigger = !animation1_bigger;
    document.getElementById("button-1").setAttribute("aria-pressed", animation1_bigger);
});

let button2_cursor = false;
let button2_focus = false;

$('#button-2').on('focus', function() {
    button2_focus = true;
    $(this).stop(true, false);
    $(this).animate({
        width: "220",
        height: "120"
    }, 300, function() {});
})

$('#button-2').on("mouseenter", function() {
    button2_cursor = true;
    $(this).stop(true, false);
    $(this).animate({
        width: "220",
        height: "120"
    }, 300, function() {});
});

$('#button-2').on("blur", function() {
    button2_focus = false;
    if(button2_cursor) return;
    $(this).stop(true, false);
    $(this).animate({
        width: "160",
        height: "80"
    }, 300, function() {});
});

$('#button-2').on("mouseleave", function() {
    button2_cursor = false;
    if(button2_focus) return;
    $(this).stop(true, false);
    $(this).animate({
        width: "160",
        height: "80"
    }, 300, function() {});
});

let button3_steps = 0;
$('#button-3').on("click", function() {
    $(this).animate({

    }, 300, function() {});
});