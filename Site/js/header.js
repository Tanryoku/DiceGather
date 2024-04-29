// Gérer le bouton pour faire apparaître et disparaître la sidebar pour la version desktop

const btnPopNav = document.getElementById("nav_opener");
const sideBar = document.getElementById("nav");

btnPopNav.addEventListener("click", () => {
    btnPopNav.classList.toggle("open");
    sideBar.classList.toggle("open");
})


// //Pour la page de recherche

//     //Bar de recherche : choix entre Table, ou MJ / joueur. Le set de filtre change selon table ou MJ/Joueur. Mj/Joueur changera le code php pour différencer le profil appelé.
// const categorySelect = document.getElementById('category');
// const tableFilters = document.getElementById('table-filters');
// const playerFilters = document.getElementById('player-filters');

// // Hide player and GM filters initially
// playerFilters.classList.add('hidden');
// console.log(categorySelect.value, tableFilters, playerFilters)

// categorySelect.addEventListener('change', () => {
//     if (categorySelect.value === 'table') {
//     tableFilters.classList.remove('hidden');
//     playerFilters.classList.add('hidden');

//     } else if (categorySelect.value === 'player') {
//     tableFilters.classList.add('hidden');
//     playerFilters.classList.remove('hidden');

//     } else {
//     tableFilters.classList.add('hidden');
//     playerFilters.classList.add('hidden');
//     }
// });


// Confirmation de l'effacement d'un profil utilisateur

// document.getElementById("EffacerOui").addEventListener("click", function() {
//     if (confirm("Êtes-vous vraiment sûr de vouloir effacer votre compte ?")) {
//         document.getElementById("deleteForm").submit();
//     }
// });
