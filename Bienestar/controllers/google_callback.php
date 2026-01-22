<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/models/User.php';

// Cargar variables de entorno
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Configurar cliente de Google
$client = new Google_Client();
$client->setClientId($_ENV['GOOGLE_CLIENT_ID']);
$client->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
$client->setRedirectUri($_ENV['GOOGLE_REDIRECT_URI']);


// Verificar código de autorización
if (!isset($_GET['code'])) {
    redirect('pages/login.php?error=' . urlencode('Error al autenticar con Google'));
    exit;
}

try {
    // Obtener token de acceso
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    
    if (isset($token['error'])) {
        throw new Exception('Error al obtener token: ' . $token['error']);
    }
    
    $client->setAccessToken($token);
    
    // Obtener información del usuario
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    
    $email = $google_account_info->email;
    $name = $google_account_info->name;
    $picture = $google_account_info->picture;
    
    // Buscar o crear usuario
    $userModel = new User();
    $user = $userModel->findByEmail($email);
    
    if (!$user) {
        // Crear nuevo usuario
        $userData = [
            'nombre' => $name,
            'correo' => $email,
            'foto' => $picture,
            'password' => password_hash(uniqid(), PASSWORD_DEFAULT),
            'rol' => 'usuario'
        ];
        
        $userId = $userModel->create($userData);
        $user = $userModel->findById($userId);
    } else {
        // Actualizar foto si cambió
        if ($user['foto'] !== $picture) {
            $userModel->update($user['id'], [
                'nombre' => $user['nombre'],
                'correo' => $user['correo'],
                'foto' => $picture,
                'area' => $user['area']
            ]);
            $user['foto'] = $picture;
        }
    }
    
    // Crear sesión
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_email'] = $user['correo'];
$_SESSION['user_name'] = $user['nombre'];
$_SESSION['user_role'] = $user['rol'];
$_SESSION['user'] = $user;
$_SESSION['logged_in'] = true;

// Redirigir al dashboard
header('Location: ../public/pages/dashboard.php');
exit;


    
} catch (Exception $e) {
    error_log('Error en Google OAuth: ' . $e->getMessage());
    redirect('pages/login.php?error=' . urlencode('Error al iniciar sesión con Google'));
}