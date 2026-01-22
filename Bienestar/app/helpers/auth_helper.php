<?php
/**
 * Helpers de Autenticación
 */

/**
 * Verificar si el usuario está autenticado
 */
function isAuthenticated() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

/**
 * Verificar si el usuario es administrador
 */
function requireAdmin() {
    requireAuth();
    
    if (!isAdmin()) {
        redirect('pages/dashboard.php');
        exit;
    }
}

/**
 * Verificar si el usuario es admin
 */
function isAdmin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'Administrador';
}

/**
 * Obtener ID del usuario actual
 */
function getUserId() {
    return $_SESSION['user_id'] ?? null;
}

/**
 * Obtener email del usuario actual
 */
function getUserEmail() {
    return $_SESSION['user_email'] ?? null;
}

/**
 * Obtener nombre del usuario actual
 */
function getUserName() {
    return $_SESSION['user_name'] ?? null;
}

/**
 * Obtener usuario actual completo
 */
function currentUser() {
    return $_SESSION['user'] ?? null;
}

/**
 * Verificar si el usuario está autenticado
 */
function requireAuth() {
    if (!isAuthenticated()) {
        redirect('pages/login.php');
        exit;
    }
}

/**
 * Redireccionar
 */
function redirect($url) {
    header('Location: ' . $url);
    exit;
}