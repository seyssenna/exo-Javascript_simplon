const alreadyRegisteredUsernames = ["kim", "emmanuel", "nicolas"];
let username = document.getElementById("username");
let password = document.getElementById("password");
let confirmPwd = document.getElementById("confirm-password");
let btn = document.querySelector("button");
let errorUsername = document.querySelector(".errorUsername");
let errorPwd = document.querySelector(".errorPwd");
let errorConfirmPwd = document.querySelector(".errorConfirmPwd");



// TEST LA PUISSANCE DU PASSWORD
password.addEventListener("keyup", event =>{
  // si rien dans l'input pas de message
  if (password.value.length === 0) {
    errorPwd.innerHTML = "";
    
  }else{
    // si entre 0 et 3 caracteres
    if (password.value.length > 0 && password.value.length < 3) {
      errorPwd.innerHTML = "";
      errorPwd.insertAdjacentHTML("beforeend", "<p>securité tres faible</p>");
      errorPwd.style = "background-color: red";
      // retire la couleur rouge du message d'erreur
      errorPwd.classList.remove("red");
    }
    // si entre 3 et 7 caracteres
    else if(password.value.length > 3 && password.value.length < 7){
      errorPwd.innerHTML = "";
      errorPwd.insertAdjacentHTML("beforeend", "<p>securité faible</p>");
      errorPwd.style = "background-color: orange";
    }
    // si entre 7 et 11 caracteres
    else if(password.value.length > 7 && password.value.length < 11){
      errorPwd.innerHTML = "";
      errorPwd.insertAdjacentHTML("beforeend", "<p>securité bonne</p>");
      errorPwd.style = "background-color: yellow";
    }
    // plus de 11
    else if(password.value.length > 11){
      errorPwd.innerHTML = "";
      errorPwd.insertAdjacentHTML("beforeend", "<p>securité tres bonne</p>");
      errorPwd.style = "background-color: green";
    }
  } 
})



document.querySelector("form").addEventListener("submit", (event) =>{
 
  // VARIABLE QUI AUTORISE OU NON LA CREATION DE COMPTE
  let isValid = true;

  // ---------------------RETRAIT DES MESSAGE D'ERREUR AU BLUR----------------------
    username.addEventListener("blur", () =>{
      if (username.value !== "") {
        errorUsername.innerHTML = "";
        username.classList.remove("redBorder");
      }
    });
    password.addEventListener("blur", ()=>{
      if (password.value !== "") {
        errorPwd.innerHTML = "";
        password.classList.remove("redBorder");
      }
    });
    confirmPwd.addEventListener("blur", ()=>{
      if (confirmPwd.value !== "") {
        errorConfirmPwd.innerHTML = "";
        confirmPwd.classList.remove("redBorder");
      }
    });
 
  // -------------------------GESTION/AJOUT DES MESSAGES D'ERREUR-----------------
  if(username.value === "") {
    isValid = false;
    event.preventDefault();
    errorUsername.innerHTML = "";
    errorUsername.insertAdjacentHTML("beforeend", "<p>champ obligatoire</p>");
    // ajout des styles css pour erreur
    username.classList.add("redBorder");
    errorUsername.classList.add("red");
    }
  if (password.value === "") {
    isValid = false;
    event.preventDefault();
    errorPwd.innerHTML = "";
    errorPwd.insertAdjacentHTML("beforeend", "<p>champ obligatoire</p>");
    // ajout des styles css pour erreur
    password.classList.add("redBorder");
    errorPwd.classList.add("red");
  }
  if (confirmPwd.value === "") {
    isValid = false;
    event.preventDefault();
    errorConfirmPwd.innerHTML = "";
    errorConfirmPwd.insertAdjacentHTML("beforeend", "<p>champ obligatoire</p>");
    // ajout des styles css pour erreur
    confirmPwd.classList.add("redBorder");
    errorConfirmPwd.classList.add("red");
  }
  // test de confirmation du password identique
  if (password.value != "" && confirmPwd.value != "" && password.value != confirmPwd.value) {
    isValid = false;
    event.preventDefault();
    errorConfirmPwd.innerHTML = "";
    errorConfirmPwd.insertAdjacentHTML("beforeend", "<p>le mot de passe doit etre identique</p>");
    // ajout des styles css pour erreur
    confirmPwd.classList.add("redBorder");
    errorConfirmPwd.classList.add("red");
  }
  // test du username deja utilisé
  alreadyRegisteredUsernames.forEach(name => {
    if (username.value == name) {
      isValid = false;
      event.preventDefault();
      errorUsername.innerHTML = "";
      errorUsername.insertAdjacentHTML("beforeend", "<p>ce nom est deja utilise</p>");
      // ajout des styles css pour erreur
      username.classList.add("redBorder");
      errorUsername.classList.add("red");
    }
  });

  
  // SI "isValid" EST VRAI, LE COMPTE EST CRÉÉ
    if (isValid) {
    document.querySelector("main").innerHTML = "Compte créé :)";
  }
});

