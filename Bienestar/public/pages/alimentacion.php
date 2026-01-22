<?php
require_once '../../app/config/config.php';
require_once '../../app/controllers/AuthController.php';

$authController = new AuthController();

if (!$authController->isAuthenticated()) {
    redirect('../pages/login.php');
}

$user = $authController->getCurrentUser();
$currentPage = 'alimentacion';
$pageTitle = 'Alimentación Saludable';
$additionalCSS = ['alimentacion.css'];
?>

<?php include '../../app/views/layouts/header.php'; ?>

<div class="content-wrapper">
    <div class="content-wrapper" style="margin-left: 250px; padding: 100px 40px; background: #f8f9fa;"></div>
    <div class="page-header">
        <h1>Alimentación Saludable 🍎</h1>
        <p>Descubre recetas nutritivas y deliciosas para tu día a día</p>
    </div>

    <!-- Filtros -->
    <div class="filters-section">
        <div class="filter-group">
            <button class="filter-btn active" data-filter="all">Todas</button>
            <button class="filter-btn" data-filter="desayuno">Desayuno</button>
            <button class="filter-btn" data-filter="comida">Comida</button>
            <button class="filter-btn" data-filter="cena">Cena</button>
            <button class="filter-btn" data-filter="snack">Snacks</button>
            <button class="filter-btn" data-filter="postre">Postres</button>
        </div>
        
        <div class="search-box">
            <input type="text" id="searchRecipes" placeholder="Buscar recetas...">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2"/>
                <path d="M21 21L16.65 16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </div>
    </div>

    <!-- Grid de Recetas -->
    <div class="recipes-grid" id="recipesGrid">
        <!-- Receta 1 -->
        <div class="recipe-card" data-category="desayuno">
            <div class="recipe-image">
                <img src="https://images.unsplash.com/photo-1533089860892-a7c6f0a88666?w=600&q=80" alt="Smoothie Bowl">
                <div class="recipe-badge">Desayuno</div>
            </div>
            <div class="recipe-content">
                <h3>Smoothie Bowl Energético</h3>
                <p class="recipe-description">Bowl nutritivo con frutas frescas, granola y semillas</p>
                
                <div class="recipe-meta">
                    <div class="meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>10 min</span>
                    </div>
                    <div class="meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>320 kcal</span>
                    </div>
                </div>
                
                <button class="btn btn-primary btn-block" data-modal-open="modalRecipe1">Ver Receta</button>
            </div>
        </div>

        <!-- Receta 2 -->
        <div class="recipe-card" data-category="comida">
            <div class="recipe-image">
                <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=600&q=80" alt="Ensalada">
                <div class="recipe-badge">Comida</div>
            </div>
            <div class="recipe-content">
                <h3>Ensalada César Saludable</h3>
                <p class="recipe-description">Versión light de la clásica con pollo a la parrilla</p>
                
                <div class="recipe-meta">
                    <div class="meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>20 min</span>
                    </div>
                    <div class="meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>380 kcal</span>
                    </div>
                </div>
                
                <button class="btn btn-primary btn-block" data-modal-open="modalRecipe2">Ver Receta</button>
            </div>
        </div>

        <!-- Receta 3 -->
        <div class="recipe-card" data-category="cena">
            <div class="recipe-image">
                <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=600&q=80" alt="Pizza">
                <div class="recipe-badge">Cena</div>
            </div>
            <div class="recipe-content">
                <h3>Pizza de Coliflor</h3>
                <p class="recipe-description">Pizza baja en carbohidratos con base de coliflor</p>
                
                <div class="recipe-meta">
                    <div class="meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>35 min</span>
                    </div>
                    <div class="meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>420 kcal</span>
                    </div>
                </div>
                
                <button class="btn btn-primary btn-block" data-modal-open="modalRecipe3">Ver Receta</button>
            </div>
        </div>

        <!-- Receta 4 -->
        <div class="recipe-card" data-category="snack">
            <div class="recipe-image">
                <img src="https://images.unsplash.com/photo-1610415946035-bad6fc9c2382?w=600&q=80" alt="Snack">
                <div class="recipe-badge">Snack</div>
            </div>
            <div class="recipe-content">
                <h3>Energy Balls de Avena</h3>
                <p class="recipe-description">Bolitas energéticas sin hornear perfectas para el gym</p>
                
                <div class="recipe-meta">
                    <div class="meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>15 min</span>
                    </div>
                    <div class="meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>180 kcal</span>
                    </div>
                </div>
                
                <button class="btn btn-primary btn-block" data-modal-open="modalRecipe4">Ver Receta</button>
            </div>
        </div>

        <!-- Receta 5 -->
        <div class="recipe-card" data-category="comida">
            <div class="recipe-image">
                <img src="https://images.unsplash.com/photo-1551248429-40975aa4de74?w=600&q=80" alt="Poké Bowl">
                <div class="recipe-badge">Comida</div>
            </div>
            <div class="recipe-content">
                <h3>Poké Bowl de Atún</h3>
                <p class="recipe-description">Bowl hawaiano con atún fresco, arroz y vegetales</p>
                
                <div class="recipe-meta">
                    <div class="meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>25 min</span>
                    </div>
                    <div class="meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>450 kcal</span>
                    </div>
                </div>
                
                <button class="btn btn-primary btn-block" data-modal-open="modalRecipe5">Ver Receta</button>
            </div>
        </div>

        <!-- Receta 6 -->
        <div class="recipe-card" data-category="postre">
            <div class="recipe-image">
                <img src="https://images.unsplash.com/photo-1488477181946-6428a0291777?w=600&q=80" alt="Yogurt">
                <div class="recipe-badge">Postre</div>
            </div>
            <div class="recipe-content">
                <h3>Parfait de Yogurt Griego</h3>
                <p class="recipe-description">Postre saludable con yogurt, frutas y granola</p>
                
                <div class="recipe-meta">
                    <div class="meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>5 min</span>
                    </div>
                    <div class="meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>220 kcal</span>
                    </div>
                </div>
                
                <button class="btn btn-primary btn-block" data-modal-open="modalRecipe6">Ver Receta</button>
            </div>
        </div>
    </div>

    <!-- Tips de Nutrición -->
    <div class="nutrition-tips">
        <h2>Tips de Nutrición 💡</h2>
        <div class="tips-grid">
            <div class="tip-card">
                <div class="tip-icon">💧</div>
                <h3>Hidrátate</h3>
                <p>Bebe al menos 8 vasos de agua al día para mantenerte hidratado</p>
            </div>
            
            <div class="tip-card">
                <div class="tip-icon">🥗</div>
                <h3>Come Variado</h3>
                <p>Incluye diferentes colores de frutas y verduras en tu dieta</p>
            </div>
            
            <div class="tip-card">
                <div class="tip-icon">⏰</div>
                <h3>Horarios Regulares</h3>
                <p>Mantén horarios consistentes para tus comidas principales</p>
            </div>
            
            <div class="tip-card">
                <div class="tip-icon">🍽️</div>
                <h3>Porciones Adecuadas</h3>
                <p>Controla el tamaño de tus porciones para evitar excesos</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Receta Ejemplo (Receta 1) -->
<?php
$modalId = 'modalRecipe1';
$modalTitle = 'Smoothie Bowl Energético';
$modalSize = 'large';
$modalContent = '
<div class="recipe-modal-content">
    <div class="recipe-modal-image">
        <img src="https://images.unsplash.com/photo-1533089860892-a7c6f0a88666?w=800&q=80" alt="Smoothie Bowl">
    </div>
    
    <div class="recipe-modal-info">
        <div class="recipe-stats">
            <div class="stat-box">
                <span class="stat-label">Tiempo</span>
                <span class="stat-value">10 min</span>
            </div>
            <div class="stat-box">
                <span class="stat-label">Calorías</span>
                <span class="stat-value">320 kcal</span>
            </div>
            <div class="stat-box">
                <span class="stat-label">Porciones</span>
                <span class="stat-value">1</span>
            </div>
        </div>
        
        <h3>Ingredientes:</h3>
        <ul class="ingredients-list">
            <li>1 plátano congelado</li>
            <li>1/2 taza de fresas</li>
            <li>1/2 taza de arándanos</li>
            <li>1/2 taza de leche de almendras</li>
            <li>1 cucharada de mantequilla de maní</li>
            <li>Granola para decorar</li>
            <li>Semillas de chía</li>
            <li>Miel al gusto</li>
        </ul>
        
        <h3>Preparación:</h3>
        <ol class="instructions-list">
            <li>Coloca el plátano congelado, fresas, arándanos y leche de almendras en la licuadora</li>
            <li>Agrega la mantequilla de maní</li>
            <li>Licúa hasta obtener una consistencia cremosa y espesa</li>
            <li>Vierte en un bowl</li>
            <li>Decora con granola, frutas frescas y semillas de chía</li>
            <li>Agrega un toque de miel si deseas</li>
            <li>¡Disfruta inmediatamente!</li>
        </ol>
        
        <div class="recipe-tips">
            <h4>💡 Consejo del Chef:</h4>
            <p>Para una consistencia más cremosa, usa frutas bien congeladas y menos líquido. Puedes variar las frutas según tu preferencia.</p>
        </div>
    </div>
</div>
';
include '../../app/views/components/modal.php';
?>

<?php
$additionalJS = ['alimentacion.js'];
include '../../app/views/layouts/footer.php';
?>