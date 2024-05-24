// Gérer le bouton pour faire apparaître et disparaître la sidebar pour la version desktop

const btnPopNav = document.getElementById("nav_opener");
const sideBar = document.getElementById("nav");

btnPopNav.addEventListener("click", () => {
    btnPopNav.classList.toggle("open");
    sideBar.classList.toggle("open");
})