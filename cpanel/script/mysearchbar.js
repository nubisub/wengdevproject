function debounce(func, timeout = 300){
  let timer;
  return (...args) => {
    clearTimeout(timer);
    timer = setTimeout(() => { func.apply(this, args); }, timeout);
  };
}
function showClose() {
    console.log("showClose");
    document.getElementById("suggestion").style.display = "block";
    showSuggestion();
    // let link = document.createElement("p");
    //         link.innerHTML = "no recipe found";
    //         // set link class
    //         link.className = "recipesuggest";
    //         // set link
    //         // make child of id suggestion
    //         suggestion.appendChild(link);
    //         link.style.height = "40px";

}
function hideClose() {
    // document.getElementById("searchClose").style.display = "none";
    // document.getElementById("suggestion").style.display = "none";

}
function onfocusinput() {
    
    // document.getElementById("inputQuery").focus();
    // make focus
    console.log("onfocusinput");
}
function clearSearch() {
    clearArea();
    let link = document.createElement("p");
            link.innerHTML = "no recipe found";
            // set link class
            link.className = "recipesuggest";
            // set link
            // make child of id suggestion
            suggestion.appendChild(link);
            link.style.height = "40px";
    document.getElementById("inputQuery").value = "";
    document.getElementById("inputQuery").focus();
    
}
function clearArea(){
    let parent = document.getElementById("suggestion");
    while (parent.firstChild) {
    parent.firstChild.remove()
    }
}
const inputQueryKeyUp = debounce(() => showSuggestion());

// function inputQueryKeyUp(value){
//     // 
//     clearArea();
//     showSuggestion(value);
//     // value = document.getElementById("inputQuery").value;
//     if (value != "") {
//     document.getElementById("searchClose").style.visibility = "visible";
//     }
//     if(value == "") {
//     document.getElementById("searchClose").style.visibility = "hidden";

//     }
//     // console.log("value: " + value);
// }


function showSuggestion() {
    document.getElementById("suggestion").style.display = "block";
    clearArea();
    console.log("showSuggestion");
        str = document.getElementById("inputQuery").value;
        if (str != "") {
     document.getElementById("searchClose").style.visibility = "visible";
     } else{
         document.getElementById("searchClose").style.visibility = "hidden";
     }

if (str.length == 0) {
    let link = document.createElement("p");
            link.innerHTML = "no recipe found";
            // set link class
            link.className = "recipesuggest";
            link.id = "no-recipe";
            // set link
            // make child of id suggestion
            suggestion.appendChild(link);
            link.style.height = "40px";
    return;
}
xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        let get = JSON.parse(this.responseText);
        if (get.length == 0) {
            let link = document.createElement("p");
            link.innerHTML = "no recipe found";
            // set link class
            link.className = "recipesuggest";
            // set link
            // make child of id suggestion
            suggestion.appendChild(link);
            link.style.height = "40px";
            // document.getElementById("txtHint").innerHTML = "no suggestion";
            console.log("data kosong");
            return;
        }

        let tampil = "";
        for (let i = 0; i < get.length; i++) {
            tampil += get[i].nama;
            if(i != get.length - 1){
                tampil += ", ";
            }
            let suggestion = document.getElementById("suggestion");
            // make child of id suggestion
            let link = document.createElement("a");
            // set link class
            link.className = "recipesuggest";
            // set link
            link.href = "view/?id="+get[i].id;
            // make child of id suggestion
            suggestion.appendChild(link);
            let foto = document.createElement("div");
            foto.className = "fotosuggest";
            let img = document.createElement("img");
            if(get[i].foto==""){
                img.src = "/create/foto/404.png";
            }else{
                img.src = "/create/foto/" + get[i].foto;
            }
            
            foto.appendChild(img);
            link.appendChild(foto);
            let isi = document.createElement("div");
            isi.className = "isisuggest";
            let nama = document.createElement("h2");
            nama.innerHTML = get[i].nama;
            let desc = document.createElement("p");
            desc.innerHTML = get[i].deskripsi;
            isi.appendChild(nama);
            isi.appendChild(desc);
            link.appendChild(isi);
            
            
        }
        console.log(tampil);
        // document.getElementById("txtHint").innerHTML = tampil;
    }
};

xhttp.open("GET", "/php/mysuggestion.php?name="+str, true);
xhttp.send();
}
window.onload = function() {
    let link = document.createElement("p");
            link.innerHTML = "no recipe found";
            // set link class
            link.className = "recipesuggest";
            // set link
            // make child of id suggestion
            suggestion.appendChild(link);
            link.style.height = "40px";
            
}
document.addEventListener("click", function(e) {
    if ((e.target.id != "suggestion") && (e.target.id !="inputQuery")&& (e.target.id !="submitQuerySVG") && (e.target.className !="recipesuggest")) {
        console.log("cols")
        document.getElementById("suggestion").style.display = "none";
    }
}
);