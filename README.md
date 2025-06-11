# Zermatt Uhren 🕰️

**Zermatt Uhren** es una tienda online especializada en la venta de relojes japoneses y suizos. Desarrollada con tecnologías modernas como PHP, JavaScript, TailwindCSS, jQuery, jQuery UI y Fancybox. La web permite a los usuarios registrarse, iniciar sesión, visualizar productos y realizar compras seguras mediante integración con **Stripe**.

# Índice

1. [Zermatt Uhren 🕰️](#zermatt-uhren-🕰️)  
2. [🛠️ Tecnologías utilizadas](#-tecnologías-utilizadas)  
3. [⚙️ Funcionalidades](#-funcionalidades)  
4. [🧾 Instalación del proyecto](#-instalación-del-proyecto)  
   4.1 [Requisitos previos](#1-requisitos-previos)  
   4.2 [Clonar el repositorio](#2-clonar-el-repositorio)  
   4.3 [Integración con Stripe (modo de prueba)](#3-integración-con-stripe-modo-de-prueba)  
5. [📂 Estructura del Proyecto](#-estructura-del-proyecto)  
6. [✅ Notas finales](#-notas-finales)  
7. [🏗️ Arquitectura y Programación Orientada a Objetos (POO)](#️-arquitectura-y-programación-orientada-a-objetos-poo)  
   7.1 [Modelo de Capas (MVC)](#modelo-de-capas-mvc)  
   7.2 [Programación Orientada a Objetos (POO)](#programación-orientada-a-objetos-poo)  
8. [🖥️ Entorno de despliegue en servidor Ubuntu](#️-entorno-de-despliegue-en-servidor-ubuntu)  
   8.1 [Configuración del servidor](#configuración-del-servidor)  
9. [✅ Configuración básica de VirtualHost de Apache](#-configuración-básica-de-virtualhost-de-apache)
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

Paso 5: Incluir Stripe en tus archivos PHP (formulario_pago.php usa clave publica y pago.php usa la clave secreta)

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
ZERMATT-UHREN/
├── .vscode/
├── dist/
│   ├── output.css
│   ├── prototipos/
│   │   ├── circel_fuente_del_logo.url
│   │   └── prototipos.zip
│   └── legal/
│       ├── aviso-legal.php
│       ├── cookies.php
│       └── privacidad.php
├── node_modules/
├── public/
│   ├── css/
│   │   └── style.css
│   ├── fonts/
│   │   ├── Inter/
│   │   └── Playfair_Display/
│   ├── img/
│   │   ├── branding/
│   │   ├── grid-gallery/
│   │   └── banner.webp
│   ├── js/
│   │   ├── comment.js
│   │   ├── galeria.js
│   │   ├── grid-containers.js
│   │   ├── login.js
│   │   ├── nav-menu.js
│   │   └── register.js
│   ├── lib/
│   │   ├── fancybox/
│   │   ├── tool/
│   │   ├── jquery/
│   │   ├── jquery-ui/
│   │   └── tailwind/
│   ├── more_products/
│   └── uploads/
├── src/
│   ├── controllers/
│   │   └── auth/
│   ├── config/
│   │   └── database.php
│   ├── db/
│   ├── models/
│   │   ├── comment.php
│   │   ├── product.php
│   │   └── user.php
│   ├── products/
│   ├── admin_kernel.php
│   └── admin_products_list.php
├── vendor/
│   ├── composer/
│   ├── slim/
│   ├── autoload.php
│   └── formulario_pago.php
├── footer.php
├── header.php
├── input.css
├── output.css
├── .gitignore
├── add_to_cart.php
├── add-comment.php
├── cambios-devo.php
├── carrito.php
├── colecciones.php
├── composer.json
├── composer.lock
├── index.php
├── maira.txt
├── marca.php
├── package-lock.json
├── package.json
├── product.php
└── servicios.php
```
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


  🖥️ Entorno de despliegue en servidor Ubuntu

El proyecto está desplegado en una instancia de **Ubuntu Server 24.04** alojada en **AWS EC2**.

### Configuración del servidor:

- **IP pública del servidor**: `54.237.83.83`
- **Acceso SSH habilitado** mediante clave privada (.pem) utilizando **MobaXterm** como cliente SSH.
  ![imagen](https://github.com/user-attachments/assets/e415584d-d248-424d-a6bd-a8e4243acc8c)
- **Reglas de seguridad (Security Groups)**:
  - Entrada: `0.0.0.0/0` (todos los puertos abiertos para pruebas)
  - Salida: `0.0.0.0/0` (todos los puertos abiertos para pruebas)
    
   ![imagen](https://github.com/user-attachments/assets/44b099f8-235b-4864-8902-7ff48d59420a)

  - ⚠️ *Nota: Esta configuración es útil para desarrollo y pruebas, pero no recomendable para producción por motivos de seguridad.*
 
    ![imagen](https://github.com/user-attachments/assets/bd3c80d9-df8e-4e0d-bdca-47b4329d41ba)
      


- **Actualización inicial del sistema**:
  ```bash
  sudo apt-get update
  sudo apt-get upgrade

  Software instalado:

    Apache2 con soporte para PHP:
 ```bash
sudo apt install apache2
sudo apt install libapache2-mod-php
 ```
MySQL:

    sudo apt install mysql-server

        Contraseña configurada para el usuario root durante la instalación.

        Base de datos y usuarios gestionados a través del archivo src/config/database.php.

Acceso y administración remota:

    Se usó MobaXterm para conectarse al servidor vía SSH y realizar configuraciones como:

        Edición del archivo database.php

        Gestión del servidor Apache y MySQL

        Instalación de dependencias

✅ El servidor está preparado para aceptar conexiones HTTP y gestionar peticiones desde el frontend y backend alojados en la misma instancia.

  Configuración básica de VirtualHost de Apache

El VirtualHost en Apache permite servir distintos sitios web desde un mismo servidor usando diferentes dominios o IPs.
 ```bash
<VirtualHost *:80>
    # The ServerName directive sets the request scheme, hostname and port that
    # the server uses to identify itself. This is used when creating
    # redirection URLs. In the context of virtual hosts, the ServerName
    # specifies what hostname must appear in the request's Host: header to
    # match this virtual host. For the default virtual host (this file) this
    # value is not decisive as it is used as a last resort host regardless.
    # However, you must set it for any further virtual host explicitly.
    #ServerName www.example.com

    ServerName 54.237.83.83
    ServerAdmin antonio7kan@gmail.com
    DocumentRoot /var/www/html

    # Available loglevels: trace8, ..., trace1, debug, info, notice, warn,
    # error, crit, alert, emerg.
    # It is also possible to configure the loglevel for particular
    # modules, e.g.
    #LogLevel info ssl:warn

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined

    # For most configuration files from conf-available/, which are
    # enabled or disabled at a global level, it is possible to
    # include a line for only one particular virtual host. For example the
    # following line enables the CGI configuration for this host only
    # after it has been globally disabled with "a2disconf".
    #Include conf-available/serve-cgi-bin.conf
</VirtualHost>
 ```
![imagen](https://github.com/user-attachments/assets/499618af-d1f0-4c73-b17a-3f1419fe102a)

Diagrama Entidad - Relación

![Diagrama ER de base de datos (pata de gallo)](https://github.com/user-attachments/assets/7f125f39-78bd-4435-8fed-a90cf9ddad34)

Diagrama de Capas (Lógica,acceso a bbdd y bbdd)

![Mapa conceptual](https://github.com/user-attachments/assets/681f064f-a80d-4fce-9946-e7d52679c046)
