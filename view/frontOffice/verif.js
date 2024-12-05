function validateForm() {
    let isValid = true;

    const titre = document.getElementById("titre");
    const titreError = document.getElementById("titreER");
    if (titre.value.trim().length < 4) {
        titreError.textContent = "Le titre doit contenir au moins 4 caractères.";
        titre.focus();
        isValid = false;
    } else {
        titreError.textContent = "";
    }

    const email = document.getElementById("email");
    const emailError = document.getElementById("emailER");
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email.value.trim())) {
        emailError.textContent = "L'adresse e-mail est invalide.";
        email.focus();
        isValid = false;
    } else {
        emailError.textContent = "";
    }

    const statut = document.getElementById("status");
    const statutError = document.getElementById("statutER");
    if (statut.value.trim() === "") {
        statutError.textContent = "Le statut ne peut pas être vide.";
        statut.focus();
        isValid = false;
    } else {
        statutError.textContent = "";
    }

    const type_reclamation = document.getElementById("type_reclamation");
    const typeReclamationError = document.getElementById("typeReclamationER");
    if (type_reclamation.value === "") {
        typeReclamationError.textContent = "Veuillez sélectionner un type de réclamation.";
        isValid = false;
    } else {
        typeReclamationError.textContent = "";
    }

    return isValid;
}

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("rec");
    form.addEventListener("submit", function (event) {
        if (!validateForm()) {
            event.preventDefault(); 
        }
    });
});
