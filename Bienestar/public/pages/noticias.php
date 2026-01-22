<?php
require_once '../../app/config/config.php';
require_once '../../app/controllers/AuthController.php';

$authController = new AuthController();

if (!$authController->isAuthenticated()) {
    redirect('../pages/login.php');
}

$user = $authController->getCurrentUser();
$currentPage = 'noticias';
$pageTitle = 'Noticias';
$additionalCSS = ['noticias.css'];
?>

<?php include '../../app/views/layouts/header.php'; ?>

<div class="content-wrapper">
    <div class="page-header">
        <h1>Noticias de Bienestar 📰</h1>
        <p>Mantente informado sobre las últimas tendencias en salud y bienestar</p>
    </div>

    <!-- Noticia Destacada -->
    <div class="featured-news">
        <div class="featured-image">
            <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=1200&q=80" alt="Noticia Destacada">
            <div class="featured-badge">Destacado</div>
        </div>
        <div class="featured-content">
            <div class="news-meta">
                <span class="news-category">Alimentación</span>
                <span class="news-date">20 de Enero, 2026</span>
            </div>
            <h2>5 Superalimentos que Debes Incluir en tu Dieta Universitaria</h2>
            <p>Descubre cómo estos alimentos pueden mejorar tu rendimiento académico y energía durante el día. Incluir superalimentos en tu dieta no tiene que ser complicado ni costoso.</p>
            <button class="btn btn-primary" data-modal-open="modalNews1">Leer más</button>
        </div>
    </div>

    <!-- Filtro de Categorías -->
    <div class="news-filters">
        <button class="filter-btn active" data-filter="all">Todas</button>
        <button class="filter-btn" data-filter="alimentacion">Alimentación</button>
        <button class="filter-btn" data-filter="ejercicio">Ejercicio</button>
        <button class="filter-btn" data-filter="salud-mental">Salud Mental</button>
        <button class="filter-btn" data-filter="general">General</button>
    </div>

    <!-- Grid de Noticias -->
    <div class="news-grid">
        <!-- Noticia 1 -->
        <article class="news-card" data-category="alimentacion">
            <div class="news-image">
                <img src="https://images.unsplash.com/photo-1498837167922-ddd27525d352?w=600&q=80" alt="Alimentación">
                <div class="news-category-badge">Alimentación</div>
            </div>
            <div class="news-content">
                <div class="news-meta">
                    <span class="news-author">Por: Dra. Ana Martínez</span>
                    <span class="news-date">18 Ene 2026</span>
                </div>
                <h3>Meal Prep: Organiza tus Comidas de la Semana</h3>
                <p>Aprende a planificar y preparar tus comidas con anticipación para ahorrar tiempo y comer más saludable.</p>
                <a href="#" class="read-more">Leer artículo →</a>
            </div>
        </article>

        <!-- Noticia 2 -->
        <article class="news-card" data-category="ejercicio">
            <div class="news-image">
                <img src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?w=600&q=80" alt="Ejercicio">
                <div class="news-category-badge">Ejercicio</div>
            </div>
            <div class="news-content">
                <div class="news-meta">
                    <span class="news-author">Por: Lic. Carlos Rodríguez</span>
                    <span class="news-date">15 Ene 2026</span>
                </div>
                <h3>Los Mejores Ejercicios para Hacer en el Dormitorio</h3>
                <p>No necesitas un gimnasio costoso. Descubre rutinas efectivas que puedes hacer en espacios pequeños.</p>
                <a href="#" class="read-more">Leer artículo →</a>
            </div>
        </article>

        <!-- Noticia 3 -->
        <article class="news-card" data-category="salud-mental">
            <div class="news-image">
                <img src="https://images.unsplash.com/photo-1499209974431-9dddcece7f88?w=600&q=80" alt="Salud Mental">
                <div class="news-category-badge">Salud Mental</div>
            </div>
            <div class="news-content">
                <div class="news-meta">
                    <span class="news-author">Por: Psic. María González</span>
                    <span class="news-date">12 Ene 2026</span>
                </div>
                <h3>Manejo del Estrés durante Exámenes Finales</h3>
                <p>Estrategias comprobadas para mantener la calma y rendir al máximo durante la temporada de exámenes.</p>
                <a href="#" class="read-more">Leer artículo →</a>
            </div>
        </article>

        <!-- Noticia 4 -->
        <article class="news-card" data-category="general">
            <div class="news-image">
                <img src="https://images.unsplash.com/photo-1524863479829-916d8e77f114?w=600&q=80" alt="Sueño">
                <div class="news-category-badge">General</div>
            </div>
            <div class="news-content">
                <div class="news-meta">
                    <span class="news-author">Por: Dr. Roberto Sánchez</span>
                    <span class="news-date">10 Ene 2026</span>
                </div>
                <h3>La Importancia del Sueño en el Rendimiento Académico</h3>
                <p>Estudios revelan cómo el sueño de calidad impacta directamente en tu capacidad de aprendizaje.</p>
                <a href="#" class="read-more">Leer artículo →</a>
            </div>
        </article>

        <!-- Noticia 5 -->
        <article class="news-card" data-category="alimentacion">
            <div class="news-image">
                <img src="https://images.unsplash.com/photo-1505576399279-565b52d4ac71?w=600&q=80" alt="Hidratación">
                <div class="news-category-badge">Alimentación</div>
            </div>
            <div class="news-content">
                <div class="news-meta">
                    <span class="news-author">Por: Dra. Ana Martínez</span>
                    <span class="news-date">8 Ene 2026</span>
                </div>
                <h3>Hidratación: Más Allá del Agua Simple</h3>
                <p>Descubre bebidas saludables que te mantienen hidratado mientras estudias y haces ejercicio.</p>
                <a href="#" class="read-more">Leer artículo →</a>
            </div>
        </article>

        <!-- Noticia 6 -->
        <article class="news-card" data-category="ejercicio">
            <div class="news-image">
                <img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?w=600&q=80" alt="Yoga">
                <div class="news-category-badge">Ejercicio</div>
            </div>
            <div class="news-content">
                <div class="news-meta">
                    <span class="news-author">Por: Lic. Carlos Rodríguez</span>
                    <span class="news-date">5 Ene 2026</span>
                </div>
                <h3>Yoga para Principiantes: Guía Completa</h3>
                <p>Todo lo que necesitas saber para comenzar tu práctica de yoga desde cero.</p>
                <a href="#" class="read-more">Leer artículo →</a>
            </div>
        </article>
    </div>

    <!-- Newsletter -->
    <div class="newsletter-section">
        <div class="newsletter-content">
            <h2>📧 Suscríbete a Nuestro Newsletter</h2>
            <p>Recibe las últimas noticias de bienestar directamente en tu correo</p>
            <form class="newsletter-form">
                <input type="email" placeholder="tu@correo.com" required>
                <button type="submit" class="btn btn-primary">Suscribirme</button>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Noticia Destacada -->
<?php
$modalId = 'modalNews1';
$modalTitle = '5 Superalimentos que Debes Incluir en tu Dieta Universitaria';
$modalSize = 'large';
$modalContent = '
<div class="article-content">
    <div class="article-meta">
        <span class="article-author">Por: Dra. Ana Martínez</span>
        <span class="article-date">20 de Enero, 2026</span>
        <span class="article-category">Alimentación</span>
    </div>
    
    <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=1000&q=80" alt="Superalimentos" class="article-image">
    
    <div class="article-body">
        <p class="lead">La vida universitaria puede ser agitada, pero mantener una alimentación saludable no tiene que ser complicado. Estos superalimentos son accesibles, fáciles de preparar y te darán la energía que necesitas.</p>
        
        <h3>1. Avena Integral</h3>
        <p>La avena es un cereal completo que proporciona energía sostenida durante toda la mañana. Rica en fibra soluble, ayuda a mantener estables los niveles de azúcar en sangre y mejora la concentración.</p>
        
        <h3>2. Arándanos</h3>
        <p>Estos pequeños frutos están cargados de antioxidantes que protegen tu cerebro y mejoran la memoria. Perfectos para agregar a tu yogurt o avena.</p>
        
        <h3>3. Nueces y Almendras</h3>
        <p>Fuente excelente de omega-3, proteínas y grasas saludables. Un puñado al día puede mejorar tu función cognitiva y mantener tu energía entre clases.</p>
        
        <h3>4. Espinacas</h3>
        <p>Ricas en hierro y vitaminas, las espinacas ayudan a combatir la fatiga. Agrégalas a tus smoothies o ensaladas para un boost nutricional.</p>
        
        <h3>5. Huevos</h3>
        <p>Proteína completa y económica. Los huevos son versátiles y pueden prepararse de múltiples formas. Contienen colina, esencial para la función cerebral.</p>
        
        <h3>Consejos para Incorporarlos</h3>
        <ul>
            <li>Prepara overnight oats con avena, arándanos y almendras</li>
            <li>Lleva snacks de nueces en tu mochila</li>
            <li>Agrega espinacas a tus licuados matutinos</li>
            <li>Prepara huevos duros al inicio de la semana</li>
        </ul>
        
        <div class="article-conclusion">
            <p><strong>Conclusión:</strong> Incorporar estos superalimentos en tu dieta diaria no requiere mucho tiempo ni dinero. Con planificación simple, puedes mejorar significativamente tu energía y concentración durante el semestre.</p>
        </div>
    </div>
</div>
';
include '../../app/views/components/modal.php';
?>

<?php
$additionalJS = ['noticias.js'];
include '../../app/views/layouts/footer.php';
?>