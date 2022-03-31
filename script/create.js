let tambahbahan = () => {
	const node = document.getElementsByClassName("bahan")[0].children[1];
	const clone = node.cloneNode(true);
	document.getElementsByClassName("bahan")[0].appendChild(clone);
};

let kurangbahan = () => {
    if (document.getElementsByClassName("bahan")[0].childElementCount <= 2) {
        return;
		}
    elem = document.getElementsByClassName("bahan")[0];
    elem.removeChild(elem.lastElementChild)
}
let tambahlangkah = () => {
	const node = document.getElementsByClassName("langkah")[0].children[1];
	const clone = node.cloneNode(true);
	document.getElementsByClassName("langkah")[0].appendChild(clone);
};

let kuranglangkah = () => {
	if (document.getElementsByClassName("langkah")[0].childElementCount <= 2) {
		return;
	}
	elem = document.getElementsByClassName("langkah")[0];
	elem.removeChild(elem.lastElementChild);
};