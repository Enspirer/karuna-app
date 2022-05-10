'use strict';

// Hero Slider
var heroSlider = new Splide('#heroSlider', {
    type: 'loop',
    width: '100%',
});

heroSlider.mount();

// News Slider
var newsSlider = new Splide('#newsSlider', {
    type: 'loop',
    pagination: false,
});

newsSlider.mount();

// Navigation bar
const navActive = window.addEventListener('scroll', function () {
    const navbar = document.querySelector(".navigation-bar")
    const scrollT = window.scrollY
    if (scrollT) {
        navbar.classList.add("active")
    } else {
        navbar.classList.remove("active")
    }
})
