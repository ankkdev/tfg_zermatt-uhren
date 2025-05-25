# Zermatt Uhren 🕰️

**Zermatt Uhren** es una tienda online especializada en la venta de relojes japoneses y suizos. Desarrollada con tecnologías modernas como PHP, JavaScript, TailwindCSS, jQuery, jQuery UI y Fancybox. La web permite a los usuarios registrarse, iniciar sesión, visualizar productos y realizar compras seguras mediante integración con **Stripe**.

---

## 🛠️ Tecnologías utilizadas

- **Frontend**:
  - HTML5, JavaScript
  - TailwindCSS
  - jQuery, jQuery UI
  - Fancybox

- **Backend**:
  - PHP
  - Stripe PHP SDK (para pagos)

- **Base de Datos**:
  - MySQL (vía XAMPP)

---

## ⚙️ Funcionalidades

- Registro e inicio de sesión de usuarios
- Listado de productos
- Carrito de compras
- Pasarela de pagos con Stripe (modo de prueba)
- Interfaz responsive y moderna con Tailwind
- Galería de imágenes con Fancybox

---

## 🧾 Instalación del proyecto

### 1. Requisitos previos

- PHP 7.x o superior
- Composer
- XAMPP (o similar)
- Navegador web
- Conexión a internet para acceder a Stripe

### 2. Clonar el repositorio

```bash
git clone https://github.com/tuusuario/zermatt-uhren.git
cd zermatt-uhren
```
3. Integración con Stripe (modo de prueba)
Paso 1: Crear cuenta de Stripe

Ve al sitio oficial: https://stripe.com

    Haz clic en "Regístrate" (Sign Up).

    Introduce tu email y contraseña. No completes datos empresariales.

    Accede al Panel de Control.

Paso 2: Activar Modo de Pruebas

En el dashboard, activa el "Modo de pruebas" (esquina superior derecha).
Paso 3: Obtener claves de API

Ve a Desarrolladores → Claves de API.

Copia las siguientes claves:

    Clave pública: pk_test_xxxxxxxxxxx

    Clave secreta: sk_test_xxxxxxxxxxx

Paso 4: Instalación de Stripe PHP SDK

Abre tu terminal y ve a la carpeta /api o donde tengas el backend.

Luego ejecuta estos comandos:
```bash
mkdir api
cd api
composer init
composer require stripe/stripe-php
```
Si falla la instalación, asegúrate de:

    Tener extension=zip habilitado en php.ini

    Tener instalada la utilidad unzip en tu sistema

Verifica que se ha generado:

    La carpeta vendor/

    El archivo vendor/autoload.php

Paso 5: Incluir Stripe en tus archivos PHP

En pago.php, incluye el autoload y configura tu clave secreta de Stripe:
```bash
<?php
require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_tu_clave_secreta');
```

Este archivo es el encargado de generar el pago desde el servidor usando la API de Stripe.
Paso 6: Formulario de pago

El formulario que envía los datos al backend se encuentra en formulario_pago.php, e incluye el uso de la clave pública para la integración con Stripe en el frontend:
```bash
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('pk_test_tu_clave_publica');
    // Lógica de Stripe Elements aquí
</script>
```
Paso 7: Probar un pago

Usa los siguientes datos de prueba proporcionados por Stripe:

    Número de tarjeta: 4242 4242 4242 4242

    Fecha: cualquier fecha futura (por ejemplo, 12/34)

    CVC: cualquier número de 3 cifras (por ejemplo, 123)

Más tarjetas de prueba disponibles en la documentación de Stripe.
Configuración de otros métodos de pago

    Ve a: Configuración → Pagos → Métodos de pago

    Activa los que necesites (por ejemplo, Apple Pay, iDEAL, etc.)
## 📂 Estructura del Proyecto

```plaintext
zermatt-uhren/
├── index.php
├── login.php
├── register.php
├── carrito.php
├── formulario_pago.php      # Muestra el formulario de pago
├── pago.php                 # Procesa el pago con Stripe
├── /api
│   ├── vendor/
│   └── autoload.php
├── /css                     # Estilos (Tailwind u otros)
├── /js                      # Scripts (jQuery, lógica JS)
├── /img                     # Imágenes del sitio y productos
└── README.md

✅ Notas finales

    El sistema de pago está en modo de pruebas: no se realizan transacciones reales.

    Es importante validar la seguridad en producción.

    Asegúrate de configurar tu base de datos correctamente.
