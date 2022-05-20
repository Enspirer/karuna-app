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

// Package Changer
const packagesSlider = document.getElementById("packageSlider")
const packages = packagesSlider.querySelectorAll(".package")
const radios = packagesSlider.querySelectorAll(".form-check-input")

packages.forEach(function (item) {
    item.addEventListener('click', function () {
        console.log('clicked');
    })
})
