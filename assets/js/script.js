"use strict";

/**
 * Add event listener on multiple elements
 */

const addEventonElements = function(elements, eventType, callback) {
    for (let i = 0, len = elements.length; i < len; i++) {
        elements[i].addEventListener(eventType, callback)
    }
}

/**
 * Mobile navbar toggler
 */

const navbar = document.querySelector("[data-navbar]");
const navTogglers = document.querySelectorAll("[data-nav-toggler]")
const toggleNav = () => navbar.classList.toggle("active");

addEventonElements(navTogglers, "click", toggleNav)


/**
 * HEADER ANIMATION
 * when scrolled done to 100px header will be active
 */

const header = document.querySelector("[data-header]");

window.addEventListener("scroll", () => {
    if (window.scrollY > 100) {
        header.classList.add("active");
    }
    else {
        header.classList.remove("active");
    }
})
