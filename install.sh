#!/bin/bash
# ============================================================
# NeuralForge — Script de instalación para macOS
# Requiere: PHP 8.2+, Composer
# ============================================================

set -e

GREEN='\033[0;32m'
CYAN='\033[0;36m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m'

echo ""
echo -e "${CYAN}╔══════════════════════════════════════╗${NC}"
echo -e "${CYAN}║     NeuralForge — Instalación        ║${NC}"
echo -e "${CYAN}╚══════════════════════════════════════╝${NC}"
echo ""

# 1. Verificar PHP
echo -e "${YELLOW}▶ Verificando PHP...${NC}"
if ! command -v php &> /dev/null; then
    echo -e "  ${RED}PHP no encontrado.${NC} Instálalo con: brew install php"
    exit 1
fi
PHP_VERSION=$(php -r "echo PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION;")
echo -e "  PHP encontrado: ${GREEN}${PHP_VERSION}${NC}"

# 2. Verificar Composer
echo -e "${YELLOW}▶ Verificando Composer...${NC}"
if ! command -v composer &> /dev/null; then
    echo -e "  ${RED}Composer no encontrado.${NC}"
    echo "  Ejecuta estos comandos para instalarlo:"
    echo "    curl -sS https://getcomposer.org/installer | php"
    echo "    sudo mv composer.phar /usr/local/bin/composer"
    exit 1
fi
echo -e "  Composer: ${GREEN}OK${NC}"

# 3. Permisos de storage ANTES de composer install
echo -e "${YELLOW}▶ Preparando directorios...${NC}"
chmod -R 775 storage bootstrap/cache 2>/dev/null || true
touch database/database.sqlite 2>/dev/null || true
echo -e "  Directorios: ${GREEN}OK${NC}"

# 4. Copiar .env ANTES de composer install (el script post-install lo necesita)
echo -e "${YELLOW}▶ Configurando entorno...${NC}"
if [ ! -f .env ]; then
    cp .env.example .env
    echo -e "  .env creado: ${GREEN}OK${NC}"
else
    echo -e "  .env ya existe: ${GREEN}OK${NC}"
fi

# 5. Instalar dependencias
echo -e "${YELLOW}▶ Instalando dependencias con Composer...${NC}"
echo -e "  (Esto puede tardar 1-3 minutos la primera vez)"
composer install --no-interaction --prefer-dist --optimize-autoloader

# 6. Generar clave de app
echo -e "${YELLOW}▶ Generando APP_KEY...${NC}"
php artisan key:generate --ansi

# 7. Limpiar caché por si acaso
echo -e "${YELLOW}▶ Limpiando caché...${NC}"
php artisan config:clear 2>/dev/null || true
php artisan view:clear 2>/dev/null || true
echo -e "  Caché limpia: ${GREEN}OK${NC}"

echo ""
echo -e "${GREEN}╔══════════════════════════════════════╗${NC}"
echo -e "${GREEN}║  ✓  Instalación completada           ║${NC}"
echo -e "${GREEN}╚══════════════════════════════════════╝${NC}"
echo ""
echo -e "Ahora ejecuta:"
echo -e "  ${CYAN}php artisan serve${NC}"
echo ""
echo -e "Y abre en tu navegador:"
echo -e "  ${CYAN}http://localhost:8000${NC}"
echo ""
