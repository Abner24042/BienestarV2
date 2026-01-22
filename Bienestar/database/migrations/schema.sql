-- ============================================
-- SCHEMA COMPLETO - BIENIESTAR
-- ============================================

-- Crear base de datos
CREATE DATABASE IF NOT EXISTS sistema_usuarios 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_general_ci;

USE sistema_usuarios;

-- ============================================
-- TABLA: usuarios
-- ============================================
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `correo` VARCHAR(100) NOT NULL UNIQUE,
  `contrasena` VARCHAR(255) DEFAULT NULL,
  `foto` VARCHAR(255) DEFAULT NULL,
  `rol` VARCHAR(50) DEFAULT 'usuario',
  `area` VARCHAR(50) DEFAULT NULL,
  `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activo` TINYINT(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  INDEX `idx_correo` (`correo`),
  INDEX `idx_rol` (`rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ============================================
-- TABLA: citas_bieniestar
-- ============================================
CREATE TABLE IF NOT EXISTS `citas_bieniestar` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `titulo` VARCHAR(255) NOT NULL,
  `descripcion` TEXT DEFAULT NULL,
  `correo` VARCHAR(100) NOT NULL,
  `estado` ENUM('pendiente', 'confirmada', 'cancelada', 'completada') DEFAULT 'pendiente',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`correo`) REFERENCES `usuarios`(`correo`) ON DELETE CASCADE,
  INDEX `idx_fecha` (`fecha`),
  INDEX `idx_correo` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ============================================
-- TABLA: mensajes_contacto
-- ============================================
CREATE TABLE IF NOT EXISTS `mensajes_contacto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) DEFAULT NULL,
  `apellido` VARCHAR(100) DEFAULT NULL,
  `correo` VARCHAR(150) DEFAULT NULL,
  `asunto` VARCHAR(200) DEFAULT NULL,
  `mensaje` TEXT DEFAULT NULL,
  `leido` TINYINT(1) DEFAULT 0,
  `fecha_envio` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_leido` (`leido`),
  INDEX `idx_fecha` (`fecha_envio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ============================================
-- TABLA: recetas (nueva)
-- ============================================
CREATE TABLE IF NOT EXISTS `recetas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(200) NOT NULL,
  `descripcion` TEXT,
  `ingredientes` TEXT NOT NULL,
  `instrucciones` TEXT NOT NULL,
  `tiempo_preparacion` INT DEFAULT NULL COMMENT 'en minutos',
  `porciones` INT DEFAULT 1,
  `calorias` INT DEFAULT NULL,
  `imagen` VARCHAR(255) DEFAULT NULL,
  `categoria` ENUM('desayuno', 'comida', 'cena', 'snack', 'postre') DEFAULT 'comida',
  `activo` TINYINT(1) DEFAULT 1,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_categoria` (`categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ============================================
-- TABLA: ejercicios (nueva)
-- ============================================
CREATE TABLE IF NOT EXISTS `ejercicios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(200) NOT NULL,
  `descripcion` TEXT,
  `duracion` INT DEFAULT NULL COMMENT 'en minutos',
  `nivel` ENUM('principiante', 'intermedio', 'avanzado') DEFAULT 'principiante',
  `tipo` ENUM('cardio', 'fuerza', 'flexibilidad', 'equilibrio') DEFAULT 'cardio',
  `calorias_quemadas` INT DEFAULT NULL,
  `video_url` VARCHAR(255) DEFAULT NULL,
  `imagen` VARCHAR(255) DEFAULT NULL,
  `instrucciones` TEXT,
  `activo` TINYINT(1) DEFAULT 1,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_nivel` (`nivel`),
  INDEX `idx_tipo` (`tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ============================================
-- TABLA: noticias (nueva)
-- ============================================
CREATE TABLE IF NOT EXISTS `noticias` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(200) NOT NULL,
  `contenido` TEXT NOT NULL,
  `resumen` VARCHAR(500) DEFAULT NULL,
  `imagen` VARCHAR(255) DEFAULT NULL,
  `categoria` ENUM('alimentacion', 'ejercicio', 'salud-mental', 'general') DEFAULT 'general',
  `autor` VARCHAR(100) DEFAULT NULL,
  `publicado` TINYINT(1) DEFAULT 0,
  `fecha_publicacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_categoria` (`categoria`),
  INDEX `idx_publicado` (`publicado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ============================================
-- INSERTAR DATOS DE EJEMPLO
-- ============================================

-- Usuario administrador (contraseña: admin123)
INSERT INTO `usuarios` (`nombre`, `correo`, `contrasena`, `rol`, `area`) VALUES
('Administrador', 'admin@bieniestar.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrador', 'Sistemas');

-- Usuario de prueba (contraseña: usuario123)
INSERT INTO `usuarios` (`nombre`, `correo`, `contrasena`, `rol`, `area`) VALUES
('Usuario Prueba', 'usuario@test.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'usuario', 'Estudiante');

-- Algunas recetas de ejemplo
INSERT INTO `recetas` (`titulo`, `descripcion`, `ingredientes`, `instrucciones`, `tiempo_preparacion`, `porciones`, `calorias`, `categoria`) VALUES
('Ensalada César Saludable', 'Una versión ligera de la clásica ensalada César', 'Lechuga romana, Pechuga de pollo, Queso parmesano, Aderezo César light', 'Picar la lechuga, Cocinar el pollo, Mezclar ingredientes', 15, 2, 350, 'comida'),
('Smoothie Verde Energético', 'Smoothie lleno de nutrientes para comenzar el día', 'Espinaca, Plátano, Manzana verde, Yogurt natural, Miel', 'Licuar todos los ingredientes hasta obtener consistencia suave', 5, 1, 180, 'desayuno'),
('Tacos de Pescado Light', 'Tacos saludables con pescado a la parrilla', 'Filete de pescado, Tortillas de maíz, Repollo, Aguacate, Limón', 'Asar el pescado, Preparar vegetales, Armar tacos', 20, 3, 400, 'cena');

-- Algunos ejercicios de ejemplo
INSERT INTO `ejercicios` (`titulo`, `descripcion`, `duracion`, `nivel`, `tipo`, `calorias_quemadas`, `instrucciones`) VALUES
('Cardio de 7 Minutos', 'Rutina rápida de cardio para quemar calorías', 7, 'principiante', 'cardio', 80, 'Realizar cada ejercicio durante 30 segundos con 10 segundos de descanso'),
('Rutina de Fuerza Completa', 'Entrenamiento de cuerpo completo con peso corporal', 30, 'intermedio', 'fuerza', 250, 'Realizar 3 series de cada ejercicio con 1 minuto de descanso'),
('Yoga para Principiantes', 'Sesión de yoga suave para flexibilidad', 20, 'principiante', 'flexibilidad', 100, 'Seguir las posturas manteniendo respiración profunda');

-- Algunas noticias de ejemplo
INSERT INTO `noticias` (`titulo`, `contenido`, `resumen`, `categoria`, `autor`, `publicado`) VALUES
('5 Beneficios de una Alimentación Balanceada', 'Una alimentación balanceada no solo mejora tu salud física...', 'Descubre cómo una dieta equilibrada transforma tu vida', 'alimentacion', 'Dr. Juan Pérez', 1),
('Ejercicio Matutino: Clave para un Día Productivo', 'Hacer ejercicio por la mañana tiene múltiples beneficios...', 'El ejercicio matutino mejora tu energía y productividad', 'ejercicio', 'Lic. María González', 1),
('Técnicas de Mindfulness para Reducir el Estrés', 'El mindfulness es una práctica que ayuda a manejar el estrés...', 'Aprende técnicas de mindfulness para tu bienestar mental', 'salud-mental', 'Psic. Carlos Ramírez', 1);