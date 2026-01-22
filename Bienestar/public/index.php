<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BIENIESTAR - Tu plataforma integral de salud, alimentación y ejercicio">
    <meta name="keywords" content="bienestar, salud, alimentación, ejercicio, IEST, Anáhuac">
    <meta name="author" content="IEST Anáhuac">
    <title>BIENIESTAR - Cuida tu salud integral</title>
    
    <!-- Favicons -->
    <link rel="icon" type="image/png" href="assets/img/icons/favicon.png">
    
    <!-- Estilos -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/landing.css">
    
    <!-- Preload de fuentes -->
    <link rel="preload" as="font">
</head>
<body>

    <!-- Navegación Sticky -->
    <nav class="sticky-nav" id="stickyNav">
        <div class="nav-container">
            <div class="nav-logo">
                <h3>BIEN<span>IEST</span>AR</h3>
            </div>
            <div class="nav-links">
                <a href="#inicio">Inicio</a>
                <a href="#servicios">Servicios</a>
                <a href="#beneficios">Beneficios</a>
                <a href="#contacto">Contacto</a>
            </div>
            <div class="nav-actions">
                <a href="pages/login.php" class="btn-login">Iniciar Sesión</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section con efecto parallax -->
    <section class="hero-section" id="heroSection">
        <div class="hero-background" id="heroBackground"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content" id="heroContent">
            <h1 class="hero-title">Estudia en el IEST Anáhuac y haz de Tampico tu segunda casa</h1>
            <p class="hero-subtitle">Conviértete en el profesional que siempre soñaste, en una universidad reconocida por su excelencia académica y valores. ¡Tu futuro empieza aquí!</p>
            <a href="pages/login.php" class="btn-cta">
                <span>Inicia tu proceso de admisión</span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M4 10h12M10 4l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
        
        <!-- Indicador de scroll -->
        <div class="scroll-indicator">
            <div class="mouse"></div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="servicios">
        <div class="container">
            <div class="section-header">
                <h2>¿Por qué elegir BIENIESTAR?</h2>
                <p>Una plataforma integral para tu desarrollo académico y personal</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="#ff6b35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 17L12 22L22 17" stroke="#ff6b35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 12L12 17L22 12" stroke="#ff6b35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 class="feature-number">17</h3>
                    <h4 class="feature-title">Licenciaturas</h4>
                    <p class="feature-desc">Conoce nuestra oferta académica y elige el programa perfecto para ti.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none">
                            <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="#ff6b35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="#ff6b35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 class="feature-number">70%</h3>
                    <h4 class="feature-title">de alumnos</h4>
                    <p class="feature-desc">Cuentan con una beca para apoyar a su educación.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none">
                            <path d="M22 10V6C22 5.46957 21.7893 4.96086 21.4142 4.58579C21.0391 4.21071 20.5304 4 20 4H4C3.46957 4 2.96086 4.21071 2.58579 4.58579C2.21071 4.96086 2 5.46957 2 6V10C2 10.5304 2.21071 11.0391 2.58579 11.4142C2.96086 11.7893 3.46957 12 4 12H20C20.5304 12 21.0391 11.7893 21.4142 11.4142C21.7893 11.0391 22 10.5304 22 10Z" stroke="#ff6b35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M22 20V16C22 15.4696 21.7893 14.9609 21.4142 14.5858C21.0391 14.2107 20.5304 14 20 14H4C3.46957 14 2.96086 14.2107 2.58579 14.5858C2.21071 14.9609 2 15.4696 2 16V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H20C20.5304 22 21.0391 21.7893 21.4142 21.4142C21.7893 21.0391 22 20.5304 22 20Z" stroke="#ff6b35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 class="feature-number">16</h3>
                    <h4 class="feature-title">Maestrías</h4>
                    <p class="feature-desc">Excelencia académica y la preparación que requieres para tu desarrollo profesional.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="#ff6b35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 12H22" stroke="#ff6b35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 2C14.5013 4.73835 15.9228 8.29203 16 12C15.9228 15.708 14.5013 19.2616 12 22C9.49872 19.2616 8.07725 15.708 8 12C8.07725 8.29203 9.49872 4.73835 12 2V2Z" stroke="#ff6b35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 class="feature-number">+100</h3>
                    <h4 class="feature-title">Opciones de intercambios</h4>
                    <p class="feature-desc">Opciones de intercambio internacional para tu desarrollo global.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Preview Section -->
    <section class="services-section" id="beneficios">
        <div class="container">
            <div class="section-header">
                <h2>Nuestros Servicios de Bienestar</h2>
                <p>Todo lo que necesitas para tu desarrollo integral</p>
            </div>

            <div class="services-grid">
                <div class="service-card" onclick="location.href='pages/login.php'">
                    <div class="service-image">
                        <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=800&q=80" alt="Alimentación Saludable">
                    </div>
                    <div class="service-content">
                        <h3>Alimentación Saludable</h3>
                        <p>Recetas balanceadas y planes nutricionales personalizados</p>
                        <span class="service-arrow">→</span>
                    </div>
                </div>

                <div class="service-card" onclick="location.href='pages/login.php'">
                    <div class="service-image">
                        <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?w=800&q=80" alt="Ejercicio">
                    </div>
                    <div class="service-content">
                        <h3>Rutinas de Ejercicio</h3>
                        <p>Planes de entrenamiento adaptados a tu nivel</p>
                        <span class="service-arrow">→</span>
                    </div>
                </div>

                <div class="service-card" onclick="location.href='pages/login.php'">
                    <div class="service-image">
                        <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=800&q=80" alt="Salud Mental">
                    </div>
                    <div class="service-content">
                        <h3>Salud Mental</h3>
                        <p>Tests psicológicos y recursos para tu bienestar emocional</p>
                        <span class="service-arrow">→</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>¿Listo para comenzar?</h2>
                <p>Únete a la comunidad BIENIESTAR y transforma tu vida universitaria</p>
                <a href="pages/login.php" class="btn-cta-large">Empezar ahora</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" id="contacto">
        <div class="container">
            <div class="footer-content">
                <div class="footer-col">
                    <h4>BIEN<span>IEST</span>AR</h4>
                    <p>Tu plataforma integral de bienestar universitario</p>
                </div>
                <div class="footer-col">
                    <h5>Enlaces Rápidos</h5>
                    <ul>
                        <li><a href="pages/about.php">Sobre Nosotros</a></li>
                        <li><a href="pages/login.php">Iniciar Sesión</a></li>
                        <li><a href="#servicios">Servicios</a></li>
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
                <div class="footer-col">
                    <h5>Síguenos</h5>
                    <ul>
                        <li><a href="#" target="_blank">Facebook</a></li>
                        <li><a href="#" target="_blank">Instagram</a></li>
                        <li><a href="#" target="_blank">Twitter</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> BIENIESTAR. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/landing.js"></script>
</body>
</html>