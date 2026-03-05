# NeuralForge — Web de Servicios de IA con Laravel

Una web moderna y elegante para servicios de Inteligencia Artificial, construida con **Laravel 10** y **PHP 8.2**.

---

## ✅ Requisitos previos

- **macOS Catalina** (10.15) o superior
- **PHP 8.2** (ya tienes 8.2.27 ✓)
- **Composer** (gestor de dependencias de PHP)

---

## 🚀 Instalación paso a paso

### 1. Instalar Composer (si no lo tienes)

Abre **Terminal** y ejecuta:

```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

Verifica:
```bash
composer --version
```

### 2. Descomprimir el proyecto

Descomprime el ZIP en una carpeta, por ejemplo `~/Desktop/ai-services`

### 3. Abrir Terminal en la carpeta del proyecto

```bash
cd ~/Desktop/ai-services
```

### 4. Instalar con el script automático

```bash
chmod +x install.sh
./install.sh
```

O manualmente:

```bash
composer install
cp .env.example .env
php artisan key:generate
chmod -R 775 storage bootstrap/cache
touch database/database.sqlite
```

### 5. Iniciar el servidor

```bash
php artisan serve
```

### 6. Abrir en el navegador

```
http://localhost:8000
```

---

## 📄 Páginas incluidas

| Ruta | Descripción |
|------|-------------|
| `/` | Home con hero, estadísticas y servicios destacados |
| `/servicios` | Catálogo completo de 6 servicios de IA |
| `/servicios/{slug}` | Detalle de cada servicio con pricing |
| `/contacto` | Formulario de contacto con validación |

### Servicios disponibles:
- `generacion-texto` — Generación de texto con IA
- `vision-computadora` — Visión por computadora
- `automatizacion` — Automatización inteligente
- `chatbots` — Chatbots conversacionales
- `analisis-predictivo` — Análisis predictivo
- `audio-voz` — Audio y síntesis de voz

---

## 🏗 Estructura del proyecto (Laravel MVC)

```
ai-services/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HomeController.php       ← Página de inicio
│   │   │   ├── ServiceController.php    ← Listado y detalle de servicios
│   │   │   └── ContactController.php    ← Formulario de contacto
│   │   └── Middleware/
│   ├── Providers/
│   └── Exceptions/
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php            ← Layout principal (nav + footer)
│       ├── home.blade.php               ← Vista de inicio
│       ├── contacto.blade.php           ← Vista de contacto
│       └── servicios/
│           ├── index.blade.php          ← Catálogo de servicios
│           └── show.blade.php           ← Detalle de servicio
├── routes/
│   └── web.php                          ← Rutas de la aplicación
├── config/                              ← Configuración de Laravel
├── storage/                             ← Cache, sesiones, logs
├── .env.example                         ← Variables de entorno
└── composer.json                        ← Dependencias PHP
```

---

## ⚙️ Conceptos de Laravel usados

- **Rutas** (`routes/web.php`) — `Route::get`, `Route::post`
- **Controladores** — MVC con datos pasados a vistas via `compact()`
- **Vistas Blade** — `@extends`, `@section`, `@yield`, `@foreach`, `@if`, `@error`
- **Validación** — `$request->validate()` con mensajes personalizados
- **Redirecciones** — `redirect()->route()->with('success', ...)`
- **CSRF Protection** — `@csrf` en formularios
- **Named Routes** — `route('home')`, `route('servicios.show', $slug)`
- **404 automático** — `abort(404)` si el servicio no existe

---

## 🎨 Stack tecnológico

- **Backend**: Laravel 10 + PHP 8.2
- **Vistas**: Blade Templates
- **CSS**: Vanilla CSS con variables custom (sin dependencias)
- **Fuentes**: Google Fonts (Syne + Space Mono)
- **DB**: SQLite (sin configuración adicional)

---

## 🛠 Comandos útiles

```bash
# Iniciar servidor de desarrollo
php artisan serve

# Limpiar caché de vistas
php artisan view:clear

# Limpiar toda la caché
php artisan cache:clear
php artisan config:clear

# Ver rutas disponibles
php artisan route:list
```

---

Hecho con ❤️ y Laravel
# ai-services-02
