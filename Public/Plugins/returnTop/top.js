
$(document).ready(function() {
    //$(".returnTop").show();
    $(function() {
        $(window).scroll(function() {
            if ($(window).scrollTop() > $(window).height()*0.5) {
                $(".returnTop").fadeIn(400);
            } else {
                $(".returnTop").fadeOut(600);
            }
        });
        $(".returnTop").click(function() {
            $('body,html').animate({
                    scrollTop: 0
                },
                400);
            return false;
        });
    });
});