
let checkBox = document.getElementById("toggle-password-visibility");
let btn = document.querySelector("button");

document.querySelector("form").addEventListener("submit", (event) => {
  let isValid = true;

  let username = document.querySelector('#username');
  let password = document.querySelector('#password');

  if (username.value === "") {
    isValid = false;
    event.preventDefault();
    // afficher une erreur
  }
  if (password.value === "") {
    // afficher une erreur
    isValid = false;
    event.preventDefault();
  }

  if(isValid) {
    // on n'envoie pas vraiment les données pour l'exercice
    document.querySelector("main").innerHTML = "Vous êtes connecté :)";
  }
  
});




checkBox.addEventListener('change', () => {
  if (checkBox.checked) {
    password.setAttribute("type", "text")
  } else {
    password.setAttribute("type", "password")
  }
});
