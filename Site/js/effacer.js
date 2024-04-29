// Confirmation de l'effacement d'un profil utilisateur
document.getElementById("EffacerOui").addEventListener("click", function() {
    if (confirm("Êtes-vous vraiment sûr de vouloir effacer votre compte ?")) {
        document.getElementById("effacerForm").submit();
    }
});
