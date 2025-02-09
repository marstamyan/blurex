$(function () {
	baguetteBox.run(".wp-block-gallery");
});
//loader
document.body.onload = function () {
	setTimeout(function () {
		var preloader = document.querySelector(".preloader");
		if (!preloader.classList.contains("loader-done")) {
			preloader.classList.add("loader-done");
		}
	}, 1000);
}
//--------loader

//anchor menu
// $(document).ready(function () {
// 	$("#navbarSupportedContent").on("click", "a", function (event) {
// 		event.preventDefault();
// 		var id = $(this).attr('href'),
// 			top = $(id).offset().top;
// 		$('body,html').animate({
// 			scrollTop: top
// 		}, 1500);
// 	});
// });
//-----menu


//scroll
// Set a variable for our button element.
const scrollToTopButton = document.getElementById('js-top');

// Let's set up a function that shows our scroll-to-top button if we scroll beyond the height of the initial window.
const scrollFunc = () => {
	// Get the current scroll value
	let y = window.scrollY;

	// If the scroll value is greater than the window height, let's add a class to the scroll-to-top button to show it!
	if (y > 500) {
		scrollToTopButton.className = "top-link top-btn-show";
	} else {
		scrollToTopButton.className = "top-link top-btn-hide";
	}
};

window.addEventListener("scroll", scrollFunc);

const scrollToTop = () => {
	// Let's set a variable for the number of pixels we are from the top of the document.
	const c = document.documentElement.scrollTop || document.body.scrollTop;

	// If that number is greater than 0, we'll scroll back to 0, or the top of the document.
	// We'll also animate that scroll with requestAnimationFrame:
	// https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame
	if (c > 0) {
		window.requestAnimationFrame(scrollToTop);
		// ScrollTo takes an x and a y coordinate.
		// Increase the '10' value to get a smoother/slower scroll!
		window.scrollTo(0, c - c / 10);
	}
};

// When the button is clicked, run our ScrolltoTop function above!
scrollToTopButton.onclick = function (e) {
	e.preventDefault();
	scrollToTop();
}

//------------scroll