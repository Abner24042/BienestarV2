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
/**
 * Manejo del menú de usuario con delay
 */
document.addEventListener('DOMContentLoaded', function() {
    const headerUser = document.querySelector('.header-user');
    const userMenu = document.querySelector('.user-menu');
    
    if (headerUser && userMenu) {
        let menuTimeout;
        
        // Mostrar menú al hacer hover en el usuario
        headerUser.addEventListener('mouseenter', function() {
            clearTimeout(menuTimeout);
            userMenu.style.display = 'block';
            setTimeout(() => {
                userMenu.style.opacity = '1';
                userMenu.style.transform = 'translateY(0)';
            }, 10);
        });
        
        // Ocultar menú con delay al salir del usuario
        headerUser.addEventListener('mouseleave', function() {
            menuTimeout = setTimeout(() => {
                userMenu.style.opacity = '0';
                userMenu.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    userMenu.style.display = 'none';
                }, 200);
            }, 300); // 300ms de delay antes de cerrar
        });
        
        // Mantener abierto si el cursor está sobre el menú
        userMenu.addEventListener('mouseenter', function() {
            clearTimeout(menuTimeout);
        });
        
        // Cerrar cuando el cursor sale del menú
        userMenu.addEventListener('mouseleave', function() {
            menuTimeout = setTimeout(() => {
                userMenu.style.opacity = '0';
                userMenu.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    userMenu.style.display = 'none';
                }, 200);
            }, 200);
        });
    }
});
// Animar cards al cargar
window.addEventListener('load', animateCards);