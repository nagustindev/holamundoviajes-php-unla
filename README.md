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

git clone [URL_DE_TU_REPOSITORIO_GIT] holamundo_tp
```

**Opción 2: Descarga Manual**

1.  Descarga el archivo `.zip` del repositorio.
2.  Descomprímelo.
3.  Mueve la carpeta del proyecto (ej: `holamundoviajes-php-unla-main`) dentro de tu directorio `C:/xampp/htdocs/`.
4.  (Opcional pero recomendado) Renombra la carpeta a simplemente `holamundo_tp` para que la URL sea más limpia y acorde a la del proyecto.

**2. Configurar la Base de Datos**

1.  Inicia los módulos de **Apache** y **MySQL** desde el panel de control de XAMPP.
2.  Abre tu navegador y ve a `http://localhost/phpmyadmin/`.
3.  Haz clic en la pestaña **"Importar"** en el menú superior.
4.  En la sección "Archivo a importar", haz clic en "Seleccionar archivo".
5.  Busca y selecciona el archivo `.sql` que se encuentra en la raíz de este proyecto (`holamundo_viajes.sql`).
6.  Deja todas las demás opciones como están y haz clic en el botón **"Importar"** (o "Continuar") al final de la página.

*Espera a que termine el proceso. Esto creará automáticamente todas las tablas (estructura) y cargará todos los datos de la aplicación.*

**3. Configurar CodeIgniter**

Necesitas decirle a CodeIgniter cómo conectarse a tu base de datos y cuál es la URL base del proyecto.

1.  **Conexión a la Base de Datos:**
    * Ve al archivo: `holamundo_tp/app/config/Database.php`.
    * Modifica el array `$db['default']` con tus credenciales:
    ```php
    'hostname' => 'localhost',
    'username' => 'root',         // Tu usuario de XAMPP (suele ser 'root')
    'password' => '',            // Tu contraseña (suele estar vacía en XAMPP)
    'database' => 'holamundo_viajes', 
    ```

2.  **Configuración de la URL Base:**
    * Ve al archivo: `holamundo_tp/app/config/App.php`.
    * Establece la `base_url`:
    ```php
    $config['base_url'] = 'http://localhost/holamundo_tp/public';
    ```

---

## 💻 Cómo Ejecutar el Proyecto

¡Eso es todo!

1.  Asegurate de que XAMPP (Apache y MySQL) esté en ejecución.
2.  Abre tu navegador web.
3.  Accede a la URL: **`http://localhost/holamundo_tp/`**