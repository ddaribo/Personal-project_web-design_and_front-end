document.getElementById('navTrig').addEventListener('click', function () {
    $(this).toggleClass("active");
    console.log("Clicked menu");
    $("#mainListDiv").toggleClass("show_list");
    $("#mainListDiv").fadeIn();
});

$('#services-burger').click(function(){
    $("#mainListDiv").removeClass("show_list");
});


/* Function used to shrink nav bar removing paddings and adding black background */

$(window).scroll(function () {
    if ($(document).scrollTop() > 50) {
        $('.nav').addClass('affix');
        $('#navTrig').addClass('affix-burger');
        console.log("OK");
    } else {
        $('.nav').removeClass('affix');
        $('#navTrig').removeClass('affix-burger');
    }
});
