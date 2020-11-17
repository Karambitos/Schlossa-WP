'use strict'

$(document).ready(() => {
    var swiperNext = new Swiper('.swiper-container__right', {
        spaceBetween: 8,
        grabCursor: true,
        slidesPerView: 'auto',
        breakpoints: {
            1200: {
                slidesOffsetBefore: 75,
                centeredSlides: false,
            },
            1441: {
                slidesOffsetBefore: 500,
            },
            1920: {
                slidesOffsetBefore: 555,
            },
        }
    });
    var swiperLeft = new Swiper('.swiper-container__left', {
        spaceBetween: 8,
        grabCursor: true,
        slidesPerView: 'auto',
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            1200: {
                slidesOffsetBefore: 55,
                centeredSlides: false,
            },
            1441: {
                slidesOffsetBefore: 500,
            },
            1920: {
                slidesOffsetBefore: 330,
            },
        }
    });
});

