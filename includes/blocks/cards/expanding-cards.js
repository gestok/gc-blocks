// Remove .active class from all cards, then add .active to the clicked one
function expandingCards(){

	// Get all cards
	const cards = document.getElementsByClassName('card');

	Array.from(cards).forEach(card => {
		card.addEventListener('click', (event) => {
			Array.from(cards).forEach(card => {
				card.classList.remove('active');
			});
			event.currentTarget.classList.add('active');
		});
	});
	
	// Set first .active
	document.querySelector('.gcb-exp-cards .card').classList.add('active');

}

expandingCards();