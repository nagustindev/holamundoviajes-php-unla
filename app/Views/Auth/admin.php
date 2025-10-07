<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin</title>
</head>

<body>
    <h2>Bienvenido <?= $username ?></h2>

    <p>Esta es la vista del panel de administrador.</p>
    <nav>
        <ul>
            <li><a href="<?= site_url('paquetes') ?>">Gestionar Paquetes</a></li>
            <li><a href="<?= site_url('paquetes/add') ?>">Agregar Paquete</a></li>
            <li><a href="<?= site_url('auth/logout') ?>">Cerrar sesión</a></li>
        </ul>
    </nav>
</body>

</html>