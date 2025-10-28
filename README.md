# HolaMundo Viajes ✈️

Bienvenido a HolaMundo Viajes, un proyecto web de una agencia de viajes ficticia. Esta aplicación simula la interacción, compra y gestión de paquetes de viaje, y fue desarrollada con PHP y el framework CodeIgniter.

## 🚀 Funcionalidades Principales

Este proyecto incluye dos roles principales (Usuario y Administrador) con las siguientes capacidades:

* **Sistema de Autenticación:** Login y registro de usuarios.
* **Vistas de Usuario:**
    * Ver el catálogo completo de paquetes de viaje.
    * Simular el proceso de compra de un paquete.
    * Interactuar con las vistas de ayuda e información de la página.
* **Panel de Administrador:**
    * **Gestión de Paquetes (CRUD):** Crear, leer, actualizar y eliminar paquetes de viaje.
    * **Gestión de Usuarios (CRUD):** Leer perfiles de usuario.

---

## 🛠️ Tecnologías y Requisitos

Para ejecutar este proyecto, necesitarás:

* **Servidor web local:** [**XAMPP**](https://www.apachefriends.org/es/index.html) (que incluye Apache y MySQL).
* **PHP:** Versión 7.4 o superior (la que venga con tu XAMPP).
* **Base de datos:** MySQL o MariaDB.
* **Navegador web:** Chrome, Firefox, Edge, etc.

*(CodeIgniter ya está incluido en este repositorio, por lo que no se requiere instalación manual del framework).*

---

## ⚙️ Guía de Instalación

Sigue estos pasos para poner en marcha el proyecto en tu entorno local:

**1. Clonar el Repositorio**

Puedes clonar este repositorio usando Git o descargarlo como ZIP.

```bash
# Opción 1: Clonar con Git (Recomendado)
# Asegúrate de estar en la carpeta 'htdocs' de tu XAMPP
cd C:/xampp/htdocs/

git clone [URL_DE_TU_REPOSITORIO_GIT] HolaMundoViajes
```

**Opción 2: Descarga Manual**

1.  Descarga el archivo `.zip` del repositorio.
2.  Descomprímelo.
3.  Mueve la carpeta del proyecto (ej: `HolaMundoViajes-main`) dentro de tu directorio `C:/xampp/htdocs/`.
4.  (Opcional pero recomendado) Renombra la carpeta a simplemente `HolaMundoViajes` para que la URL sea más limpia.

**2. Configurar la Base de Datos**

1.  Inicia los módulos de **Apache** y **MySQL** desde el panel de control de XAMPP.
2.  Abre tu navegador y ve a `http://localhost/phpmyadmin/`.
3.  Crea una nueva base de datos. Por ejemplo: `holamundo_viajes_db`.
4.  **(Opcional) Importar la base de datos:** Si tienes un archivo `.sql` con la estructura de las tablas, selecciónalo y ejecútalo en la pestaña "Importar" de la base de datos que acabas de crear.

**3. Configurar CodeIgniter**

Necesitas decirle a CodeIgniter cómo conectarse a tu base de datos y cuál es la URL base del proyecto.

1.  **Conexión a la Base de Datos:**
    * Ve al archivo: `HolaMundoViajes/application/config/database.php`.
    * Modifica el array `$db['default']` con tus credenciales:
    ```php
    'hostname' => 'localhost',
    'username' => 'root',         // Tu usuario de XAMPP (suele ser 'root')
    'password' => '',            // Tu contraseña (suele estar vacía en XAMPP)
    'database' => '[NOMBRE_DE_TU_BASE_DE_DATOS]', // Ej: 'holamundo_viajes_db'
    ```

2.  **Configuración de la URL Base:**
    * Ve al archivo: `HolaMundoViajes/application/config/config.php`.
    * Establece la `base_url`:
    ```php
    $config['base_url'] = 'http://localhost/HolaMundoViajes/';
    ```

---

## 💻 Cómo Ejecutar el Proyecto

¡Eso es todo!

1.  Asegúrate de que XAMPP (Apache y MySQL) esté en ejecución.
2.  Abre tu navegador web.
3.  Accede a la URL: **`http://localhost/HolaMundoViajes/`**