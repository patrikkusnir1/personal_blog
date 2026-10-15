"use strict";

/**
 * Add event listener on multiple elements
 */

const addEventOnElements = function (elements, eventType, callback) {
    for (let i = 0, len = elements.length; i < len; i++) {
        elements[i].addEventListener(eventType, callback)
    }
}

/**
 * Mobile navbar toggler
 */

const navbar = document.querySelector("[data-navbar]");
const navTogglers = document.querySelectorAll("[data-nav-toggler]")

const toggleNav = () => {
    navbar.classList.toggle("active");
    document.body.classList.toggle("nav-active");
}
addEventOnElements(navTogglers, "click", toggleNav)


/**
 * HEADER ANIMATION
 * when scrolled done to 100px header will be active
 */

const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]")

window.addEventListener("scroll", () => {
    if (window.scrollY > 100) {
        header.classList.add("active");
        backTopBtn.classList.add("active");
    }
    else {
        header.classList.remove("active");
        backTopBtn.classList.remove("active");
    }
});

/**
 * SLIDER
 */

const slider = document.querySelector("[data-slider]");
const sliderContainer = document.querySelector("[data-slider-container]");
const sliderPrevBtn = document.querySelector("[data-slider-prev]");
const sliderNextBtn = document.querySelector("[data-slider-next]");

let totalSliderVisibleItems = Number(getComputedStyle(slider).getPropertyValue("--slider-items"));

let totalSlidableItems = sliderContainer.childElementCount - totalSliderVisibleItems;

let currentSlidePos = 0;

const moveSliderItem = function () {
    sliderContainer.style.transform = `translateX(-${sliderContainer.children[currentSlidePos].offsetLeft}px)`;
}

/** 
* NEXT SLIDE
*/

const slideNext = function () {
    const slideEnd = currentSlidePos >= totalSlidableItems

    if (slideEnd) {
        currentSlidePos = 0;
    } else {
        currentSlidePos++
    }

    moveSliderItem();
}

sliderNextBtn.addEventListener("click", slideNext)


/** 
* PREVIOUS SLIDE
*/

const slidePrev = function () {
    if (currentSlidePos <= 0) {
        currentSlidePos = totalSlidableItems
    } else {
        currentSlidePos--
    }
    moveSliderItem();
}

sliderPrevBtn.addEventListener("click", slidePrev)


/**
 * RESPONSIVE
 */

window.addEventListener("resize", function () {
    totalSliderVisibleItems = Number(getComputedStyle(slider).getPropertyValue("--slider-items"));

    totalSlidableItems = sliderContainer.childElementCount - totalSliderVisibleItems;

    moveSliderItem();
});

/**
 * AJAX pagination
 */

// 1. Load posts from a URL
function loadPosts(url, updateHistory = false) {

    $.ajax({
        url: url,
        method: "GET",
        dataType: "html"
    }).done(function( response ) {
        const mainPost = $("#recent .post-main");
        const loadedPosts = $(response).find("#recent .post-main > *");
        mainPost.html(loadedPosts);

        mainPost.addClass("article-appear");
        const firstArticle = mainPost.find(".recent-post-card").first();

        const headerHeight = $(".header").outerHeight();
        const scrollPosition = firstArticle.offset().top - headerHeight - 20;

        $('html, body').animate({
            scrollTop: scrollPosition
        }, 500);

        history.pushState({}, "", url);
    })

    // load function
    // load(
    //     url + " #recent .post-main > *",
    //     function(response, status, xhr) {
    //         if (status === 'error') {
    //             console.log( 
    //                 "Couldn't load posts:", 
    //                 xhr.status, 
    //                 xhr.statusText 
    //             );
    //         } else  {
    //             // add animation class to articles
    //             $(".post-main .recent-post-card")
    //               .addClass("article-appear");

    //             // find the first article
    //             const firstArticle = $(".post-main .recent-post-card").first();

    //             if (firstArticle.length) {
    //                 // calculate the scroll position
    //                 const headerHeight = $(".header").outerHeight();

    //                  const scrollPosition =
    //                 firstArticle.offset().top - headerHeight - 50;

    //                 // scroll smoothly to first article
    //                 $('html, body').animate({
    //                 scrollTop: scrollPosition
    //                 }, 500);
    //             }

    //             if ( updateHistory ) {
    //                history.pushState({}, "", url); 
    //             }
    //         } 
    //     }
    // )
}
// 2. handle clicks on pagination links and arrows
$(document).on
    ('click',
    "#recent .pagination a.pagination-btn", 
    function(event) {
        // stop the browser from navigating to another page
        event.preventDefault();

        // get the url from pagination link
        const url = $(this).attr("href");

        // ignore placeholder links, such as the "..." link
        if (!url || url === "#") {
            return;
        }

        // don't reload the same page
        const clickedUrl = new URL(url, window.location.href);
        const currentUrl = new URL(window.location.href);

        if (
            clickedUrl.pathname === currentUrl.pathname && 
            clickedUrl.searchParams.get("page") === 
                currentUrl.searchParams.get("page") && 
            clickedUrl.searchParams.get("category") === 
                currentUrl.searchParams.get("category")
        ) {
            return;
        }
        loadPosts(url, true);
    }
);

// 3. Handle browser back and forward button
    $(window).on("popstate", function() {
        loadPosts(window.location.href);
    })





 


