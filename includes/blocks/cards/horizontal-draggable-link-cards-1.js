function horizontalDraggableLinkCards1(){

    const slider = document.getElementById("horizontal-draggable-link-cards-1");
    const preventClick = (e) => {
        e.preventDefault();
        e.stopImmediatePropagation();
    }

    let isDown = false;
    var isDragged = false;
    let startX;
    let scrollLeft;

    slider.addEventListener("mousedown", e => {
        isDown = true;
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });

    slider.addEventListener("mouseleave", () => {
        isDown = false;
    });

    slider.addEventListener("mouseup", e => {
        isDown = false;
        const elements = document.getElementsByClassName("box");
        if(isDragged){
            for(let i = 0; i<elements.length; i++){
                elements[i].addEventListener("click", preventClick);
            }
        } else {
            for(let i = 0; i<elements.length; i++){
                elements[i].removeEventListener("click", preventClick);
            }
        }
        isDragged = false;
    });

    slider.addEventListener("mousemove", e => {
        if (!isDown) return;
        isDragged =  true;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 2;
        slider.scrollLeft = scrollLeft - walk;
    });

}

horizontalDraggableLinkCards1();