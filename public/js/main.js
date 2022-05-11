'use strict';

// Navigation bar
const navActive = window.addEventListener('load', function () {
    window.addEventListener('scroll', function () {
        const navbar = document.querySelector(".navigation-bar")
        const scrollT = window.scrollY
        if (scrollT) {
            navbar.classList.add("active")
        } else {
            navbar.classList.remove("active")
        }
    })
})
