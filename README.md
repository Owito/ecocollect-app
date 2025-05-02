# ♻️ Ecocollect

**Ecocollect** es una plataforma web para la **gestión de residuos reciclables**, desarrollada con Laravel. Su objetivo es conectar a ciudadanos, operarios y entidades gestoras en un ecosistema digital que optimiza la recolección, seguimiento y reporte de residuos, promoviendo prácticas sostenibles en entornos urbanos.

---

## 🚀 Funcionalidades Principales

- 🧍 Registro e inicio de sesión de usuarios
- 📝 Solicitud de recolección de residuos
- 📅 Calendario e historial de recolecciones
- 📊 Reportes y métricas de actividad por usuario
- 🛠 Asignación de rutas y operarios (modo administrador)
- 💬 Comunicación entre usuarios y gestores (futuro)

---

## 🛠 Tecnologías Usadas

- ⚙️ [Laravel 10](https://laravel.com/) – Framework PHP
- 🐬 MySQL – Base de datos relacional
- 🖌 [Blade](https://laravel.com/docs/10.x/blade) – Motor de plantillas
- 🎨 [Tailwind CSS](https://tailwindcss.com/) + Bootstrap – Estilos
- 🔒 Laravel Breeze – Autenticación

---

## 📷 Vista previa

![ecocollect-preview](https://github.com/Owito/ecocollect-app/assets/preview-image.png)  
*Interfaz limpia e intuitiva para gestionar residuos desde cualquier dispositivo.*

---

## 📦 Instalación local

```bash
git clone https://github.com/Owito/ecocollect-app.git
cd ecocollect-app
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
