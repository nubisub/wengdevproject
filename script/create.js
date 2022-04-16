let tambahbahan = () => {
	const node = document.getElementsByClassName("tambahbahan")[0];
	const clone = node.cloneNode(true);
	clone.classList.remove("hidden");
	document.getElementsByClassName("bahan")[0].appendChild(clone);
};

let kurangbahan = () => {
	if (document.getElementsByClassName("bahan")[0].childElementCount <= 3) {
		return;
	}
	let elem = document.getElementsByClassName("bahan")[0];
	elem.removeChild(elem.lastElementChild);
};

let tambahlangkah = () => {
	const node = document.getElementsByClassName("tambahlangkah")[0];
	const clone = node.cloneNode(true);
	clone.classList.remove("hidden");
	document.getElementsByClassName("langkah")[0].appendChild(clone);
};

let kuranglangkah = () => {
	if (document.getElementsByClassName("langkah")[0].childElementCount <= 3) {
		return;
	}
	let elem = document.getElementsByClassName("langkah")[0];
	elem.removeChild(elem.lastElementChild);
};
