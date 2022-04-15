window.addEventListener("scroll", (e) => {
	const nav = document.getElementById("navbarwrapper");
	if (window.pageYOffset > 50) {
		nav.classList.add("add-shadow");
	} else {
		nav.classList.remove("add-shadow");
	}
});


window.onload = () => {
	document.getElementById("user").onclick = () => {
		let dropdown = document.getElementsByClassName("user-dropdown")[0];
		dropdown.classList.toggle("show");
	};
	document.addEventListener("click", (evt) => {
		const user = document.getElementById("user");
		const flyoutElement = document.getElementsByClassName("user-dropdown")[0];

		let targetElement = evt.target;
		do {
			if (targetElement == flyoutElement ) {
				return;
			}
			if (targetElement == user) {
				return;
			}
			targetElement = targetElement.parentNode;
		} while (targetElement);
		flyoutElement.classList.remove("show");
	});

	document.querySelectorAll(".loginnavbar").forEach(element => {
		element.onclick = () => {

		const flyoutElement = document.getElementsByClassName("user-dropdown")[0];
			flyoutElement.classList.remove("show");

			let wrapper = document.getElementsByClassName("modalwrapper")[0];
			wrapper.style.display = "flex";
			document.body.classList.add("remove-scrolling"); 

		};
	});
	window.onclick = (event) => {
		let exit = document.getElementsByClassName("exitbutton")[0];
		let wrapper = document.getElementsByClassName("modalwrapper")[0];
		let exitsvg = document
			.getElementsByClassName("exitbutton")[0]
			.getElementsByTagName("svg")[0].children[0];

		let exitpath = document
			.getElementsByClassName("exitbutton")[0]
			.getElementsByTagName("svg")[0];
		if (event.target == document.getElementsByClassName("modalwrapper")[0]) {
			wrapper.style.display = "none";
			console.log("clicked outside");
			document.body.classList.remove("remove-scrolling"); 
			return;
		}
		if (event.target == exit) {
			wrapper.style.display = "none";
			document.body.classList.remove("remove-scrolling"); 
			return;
		}
		if (event.target == exitsvg) {
			wrapper.style.display = "none";
			document.body.classList.remove("remove-scrolling"); 
			return;
		}
		if (event.target == exitpath) {
			wrapper.style.display = "none";
			document.body.classList.remove("remove-scrolling"); 
			return;
		}
	};
};

