/**
 * BIENIESTAR - JavaScript de Ejercicio
 */

document.addEventListener('DOMContentLoaded', function() {
    initExerciseFilters();
    initLevelFilter();
});

/**
 * Inicializar filtros de tipo de ejercicio
 */
function initExerciseFilters() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const exerciseCards = document.querySelectorAll('.exercise-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.dataset.filter;
            
            // Actualizar botón activo
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Aplicar filtro
            applyFilters();
        });
    });
}

/**
 * Inicializar filtro de nivel
 */
function initLevelFilter() {
    const levelSelect = document.getElementById('levelFilter');
    
    if (levelSelect) {
        levelSelect.addEventListener('change', applyFilters);
    }
}

/**
 * Aplicar filtros combinados
 */
function applyFilters() {
    const activeTypeFilter = document.querySelector('.filter-btn.active');
    const levelSelect = document.getElementById('levelFilter');
    const exerciseCards = document.querySelectorAll('.exercise-card');
    
    const typeFilter = activeTypeFilter ? activeTypeFilter.dataset.filter : 'all';
    const levelFilter = levelSelect ? levelSelect.value : 'all';
    
    exerciseCards.forEach(card => {
        const cardType = card.dataset.type;
        const cardLevel = card.dataset.level;
        
        const typeMatch = typeFilter === 'all' || cardType === typeFilter;
        const levelMatch = levelFilter === 'all' || cardLevel === levelFilter;
        
        if (typeMatch && levelMatch) {
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
}

/**
 * Iniciar entrenamiento (temporizador)
 */
function startWorkout() {
    showToast('¡Entrenamiento iniciado! 💪', 'success');
    
    // Aquí puedes agregar la lógica del temporizador
    // Por ahora solo mostramos una notificación
    
    // Cerrar modal
    const modal = document.querySelector('.modal.active');
    if (modal) {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }
    
    // Simulación de temporizador
    let timeLeft = 7 * 60; // 7 minutos en segundos
    
    const timerNotification = document.createElement('div');
    timerNotification.className = 'workout-timer';
    timerNotification.innerHTML = `
        <div class="timer-content">
            <h3>Entrenamiento en curso</h3>
            <div class="timer-display">
                <span class="timer-minutes">07</span>:<span class="timer-seconds">00</span>
            </div>
            <button class="btn btn-secondary btn-small" onclick="stopWorkout(this)">Detener</button>
        </div>
    `;
    document.body.appendChild(timerNotification);
    
    const interval = setInterval(() => {
        timeLeft--;
        
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        
        const minutesDisplay = document.querySelector('.timer-minutes');
        const secondsDisplay = document.querySelector('.timer-seconds');
        
        if (minutesDisplay && secondsDisplay) {
            minutesDisplay.textContent = String(minutes).padStart(2, '0');
            secondsDisplay.textContent = String(seconds).padStart(2, '0');
        }
        
        if (timeLeft <= 0) {
            clearInterval(interval);
            timerNotification.remove();
            showToast('¡Entrenamiento completado! 🎉', 'success');
        }
    }, 1000);
    
    timerNotification.dataset.intervalId = interval;
}

/**
 * Detener entrenamiento
 */
function stopWorkout(button) {
    const timer = button.closest('.workout-timer');
    if (timer) {
        const intervalId = timer.dataset.intervalId;
        if (intervalId) {
            clearInterval(parseInt(intervalId));
        }
        timer.remove();
        showToast('Entrenamiento detenido', 'info');
    }
}

// Estilos para el temporizador
const style = document.createElement('style');
style.textContent = `
.workout-timer {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background: white;
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    z-index: 2000;
    min-width: 250px;
}

.timer-content {
    text-align: center;
}

.timer-content h3 {
    margin-bottom: 20px;
    color: #111;
    font-size: 1.2rem;
}

.timer-display {
    font-size: 3rem;
    font-weight: 700;
    color: #ff6b35;
    margin-bottom: 20px;
    font-family: 'Courier New', monospace;
}

.btn-small {
    padding: 8px 20px;
    font-size: 0.9rem;
}
`;
document.head.appendChild(style);