<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <h2>Registro</h2>

    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form action="<?= site_url('auth/register_post') ?>" method="post">
        <?= csrf_field() ?>
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Contraseña:</label>
        <input type="password" name="contraseña" required>

        <input type="submit" value="Registrarse">
      
    </form>
    <p>¿Ya tenés cuenta? <a href="<?= site_url('auth/login') ?>">Ingresar</a></p>
</body>

</html>