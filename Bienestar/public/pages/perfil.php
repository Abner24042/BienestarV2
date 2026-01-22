<?php
require_once '../../app/config/config.php';
require_once '../../app/controllers/AuthController.php';

$authController = new AuthController();

// Verificar autenticación
if (!$authController->isAuthenticated()) {
    redirect('../pages/login.php');
}

$user = $authController->getCurrentUser();
$currentPage = 'perfil';
$pageTitle = 'Mi Perfil';

// Variables para el header
$additionalCSS = ['perfil.css'];
?>

<?php include '../../app/views/layouts/header.php'; ?>

<div class="content-wrapper">
    <div class="page-header">
        <h1>Mi Perfil</h1>
        <p>Gestiona tu información personal</p>
    </div>

    <div class="profile-container">
        <!-- Card de información personal -->
        <div class="profile-card">
            <div class="profile-avatar-section">
                <img src="<?php echo $user['foto'] ?? asset('img/icons/default-avatar.png'); ?>" alt="Avatar" class="profile-avatar-large">
                <button class="btn btn-primary btn-change-photo" data-modal-open="modalChangePhoto">
                    Cambiar Foto
                </button>
            </div>
            
            <div class="profile-info">
                <div class="info-row">
                    <label>Nombre Completo</label>
                    <p><?php echo htmlspecialchars($user['nombre']); ?></p>
                </div>
                
                <div class="info-row">
                    <label>Correo Electrónico</label>
                    <p><?php echo htmlspecialchars($user['correo']); ?></p>
                </div>
                
                <div class="info-row">
                    <label>Rol</label>
                    <p>
                        <span class="badge badge-<?php echo $user['rol'] === 'Administrador' ? 'primary' : 'secondary'; ?>">
                            <?php echo htmlspecialchars($user['rol']); ?>
                        </span>
                    </p>
                </div>
                
                <?php if ($user['area']): ?>
                <div class="info-row">
                    <label>Área</label>
                    <p><?php echo htmlspecialchars($user['area']); ?></p>
                </div>
                <?php endif; ?>
                
                <div class="info-row">
                    <label>Miembro desde</label>
                    <p><?php echo date('d/m/Y', strtotime($user['fecha'])); ?></p>
                </div>
                
                <div class="profile-actions">
                    <button class="btn btn-primary" data-modal-open="modalEditProfile">
                        Editar Perfil
                    </button>
                    <button class="btn btn-secondary" data-modal-open="modalChangePassword">
                        Cambiar Contraseña
                    </button>
                </div>
            </div>
        </div>

        <!-- Card de estadísticas -->
        <div class="profile-stats">
            <h3>Mis Estadísticas</h3>
            <div class="stats-list">
                <div class="stat-item">
                    <div class="stat-icon">🍎</div>
                    <div class="stat-data">
                        <span class="stat-value">42</span>
                        <span class="stat-label">Recetas guardadas</span>
                    </div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-icon">💪</div>
                    <div class="stat-data">
                        <span class="stat-value">28</span>
                        <span class="stat-label">Rutinas completadas</span>
                    </div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-icon">🧠</div>
                    <div class="stat-data">
                        <span class="stat-value">5</span>
                        <span class="stat-label">Tests realizados</span>
                    </div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-icon">📅</div>
                    <div class="stat-data">
                        <span class="stat-value">12</span>
                        <span class="stat-label">Citas programadas</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Editar Perfil -->
<?php
$modalId = 'modalEditProfile';
$modalTitle = 'Editar Perfil';
$modalSize = 'medium';
$modalContent = '
<form id="formEditProfile" action="../../controllers/update_profile.php" method="POST">
    <div class="form-group">
        <label for="edit_nombre">Nombre Completo</label>
        <input type="text" id="edit_nombre" name="nombre" value="' . htmlspecialchars($user['nombre']) . '" required>
    </div>
    
    <div class="form-group">
        <label for="edit_correo">Correo Electrónico</label>
        <input type="email" id="edit_correo" name="correo" value="' . htmlspecialchars($user['correo']) . '" required>
    </div>
    
    <div class="form-group">
        <label for="edit_area">Área</label>
        <input type="text" id="edit_area" name="area" value="' . htmlspecialchars($user['area'] ?? '') . '">
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-modal-close="modalEditProfile">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </div>
</form>
';
include '../../app/views/components/modal.php';
?>

<!-- Modal: Cambiar Contraseña -->
<?php
$modalId = 'modalChangePassword';
$modalTitle = 'Cambiar Contraseña';
$modalSize = 'medium';
$modalContent = '
<form id="formChangePassword" action="../../controllers/change_password.php" method="POST">
    <div class="form-group">
        <label for="current_password">Contraseña Actual</label>
        <input type="password" id="current_password" name="current_password" required>
    </div>
    
    <div class="form-group">
        <label for="new_password">Nueva Contraseña</label>
        <input type="password" id="new_password" name="new_password" minlength="6" required>
    </div>
    
    <div class="form-group">
        <label for="confirm_password">Confirmar Nueva Contraseña</label>
        <input type="password" id="confirm_password" name="confirm_password" minlength="6" required>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-modal-close="modalChangePassword">Cancelar</button>
        <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
    </div>
</form>
';
include '../../app/views/components/modal.php';
?>

<!-- Modal: Cambiar Foto -->
<?php
$modalId = 'modalChangePhoto';
$modalTitle = 'Cambiar Foto de Perfil';
$modalSize = 'medium';
$modalContent = '
<form id="formChangePhoto" action="../../controllers/upload_photo.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="photo">Seleccionar Foto</label>
        <input type="file" id="photo" name="photo" accept="image/*" required>
        <small>Formatos permitidos: JPG, PNG, GIF (máx. 5MB)</small>
    </div>
    
    <div class="preview-container" id="photoPreview" style="display: none;">
        <img id="previewImage" src="" alt="Preview" style="max-width: 100%; border-radius: 8px;">
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-modal-close="modalChangePhoto">Cancelar</button>
        <button type="submit" class="btn btn-primary">Subir Foto</button>
    </div>
</form>

<script>
document.getElementById("photo").addEventListener("change", function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("photoPreview").style.display = "block";
            document.getElementById("previewImage").src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});
</script>
';
include '../../app/views/components/modal.php';
?>

<?php
$additionalJS = ['perfil.js'];
include '../../app/views/layouts/footer.php';
?>