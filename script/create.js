let tambah = () => {
	const node = document.getElementsByClassName("bahan")[0].children[1];
	const clone = node.cloneNode(true);
	document.getElementsByClassName("bahan")[0].appendChild(clone);
};

let kurang = () => {
    if (document.getElementsByClassName("bahan")[0].childElementCount <= 2) {
        return;
		}
    elem = document.getElementsByClassName("bahan")[0];
    elem.removeChild(elem.lastElementChild)
}