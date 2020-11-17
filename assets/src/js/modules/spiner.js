'use strict'

document.addEventListener('DOMContentLoaded', () => {
    const spinner = document.querySelector('.spinner');
    const spinnerButton = document.querySelectorAll('.spinner-line');
    const spinerMenu = document.querySelector('.bar-container');

    const overflowHidden = () => {
        if (document.body.style.overflow === '') {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    };
    const spinnerClassToggle = () => {
        spinerMenu.classList.toggle("active");
        spinnerButton.forEach(elem => {
            elem.classList.toggle("active")
        });
    };

    spinner.addEventListener('click', (event) => {
        event.preventDefault();
        spinnerClassToggle();
        overflowHidden();
    });

    /**
     * smooth transition on anchor
     *
     */
    const value = localStorage.getItem('anchor');
        if (!(value === null)) {
            var id = value,
                top = $(id).offset().top;
            top = top-120;
            $("body,html").animate({
                    scrollTop: top,
                },
                1500
            );
            localStorage.clear();
        }
    console.log(value);

    $("#menu-header-menu").on("click", "a", function (event) {
        let locationOrig = (window.location.origin)+'/';
        let locationHref = window.location.href;
        if ((locationOrig === locationHref)){
            var href = $(event.target).attr('href');
            if (href[0] === '#'){
                event.preventDefault();
                if (window.screen.width <= 1024) {
                    spinnerClassToggle();
                    overflowHidden();
                }
                var id = $(this).attr("href"),
                    top = $(id).offset().top;
                top = top-156;
                $("body,html").animate({
                        scrollTop: top,
                    },
                    1500
                );
            };
        } else {
            var anchor = $(event.target).attr('href');
            localStorage.setItem('anchor', anchor);
            window.location.href = (window.location.origin)+'/';
        };
    });

    $(".anchor").on("click", function (event) {
        event.preventDefault();
        if (window.screen.width <= 1024) {
            spinnerClassToggle();
            overflowHidden();
        }
        var id = $(this).attr("href"),
            top = $(id).offset().top;
            top = top-156;
        $("body,html").animate({
                scrollTop: top,
            },
            1500
        );
    });
});
