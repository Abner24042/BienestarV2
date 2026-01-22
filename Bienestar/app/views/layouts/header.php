<?php
if (!isset($pageTitle)) {
    $pageTitle = 'BIENIESTAR';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BIENIESTAR - Sistema integral de bienestar">
    <title><?php echo htmlspecialchars($pageTitle); ?> - BIENIESTAR</title>
    
    <!-- Estilos -->
    <link rel="stylesheet" href="<?php echo asset('css/main.css'); ?>">
<link rel="stylesheet" href="<?php echo asset('css/dashboard.css'); ?>">
<?php if (isset($additionalCSS)): ?>
    <?php foreach ($additionalCSS as $css): ?>
        <link rel="stylesheet" href="<?php echo asset('css/' . $css); ?>">
    <?php endforeach; ?>
<?php endif; ?>
</head>
<body>
    <!-- Header -->
    <header class="dashboard-header">
        <div class="header-container">
            <div class="header-logo">
                <h2>BIEN<span>IEST</span>AR</h2>
            </div>
            <div class="header-user">
    <span class="user-name"><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
    <img src="<?php echo currentUser()['foto'] ?? asset('img/icons/default-avatar.png'); ?>" alt="Avatar" class="user-avatar">
    <div class="user-menu">
        <a href="<?php echo url('public/pages/perfil.php'); ?>">Mi Perfil</a>
        <?php if (isAdmin()): ?>
            <a href="<?php echo url('public/pages/admin/dashboard.php'); ?>">Panel Admin</a>
        <?php endif; ?>
        <a href="<?php echo url('controllers/logout.php'); ?>">Cerrar Sesión</a>
    </div>
</div>
        </div>
    </header>
    
    <!-- Sidebar -->
    <aside class="sidebar">
        <nav class="sidebar-nav">
            <a href="<?php echo url('pages/dashboard.php'); ?>" class="nav-item <?php echo $currentPage === 'dashboard' ? 'active' : ''; ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Dashboard</span>
            </a>
            <a href="<?php echo url('pages/alimentacion.php'); ?>" class="nav-item <?php echo $currentPage === 'alimentacion' ? 'active' : ''; ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M18 8H20C20.5304 8 21.0391 8.21071 21.4142 8.58579C21.7893 8.96086 22 9.46957 22 10V20C22 20.5304 21.7893 21.0391 21.4142 21.4142C21.0391 21.7893 20.5304 22 20 22H18V8Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 8H4C4.53043 8 5.03914 8.21071 5.41421 8.58579C5.78929 8.96086 6 9.46957 6 10V20C6 20.5304 5.78929 21.0391 5.41421 21.4142C5.03914 21.7893 4.53043 22 4 22H2V8Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Alimentación</span>
            </a>
            <a href="<?php echo url('pages/ejercicio.php'); ?>" class="nav-item <?php echo $currentPage === 'ejercicio' ? 'active' : ''; ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M14.5 2H9.5C8.67157 2 8 2.67157 8 3.5V4.5C8 5.32843 8.67157 6 9.5 6H14.5C15.3284 6 16 5.32843 16 4.5V3.5C16 2.67157 15.3284 2 14.5 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 6V22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Ejercicio</span>
            </a>
            <a href="<?php echo url('pages/salud-mental.php'); ?>" class="nav-item <?php echo $currentPage === 'salud-mental' ? 'active' : ''; ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6054C22.3095 9.93789 22.4518 9.2225 22.4518 8.5C22.4518 7.7775 22.3095 7.06211 22.0329 6.39464C21.7564 5.72718 21.351 5.12084 20.84 4.61V4.61Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Salud Mental</span>
            </a>
            <a href="<?php echo url('pages/noticias.php'); ?>" class="nav-item <?php echo $currentPage === 'noticias' ? 'active' : ''; ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M4 22H20C20.5304 22 21.0391 21.7893 21.4142 21.4142C21.7893 21.0391 22 20.5304 22 20V4C22 3.46957 21.7893 2.96086 21.4142 2.58579C21.0391 2.21071 20.5304 2 20 2H8C7.46957 2 6.96086 2.21071 6.58579 2.58579C6.21071 2.96086 6 3.46957 6 4V20C6 20.5304 5.78929 21.0391 5.41421 21.4142C5.03914 21.7893 4.53043 22 4 22ZM4 22C3.46957 22 2.96086 21.7893 2.58579 21.4142C2.21071 21.0391 2 20.5304 2 20V9C2 8.46957 2.21071 7.96086 2.58579 7.58579C2.96086 7.21071 3.46957 7 4 7H6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Noticias</span>
            </a>
        </nav>
    </aside>
    
<!-- Scripts -->
<script src="<?php echo asset('js/main.js'); ?>"></script>

    <!-- Main Content -->
    <main class="main-content">