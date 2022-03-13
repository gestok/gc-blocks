// Loop through every card and add drag functionality
function linkCards1(){

    let isDown = false;
    let isDragged = false;
    let startX;
    let scrollLeft;
	let wrappers = document.querySelectorAll("section.gcb-link-cards-1");

	const preventClick = (e) => {
        e.preventDefault();
        e.stopImmediatePropagation();
    }


	for (let i = 0; i < wrappers.length; i++) {
		wrappers.item(i).addEventListener("mousedown", e => {
			isDown = true;
			startX = e.pageX - wrappers.item(i).offsetLeft;
			scrollLeft = wrappers.item(i).scrollLeft;
		});
	};

	for (let i = 0; i < wrappers.length; i++) {
		wrappers.item(i).addEventListener("mouseleave", () => {
	        isDown = false;
		});
	};

	for (let i = 0; i < wrappers.length; i++) {
		wrappers.item(i).addEventListener("mouseup", e => {
			isDown = false;
			let cards = document.querySelectorAll(".gcb-link-cards-1 .card");
			if(isDragged){
				for(let i = 0; i<cards.length; i++){
					cards.item(i).addEventListener("click", preventClick);
				}
			} else {
				for(let i = 0; i<cards.length; i++){
					cards.item(i).removeEventListener("click", preventClick);
				}
			}
			isDragged = false;
		});
	};

	for (let i = 0; i < wrappers.length; i++) {
		wrappers.item(i).addEventListener("mousemove", e => {
			if (!isDown) return;
			isDragged =  true;
			e.preventDefault();
			const x = e.pageX - wrappers.item(i).offsetLeft;
			const walk = (x - startX) * 2;
			wrappers.item(i).scrollLeft = scrollLeft - walk;
		});
	};

}

linkCards1();