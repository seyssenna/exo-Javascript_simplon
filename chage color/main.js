let input = document.getElementById("color");
let body = document.querySelector("body");

input.addEventListener("input", ()=>{
    console.log(input.value);
    // AJOUTE AU STYLE DEJA PRESENT
    body.style.backgroundColor = input.value;

    // ******REMPLACE LE STYLE DEJA PRESENT****
    //     body.style = `background-color:${input.value}`;
    //     body.setAttribute("style", `background-color:${input.value}`);
    // *******************************************
})