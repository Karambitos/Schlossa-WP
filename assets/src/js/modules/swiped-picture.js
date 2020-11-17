'use strict'

document.addEventListener('DOMContentLoaded', () => {

    const picture = document.querySelectorAll('.js_picture');
    picture.forEach((elem) => {
        elem.addEventListener("click", (event) => {
            elem.classList.toggle('picture-box__active');
        });
    });

    const text = document.querySelectorAll('.js_text-box');
    text.forEach((elem) => {
        elem.addEventListener("click", (event) => {
            let picture = elem.previousElementSibling;
            picture.classList.toggle('picture-box__active');
        });
    });
});

