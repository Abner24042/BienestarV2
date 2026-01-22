<?php
require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['correo'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $authController = new AuthController();
    $result = $authController->login($email, $password);
    
    if ($result['success']) {
        redirect('pages/dashboard.php');
    } else {
        redirect('pages/login.php?error=' . urlencode($result['message']));
    }
} else {
    redirect('pages/login.php');
}