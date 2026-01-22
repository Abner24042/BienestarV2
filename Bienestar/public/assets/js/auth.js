/**
 * BIENIESTAR - JavaScript de Autenticación
 * Validaciones de login, registro
 */

document.addEventListener('DOMContentLoaded', function() {
    initAuthForms();
});

/**
 * Inicializar formularios de autenticación
 */
function initAuthForms() {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    
    if (loginForm) {
        initLoginForm(loginForm);
    }
    
    if (registerForm) {
        initRegisterForm(registerForm);
    }
}

/**
 * Inicializar formulario de login
 */
function initLoginForm(form) {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validar campos
        const email = document.getElementById('correo').value.trim();
        const password = document.getElementById('password').value.trim();
        
        if (!email || !password) {
            showToast('Por favor completa todos los campos', 'error');
            return;
        }
        
        if (!isValidEmail(email)) {
            showToast('Email inválido', 'error');
            return;
        }
        
        // Enviar formulario
        showLoader();
        form.submit();
    });
    
    // Limpiar errores al escribir
    const inputs = form.querySelectorAll('input');
    inputs.forEach(input => {
        input.addEventListener('input', function() {
            clearFieldError(this);
        });
    });
}

/**
 * Inicializar formulario de registro
 */
function initRegisterForm(form) {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validar campos
        const nombre = document.getElementById('nombre').value.trim();
        const email = document.getElementById('correo').value.trim();
        const password = document.getElementById('password').value.trim();
        const confirmPassword = document.getElementById('confirm_password').value.trim();
        
        // Validaciones
        if (!nombre || !email || !password || !confirmPassword) {
            showToast('Por favor completa todos los campos', 'error');
            return;
        }
        
        if (!isValidEmail(email)) {
            showToast('Email inválido', 'error');
            return;
        }
        
        if (password.length < 6) {
            showToast('La contraseña debe tener al menos 6 caracteres', 'error');
            return;
        }
        
        if (password !== confirmPassword) {
            showToast('Las contraseñas no coinciden', 'error');
            return;
        }
        
        // Enviar formulario
        showLoader();
        form.submit();
    });
}

/**
 * Validar email
 */
function isValidEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

/**
 * Toggle password visibility
 */
function togglePasswordVisibility(inputId) {
    const input = document.getElementById(inputId);
    if (input.type === 'password') {
        input.type = 'text';
    } else {
        input.type = 'password';
    }
}