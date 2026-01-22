/**
 * BIENIESTAR - JavaScript de Noticias
 */

document.addEventListener('DOMContentLoaded', function() {
    initNewsFilters();
    initNewsletterForm();
});

/**
 * Inicializar filtros de noticias
 */
function initNewsFilters() {
    const filterButtons = document.querySelectorAll('.news-filters .filter-btn');
    const newsCards = document.querySelectorAll('.news-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.dataset.filter;
            
            // Actualizar botón activo
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filtrar noticias
            newsCards.forEach(card => {
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
 * Inicializar formulario de newsletter
 */
function initNewsletterForm() {
    const form = document.querySelector('.newsletter-form');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = this.querySelector('input[type="email"]').value;
            
            if (!email) {
                showToast('Por favor ingresa tu correo', 'warning');
                return;
            }
            
            if (!isValidEmail(email)) {
                showToast('Por favor ingresa un correo válido', 'error');
                return;
            }
            
            // Simular envío
            showLoader();
            
            setTimeout(() => {
                hideLoader();
                showToast('¡Gracias por suscribirte! 📧', 'success');
                this.reset();
            }, 1500);
        });
    }
}

/**
 * Animar entrada de tarjetas
 */
function animateNewsCards() {
    const cards = document.querySelectorAll('.news-card');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    
    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'all 0.6s ease';
        observer.observe(card);
    });
}

// Animar al cargar
window.addEventListener('load', animateNewsCards);