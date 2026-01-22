<?php
require_once '../../app/config/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - BIENIESTAR</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/about.css">
</head>
<body>
    <!-- Header Simple -->
    <header class="simple-header">
        <div class="container">
            <div class="header-content">
                <a href="../index.php" class="logo">
                    <h2>BIEN<span>IEST</span>AR</h2>
                </a>
                <nav class="header-nav">
                    <a href="../index.php">Inicio</a>
                    <a href="about.php" class="active">Nosotros</a>
                    <a href="login.php" class="btn btn-primary">Iniciar Sesión</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero About -->
    <section class="about-hero">
        <div class="container">
            <div class="hero-content">
                <h1>Sobre BIENIESTAR</h1>
                <p class="hero-subtitle">Tu aliado en el camino hacia un estilo de vida más saludable</p>
            </div>
        </div>
    </section>

    <!-- Misión y Visión -->
    <section class="mission-vision">
        <div class="container">
            <div class="mv-grid">
                <div class="mv-card">
                    <div class="mv-icon">🎯</div>
                    <h2>Nuestra Misión</h2>
                    <p>Proporcionar a la comunidad estudiantil del IEST Anáhuac herramientas, recursos y conocimientos para alcanzar y mantener un estilo de vida saludable integral, abarcando nutrición, ejercicio y bienestar mental.</p>
                </div>
                
                <div class="mv-card">
                    <div class="mv-icon">🌟</div>
                    <h2>Nuestra Visión</h2>
                    <p>Ser la plataforma de bienestar líder en instituciones educativas, reconocida por transformar positivamente los hábitos de salud de miles de estudiantes y contribuir a su éxito académico y personal.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Historia -->
    <section class="our-story">
        <div class="container">
            <div class="story-content">
                <div class="story-text">
                    <h2>Nuestra Historia</h2>
                    <p>BIENIESTAR nació en 2025 como una iniciativa del IEST Anáhuac para atender una necesidad creciente: el bienestar integral de nuestros estudiantes.</p>
                    
                    <p>Observamos que muchos estudiantes enfrentaban desafíos relacionados con la alimentación poco saludable, sedentarismo y estrés académico. Fue entonces cuando decidimos crear una solución integral.</p>
                    
                    <p>Lo que comenzó como un proyecto piloto con 50 estudiantes, hoy es una plataforma completa que ayuda a cientos de miembros de nuestra comunidad a vivir de manera más saludable.</p>
                    
                    <div class="story-stats">
                        <div class="stat">
                            <span class="stat-number">500+</span>
                            <span class="stat-label">Usuarios Activos</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">1,200+</span>
                            <span class="stat-label">Rutinas Completadas</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">95%</span>
                            <span class="stat-label">Satisfacción</span>
                        </div>
                    </div>
                </div>
                
                <div class="story-image">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=800&q=80" alt="Estudiantes">
                </div>
            </div>
        </div>
    </section>

    <!-- Valores -->
    <section class="our-values">
        <div class="container">
            <h2 class="section-title">Nuestros Valores</h2>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">💪</div>
                    <h3>Compromiso</h3>
                    <p>Nos comprometemos con tu bienestar y éxito a largo plazo</p>
                </div>
                
                <div class="value-card">
                    <div class="value-icon">🤝</div>
                    <h3>Inclusión</h3>
                    <p>Todas las personas son bienvenidas, sin importar su nivel de condición física</p>
                </div>
                
                <div class="value-card">
                    <div class="value-icon">🔬</div>
                    <h3>Evidencia Científica</h3>
                    <p>Toda nuestra información está respaldada por investigación científica</p>
                </div>
                
                <div class="value-card">
                    <div class="value-icon">🌱</div>
                    <h3>Crecimiento</h3>
                    <p>Creemos en el desarrollo continuo y la mejora constante</p>
                </div>
                
                <div class="value-card">
                    <div class="value-icon">❤️</div>
                    <h3>Empatía</h3>
                    <p>Entendemos los desafíos únicos de la vida estudiantil</p>
                </div>
                
                <div class="value-card">
                    <div class="value-icon">🎓</div>
                    <h3>Educación</h3>
                    <p>Empoderamos a través del conocimiento y la información</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Equipo -->
    <section class="our-team">
        <div class="container">
            <h2 class="section-title">Nuestro Equipo</h2>
            <p class="section-subtitle">Conoce a los profesionales detrás de BIENIESTAR</p>
            
            <div class="team-grid">
                <div class="team-member">
                    <div class="member-photo">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&q=80" alt="Dra. Ana Martínez">
                    </div>
                    <h3>Dra. Ana Martínez</h3>
                    <p class="member-role">Directora de Nutrición</p>
                    <p class="member-bio">Nutrióloga certificada con 10 años de experiencia en nutrición deportiva.</p>
                </div>
                
                <div class="team-member">
                    <div class="member-photo">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&q=80" alt="Lic. Carlos Rodríguez">
                    </div>
                    <h3>Lic. Carlos Rodríguez</h3>
                    <p class="member-role">Coordinador de Fitness</p>
                    <p class="member-bio">Entrenador personal certificado especializado en acondicionamiento físico.</p>
                </div>
                
                <div class="team-member">
                    <div class="member-photo">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=400&q=80" alt="Psic. María González">
                    </div>
                    <h3>Psic. María González</h3>
                    <p class="member-role">Especialista en Salud Mental</p>
                    <p class="member-bio">Psicóloga clínica con enfoque en bienestar estudiantil y manejo del estrés.</p>
                </div>
                
                <div class="team-member">
                    <div class="member-photo">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&q=80" alt="Ing. Roberto Sánchez">
                    </div>
                    <h3>Ing. Roberto Sánchez</h3>
                    <p class="member-role">Director de Tecnología</p>
                    <p class="member-bio">Ingeniero en sistemas con pasión por crear soluciones digitales de salud.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contacto CTA -->
    <section class="contact-cta">
        <div class="container">
            <div class="cta-content">
                <h2>¿Tienes preguntas?</h2>
                <p>Estamos aquí para ayudarte en tu viaje hacia un estilo de vida más saludable</p>
                <div class="cta-buttons">
                    <a href="login.php" class="btn btn-primary btn-large">Únete Ahora</a>
                    <a href="mailto:contacto@bieniestar.com" class="btn btn-secondary btn-large">Contáctanos</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-col">
                    <h4>BIEN<span>IEST</span>AR</h4>
                    <p>Tu plataforma integral de bienestar universitario</p>
                </div>
                <div class="footer-col">
                    <h5>Enlaces</h5>
                    <ul>
                        <li><a href="../index.php">Inicio</a></li>
                        <li><a href="about.php">Nosotros</a></li>
                        <li><a href="login.php">Iniciar Sesión</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h5>Contacto</h5>
                    <ul>
                        <li>📧 contacto@bieniestar.mx</li>
                        <li>📱 (833) 123-4567</li>
                        <li>📍 IEST Anáhuac, Tampico</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> BIENIESTAR. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="../assets/js/main.js"></script>
</body>
</html>