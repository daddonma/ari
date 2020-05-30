"use strict";

{
	let currentSlideIndex = 1;

	const initSlidedshow = () => {
		
		showSlides(currentSlideIndex);

		$('.slideshow.next').on("click", function() {
			showSlides(currentSlideIndex += 1)
		});


		$('.slideshow.prev').on("click", function() {
			showSlides(currentSlideIndex -= 1)
		});
	}

	const showSlides = (n) => {
		let slides = $$('.slide');

		if (n > slides.length) 
			currentSlideIndex = 1;

		if (n < 1) 
			currentSlideIndex = slides.length;

		for (let i = 0; i < slides.length; i++) {
      		slides[i].style.display = "none";
 		}

 		slides[currentSlideIndex-1].style.display = "block";
	}

	initSlidedshow();

}
