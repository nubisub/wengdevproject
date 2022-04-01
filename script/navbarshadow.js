window.addEventListener("scroll", (e) => {
	const nav = document.getElementById("navbarwrapper");
	if (window.pageYOffset > 70) {
		nav.classList.add("add-shadow");
	} else {
		nav.classList.remove("add-shadow");
	}
});
