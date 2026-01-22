/**
 * BIENIESTAR - JavaScript de Alimentación
 */

document.addEventListener('DOMContentLoaded', function() {
    initRecipeFilters();
    initRecipeSearch();
});

/**
 * Inicializar filtros de recetas
 */
function initRecipeFilters() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const recipeCards = document.querySelectorAll('.recipe-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.dataset.filter;
            
            // Actualizar botón activo
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filtrar recetas
            recipeCards.forEach(card => {
                const category = card.dataset.category;
                
                if (filter === 'all' || category === filter) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'scale(1)';
                    }, 10);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.9)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
}

/**
 * Inicializar búsqueda de recetas
 */
function initRecipeSearch() {
    const searchInput = document.getElementById('searchRecipes');
    const recipeCards = document.querySelectorAll('.recipe-card');
    
    if (!searchInput) return;
    
    searchInput.addEventListener('input', debounce(function() {
        const searchTerm = this.value.toLowerCase().trim();
        
        recipeCards.forEach(card => {
            const title = card.querySelector('h3').textContent.toLowerCase();
            const description = card.querySelector('.recipe-description').textContent.toLowerCase();
            
            if (title.includes(searchTerm) || description.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
        
        // Si no hay término de búsqueda, mostrar todas
        if (searchTerm === '') {
            const activeFilter = document.querySelector('.filter-btn.active');
            if (activeFilter) {
                activeFilter.click();
            }
        }
    }, 300));
}

/**
 * Animar entrada de cards
 */
function animateCards() {
    const cards = document.querySelectorAll('.recipe-card');
    
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.5s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
}

// Animar cards al cargar
window.addEventListener('load', animateCards);