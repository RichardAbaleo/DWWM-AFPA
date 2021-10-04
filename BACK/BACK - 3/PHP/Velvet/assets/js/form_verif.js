const refVerif = (reference, referenceErreur) => {
  if (reference.value == "") {
    reference.className = "form-control border-danger";
    referenceErreur.textContent = "Entrez une valeur";
    return false;
  } else if (reference.value.length > 10) {
    reference.className = "form-control border-danger";
    referenceErreur.textContent = "Valeur trop longue (maximum 10 caratères)";
    return false;
  } else {
    reference.className = "form-control border-success";
    referenceErreur.textContent = "\u2705";
    return true;
  }
};

const libelleVerif = (libelle, libelleErreur) => {
  if (libelle.value == "") {
    libelle.className = "form-control border-danger";
    libelleErreur.textContent = "Entrez une valeur";
    return false;
  } else if (libelle.value.length > 200) {
    libelle.className = "form-control border-danger";
    libelleErreur.textContent = "Valeur trop longue (maximum 200 caratères)";
    return false;
  } else {
    libelle.className = "form-control border-success";
    libelleErreur.textContent = "\u2705";
    return true;
  }
};

const descriptionVerif = (description, descriptionErreur) => {
  if (description.value.length > 1000) {
    description.className = "form-control border-danger";
    descriptionErreur.textContent =
      "Valeur trop longue (maximum 1000 caratères)";
    return false;
  } else {
    description.className = "form-control border-success";
    descriptionErreur.textContent = "\u2705";
    return true;
  }
};

const prixVerif = (prix, prixErreur) => {
  var prixRegex = /^\d+\.?\d{0,2}$/;
  if (isNaN(prix.value) || !prixRegex.test(prix.value)) {
    prix.className = "form-control border-danger";
    prixErreur.textContent =
      "Veuillez indiquer un prix valide (format XXXX.xx)";
    return false;
  } else if (prix.value > 999999.99) {
    prix.className = "form-control border-danger";
    prixErreur.textContent = "Prix trop élevé (maximum 999 999.99)";
    return false;
  } else {
    prix.className = "form-control border-success";
    prixErreur.textContent = "\u2705";
    return true;
  }
};

const stockVerif = (stock, stockErreur) => {
  var stockRegex = /^\+?\d+$/;
  if (isNaN(stock.value) || !stockRegex.test(stock.value)) {
    stock.className = "form-control border-danger";
    stockErreur.textContent = "Entrez une valeur valide en chiffre";
    return false;
  } else {
    stock.className = "form-control border-success";
    stockErreur.textContent = "\u2705";
    return true;
  }
};

const couleurVerif = (couleur, couleurErreur) => {
  if (couleur.value.length > 30) {
    couleur.className = "form-control border-danger";
    couleurErreur.textContent = "Valeur trop longue (maximum 30 caratères)";
    return false;
  } else {
    couleur.className = "form-control border-success";
    couleurErreur.textContent = "\u2705";
    return true;
  }
};

const bloqueVerif = (bloqueErreur, ouiBloque, nonBloque) => {
  if (nonBloque.checked) {
    bloqueErreur.textContent = "\u2705";
    return true;
  } else if (ouiBloque.checked) {
    bloqueErreur.textContent = "\u2705";
    return true;
  } else {
    bloqueErreur.textContent = "Selectionnez une valeur";
    return false;
  }
};

const catVerif = (cat, catErreur) => {
  if (cat.value == "null") {
    catErreur.textContent = "Selectionnez une catégorie";
    cat.className = "form-control border-danger";
    return false;
  } else {
    catErreur.textContent = "\u2705";
    cat.className = "form-control";
    return true;
  }
};
if (!!document.getElementById("form1")) {
  document.getElementById("form1").addEventListener("submit", addVerif);
}
function addVerif() {
  var reference = document.getElementById("reference");
  var cat = document.getElementById("cat");
  var libelle = document.getElementById("libelle");
  var description = document.getElementById("description");
  var prix = document.getElementById("prix");
  var stock = document.getElementById("stock");
  var couleur = document.getElementById("couleur");
  var referenceErreur = document.getElementById("referenceErreur");
  var libelleErreur = document.getElementById("libelleErreur");
  var descriptionErreur = document.getElementById("descriptionErreur");
  var prixErreur = document.getElementById("prixErreur");
  var stockErreur = document.getElementById("stockErreur");
  var couleurErreur = document.getElementById("couleurErreur");
  var bloqueErreur = document.getElementById("bloqueErreur");
  var ouiBloque = document.getElementById("oui");
  var nonBloque = document.getElementById("non");
  var catErreur = document.getElementById("catErreur");
  var validReference = refVerif(reference, referenceErreur);
  var validCat = catVerif(cat, catErreur);
  var validlibelle = libelleVerif(libelle, libelleErreur);
  var validDescription = descriptionVerif(description, descriptionErreur);
  var validPrix = prixVerif(prix, prixErreur);
  var validStock = stockVerif(stock, stockErreur);
  var validCouleur = couleurVerif(couleur, couleurErreur);
  var validBloque = bloqueVerif(bloqueErreur, ouiBloque, nonBloque);
  if (
    !validReference ||
    !validCat ||
    !validlibelle ||
    !validDescription ||
    !validPrix ||
    !validStock ||
    !validCouleur ||
    !validBloque
  ) {
    return false;
  } else {
    return true;
  }
}

if (!!document.getElementById("updateForm")) {
  document.getElementById("updateForm").addEventListener("submit", updateVerif);
}
function updateVerif() {
  var reference = document.getElementById("reference");
  var libelle = document.getElementById("libelle");
  var description = document.getElementById("description");
  var prix = document.getElementById("prix");
  var stock = document.getElementById("stock");
  var couleur = document.getElementById("couleur");
  var referenceErreur = document.getElementById("referenceErreur");
  var libelleErreur = document.getElementById("libelleErreur");
  var descriptionErreur = document.getElementById("descriptionErreur");
  var prixErreur = document.getElementById("prixErreur");
  var stockErreur = document.getElementById("stockErreur");
  var couleurErreur = document.getElementById("couleurErreur");
  var validReference = refVerif(reference, referenceErreur);
  var validlibelle = libelleVerif(libelle, libelleErreur);
  var validDescription = descriptionVerif(description, descriptionErreur);
  var validPrix = prixVerif(prix, prixErreur);
  var validStock = stockVerif(stock, stockErreur);
  var validCouleur = couleurVerif(couleur, couleurErreur);
  if (
    !validReference ||
    !validlibelle ||
    !validDescription ||
    !validPrix ||
    !validStock ||
    !validCouleur
  ) {
    return false;
  } else {
    return true;
  }
}
