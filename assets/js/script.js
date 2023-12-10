"use strict";

/**
 * Add event listener on multiple elements
 */

const addEventonElements = function(elements, eventType, callback) {
    for (let i = 0, len = elements.length; i < len; i++) {
        elements[i].addEventListener(eventType, callback)
    }
}

