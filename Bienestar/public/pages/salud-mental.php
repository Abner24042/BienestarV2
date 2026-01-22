<?php
require_once '../../app/config/config.php';
require_once '../../app/controllers/AuthController.php';

$authController = new AuthController();

if (!$authController->isAuthenticated()) {
    redirect('../pages/login.php');
}

$user = $authController->getCurrentUser();
$currentPage = 'salud-mental';
$pageTitle = 'Salud Mental';
$additionalCSS = ['salud-mental.css'];
?>

<?php include '../../app/views/layouts/header.php'; ?>

<div class="content-wrapper">
    <div class="page-header">
        <h1>Salud Mental 🧠</h1>
        <p>Cuida tu bienestar emocional y mental</p>
    </div>

    <!-- Test Destacado -->
    <div class="featured-test">
        <div class="test-content">
            <div class="test-icon">🧪</div>
            <h2>Test de Bienestar Mental</h2>
            <p>Evalúa tu estado emocional actual con nuestro test científicamente validado</p>
            <button class="btn btn-primary btn-large" data-modal-open="modalTest">Realizar Test</button>
        </div>
        <div class="test-illustration">
            <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=600&q=80" alt="Mental Health">
        </div>
    </div>

    <!-- Recursos de Salud Mental -->
    <div class="mental-health-resources">
        <h2>Recursos y Técnicas 💡</h2>
        <div class="resources-grid">
            <!-- Recurso 1: Meditación -->
            <div class="resource-card">
                <div class="resource-icon">🧘</div>
                <h3>Meditación Guiada</h3>
                <p>Técnicas de meditación para reducir el estrés y mejorar el enfoque</p>
                <ul class="resource-list">
                    <li>Meditación de 5 minutos</li>
                    <li>Respiración consciente</li>
                    <li>Escaneo corporal</li>
                    <li>Visualización positiva</li>
                </ul>
                <button class="btn btn-outline" data-modal-open="modalMeditacion">Ver Técnicas</button>
            </div>

            <!-- Recurso 2: Manejo del Estrés -->
            <div class="resource-card">
                <div class="resource-icon">😌</div>
                <h3>Manejo del Estrés</h3>
                <p>Estrategias efectivas para manejar el estrés académico y personal</p>
                <ul class="resource-list">
                    <li>Técnicas de relajación</li>
                    <li>Organización del tiempo</li>
                    <li>Ejercicios de respiración</li>
                    <li>Pausas activas</li>
                </ul>
                <button class="btn btn-outline" data-modal-open="modalEstres">Ver Estrategias</button>
            </div>

            <!-- Recurso 3: Sueño Saludable -->
            <div class="resource-card">
                <div class="resource-icon">😴</div>
                <h3>Sueño Saludable</h3>
                <p>Mejora la calidad de tu sueño con hábitos saludables</p>
                <ul class="resource-list">
                    <li>Rutina de sueño</li>
                    <li>Higiene del sueño</li>
                    <li>Relajación nocturna</li>
                    <li>Ambiente óptimo</li>
                </ul>
                <button class="btn btn-outline" data-modal-open="modalSueno">Ver Consejos</button>
            </div>

            <!-- Recurso 4: Mindfulness -->
            <div class="resource-card">
                <div class="resource-icon">🌸</div>
                <h3>Mindfulness</h3>
                <p>Practica la atención plena en tu vida diaria</p>
                <ul class="resource-list">
                    <li>Ejercicios diarios</li>
                    <li>Atención al presente</li>
                    <li>Aceptación emocional</li>
                    <li>Gratitud diaria</li>
                </ul>
                <button class="btn btn-outline" data-modal-open="modalMindfulness">Ver Prácticas</button>
            </div>
        </div>
    </div>

    <!-- Consejos Rápidos -->
    <div class="quick-tips">
        <h2>Consejos para tu Bienestar 🌟</h2>
        <div class="tips-container">
            <div class="tip-item">
                <div class="tip-number">1</div>
                <div class="tip-content">
                    <h3>Conexión Social</h3>
                    <p>Mantén contacto regular con amigos y familia. Las relaciones sociales son fundamentales para la salud mental.</p>
                </div>
            </div>

            <div class="tip-item">
                <div class="tip-number">2</div>
                <div class="tip-content">
                    <h3>Actividad Física</h3>
                    <p>El ejercicio regular libera endorfinas que mejoran el estado de ánimo y reducen el estrés.</p>
                </div>
            </div>

            <div class="tip-item">
                <div class="tip-number">3</div>
                <div class="tip-content">
                    <h3>Establece Límites</h3>
                    <p>Aprende a decir no y establece límites saludables en tu vida personal y académica.</p>
                </div>
            </div>

            <div class="tip-item">
                <div class="tip-number">4</div>
                <div class="tip-content">
                    <h3>Busca Ayuda</h3>
                    <p>No dudes en buscar apoyo profesional si lo necesitas. Pedir ayuda es un signo de fortaleza.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Línea de Ayuda -->
    <div class="help-line">
        <div class="help-line-content">
            <h2>¿Necesitas Hablar con Alguien?</h2>
            <p>Si estás pasando por un momento difícil, recuerda que no estás solo.</p>
            <div class="help-contacts">
                <div class="contact-item">
                    <strong>Línea de Crisis 24/7:</strong>
                    <a href="tel:8005553535">800-555-3535</a>
                </div>
                <div class="contact-item">
                    <strong>Servicios Psicológicos IEST:</strong>
                    <a href="mailto:psicologia@iest.edu.mx">psicologia@iest.edu.mx</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Test de Bienestar Mental -->
<?php
$modalId = 'modalTest';
$modalTitle = 'Test de Bienestar Mental';
$modalSize = 'large';
$modalContent = '
<div class="test-intro">
    <p><strong>Este test te ayudará a evaluar tu bienestar emocional actual.</strong></p>
    <p>Responde honestamente las siguientes preguntas. No hay respuestas correctas o incorrectas.</p>
</div>

<form id="mentalHealthTest" class="mental-test-form">
    <div class="test-question">
        <h4>1. ¿Con qué frecuencia te has sentido nervioso o estresado?</h4>
        <div class="test-options">
            <label><input type="radio" name="q1" value="0"> Nunca</label>
            <label><input type="radio" name="q1" value="1"> Rara vez</label>
            <label><input type="radio" name="q1" value="2"> A veces</label>
            <label><input type="radio" name="q1" value="3"> Frecuentemente</label>
            <label><input type="radio" name="q1" value="4"> Siempre</label>
        </div>
    </div>

    <div class="test-question">
        <h4>2. ¿Has tenido dificultad para concentrarte?</h4>
        <div class="test-options">
            <label><input type="radio" name="q2" value="0"> Nunca</label>
            <label><input type="radio" name="q2" value="1"> Rara vez</label>
            <label><input type="radio" name="q2" value="2"> A veces</label>
            <label><input type="radio" name="q2" value="3"> Frecuentemente</label>
            <label><input type="radio" name="q2" value="4"> Siempre</label>
        </div>
    </div>

    <div class="test-question">
        <h4>3. ¿Te has sentido triste o decaído?</h4>
        <div class="test-options">
            <label><input type="radio" name="q3" value="0"> Nunca</label>
            <label><input type="radio" name="q3" value="1"> Rara vez</label>
            <label><input type="radio" name="q3" value="2"> A veces</label>
            <label><input type="radio" name="q3" value="3"> Frecuentemente</label>
            <label><input type="radio" name="q3" value="4"> Siempre</label>
        </div>
    </div>

    <div class="test-question">
        <h4>4. ¿Has tenido problemas para dormir?</h4>
        <div class="test-options">
            <label><input type="radio" name="q4" value="0"> Nunca</label>
            <label><input type="radio" name="q4" value="1"> Rara vez</label>
            <label><input type="radio" name="q4" value="2"> A veces</label>
            <label><input type="radio" name="q4" value="3"> Frecuentemente</label>
            <label><input type="radio" name="q4" value="4"> Siempre</label>
        </div>
    </div>

    <div class="test-question">
        <h4>5. ¿Te sientes optimista sobre el futuro?</h4>
        <div class="test-options">
            <label><input type="radio" name="q5" value="4"> Siempre</label>
            <label><input type="radio" name="q5" value="3"> Frecuentemente</label>
            <label><input type="radio" name="q5" value="2"> A veces</label>
            <label><input type="radio" name="q5" value="1"> Rara vez</label>
            <label><input type="radio" name="q5" value="0"> Nunca</label>
        </div>
    </div>

    <div class="test-actions">
        <button type="submit" class="btn btn-primary btn-block btn-large">Ver Resultados</button>
    </div>
</form>

<div id="testResults" class="test-results" style="display: none;">
    <h3>Tus Resultados</h3>
    <div class="result-score">
        <div class="score-circle">
            <span class="score-value" id="scoreValue">0</span>
            <span class="score-max">/20</span>
        </div>
    </div>
    <div class="result-interpretation" id="resultInterpretation"></div>
    <div class="result-recommendations" id="resultRecommendations"></div>
</div>
';
include '../../app/views/components/modal.php';
?>

<?php
$additionalJS = ['salud-mental.js'];
include '../../app/views/layouts/footer.php';
?>