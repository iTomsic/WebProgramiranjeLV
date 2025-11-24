$(function() {

    var startCrvena = $("#kockaCrvena").position();
    var startCrna = $("#kockaCrna").position();

    $(".draggable").draggable({
        revert: "invalid", 
        containment: "body"
    });

    $("#crvena").droppable({

        accept: "#kockaCrvena",
        drop: function(event, ui) {

            var container = $(this);
            var top = (container.height() - ui.draggable.height()) / 2;
            var left = (container.width() - ui.draggable.width()) / 2;
            ui.draggable.position({
                my: "left top",
                at: "left+" + left + " top+" + top,
                of: container,
                collision: "fit"

            });
            ui.draggable.draggable("disable");
        }
    });

    $("#crna").droppable({
        accept: "#kockaCrna",
        drop: function(event, ui) {

            var container = $(this);
            var top = (container.height() - ui.draggable.height()) / 2;
            var left = (container.width() - ui.draggable.width()) / 2;
            ui.draggable.position({
                my: "left top",
                at: "left+" + left + " top+" + top,
                of: container,
                collision: "fit"

            });
            ui.draggable.draggable("disable"); 
        }
    });

    $(".draggable").on("dragstop", function(event, ui) {

        if ($(this).attr("id") === "kockaCrna") {
            if (!$("#crna").droppable("instance").accept($(this))) {
                $(this).animate({ top: startCrna.top, left: startCrna.left });
            }
        } else if ($(this).attr("id") === "kockaCrvena") {
            if (!$("#crvena").droppable("instance").accept($(this))) {
                $(this).animate({ top: startCrvena.top, left: startCrvena.left });
            } 
        }

    });

});