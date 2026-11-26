let animation1_bigger = false;
document.getElementById("button-1").setAttribute("aria-pressed", animation1_bigger);
const matchMediaVar = window.matchMedia('(prefers-reduced-motion: reduce)');

$.fx.off = matchMediaVar.matches;

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
const counter = document.querySelector('#button-3-counter')
$('#button-3').on("click", function() {
    if($(this).is(":animated") || button3_steps >= 5) return;
    button3_steps += 1;
    counter.textContent = `${button3_steps}`
    $(this).animate({
        width: `${160 + 20*button3_steps}`,
        height: `${80 + 10*button3_steps}`
    }, 300, function() {});
});

$('#reset-button').on("click", function() {
    $('#button-1').stop();
    $('#button-1').css({
            width: "160",
            height: "80"
    });
    $('#button-3').stop();
    $('#button-3').css({
        width: "160",
        height: "80"
    })
    counter.textContent = "0";
    animation1_bigger = false;
    button3_steps = 0;
    document.getElementById("button-1").setAttribute("aria-pressed", animation1_bigger);
})

const serverStatus = $("#server-status");
const buttonCheckServer = $("#button-check-server");
$('#button-check-server').on("click", function(e) {
    e.preventDefault();
    buttonCheckServer.prop('disabled', true);
    serverStatus.text("Oczekiwanie na odpowiedź z serwera...");
    $.ajax({url: 'status.php', method: 'GET', dataType: 'text', timeout: 5000})
    .done(function (data) {
        serverStatus.text(data)
    })
    .fail(function() {
        serverStatus.text("Nie otrzymano odpowiedzi z serwera");
    })
    .always(function() {
        buttonCheckServer.prop('disabled', false);
    })
})