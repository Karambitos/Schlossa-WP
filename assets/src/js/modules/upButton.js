'use strict'
$(document).ready(() => {
    $('.up').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    $(document).on('scroll', function(){
        if($(window).scrollTop()>500) {
            $('.up').addClass('active');
        } else {
            $('.up').removeClass('active');
        }
    });
});
