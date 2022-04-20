window.addEventListener("scroll", (e) => {
	const nav = document.getElementById("navbarwrapper");
	if (window.pageYOffset > 50) {
		nav.classList.add("add-shadow");
	} else {
		nav.classList.remove("add-shadow");
	}
});

function setCookie(cname, cvalue, exdays) {
	const d = new Date();
	d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
	let expires = "expires=" + d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
	let name = cname + "=";
	let decodedCookie = decodeURIComponent(document.cookie);
	let ca = decodedCookie.split(";");
	for (let i = 0; i < ca.length; i++) {
		let c = ca[i];
		while (c.charAt(0) == " ") {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	// alert("lightmode");
	return "";
}


function darkmode() {
	setCookie("isdark", "true", 365);
		const lightfood = document.getElementById("lightfood");
		const darkfood = document.getElementById("darkfood");
	// if exist
	// setCookie("ischecked", ischecked, 365);

	if (darkfood != null) {
		darkfood.classList.remove("hidden");
		darkfood.style.animation = "landing ease 1s";
		lightfood.classList.add("hidden");
		lightfood.style.animation = "landing ease 1s";
	}
	document.body.classList.add("dark");
	document.body.classList.add("colortransition");
}
function lightmode() {
			const lightfood = document.getElementById("lightfood");
			const darkfood = document.getElementById("darkfood");
	// if (colormode.checked) {
	if (darkfood != null) {
			darkfood.classList.add("hidden");
	// darkfood.classList.add("colortransition");
	lightfood.classList.remove("hidden");
	}

	// document.body.classList.remove("dark");
	// }
	setCookie("isdark", "false", 365);
	document.body.classList.remove("dark");
}
function checkCookie() {

	const colormode = document.getElementById("colormode");
	let mode = getCookie("isdark");
	if (mode == "true") {
		console.log(mode);
		darkmode();
		colormode.checked = true;
		console.log("darkmode");
		// darkmode();
		// alert("darkmode");
	} else {
		console.log("lightmode");
		// lightmode();
		colormode.checked = false;
		// setCookie("isdark", "false", 365);
		if (mode == "" || mode == null) {
			// alert("lighmode");
			setCookie("isdark", "false", 365);
		}
	}
}
// document.addEventListener("DOMContentLoaded", function () {
// 		checkCookie();
// });

window.onload = () => {
	checkCookie();
	try {
		let mode = getCookie("isdark");
		console.log(mode);
		const colormode = document.getElementById("colormode");
		colormode.addEventListener("click", () => {
		if (colormode.checked) {
			darkmode();
		} else {
			lightmode();
		}
	});

	} catch (error) {
		
	}
	
	
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

