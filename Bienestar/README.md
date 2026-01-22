# 🏥 BIENIESTAR - Sistema Integral de Bienestar

> Plataforma web completa para la gestión de salud, alimentación y ejercicio para estudiantes del IEST Anáhuac

---

## 📋 Descripción

BIENIESTAR es una plataforma integral que ayuda a los estudiantes universitarios a mantener un estilo de vida saludable mediante:

- 🍎 **Alimentación**: Recetas saludables y planes nutricionales
- 💪 **Ejercicio**: Rutinas personalizadas y seguimiento
- 🧠 **Salud Mental**: Tests psicológicos y recursos de bienestar
- 📰 **Noticias**: Últimas tendencias en salud

---

## 🚀 Características Principales

### Para Usuarios
- Sistema de autenticación con Google OAuth
- Dashboard personalizado con estadísticas
- Biblioteca de recetas saludables con filtros
- Rutinas de ejercicio por nivel y tipo
- Tests de bienestar mental
- Blog de noticias actualizadas
- Gestión de perfil y preferencias

### Para Administradores
- Panel de administración
- Gestión de usuarios
- Moderación de contenido
- Estadísticas del sistema

---

## 🛠️ Tecnologías Utilizadas

### Backend
- PHP 8.0+
- MySQL 8.0
- PDO para conexiones seguras
- Composer para dependencias

### Frontend
- HTML5 semántico
- CSS3 (Variables CSS, Grid, Flexbox)
- JavaScript ES6+ (Vanilla)
- Diseño responsive

### Librerías
- PHPDotenv - Variables de entorno
- PHPMailer - Envío de correos
- Google API Client - OAuth

---

## 📦 Instalación

### Requisitos
- PHP >= 8.0
- MySQL >= 8.0
- Apache/Nginx con mod_rewrite
- Composer

### Pasos

1. **Clonar o descargar el proyecto**
```bash
# Coloca los archivos en:
C:\xampp\htdocs\Bienestar\
```

2. **Configurar base de datos**
```bash
# Importar el schema en MySQL
mysql -u root -p < database/schema.sql
```

3. **Configurar variables de entorno**
```bash
# Copiar .env.example a .env
cp .env.example .env

# Editar .env con tus credenciales
```

4. **Instalar dependencias**
```bash
composer install
```

5. **Configurar permisos**
```bash
chmod -R 755 public/assets/uploads
chmod -R 755 logs
```

6. **Acceder**
```
http://localhost/Bienestar/public/
```

---

## 📁 Estructura del Proyecto
```
Bienestar/
├── public/                    # Carpeta pública
│   ├── index.php             # Landing page
│   ├── assets/               # CSS, JS, imágenes
│   └── pages/                # Páginas de la aplicación
├── app/                      # Lógica de negocio
│   ├── config/               # Configuraciones
│   ├── controllers/          # Controladores MVC
│   ├── models/               # Modelos de datos
│   ├── views/                # Vistas y componentes
│   └── helpers/              # Funciones auxiliares
├── database/                 # SQL y migraciones
├── controllers/              # Controllers de entrada
├── vendor/                   # Dependencias Composer
├── .env                      # Variables de entorno
└── README.md                 # Este archivo
```

---

## 🔐 Usuarios de Prueba
```
Administrador:
Email: admin@bieniestar.com
Contraseña: admin123

Usuario:
Email: usuario@test.com
Contraseña: usuario123
```

---

## 🎨 Páginas Disponibles

- `/` - Landing page con efecto parallax
- `/pages/login.php` - Inicio de sesión
- `/pages/dashboard.php` - Panel principal
- `/pages/alimentacion.php` - Recetas y nutrición
- `/pages/ejercicio.php` - Rutinas de ejercicio
- `/pages/salud-mental.php` - Tests y recursos
- `/pages/noticias.php` - Blog de noticias
- `/pages/perfil.php` - Perfil de usuario
- `/pages/about.php` - Sobre nosotros

---

## 🔧 Configuración

### Google OAuth

1. Crear proyecto en [Google Cloud Console](https://console.cloud.google.com/)
2. Habilitar Google+ API
3. Crear credenciales OAuth 2.0
4. Configurar URIs autorizadas
5. Actualizar `.env` con credenciales

### SMTP Email

Configurar en `.env`:
```env
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tu_email@gmail.com
MAIL_PASSWORD=tu_app_password
```

---

## 📝 Licencia

MIT License - Proyecto educativo IEST Anáhuac

---

## 👥 Créditos

- **Desarrollado por**: [Tu Nombre]
- **Institución**: IEST Anáhuac Tampico
- **Año**: 2025

---

## 📞 Soporte

¿Problemas o preguntas?
- Email: soporte@bieniestar.com
- GitHub Issues: [Reportar un problema](https://github.com/tu-repo/issues)

---

**¡Gracias por usar BIENIESTAR! 🎉**