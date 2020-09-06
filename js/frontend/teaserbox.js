"use strict";

{	

	const initTeaserBox = () => {
	
		//Die Teaser sortieren
		shuffleTeaser();

		autoslide();

		$('.slideshow.next').on("click", showNextTeaser);

		$('.slideshow.prev').on("click", showPrevTeaser);

	}

	const showNextTeaser = () => {
		const currentActive = $('.teaser.active');

		let nextSibling = currentActive.nextSibling;

		//Es ist bereits das letzte Element aktiv => das erste wieder anzeigen
		if(nextSibling === null) {
			nextSibling = $$('.teaser')[0];
		}

		currentActive.classList.remove('active');
		nextSibling.classList.add('active');
		

		toggleArrowVisibility();
	}

	const showPrevTeaser = () => {
		const currentActive = $('.teaser.active');
		let prevSibling = currentActive.previousSibling;

		if(prevSibling === null) {
			prevSibling = $$('.teaser').slice().pop();
		}

		currentActive.classList.remove('active');
		prevSibling.classList.add('active');

		toggleArrowVisibility();
	}

	const showRandomTeaser = () => {
		const currentActive = $('.teaser.active');

		if(currentActive !== null)
			currentActive.classList.remove('active');

		const allTeasers = $$('.teaser');

		const randomTeaserNumber = Math.floor(Math.random() * (allTeasers.length + 1));

		allTeasers[randomTeaserNumber].classList.add('active');
	}

	const shuffleTeaser = () => {

		let container = $('#teaser-container');
		let children = $$('.teaser');

		let childrenShuffled = shuffleArray(children);
		childrenShuffled[0].classList.add('active');

		container.innerHTML = '';

		childrenShuffled.forEach(child => container.append(child));

		toggleArrowVisibility();
	}

	const toggleArrowVisibility = () => {

		const currentActive = $('.teaser.active');

		const nextSibling = currentActive.nextSibling;
		const prevSibling = currentActive.previousSibling;

		if(nextSibling !== null && nextSibling.classList.contains('teaser')) {
			$('.slideshow.next').style.display = "block";
		}  else {
			$('.slideshow.next').style.display = "none";
		}

		if(prevSibling !== null && prevSibling.classList.contains('teaser')) {
			$('.slideshow.prev').style.display = "block";
		}  else {
			$('.slideshow.prev').style.display = "none";
		}
	
	}

	const autoslide = () => {
		window.setInterval(showNextTeaser, 8000);
	}

	const shuffleArray = array => array.slice().sort((a, b) => Math.random() - 0.5);

	initTeaserBox();

}
