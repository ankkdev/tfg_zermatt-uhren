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

💳 Integración con Stripe (modo de prueba)
Paso 1: Crear cuenta de Stripe

    Ve al sitio oficial: https://stripe.com

    Haz clic en "Regístrate" (Sign Up).

    Introduce tu email y contraseña. No completes datos empresariales.

    Accede al Panel de Control.

Paso 2: Activar Modo de Pruebas

    En el dashboard, activa el "Modo de pruebas" (esquina superior derecha).

Paso 3: Obtener claves de API

    Ir a Desarrolladores → Claves de API.

    Copia las siguientes claves:

        Clave pública: pk_test_xxxxxxxxxxx

        Clave secreta: sk_test_xxxxxxxxxxx

Paso 4: Instalación de Stripe PHP SDK

    Abre tu terminal y ve a la carpeta /api o donde tengas el backend:

mkdir api
cd api
composer init

    Instala Stripe:

composer require stripe/stripe-php

    Si falla, asegúrate de:

        Tener extension=zip habilitado en php.ini

        Tener instalada la utilidad unzip en tu sistema

    Verifica que se ha generado:

        La carpeta vendor/

        El archivo vendor/autoload.php

Paso 5: Incluir Stripe en tus archivos PHP

En pago.php, incluye el autoload y configura tu clave secreta de Stripe:

require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_tu_clave_secreta');

Este archivo es el encargado de generar el pago desde el servidor usando la API de Stripe.
Paso 6: Formulario de pago

El formulario que envía los datos al backend se encuentra en formulario_pago.php, e incluye el uso de la clave pública para la integración con Stripe en el frontend:

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('pk_test_tu_clave_publica');
    // Lógica de Stripe Elements aquí
</script>

Paso 7: Probar un pago

Usa los siguientes datos de prueba proporcionados por Stripe:

    Número de tarjeta: 4242 4242 4242 4242

    Fecha: cualquier fecha futura (12/34)

    CVC: cualquier número de 3 cifras (123)

Más tarjetas de prueba disponibles en la documentación de Stripe.
Configuración de otros métodos de pago

    Ve a: Configuración → Pagos → Métodos de pago

    Activa los que necesites (por ejemplo, Apple Pay, iDEAL, etc.)

📂 Estructura del Proyecto

zermatt-uhren/
│
├── index.php
├── login.php
├── register.php
├── carrito.php
├── formulario_pago.php   # Aquí se muestra el formulario de pago
├── pago.php              # Aquí se procesa el pago con Stripe
├── /api
│   ├── vendor/
│   └── autoload.php
├── /css
├── /js
├── /img
└── README.md

✅ Notas finales

    El sistema de pago está en modo de pruebas: no se realizan transacciones reales.

    Es importante validar la seguridad en producción.

    Asegúrate de configurar tu base de datos correctamente.

🏗️ Arquitectura y Programación Orientada a Objetos (POO)

La aplicación web Zermatt Uhren está desarrollada siguiendo el patrón arquitectónico MVC (Modelo-Vista-Controlador), que permite una separación clara entre la lógica de negocio, la interfaz de usuario y el control de flujo, facilitando el mantenimiento y escalabilidad del proyecto.
Modelo de Capas (MVC)

    Modelo (Model): Gestiona la lógica y estructura de los datos de la aplicación, incluyendo la interacción con la base de datos. En este proyecto, las entidades principales como los usuarios y productos están representadas mediante clases orientadas a objetos, que encapsulan la funcionalidad y atributos de cada entidad.

    Vista (View): Compuesta por los archivos que muestran la interfaz gráfica al usuario, utilizando tecnologías frontend como HTML, Tailwind CSS para estilos, y JavaScript con librerías como jQuery, jQuery UI y Fancybox para mejorar la experiencia visual e interactiva.

    Controlador (Controller): Responsable de recibir las peticiones del usuario, procesar la lógica correspondiente utilizando los modelos, y devolver las vistas adecuadas. Aquí se gestionan funcionalidades como el registro, inicio de sesión y procesamiento de pagos.

Programación Orientada a Objetos (POO)

Para representar las entidades principales del sistema se utilizaron clases en PHP que encapsulan tanto los datos como los métodos para operar sobre ellos, siguiendo principios de POO. Esto incluye:

    User: Clase que maneja toda la lógica relacionada con los usuarios, como crear una cuenta, buscar usuarios por correo electrónico y gestionar la autenticación de forma segura.

    Product: Clase encargada de la gestión de productos, permitiendo crear, modificar, actualizar y eliminar productos en la base de datos, además de manejar sus atributos principales como nombre, descripción, precio, imágenes y stock.

Esta organización facilita la reutilización del código, mejora la legibilidad y contribuye a un desarrollo más ordenado y profesional.
