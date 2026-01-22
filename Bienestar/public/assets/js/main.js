/**
 * BIENIESTAR - JavaScript Principal
 * Funciones globales y utilidades
 */

// Inicialización cuando el DOM está listo
document.addEventListener('DOMContentLoaded', function() {
    console.log('BIENIESTAR cargado correctamente');
    initializeApp();
});

/**
 * Inicializar la aplicación
 */
function initializeApp() {
    // Smooth scroll para todos los enlaces internos
    initSmoothScroll();
    
    // Lazy loading de imágenes
    initLazyLoading();
    
    // Cerrar alertas
    initAlertClose();
}

/**
 * Smooth Scroll para enlaces internos
 */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            
            // Ignorar si es solo "#"
            if (href === '#') return;
            
            e.preventDefault();
            
            const target = document.querySelector(href);
            if (target) {
                const offsetTop = target.offsetTop - 80; // 80px para navbar sticky
                
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
}

/**
 * Lazy Loading de imágenes
 */
function initLazyLoading() {
    const images = document.querySelectorAll('img[data-src]');
    
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
                observer.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
}

/**
 * Cerrar alertas
 */
function initAlertClose() {
    document.querySelectorAll('.alert-close').forEach(button => {
        button.addEventListener('click', function() {
            const alert = this.closest('.alert');
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 300);
            }
        });
    });
}

/**
 * Mostrar/Ocultar loader
 */
function showLoader() {
    let loader = document.getElementById('loader');
    if (!loader) {
        loader = document.createElement('div');
        loader.id = 'loader';
        loader.className = 'loader';
        loader.innerHTML = '<div class="spinner"></div>';
        document.body.appendChild(loader);
    }
    loader.style.display = 'flex';
}

function hideLoader() {
    const loader = document.getElementById('loader');
    if (loader) {
        loader.style.display = 'none';
    }
}

/**
 * Mostrar notificación toast
 */
function showToast(message, type = 'info', duration = 3000) {
    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;
    toast.innerHTML = `
        <div class="toast-content">
            <span class="toast-icon">${getToastIcon(type)}</span>
            <span class="toast-message">${message}</span>
        </div>
    `;
    
    document.body.appendChild(toast);
    
    // Mostrar
    setTimeout(() => toast.classList.add('show'), 100);
    
    // Ocultar y remover
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 300);
    }, duration);
}

function getToastIcon(type) {
    const icons = {
        success: '✓',
        error: '✕',
        warning: '⚠',
        info: 'ℹ'
    };
    return icons[type] || icons.info;
}

/**
 * Validar formulario
 */
function validateForm(formId) {
    const form = document.getElementById(formId);
    if (!form) return false;
    
    let isValid = true;
    const inputs = form.querySelectorAll('[required]');
    
    inputs.forEach(input => {
        if (!input.value.trim()) {
            isValid = false;
            showFieldError(input, 'Este campo es requerido');
        } else {
            clearFieldError(input);
        }
        
        // Validar email
        if (input.type === 'email' && input.value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(input.value)) {
                isValid = false;
                showFieldError(input, 'Email inválido');
            }
        }
    });
    
    return isValid;
}

function showFieldError(input, message) {
    input.classList.add('error');
    
    let errorMsg = input.nextElementSibling;
    if (!errorMsg || !errorMsg.classList.contains('error-message')) {
        errorMsg = document.createElement('span');
        errorMsg.className = 'error-message';
        input.parentNode.insertBefore(errorMsg, input.nextSibling);
    }
    errorMsg.textContent = message;
}

function clearFieldError(input) {
    input.classList.remove('error');
    const errorMsg = input.nextElementSibling;
    if (errorMsg && errorMsg.classList.contains('error-message')) {
        errorMsg.remove();
    }
}

/**
 * Formatear fecha
 */
function formatDate(date, format = 'DD/MM/YYYY') {
    const d = new Date(date);
    const day = String(d.getDate()).padStart(2, '0');
    const month = String(d.getMonth() + 1).padStart(2, '0');
    const year = d.getFullYear();
    
    return format
        .replace('DD', day)
        .replace('MM', month)
        .replace('YYYY', year);
}

/**
 * Debounce function
 */
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

/**
 * Hacer petición AJAX
 */
async function fetchAPI(url, options = {}) {
    try {
        showLoader();
        
        const response = await fetch(url, {
            ...options,
            headers: {
                'Content-Type': 'application/json',
                ...options.headers
            }
        });
        
        const data = await response.json();
        
        hideLoader();
        
        if (!response.ok) {
            throw new Error(data.message || 'Error en la petición');
        }
        
        return data;
        
    } catch (error) {
        hideLoader();
        showToast(error.message, 'error');
        throw error;
    }
}