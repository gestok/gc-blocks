'use strict';

// Add Scroll Functionality for every wrapper
function simpleCatProdCarousel() {
    // Get Product Carousel Wrappers
    const wrappers = document.querySelectorAll(".gcb-product-carousel");

    wrappers.forEach(wrapper => {
        // Get wrapper's slider
        let slide = wrapper.querySelector(".slide");
        let item = wrapper.querySelector(".slide");
        // And Next-Prev Buttons
        let next = wrapper.getElementsByClassName("pro-next")[0];
        let prev = wrapper.getElementsByClassName("pro-prev")[0];
        // Wrapper's starting position
        let position = 0;
        // Hide previous button on startup
        prev.style.display = "none";

        // Previous button click
        prev.addEventListener("click", () => {
            next.style.display = "flex"; // Make sure next button is not hidden
            if (position > 0){ // Do not slide left beyond the first item
                position -= 1;
                translateX(slide, position);
                if (position == 0){
                    prev.style.display = "none";
                }
            }
        });
        // Next button click
        next.addEventListener("click", () => {
            prev.style.display = "flex"; // Make sure previous button is not hidden
            if (position >= 0 && position < hiddenItems()){ // Do not slide right beyond the last item
                position += 1;
                translateX(slide, position);
                if (position == hiddenItems()){
                    next.style.display = "none";
                }
            }
        });
        // Function to get hidden items
        let hiddenItems = () => {
            let items = getCount(item, false);
            let visibleItems = wrapper.offsetWidth / 210;
            return items - Math.ceil(visibleItems);
        }
    })
}

// Function to move current wrapper's slider items
let translateX = (slide, position) => {
    slide.style.left = position * -210 + "px";
}

// Function to get number of items in slider
let getCount = (parent, getChildrensChildren) => {
    let relevantChildren = 0;
    let children = parent.childNodes.length;
    for (let i = 0; i < children; i++) {
        if (parent.childNodes[i].nodeType != 3) {
            if (getChildrensChildren)
                relevantChildren += getCount(parent.childNodes[i], true);
            relevantChildren++;
        }
    }
    return relevantChildren;
}

simpleCatProdCarousel();