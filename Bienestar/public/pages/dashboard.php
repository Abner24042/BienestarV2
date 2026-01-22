<?php
require_once '../../app/config/config.php';
require_once '../../app/controllers/AuthController.php';

$authController = new AuthController();

// Verificar autenticación
if (!$authController->isAuthenticated()) {
    redirect('../pages/login.php');
}

$user = $authController->getCurrentUser();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - BIENIESTAR</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>
    <!-- Header -->
    <header class="dashboard-header">
        <div class="header-container">
            <div class="header-logo">
                <h2>BIEN<span>IEST</span>AR</h2>
            </div>
            <div class="header-user">
                <span class="user-name"><?php echo htmlspecialchars($user['nombre']); ?></span>
                <img src="<?php echo $user['foto'] ?? '../assets/img/icons/default-avatar.png'; ?>" alt="Avatar" class="user-avatar">
                <div class="user-menu">
                    <a href="perfil.php">Mi Perfil</a>
                    <a href="../../controllers/logout.php">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <aside class="sidebar">
        <nav class="sidebar-nav">
            <a href="dashboard.php" class="nav-item active">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Dashboard</span>
            </a>
            <a href="alimentacion.php" class="nav-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M18 8H20C20.5304 8 21.0391 8.21071 21.4142 8.58579C21.7893 8.96086 22 9.46957 22 10V20C22 20.5304 21.7893 21.0391 21.4142 21.4142C21.0391 21.7893 20.5304 22 20 22H18V8Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 8H4C4.53043 8 5.03914 8.21071 5.41421 8.58579C5.78929 8.96086 6 9.46957 6 10V20C6 20.5304 5.78929 21.0391 5.41421 21.4142C5.03914 21.7893 4.53043 22 4 22H2V8Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6 8V4C6 3.46957 6.21071 2.96086 6.58579 2.58579C6.96086 2.21071 7.46957 2 8 2H16C16.5304 2 17.0391 2.21071 17.4142 2.58579C17.7893 2.96086 18 3.46957 18 4V8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Alimentación</span>
            </a>
            <a href="ejercicio.php" class="nav-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M14.5 2H9.5C8.67157 2 8 2.67157 8 3.5V4.5C8 5.32843 8.67157 6 9.5 6H14.5C15.3284 6 16 5.32843 16 4.5V3.5C16 2.67157 15.3284 2 14.5 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 6V22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8 22H16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Ejercicio</span>
            </a>
            <a href="salud-mental.php" class="nav-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6054C22.3095 9.93789 22.4518 9.2225 22.4518 8.5C22.4518 7.7775 22.3095 7.06211 22.0329 6.39464C21.7564 5.72718 21.351 5.12084 20.84 4.61V4.61Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Salud Mental</span>
            </a>
            <a href="noticias.php" class="nav-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M4 22H20C20.5304 22 21.0391 21.7893 21.4142 21.4142C21.7893 21.0391 22 20.5304 22 20V4C22 3.46957 21.7893 2.96086 21.4142 2.58579C21.0391 2.21071 20.5304 2 20 2H8C7.46957 2 6.96086 2.21071 6.58579 2.58579C6.21071 2.96086 6 3.46957 6 4V20C6 20.5304 5.78929 21.0391 5.41421 21.4142C5.03914 21.7893 4.53043 22 4 22ZM4 22C3.46957 22 2.96086 21.7893 2.58579 21.4142C2.21071 21.0391 2 20.5304 2 20V9C2 8.46957 2.21071 7.96086 2.58579 7.58579C2.96086 7.21071 3.46957 7 4 7H6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Noticias</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="content-wrapper">
            <div class="page-header">
                <h1>Bienvenido, <?php echo htmlspecialchars(explode(' ', $user['nombre'])[0]); ?> 👋</h1>
                <p>Aquí está tu resumen de bienestar de hoy</p>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon" style="background: #fff3e0;">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                            <path d="M18 8H20C20.5304 8 21.0391 8.21071 21.4142 8.58579C21.7893 8.96086 22 9.46957 22 10V20C22 20.5304 21.7893 21.0391 21.4142 21.4142C21.0391 21.7893 20.5304 22 20 22H18V8Z" stroke="#ff6b35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 8H4C4.53043 8 5.03914 8.21071 5.41421 8.58579C5.78929 8.96086 6 9.46957 6 10V20C6 20.5304 5.78929 21.0391 5.41421 21.4142C5.03914 21.7893 4.53043 22 4 22H2V8Z" stroke="#ff6b35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <h3>Calorías del día</h3>
                        <p class="stat-value">1,850 <span class="stat-unit">kcal</span></p>
                        <p class="stat-label">de 2,000 objetivo</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: #e8f5e9;">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                            <path d="M14.5 2H9.5C8.67157 2 8 2.67157 8 3.5V4.5C8 5.32843 8.67157 6 9.5 6H14.5C15.3284 6 16 5.32843 16 4.5V3.5C16 2.67157 15.3284 2 14.5 2Z" stroke="#4caf50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 6V22" stroke="#4caf50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <h3>Ejercicios</h3>
                        <p class="stat-value">3 <span class="stat-unit">de 5</span></p>
                        <p class="stat-label">completados esta semana</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: #e3f2fd;">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                            <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6054C22.3095 9.93789 22.4518 9.2225 22.4518 8.5C22.4518 7.7775 22.3095 7.06211 22.0329 6.39464C21.7564 5.72718 21.351 5.12084 20.84 4.61V4.61Z" stroke="#2196f3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <h3>Estado Mental</h3>
                        <p class="stat-value">Bueno <span class="stat-unit">😊</span></p>
                        <p class="stat-label">Último test hace 2 días</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: #fce4ec;">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="#e91e63" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 6V12L16 14" stroke="#e91e63" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="stat-content">
                        <h3>Próxima Cita</h3>
                        <p class="stat-value">25 <span class="stat-unit">Enero</span></p>
                        <p class="stat-label">Nutricionista - 10:00 AM</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <h2>Acciones Rápidas</h2>
                <div class="actions-grid">
                    <a href="alimentacion.php" class="action-card">
                        <div class="action-icon">🍎</div>
                        <h3>Ver Recetas</h3>
                        <p>Descubre nuevas recetas saludables</p>
                    </a>
                    <a href="ejercicio.php" class="action-card">
                        <div class="action-icon">💪</div>
                        <h3>Iniciar Rutina</h3>
                        <p>Comienza tu ejercicio del día</p>
                    </a>
                    <a href="salud-mental.php" class="action-card">
                        <div class="action-icon">🧠</div>
                        <h3>Test Mental</h3>
                        <p>Evalúa tu bienestar emocional</p>
                    </a>
                    <a href="noticias.php" class="action-card">
                        <div class="action-icon">📰</div>
                        <h3>Leer Noticias</h3>
                        <p>Últimas novedades de salud</p>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/dashboard.js"></script>
</body>
</html>