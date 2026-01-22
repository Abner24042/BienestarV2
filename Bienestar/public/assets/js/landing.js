/**
 * BIENIESTAR - JavaScript del Landing Page
 * Efectos parallax y scroll
 */

document.addEventListener('DOMContentLoaded', function() {
    initLandingEffects();
});

/**
 * Inicializar efectos del landing
 */
function initLandingEffects() {
    const heroSection = document.getElementById('heroSection');
    const heroBackground = document.getElementById('heroBackground');
    const heroContent = document.getElementById('heroContent');
    const stickyNav = document.getElementById('stickyNav');
    
    if (!heroSection) return;
    
    // Efecto parallax al hacer scroll
    window.addEventListener('scroll', debounce(handleScroll, 10));
    
    function handleScroll() {
        const scrollPosition = window.pageYOffset;
        const windowHeight = window.innerHeight;
        const scrollPercent = scrollPosition / windowHeight;
        
        // Solo aplicar efectos si estamos en la parte superior
        if (scrollPosition < windowHeight * 1.5) {
            applyParallaxEffect(scrollPosition, scrollPercent);
        }
        
        // Mostrar/ocultar navegación sticky
        toggleStickyNav(scrollPosition);
        
        // Animaciones de secciones al hacer scroll
        animateSectionsOnScroll();
    }
    
    /**
     * Aplicar efecto parallax
     */
    function applyParallaxEffect(scrollPosition, scrollPercent) {
        if (scrollPosition > 50) {
            heroSection.classList.add('scrolled');
            
            // Reducir altura del hero dinámicamente
            const minHeight = 30; // vh mínimo
            const maxHeight = 100; // vh máximo
            const newHeight = Math.max(minHeight, maxHeight - (scrollPercent * 70));
            heroSection.style.height = newHeight + 'vh';
            
            // Escalar la imagen de fondo (zoom in)
            const scale = 1 + (scrollPercent * 0.3);
            heroBackground.style.transform = `scale(${scale})`;
            
            // Desvanecer el contenido
            const opacity = Math.max(0, 1 - (scrollPercent * 2));
            heroContent.style.opacity = opacity;
            
            // Mover contenido hacia arriba
            const translateY = scrollPercent * 50;
            heroContent.style.transform = `translateY(-${translateY}px)`;
            
        } else {
            // Reset cuando volvemos arriba
            heroSection.classList.remove('scrolled');
            heroSection.style.height = '100vh';
            heroBackground.style.transform = 'scale(1)';
            heroContent.style.opacity = '1';
            heroContent.style.transform = 'translateY(0)';
        }
    }
    
    /**
     * Mostrar/ocultar navegación sticky
     */
    function toggleStickyNav(scrollPosition) {
        if (scrollPosition > 500) {
            stickyNav.classList.add('show');
        } else {
            stickyNav.classList.remove('show');
        }
    }
    
    /**
     * Animar secciones cuando entran en viewport
     */
    function animateSectionsOnScroll() {
        const sections = document.querySelectorAll('.feature-card, .service-card');
        
        sections.forEach(section => {
            const sectionTop = section.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (sectionTop < windowHeight * 0.8) {
                section.classList.add('animate-in');
            }
        });
    }
    
    // Agregar clase para animaciones CSS
    const style = document.createElement('style');
    style.textContent = `
        .feature-card,
        .service-card {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        
        .feature-card.animate-in,
        .service-card.animate-in {
            opacity: 1;
            transform: translateY(0);
        }
    `;
    document.head.appendChild(style);
}

/**
 * Animar números (contador)
 */
function animateNumbers() {
    const numbers = document.querySelectorAll('.feature-number');
    
    numbers.forEach(number => {
        const finalValue = parseInt(number.textContent.replace(/\D/g, ''));
        const duration = 2000; // 2 segundos
        const steps = 60;
        const increment = finalValue / steps;
        let current = 0;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= finalValue) {
                number.textContent = finalValue;
                clearInterval(timer);
            } else {
                number.textContent = Math.floor(current);
            }
        }, duration / steps);
    });
}

/**
 * Efecto de typing en el título
 */
function typeWriterEffect(element, text, speed = 50) {
    let i = 0;
    element.textContent = '';
    
    function type() {
        if (i < text.length) {
            element.textContent += text.charAt(i);
            i++;
            setTimeout(type, speed);
        }
    }
    
    type();
}

// Inicializar animaciones cuando las secciones están visibles
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            if (entry.target.classList.contains('features-section')) {
                animateNumbers();
                observer.unobserve(entry.target);
            }
        }
    });
}, { threshold: 0.3 });

const featuresSection = document.querySelector('.features-section');
if (featuresSection) {
    observer.observe(featuresSection);
}