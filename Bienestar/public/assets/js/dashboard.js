/**
 * BIENIESTAR - JavaScript del Dashboard
 */

document.addEventListener('DOMContentLoaded', function() {
    initDashboard();
    animateStats();
});

/**
 * Inicializar dashboard
 */
function initDashboard() {
    // Animar cards al entrar
    animateCardsOnScroll();
    
    // Gráficas simples (si se requieren)
    initSimpleCharts();
    
    // Actualizar hora actual
    updateCurrentTime();
    setInterval(updateCurrentTime, 60000); // Cada minuto
}

/**
 * Animar estadísticas con contador
 */
function animateStats() {
    const statValues = document.querySelectorAll('.stat-value');
    
    statValues.forEach(stat => {
        const text = stat.textContent;
        const number = parseInt(text.replace(/\D/g, ''));
        
        if (!isNaN(number) && number > 0) {
            animateValue(stat, 0, number, 1500);
        }
    });
}

/**
 * Animar valor numérico
 */
function animateValue(element, start, end, duration) {
    const text = element.textContent;
    const suffix = text.replace(/[0-9]/g, '').trim();
    
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        const current = Math.floor(progress * (end - start) + start);
        
        element.textContent = current + ' ' + suffix;
        
        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };
    window.requestAnimationFrame(step);
}

/**
 * Animar cards al hacer scroll
 */
function animateCardsOnScroll() {
    const cards = document.querySelectorAll('.stat-card, .action-card');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '0';
                entry.target.style.transform = 'translateY(30px)';
                
                setTimeout(() => {
                    entry.target.style.transition = 'all 0.6s ease';
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, 100);
                
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    
    cards.forEach(card => observer.observe(card));
}

/**
 * Inicializar gráficas simples
 */
function initSimpleCharts() {
    // Aquí puedes agregar gráficas con Chart.js si lo necesitas
    console.log('Charts initialized');
}

/**
 * Actualizar hora actual
 */
function updateCurrentTime() {
    const now = new Date();
    const timeString = now.toLocaleTimeString('es-MX', {
        hour: '2-digit',
        minute: '2-digit'
    });
    
    const timeElement = document.getElementById('currentTime');
    if (timeElement) {
        timeElement.textContent = timeString;
    }
}

/**
 * Obtener saludo según la hora
 */
function getGreeting() {
    const hour = new Date().getHours();
    
    if (hour < 12) return '¡Buenos días';
    if (hour < 18) return '¡Buenas tardes';
    return '¡Buenas noches';
}

/**
 * Mostrar notificación en el dashboard
 */
function showDashboardNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `dashboard-notification notification-${type}`;
    notification.innerHTML = `
        <span class="notification-icon">${getNotificationIcon(type)}</span>
        <span class="notification-message">${message}</span>
        <button class="notification-close">&times;</button>
    `;
    
    document.body.appendChild(notification);
    
    // Mostrar
    setTimeout(() => notification.classList.add('show'), 100);
    
    // Botón de cerrar
    notification.querySelector('.notification-close').addEventListener('click', () => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    });
    
    // Auto-ocultar
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    }, 5000);
}

function getNotificationIcon(type) {
    const icons = {
        success: '✓',
        error: '✕',
        warning: '⚠',
        info: 'ℹ'
    };
    return icons[type] || icons.info;
}

// Estilos para notificaciones del dashboard
const style = document.createElement('style');
style.textContent = `
.dashboard-notification {
    position: fixed;
    top: 100px;
    right: -400px;
    max-width: 350px;
    padding: 16px 20px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    display: flex;
    align-items: center;
    gap: 12px;
    z-index: 2000;
    transition: right 0.3s ease;
}

.dashboard-notification.show {
    right: 30px;
}

.notification-icon {
    font-size: 1.5rem;
    font-weight: bold;
}

.notification-success { border-left: 4px solid #4caf50; }
.notification-success .notification-icon { color: #4caf50; }

.notification-error { border-left: 4px solid #f44336; }
.notification-error .notification-icon { color: #f44336; }

.notification-warning { border-left: 4px solid #ff9800; }
.notification-warning .notification-icon { color: #ff9800; }

.notification-info { border-left: 4px solid #2196f3; }
.notification-info .notification-icon { color: #2196f3; }

.notification-message {
    flex: 1;
    color: #333;
    font-size: 0.95rem;
}

.notification-close {
    background: none;
    border: none;
    font-size: 1.5rem;
    color: #999;
    cursor: pointer;
    padding: 0;
    width: 24px;
    height: 24px;
}

.notification-close:hover {
    color: #333;
}
`;
document.head.appendChild(style);