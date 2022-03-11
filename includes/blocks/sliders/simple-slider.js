function simpleSlider(){

	let slide = 0;
	let slides = document.querySelectorAll('.gcb-simple-slider .slides > a');
	const numSlides = slides.length;

	//Functions
	currentSlide = () => {
		let itemToShow = Math.abs(slide % numSlides);
		[].forEach.call(slides, (el) => {
			el.classList.remove('slideActive')
		});
		slides[itemToShow].classList.add('slideActive');
		resetProgress();
		resetInterval();
	},

	next = () => {
		slide++;
		currentSlide();
	},

	prev = () => {
		slide--;
		currentSlide();
	},

	resetProgress = () => {
		let elm = document.querySelector('.gcb-simple-slider .progressbar'),
			newone = elm.cloneNode(true),
			x = elm.parentNode.replaceChild(newone, elm);
	},

	resetslide = () => {
		let elm = document.querySelector('.gcb-simple-slider .slides > a'),
		newone = elm.cloneNode(true),
		x = elm.parentNode.replaceChild(newone, elm);
	},

	resetInterval = () => {
		clearInterval(autonext);
		autonext = setInterval( () => {
			slide++;
			currentSlide();
		}, 8000);
	},

	autonext = setInterval( () => {
		next();
	}, 8000);

	// Prev-Next Buttons
	document.querySelector('.gcb-simple-slider .next').addEventListener('click', () => {
		next();
	}, false);

	document.querySelector('.gcb-simple-slider .previous').addEventListener('click', () => {
		prev();
	}, false);

}

simpleSlider();