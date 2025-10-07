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
    <a href="<?= site_url('auth/logout') ?>">Cerrar sesión</a>
</body>

</html>