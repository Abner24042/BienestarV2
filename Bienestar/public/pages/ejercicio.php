<?php
require_once '../../app/config/config.php';
require_once '../../app/controllers/AuthController.php';

$authController = new AuthController();

if (!$authController->isAuthenticated()) {
    redirect('../pages/login.php');
}

$user = $authController->getCurrentUser();
$currentPage = 'ejercicio';
$pageTitle = 'Ejercicio';
$additionalCSS = ['ejercicio.css'];
?>

<?php include '../../app/views/layouts/header.php'; ?>

<div class="content-wrapper">
    <div class="page-header">
        <h1>Rutinas de Ejercicio 💪</h1>
        <p>Encuentra la rutina perfecta para alcanzar tus objetivos</p>
    </div>

    <!-- Filtros de Ejercicio -->
    <div class="exercise-filters">
        <div class="filter-group">
            <button class="filter-btn active" data-filter="all">Todas</button>
            <button class="filter-btn" data-filter="cardio">Cardio</button>
            <button class="filter-btn" data-filter="fuerza">Fuerza</button>
            <button class="filter-btn" data-filter="flexibilidad">Flexibilidad</button>
            <button class="filter-btn" data-filter="equilibrio">Equilibrio</button>
        </div>
        
        <div class="level-group">
            <label>Nivel:</label>
            <select id="levelFilter" class="level-select">
                <option value="all">Todos los niveles</option>
                <option value="principiante">Principiante</option>
                <option value="intermedio">Intermedio</option>
                <option value="avanzado">Avanzado</option>
            </select>
        </div>
    </div>

    <!-- Grid de Ejercicios -->
    <div class="exercises-grid" id="exercisesGrid">
        <!-- Ejercicio 1 -->
        <div class="exercise-card" data-type="cardio" data-level="principiante">
            <div class="exercise-image">
                <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?w=600&q=80" alt="Cardio">
                <div class="exercise-badges">
                    <span class="badge badge-type">Cardio</span>
                    <span class="badge badge-level level-principiante">Principiante</span>
                </div>
                <div class="play-button">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="white">
                        <path d="M8 5V19L19 12L8 5Z"/>
                    </svg>
                </div>
            </div>
            <div class="exercise-content">
                <h3>Cardio de 7 Minutos</h3>
                <p class="exercise-description">Rutina rápida de alta intensidad para quemar calorías</p>
                
                <div class="exercise-stats">
                    <div class="stat-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>7 min</span>
                    </div>
                    <div class="stat-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>80 kcal</span>
                    </div>
                </div>
                
                <button class="btn btn-primary btn-block" data-modal-open="modalExercise1">Ver Rutina</button>
            </div>
        </div>

        <!-- Ejercicio 2 -->
        <div class="exercise-card" data-type="fuerza" data-level="intermedio">
            <div class="exercise-image">
                <img src="https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e?w=600&q=80" alt="Fuerza">
                <div class="exercise-badges">
                    <span class="badge badge-type">Fuerza</span>
                    <span class="badge badge-level level-intermedio">Intermedio</span>
                </div>
                <div class="play-button">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="white">
                        <path d="M8 5V19L19 12L8 5Z"/>
                    </svg>
                </div>
            </div>
            <div class="exercise-content">
                <h3>Fuerza Cuerpo Completo</h3>
                <p class="exercise-description">Entrenamiento completo con peso corporal</p>
                
                <div class="exercise-stats">
                    <div class="stat-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>30 min</span>
                    </div>
                    <div class="stat-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>250 kcal</span>
                    </div>
                </div>
                
                <button class="btn btn-primary btn-block" data-modal-open="modalExercise2">Ver Rutina</button>
            </div>
        </div>

        <!-- Ejercicio 3 -->
        <div class="exercise-card" data-type="flexibilidad" data-level="principiante">
            <div class="exercise-image">
                <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=600&q=80" alt="Yoga">
                <div class="exercise-badges">
                    <span class="badge badge-type">Flexibilidad</span>
                    <span class="badge badge-level level-principiante">Principiante</span>
                </div>
                <div class="play-button">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="white">
                        <path d="M8 5V19L19 12L8 5Z"/>
                    </svg>
                </div>
            </div>
            <div class="exercise-content">
                <h3>Yoga para Principiantes</h3>
                <p class="exercise-description">Sesión de yoga suave para flexibilidad</p>
                
                <div class="exercise-stats">
                    <div class="stat-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>20 min</span>
                    </div>
                    <div class="stat-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>100 kcal</span>
                    </div>
                </div>
                
                <button class="btn btn-primary btn-block" data-modal-open="modalExercise3">Ver Rutina</button>
            </div>
        </div>

        <!-- Ejercicio 4 -->
        <div class="exercise-card" data-type="cardio" data-level="intermedio">
            <div class="exercise-image">
                <img src="https://images.unsplash.com/photo-1538805060514-97d9cc17730c?w=600&q=80" alt="Running">
                <div class="exercise-badges">
                    <span class="badge badge-type">Cardio</span>
                    <span class="badge badge-level level-intermedio">Intermedio</span>
                </div>
                <div class="play-button">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="white">
                        <path d="M8 5V19L19 12L8 5Z"/>
                    </svg>
                </div>
            </div>
            <div class="exercise-content">
                <h3>HIIT Intenso</h3>
                <p class="exercise-description">Entrenamiento de intervalos de alta intensidad</p>
                
                <div class="exercise-stats">
                    <div class="stat-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>25 min</span>
                    </div>
                    <div class="stat-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>350 kcal</span>
                    </div>
                </div>
                
                <button class="btn btn-primary btn-block" data-modal-open="modalExercise4">Ver Rutina</button>
            </div>
        </div>

        <!-- Ejercicio 5 -->
        <div class="exercise-card" data-type="fuerza" data-level="avanzado">
            <div class="exercise-image">
                <img src="https://images.unsplash.com/photo-1541534741688-6078c6bfb5c5?w=600&q=80" alt="Pesas">
                <div class="exercise-badges">
                    <span class="badge badge-type">Fuerza</span>
                    <span class="badge badge-level level-avanzado">Avanzado</span>
                </div>
                <div class="play-button">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="white">
                        <path d="M8 5V19L19 12L8 5Z"/>
                    </svg>
                </div>
            </div>
            <div class="exercise-content">
                <h3>Entrenamiento con Pesas</h3>
                <p class="exercise-description">Rutina avanzada para ganar músculo</p>
                
                <div class="exercise-stats">
                    <div class="stat-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>45 min</span>
                    </div>
                    <div class="stat-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>400 kcal</span>
                    </div>
                </div>
                
                <button class="btn btn-primary btn-block" data-modal-open="modalExercise5">Ver Rutina</button>
            </div>
        </div>

        <!-- Ejercicio 6 -->
        <div class="exercise-card" data-type="equilibrio" data-level="principiante">
            <div class="exercise-image">
                <img src="https://images.unsplash.com/photo-1599901860904-17e6ed7083a0?w=600&q=80" alt="Pilates">
                <div class="exercise-badges">
                    <span class="badge badge-type">Equilibrio</span>
                    <span class="badge badge-level level-principiante">Principiante</span>
                </div>
                <div class="play-button">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="white">
                        <path d="M8 5V19L19 12L8 5Z"/>
                    </svg>
                </div>
            </div>
            <div class="exercise-content">
                <h3>Pilates Básico</h3>
                <p class="exercise-description">Ejercicios de core y equilibrio</p>
                
                <div class="exercise-stats">
                    <div class="stat-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>30 min</span>
                    </div>
                    <div class="stat-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>150 kcal</span>
                    </div>
                </div>
                
                <button class="btn btn-primary btn-block" data-modal-open="modalExercise6">Ver Rutina</button>
            </div>
        </div>
    </div>

    <!-- Beneficios del Ejercicio -->
    <div class="exercise-benefits">
        <h2>Beneficios del Ejercicio Regular 🌟</h2>
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">❤️</div>
                <h3>Salud Cardiovascular</h3>
                <p>Mejora la salud del corazón y reduce el riesgo de enfermedades</p>
            </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">🧠</div>
                <h3>Salud Mental</h3>
                <p>Reduce el estrés, ansiedad y mejora el estado de ánimo</p>
            </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">💪</div>
                <h3>Fuerza y Resistencia</h3>
                <p>Aumenta la masa muscular y la resistencia física</p>
            </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">😴</div>
                <h3>Mejor Sueño</h3>
                <p>Ayuda a conciliar el sueño y mejora su calidad</p>
            </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">⚡</div>
                <h3>Más Energía</h3>
                <p>Aumenta los niveles de energía durante el día</p>
            </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">🎯</div>
                <h3>Control de Peso</h3>
                <p>Ayuda a mantener un peso saludable</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Ejercicio (Ejemplo - Ejercicio 1) -->
<?php
$modalId = 'modalExercise1';
$modalTitle = 'Cardio de 7 Minutos';
$modalSize = 'large';
$modalContent = '
<div class="exercise-modal-content">
    <div class="exercise-modal-video">
        <div class="video-placeholder">
            <svg width="80" height="80" viewBox="0 0 24 24" fill="#ff6b35">
                <path d="M8 5V19L19 12L8 5Z"/>
            </svg>
            <p>Video Tutorial</p>
        </div>
    </div>
    
    <div class="exercise-modal-info">
        <div class="exercise-modal-stats">
            <div class="stat-box">
                <span class="stat-label">Duración</span>
                <span class="stat-value">7 min</span>
            </div>
            <div class="stat-box">
                <span class="stat-label">Calorías</span>
                <span class="stat-value">80 kcal</span>
            </div>
            <div class="stat-box">
                <span class="stat-label">Nivel</span>
                <span class="stat-value">Principiante</span>
            </div>
            <div class="stat-box">
                <span class="stat-label">Tipo</span>
                <span class="stat-value">Cardio</span>
            </div>
        </div>
        
        <h3>Descripción:</h3>
        <p>Esta rutina de cardio de alta intensidad está diseñada para quemar calorías en poco tiempo. Perfecta para cuando tienes poco tiempo pero quieres un entrenamiento efectivo.</p>
        
        <h3>Ejercicios:</h3>
        <ol class="exercises-list">
            <li><strong>Jumping Jacks</strong> - 30 segundos</li>
            <li><strong>Descanso</strong> - 10 segundos</li>
            <li><strong>Sentadillas</strong> - 30 segundos</li>
            <li><strong>Descanso</strong> - 10 segundos</li>
            <li><strong>Flexiones</strong> - 30 segundos</li>
            <li><strong>Descanso</strong> - 10 segundos</li>
            <li><strong>Abdominales</strong> - 30 segundos</li>
            <li><strong>Descanso</strong> - 10 segundos</li>
            <li><strong>Burpees</strong> - 30 segundos</li>
            <li><strong>Descanso</strong> - 10 segundos</li>
            <li><strong>Mountain Climbers</strong> - 30 segundos</li>
            <li><strong>Descanso</strong> - 10 segundos</li>
        </ol>
        
        <div class="exercise-tips">
            <h4>💡 Consejos:</h4>
            <ul>
                <li>Calienta durante 2-3 minutos antes de comenzar</li>
                <li>Mantén una buena postura en cada ejercicio</li>
                <li>Respira de forma constante</li>
                <li>Detente si sientes dolor</li>
                <li>Hidrátate antes, durante y después</li>
            </ul>
        </div>
        
        <button class="btn btn-primary btn-block btn-large" onclick="startWorkout()">
            Iniciar Entrenamiento
        </button>
    </div>
</div>
';
include '../../app/views/components/modal.php';
?>

<?php
$additionalJS = ['ejercicio.js'];
include '../../app/views/layouts/footer.php';
?>