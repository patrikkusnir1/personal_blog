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

if (slider && sliderContainer && sliderPrevBtn && sliderNextBtn) {
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

    sliderNextBtn.addEventListener("click", slideNext);


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

    /**
     * RESPONSIVE
     */

    sliderPrevBtn.addEventListener("click", slidePrev);

    window.addEventListener("resize", function () {
        totalSliderVisibleItems = Number(getComputedStyle(slider).getPropertyValue("--slider-items"));

        totalSlidableItems = sliderContainer.childElementCount - totalSliderVisibleItems;

        moveSliderItem();
    });
}


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
        mainPost.empty();
        mainPost.append(loadedPosts);

        $(".recent-post-card").addClass("article-appear");
        const firstArticle = mainPost.find(".recent-post-card").first();

        if (firstArticle.length) {
            const headerHeight = $(".header").outerHeight();
            const scrollPosition = firstArticle.offset().top - headerHeight - 20;

            $('html, body').animate({
                scrollTop: scrollPosition
            }, 500);
        }

        if (updateHistory) {
            history.pushState({}, "", url);
            lastSearchQuery = window.location.search;   
        }

    }).fail(function(xhr, status, error) {
            console.log(
                "Couldn't load posts",
                xhr.status,
                xhr.statusText
            );
        }
    );
}

// load featured posts with ajax

function loadFeatured(url, updateHistory = false) {
    const previousCount = $("#featured .feature-list li").length;
    const featuredContainer = $("#featured .container")

    $.ajax({
        url: url,
        method: "GET",
        dataType: "html"
    }).done(function( response ) {
        const currentContent = $(response).find("#featured .container > *");

        // empty container and add new content
        featuredContainer.empty();
        featuredContainer.append(currentContent);
        
        // animate new added articles
        $("#featured .feature-card").slice(previousCount).addClass("article-appear");

        // wait a moment
        setTimeout(function() {
            // scroll to first new article
            const firstNewArticle = $("#featured .feature-card").eq(previousCount);
            const headerHeight = $(".header").outerHeight() || 0;

            if (firstNewArticle.length) {
                const scrollPosition = firstNewArticle.offset().top - headerHeight - 20;
                
                $("html, body").animate({
                    scrollTop: scrollPosition
                }, 600);
            }
        }, 200);

        // update history
        if (updateHistory) {
            history.pushState({}, "", url);
            lastSearchQuery = window.location.search;
        }
    }).fail(function(xhr, status, error) {
        console.log("Couldn't load articles",
                    xhr.status,
                    xhr.statusText);
    })
}

$(document).on("click", "#featured  a.btn-secondary", function( event ) {
    event.preventDefault();

    const url = $(this).attr("href");

    loadFeatured(url, true);
});


const ajaxSelectors = "#recent .pagination a.pagination-btn, .card-tag a, #topics .slider-list a, .footer .footer-link, .tags .tag-btn"
// 2. handle clicks on pagination links and arrows
$(document).on
    ('click', ajaxSelectors, function(event) {
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

        const clickedPage = clickedUrl.searchParams.get("page") || "1";
        const currentPage = currentUrl.searchParams.get("page") || "1";

        const clickedCategory = clickedUrl.searchParams.get("category") || "";
        const currentCategory = currentUrl.searchParams.get("category") || "";


        if ( clickedUrl.pathname === currentUrl.pathname && 
             clickedPage === currentPage && 
             clickedCategory === currentCategory ) {
            return;
        }
        
        loadPosts(url, true);
    }
);

// track the last loaded query string (?page=...&category)
    let lastSearchQuery = window.location.search;

// update lastSearchQuery inside loadPosts when history is updated:
// (or update it right before calling loadPosts in the click handler)

// 3. Handle browser back and forward button - ignore hash-only changes
    $(window).on("popstate", function() {
    if (window.location.search !== lastSearchQuery) {
        lastSearchQuery = window.location.search;
        loadPosts(window.location.href, false);
    }    
});

// 4. Smooth scroll for navbar links (fixed header height)
    $(".navbar-link").on("click", function(event) {
        const targetHash = this.hash; // e.g. #topics
        const targetSection = $(targetHash);
        
        if (targetSection.length) {
            event.preventDefault();

            const headerHeight = $(".header").outerHeight() || 0;
            const scrollPosition = targetSection.offset().top - headerHeight;

            $("html, body").stop().animate({
                scrollTop: scrollPosition
            }, 500);

            // update the hash in the url without triggering popstate
            history.pushState(null, "", window.location.pathname + window.location.search + targetHash)
        }

    })


// adding comments with ajax
    jQuery(document).ready(function ($) {
        const $commentsSection = $('#comments');
        const commentForm = $('#comment-form');
        const $nameInput = commentForm.find('input[name="author_name"]');
        const commentList = $('#comment-list');
        
        if (!commentForm.length) return;

        commentForm.on("submit", function (event) {
            event.preventDefault();

            const submitBtn = commentForm.find('button[type="submit"]');
            // disable button after clicking
            submitBtn.prop("disabled", true);

            let req = $.ajax({
                url: commentForm.attr("action"),
                type: "POST", 
                data: commentForm.serialize(),
                dataType: "json" // parse JSON automatically
            });

            req.done(function (data) {
                if (data.status === "success") {
                    // 1. Remove the "No comments yet" if present 
                    $('.no-comments').remove();

                    // 2. Grab the article ID and CSRF token stored on the form 
                    let articleId = commentForm.data("article-id");
                    let csrfToken = commentForm.data("csrf");


                    // 3. Build the HTML (matching PHP LOOP structure)
                    let newComment = $(`
                        <li>
                            <div class="card comment-card" data-comment-id="${data.comment.id}">
                                <p class="card-text">${data.comment.comment_text}</p>

                                <div class="comment-actions">
                                    <button type="button" class="edit-comment">Edit</button>

                                    <form action="includes/delete-comment.php" method="POST" class="delete-comment-form">
                                        <input type="hidden" name="comment_id" value="${data.comment.id}">
                                        <input type="hidden" name="article_id" value="${articleId}">
                                        <input type="hidden" name="csrf_token" value="${csrfToken}">

                                        <button type="submit" class="delete-comment" aria-label="Delete comment" title="Delete comment">
                                            <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                                        </button>
                                    </form>
                                </div>
                                
                                <div class="profile-card">
                                    <div>
                                        <p class="card-title">${data.comment.author_name}</p>
                                        <time class="card-date">${data.comment.created_at}</time>
                                    </div>
                                </div>
                            </div>
                        </li>
                    `).hide();

                    // 4. Prepend to list and reset form
                    newComment.prependTo(commentList).slideDown(300);
                    commentForm[0].reset()
                }
            });

            req.fail(function (xhr) {
                let message = xhr.responseJSON && xhr.responseJSON.message
                    ? xhr.responseJSON.message
                    : "Failed to post comment."
                alert(message)
            });

            req.always(function () {
                submitBtn.prop("disabled", false);
            });
        });

        commentForm.on('keydown', function(event) {
            if ((event.ctrlKey || event.metaKey) && (event.key === "Enter" || event.keyCode === 13)) {
                event.preventDefault();
                commentForm.trigger("submit");
            }
        });

        if ($commentsSection.length && $nameInput.length) {
            let hasFocused = false;

            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting && !hasFocused) {
                        $nameInput[0].focus({ preventScroll: true });
                        hasFocused = true;
                        observer.disconnect();
                    }
                });
            }, { threshold: 0.3 });

            observer.observe($commentsSection[0]);
        }
    });

// Editing comments
$(".comment-list").on("click", ".edit-comment", function() {
    let editButton = $(this),
        commentCard = editButton.closest(".comment-card"),
        commentParagraph = commentCard.find(".card-text"),
        commentText = commentParagraph.text().trim();

    // disable Edit button
    editButton.prop("disabled", true);

    // create textarea
    let textarea = $("<textarea>", {
        class: "edit-comment-field",
        name: "comment_text",
        rows: 3
    }).val(commentText);

    // create save button
    let saveButton = $("<button>", {
        type: "button",
        class: "btn btn-primary save-comment",
        text: "Save"
    })

    // create cancel button
    let cancelButton = $("<button>", {
        type: "button",
        class: "btn cancel-comment",
        text: "Cancel"
    })

    // create button container
    let buttonGroup = $("<div>", {
        class: "edit-button-group"
    })

    buttonGroup.append(saveButton, cancelButton);

    // replace paragraph with textarea
    commentCard.find(".card-text").replaceWith(textarea);

    // add buttons
    textarea.after(buttonGroup);

    textarea.focus();

    // Cancel editing
    cancelButton.on("click", function() {
        let originalParagraph = $("<p>", {
            class: "card-text"
        }).text(commentText);

        textarea.replaceWith(originalParagraph);
        buttonGroup.remove();

        editButton.prop("disabled", false);
    })

    // Save editing
    saveButton.on("click", function() {

        let updatedText = textarea.val().trim(),
            commentId   = commentCard.data("comment-id"),
            articleId   = $("main").data("article-id");

        if (!updatedText) {
            textarea.focus();
            return;
        }

        // disable button while saving
        saveButton.prop("disabled", true);

        $.ajax({
            url: "includes/edit-comment.php",
            type: "POST",
            dataType: "json",
            data: {
                comment_id: commentId,
                article_id: articleId,
                comment_text: updatedText
            }
        })
        .done(function(data) {
            if (data.status === "success") {
                
                // create updated paragraph
                let updatedParagraph = $("<p>", {
                    class: "card-text"
                }).text(data.comment_text);
                
                // replace textarea with updated text
                textarea.replaceWith(updatedParagraph);

                // remove Save and Edit button
                buttonGroup.remove();

                // Enable Edit button again
                editButton.prop("disabled", false);
            }


        })
        .fail(function(xhr) {

            let message = xhr.responseJSON && xhr.responseJSON.message
                ? xhr.responseJSON.message
                : "Failed to update comment.";

            alert(message);
            saveButton.prop("disabled", false);
        })
    })
})

// Deleting comments
$(document).on("submit", ".delete-comment-form", function(event) {
    event.preventDefault();
    
    if (!confirm("Are you sure to delete comment?")) {
        return;
    }

    const form = $(this);
    const deleteBtn = form.find('button[type=submit]');
    const commentItem = form.closest("li");

    deleteBtn.prop("disabled", true);

    $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: form.serialize(),
        dataType: "json"
    })
    .done(function(data) {
        if (data.status === "success") {
            commentItem.slideUp(300, function() {
                $(this).remove();

                // Restore empty-state message if no comments remain
                if ($("#comment-list li").length === 0) {
                    $("#comment-list").append(`
                        <li class="no-comments card">
                            <p class="card-text">No comments yet. Be the first to share your thoughts!</p>
                        </li>
                    `);
                }
            });
        }
    })
    .fail(function(xhr) {
        let message = xhr.responseJSON && xhr.responseJSON.message
                      ? xhr.responseJSON.message
                      : "Failed to delete comment.";
        alert(message);
        deleteBtn.prop("disabled", false);
    });
});





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




 


