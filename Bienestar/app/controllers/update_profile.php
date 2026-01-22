<?php
require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isAuthenticated()) {
    $userId = getUserId();
    $nombre = sanitizeString($_POST['nombre'] ?? '');
    $correo = sanitizeString($_POST['correo'] ?? '');
    $area = sanitizeString($_POST['area'] ?? '');
    
    if (empty($nombre) || empty($correo)) {
        redirect('pages/perfil.php?error=' . urlencode('Todos los campos son requeridos'));
        exit;
    }
    
    if (!validateEmail($correo)) {
        redirect('pages/perfil.php?error=' . urlencode('Email inválido'));
        exit;
    }
    
    $userModel = new User();
    
    $data = [
        'nombre' => $nombre,
        'correo' => $correo,
        'area' => $area,
        'foto' => currentUser()['foto']
    ];
    
    if ($userModel->update($userId, $data)) {
        // Actualizar sesión
        $_SESSION['user_name'] = $nombre;
        $_SESSION['user_email'] = $correo;
        $_SESSION['user']['nombre'] = $nombre;
        $_SESSION['user']['correo'] = $correo;
        $_SESSION['user']['area'] = $area;
        
        redirect('pages/perfil.php?success=' . urlencode('Perfil actualizado correctamente'));
    } else {
        redirect('pages/perfil.php?error=' . urlencode('Error al actualizar perfil'));
    }
} else {
    redirect('pages/login.php');
}