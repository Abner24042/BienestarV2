<?php
require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['correo'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $authController = new AuthController();
    $result = $authController->login($email, $password);
    
    if ($result['success']) {
        // Redirigir al dashboard
        header('Location: http://localhost/a/Bienestar/public/pages/dashboard.php');
        exit;
    } else {
        // Redirigir al login con error
        header('Location: http://localhost/a/Bienestar/public/pages/login.php?error=' . urlencode($result['message']));
        exit;
    }
} else {
    // Si no es POST, redirigir al login
    header('Location: http://localhost/a/Bienestar/public/pages/login.php');
    exit;
}