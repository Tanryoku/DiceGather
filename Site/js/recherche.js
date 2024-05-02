//Pour la page de recherche

    //Bar de recherche : choix entre Table, ou MJ / joueur. Le set de filtre change selon table ou MJ/Joueur. Mj/Joueur changera le code php pour différencer le profil appelé.
    const categorySelect = document.getElementById('category');
    const tableFilters = document.getElementById('table-filters');
    const playerFilters = document.getElementById('player-filters');
    
    // Les blocs sont cachés, seul celui choisit dans le select apparait.
    playerFilters.classList.add('hidden');
    console.log(categorySelect.value, tableFilters, playerFilters)
    
    categorySelect.addEventListener('change', () => {
        if (categorySelect.value === 'table') {
        tableFilters.classList.remove('hidden');
        playerFilters.classList.add('hidden');
    
        } else if (categorySelect.value === 'player') {
        tableFilters.classList.add('hidden');
        playerFilters.classList.remove('hidden');
    
        } else {
        tableFilters.classList.add('hidden');
        playerFilters.classList.add('hidden');
        }
    });