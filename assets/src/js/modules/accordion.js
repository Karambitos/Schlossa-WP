'use strict'

document.addEventListener('DOMContentLoaded', () => {

    const accordionBtn = document.querySelectorAll('.accordion-btn');

    accordionBtn.forEach((elem) => {
        elem.addEventListener("click", (event) => {
            event.preventDefault();
            let accordionContainer = elem.previousElementSibling;
            accordionContainer.classList.toggle("active");
        });
    });
});

