/* Variables */
var nom = document.getElementById("nom").value;
var prenom = document.getElementById("prenom").value;
var sex = "";
var dateNaissance = document.getElementById("date").value;
var CP = document.getElementById("CP").value;
var adres = document.getElementById("adresse").value;
var ville = document.getElementById("ville").value;
var email = document.getElementById("email").value;
var sujet = document.getElementById("sujet").value;
var question = document.getElementById("question").value;
var agree = document.getElementById("agree").checked;
var formulaire = new Array();
var confirmationEnvoi = true;

/* Variables qui détermine les <span> dans //
// le HTML pour afficher le message        */
var missNom = document.getElementById("missNom");
var missPrenom = document.getElementById("missPrenom");
var missSexe = document.getElementById("missSexe");
var missDateNaissance = document.getElementById("missDate");
var missCP = document.getElementById("missCP");
var missEmail = document.getElementById("missEmail");
var missSujet = document.getElementById("missSujet");
var missQuestion = document.getElementById("missQuestion");
var missAgree = document.getElementById("missAgree");

/* Regex pour controler la saisie par l'utilisateur */
var nomValid = /^[A-Z][A-Za-z\é\è\ê\-]+$/;
var prenomValid = /^[A-Z][A-Za-z\é\è\ê\-]+$/;
var emailValid = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

/* Pour donner aux bouttons HTML une valeur //
// d'action sur le javascript               */
var formValid = document.getElementById("bouton_envoi");
formValid.addEventListener("click", validation);
var reset = document.getElementById("reset");
reset.addEventListener("click", reeinitialisation);

/* pour réinitialiser les <span> */
function reeinitialisation() {
  missNom.textContent = "";
  missPrenom.textContent = "";
  missSexe.textContent = "";
  missDateNaissance.textContent = "";
  missCP.textContent = "";
  missEmail.textContent = "";
  missSujet.textContent = "";
  missQuestion.textContent = "";
  missAgree.textContent = "";
}

/* la fonction principal qui vas lancer toutes les //
// autres fonctions                                */
function validation() {
  confirmationEnvoi = true;
  prenomVerif();
  nomVerif();
  sexeVerif();
  dateVerif();
  cPVerif();
  adresseVerif();
  villeVerif();
  emailVerif();
  sujetVerif();
  questionVerif();
  agreeVerif();
  envoiFormulaire();
  envoi();
}

/* Liste de toutes les fonctions apparaisant ci-dessus */
function prenomVerif() {
  prenom = document.getElementById("prenom").value;
  if (prenom == "") {
    missPrenom.textContent = "Prénom manquant";
    missPrenom.style.color = "red";
    confirmationEnvoi = false;
  } else {
    if (prenomValid.test(prenom) == false) {
      missPrenom.textContent = "Prénom incorrect";
      missPrenom.style.color = "orange";
      confirmationEnvoi = false;
    } else {
      missPrenom.textContent = "";
    }
  }
}

function nomVerif() {
  nom = document.getElementById("nom").value;
  if (nom == "") {
    missNom.textContent = "Nom manquant";
    missNom.style.color = "red";
    confirmationEnvoi = false;
  } else {
    if (nomValid.test(nom) == false) {
      missNom.textContent = "Nom incorrect";
      missNom.style.color = "orange";
      confirmationEnvoi = false;
    } else {
      missNom.textContent = "";
    }
  }
}

function sexeVerif() {
  var homme = document.getElementById("homme").checked;
  var femme = document.getElementById("femme").checked;
  var neutre = document.getElementById("neutre").checked;
  if (homme == true) {
    missSexe.textContent = "";
    sex = "H";
  } else {
    if (femme == true) {
      missSexe.textContent = "";
      sex = "F";
    } else {
      if (neutre == true) {
        missSexe.textContent = "";
        sex = "Neutre";
      } else {
        missSexe.textContent = "<---- Sélectionnez un sexe";
        missSexe.style.color = "red";
        confirmationEnvoi = false;
      }
    }
  }
}

function dateVerif() {
  dateNaissance = document.getElementById("date").value;
  dateNaissance = dateNaissance.split("-");
  var annee = dateNaissance[0] * 31557600000;
  var mois = dateNaissance[1] * 2629800000;
  var jour = dateNaissance[2] * 86400000;
  dateNaissance = annee + mois + jour - 1970 * 31557600000;
  if (isNaN(dateNaissance)) {
    missDateNaissance.textContent = "Rentrez une date";
    missDateNaissance.style.color = "red";
    confirmationEnvoi = false;
  } else {
    if (dateNaissance > Date.now()) {
      missDateNaissance.textContent = "Rentrez une date valide";
      missDateNaissance.style.color = "orange";
      confirmationEnvoi = false;
    } else {
      missDateNaissance.textContent = "";
      dateNaissance = document.getElementById("date").value;
    }
  }
}

function cPVerif() {
  CP = document.getElementById("CP").value;
  var CPVerif = document.getElementById("CP").value.length;
  if (CP == "") {
    missCP.textContent = "Rentrez un code postal";
    missCP.style.color = "red";
    confirmationEnvoi = false;
  } else {
    if (5 < CPVerif) {
      missCP.textContent = "Rentrez un code postal valide (5 chiffres)";
      missCP.style.color = "orange";
      confirmationEnvoi = false;
    } else {
      if (5 > CPVerif) {
        missCP.textContent = "Rentrez un code postal valide (5 chiffres)";
        missCP.style.color = "orange";
        confirmationEnvoi = false;
      } else {
        missCP.textContent = "";
        CP = CP;
      }
    }
  }
}

function adresseVerif() {
  adres = document.getElementById("adresse").value;
  if (adres == "") {
    adres = "Non renseignée";
  }
}

function villeVerif() {
  ville = document.getElementById("ville").value;
  if (ville == "") {
    ville = "Non renseignée";
  }
}

function emailVerif() {
  email = document.getElementById("email").value;
  if (email == "") {
    missEmail.textContent = "Indiquez un email";
    missEmail.style.color = "red";
    confirmationEnvoi = false;
  } else {
    if (emailValid.test(email) == false) {
      missEmail.textContent = "Indiquez un email valide (exemple@domaine.fr)";
      missEmail.style.color = "orange";
      confirmationEnvoi = false;
    } else {
      missEmail.textContent = "";
    }
  }
}

function sujetVerif() {
  sujet = document.getElementById("sujet").value;
  if (sujet == "") {
    missSujet.textContent =
      "Veuillez sélectionner un sujet ci-dessus dans le menu déroulant";
    missSujet.style.color = "red";
    confirmationEnvoi = false;
  } else {
    missSujet.textContent = "";
  }
}

function questionVerif() {
  question = document.getElementById("question").value;
  if (question == "") {
    missQuestion.textContent = "Veuillez écrire votre question";
    missQuestion.style.color = "red";
    confirmationEnvoi = false;
  } else {
    if (question.length < 50) {
      missQuestion.textContent = "Pas assez de caractères (minimum 50)";
      missQuestion.style.color = "orange";
      confirmationEnvoi = false;
    } else {
      missQuestion.textContent = "";
    }
  }
}

function agreeVerif() {
  agree = document.getElementById("agree").checked;
  if (agree == false) {
    missAgree.textContent = "Cochez la case pour accepter le traitement";
    missAgree.style.color = "red";
    confirmationEnvoi = false;
  } else {
    missAgree.textContent = "";
    agree = "Accepté";
  }
}

function envoiFormulaire() {
  if (confirmationEnvoi == true) {
    formulaire = new Array(
      nom,
      prenom,
      sex,
      dateNaissance,
      CP,
      adres,
      ville,
      email,
      sujet,
      question,
      agree
    );
    console.log(formulaire);
    window.alert(
      "Les infos sont récupérés sur Javascript (pour la démonstration): " +
        formulaire
    );
    window.alert("Puis envoyer sur le serveur");
  }
}

function envoi() {
  if (confirmationEnvoi == false) {
    return false;
  }
  return true;
}
