<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <h2>Login</h2>

  <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

  <form action="<?= site_url('auth/valida_login') ?>" method="post">
    <?= csrf_field() ?>
    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Contraseña:</label>
    <input type="password" name="contraseña" required>
    <input type="submit" value="Ingresar">
  </form>
  <p>¿No tenés cuenta? <a href="<?= site_url('auth/register') ?>">Registrate</a></p>
</body>

</html>