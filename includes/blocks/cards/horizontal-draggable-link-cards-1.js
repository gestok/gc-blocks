function horizontalDraggableLinkCards1(){

    let wrappers = document.querySelectorAll(".gcb-horizontal-draggable-link-cards-1");
    const preventClick = (e) => {
        e.preventDefault();
        e.stopImmediatePropagation();
    }

    let isDown = false;
    var isDragged = false;
    let startX;
    let scrollLeft;

	for (let i=0; i<wrappers.length; i++){

		wrappers.item(i).addEventListener("mousedown", e => {
			isDown = true;
			startX = e.pageX - wrappers.item(i).offsetLeft;
			scrollLeft = wrappers.item(i).scrollLeft;
		});

		wrappers.item(i).addEventListener("mouseleave", () => {
			isDown = false;
		});

		wrappers.item(i).addEventListener("mouseup", e => {
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

		wrappers.item(i).addEventListener("mousemove", e => {
			if (!isDown) return;
			isDragged =  true;
			e.preventDefault();
			const x = e.pageX - wrappers.item(i).offsetLeft;
			const walk = (x - startX) * 2;
			wrappers.item(i).scrollLeft = scrollLeft - walk;
		});

	}

}

horizontalDraggableLinkCards1();