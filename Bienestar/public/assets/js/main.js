/**
 * BIENIESTAR - JavaScript Global
 */

document.addEventListener('DOMContentLoaded', function() {
    // Inicializar menú de usuario
    const headerUser = document.querySelector('.header-user');
    const userMenu = document.querySelector('.user-menu');
    
    if (headerUser && userMenu) {
        let menuTimeout;
        
        headerUser.addEventListener('mouseenter', () => {
            clearTimeout(menuTimeout);
            userMenu.style.display = 'block';
            requestAnimationFrame(() => {
                userMenu.style.opacity = '1';
                userMenu.style.transform = 'translateY(0)';
            });
        });
        
        headerUser.addEventListener('mouseleave', () => {
            menuTimeout = setTimeout(() => {
                userMenu.style.opacity = '0';
                userMenu.style.transform = 'translateY(-10px)';
                setTimeout(() => userMenu.style.display = 'none', 200);
            }, 500);
        });
        
        userMenu.addEventListener('mouseenter', () => clearTimeout(menuTimeout));
        
        userMenu.addEventListener('mouseleave', () => {
            menuTimeout = setTimeout(() => {
                userMenu.style.opacity = '0';
                userMenu.style.transform = 'translateY(-10px)';
                setTimeout(() => userMenu.style.display = 'none', 200);
            }, 200);
        });
    }
});