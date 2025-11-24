$(document).ready(function() {

    $("#zelena").click(function() {
        $("ul:first").addClass("zelena");
    });

    $(".slika").click(function() {
        $(this).hide();
    });

    let faded = false; 

    $("#abrakadabra").click(function() {
        if (!faded) {
            
            $(".slika").eq(0).fadeOut("fast");          
            $(".slika").eq(1).fadeOut("slow");            
            $(".slika").eq(2).fadeOut(5000);             
            faded = true;
        } else {
            $(".slika").show();
            faded = false;
        }
    });

});