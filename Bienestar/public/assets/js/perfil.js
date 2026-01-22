/**
 * BIENIESTAR - JavaScript de Perfil
 */

document.addEventListener('DOMContentLoaded', function() {
    initProfileForms();
});

/**
 * Inicializar formularios del perfil
 */
function initProfileForms() {
    // Formulario de editar perfil
    const formEditProfile = document.getElementById('formEditProfile');
    if (formEditProfile) {
        formEditProfile.addEventListener('submit', handleEditProfile);
    }
    
    // Formulario de cambiar contraseña
    const formChangePassword = document.getElementById('formChangePassword');
    if (formChangePassword) {
        formChangePassword.addEventListener('submit', handleChangePassword);
    }
    
    // Formulario de cambiar foto
    const formChangePhoto = document.getElementById('formChangePhoto');
    if (formChangePhoto) {
        formChangePhoto.addEventListener('submit', handleChangePhoto);
    }
}

/**
 * Manejar edición de perfil
 */
function handleEditProfile(e) {
    e.preventDefault();
    
    const nombre = document.getElementById('edit_nombre').value.trim();
    const correo = document.getElementById('edit_correo').value.trim();
    
    if (!nombre || !correo) {
        showToast('Por favor completa todos los campos', 'error');
        return;
    }
    
    if (!isValidEmail(correo)) {
        showToast('Email inválido', 'error');
        return;
    }
    
    showLoader();
    this.submit();
}

/**
 * Manejar cambio de contraseña
 */
function handleChangePassword(e) {
    e.preventDefault();
    
    const currentPassword = document.getElementById('current_password').value;
    const newPassword = document.getElementById('new_password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    
    if (!currentPassword || !newPassword || !confirmPassword) {
        showToast('Por favor completa todos los campos', 'error');
        return;
    }
    
    if (newPassword.length < 6) {
        showToast('La contraseña debe tener al menos 6 caracteres', 'error');
        return;
    }
    
    if (newPassword !== confirmPassword) {
        showToast('Las contraseñas no coinciden', 'error');
        return;
    }
    
    showLoader();
    this.submit();
}

/**
 * Manejar cambio de foto
 */
function handleChangePhoto(e) {
    e.preventDefault();
    
    const photoInput = document.getElementById('photo');
    
    if (!photoInput.files || !photoInput.files[0]) {
        showToast('Por favor selecciona una foto', 'error');
        return;
    }
    
    const file = photoInput.files[0];
    const maxSize = 5 * 1024 * 1024; // 5MB
    
    if (file.size > maxSize) {
        showToast('La foto es demasiado grande (máx. 5MB)', 'error');
        return;
    }
    
    const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
    if (!allowedTypes.includes(file.type)) {
        showToast('Formato de imagen no permitido', 'error');
        return;
    }
    
    showLoader();
    this.submit();
}

/**
 * Manejo del menú de usuario con delay
 */
document.addEventListener('DOMContentLoaded', function() {
    const headerUser = document.querySelector('.header-user');
    const userMenu = document.querySelector('.user-menu');
    
    if (headerUser && userMenu) {
        let menuTimeout;
        
        // Mostrar menú al hacer hover en el usuario
        headerUser.addEventListener('mouseenter', function() {
            clearTimeout(menuTimeout);
            userMenu.style.display = 'block';
            setTimeout(() => {
                userMenu.style.opacity = '1';
                userMenu.style.transform = 'translateY(0)';
            }, 10);
        });
        
        // Ocultar menú con delay al salir del usuario
        headerUser.addEventListener('mouseleave', function() {
            menuTimeout = setTimeout(() => {
                userMenu.style.opacity = '0';
                userMenu.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    userMenu.style.display = 'none';
                }, 200);
            }, 300); // 300ms de delay antes de cerrar
        });
        
        // Mantener abierto si el cursor está sobre el menú
        userMenu.addEventListener('mouseenter', function() {
            clearTimeout(menuTimeout);
        });
        
        // Cerrar cuando el cursor sale del menú
        userMenu.addEventListener('mouseleave', function() {
            menuTimeout = setTimeout(() => {
                userMenu.style.opacity = '0';
                userMenu.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    userMenu.style.display = 'none';
                }, 200);
            }, 200);
        });
    }
});

/**
 * Manejo del menú de usuario con delay
 */
document.addEventListener('DOMContentLoaded', function() {
    const headerUser = document.querySelector('.header-user');
    const userMenu = document.querySelector('.user-menu');
    
    if (headerUser && userMenu) {
        let menuTimeout;
        
        // Mostrar menú al hacer hover en el usuario
        headerUser.addEventListener('mouseenter', function() {
            clearTimeout(menuTimeout);
            userMenu.style.display = 'block';
            setTimeout(() => {
                userMenu.style.opacity = '1';
                userMenu.style.transform = 'translateY(0)';
            }, 10);
        });
        
        // Ocultar menú con delay al salir del usuario
        headerUser.addEventListener('mouseleave', function() {
            menuTimeout = setTimeout(() => {
                userMenu.style.opacity = '0';
                userMenu.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    userMenu.style.display = 'none';
                }, 200);
            }, 300); // 300ms de delay antes de cerrar
        });
        
        // Mantener abierto si el cursor está sobre el menú
        userMenu.addEventListener('mouseenter', function() {
            clearTimeout(menuTimeout);
        });
        
        // Cerrar cuando el cursor sale del menú
        userMenu.addEventListener('mouseleave', function() {
            menuTimeout = setTimeout(() => {
                userMenu.style.opacity = '0';
                userMenu.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    userMenu.style.display = 'none';
                }, 200);
            }, 200);
        });
    }
});