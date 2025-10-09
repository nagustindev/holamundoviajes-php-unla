<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a793e0e3dc.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= base_url() ?>css/styles.css">
  <title>Registro</title>
</head>

<body>
  <?= view('partials/nav') ?>
  <section class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="border border-gray-100 shadow w-[360px] p-8 rounded-md bg-white">
      <?php if (isset($error) && $error): ?>
        <p class="text-red-600"><?= esc($error) ?></p>
      <?php endif; ?>
      <div class="flex justify-between text-sm">
        <div class="flex items-center gap-2">
          <a class="flex items-center gap-2" href="<?= base_url() ?>">
            <img src="<?= base_url('uploads/logo2.svg') ?>" alt="Logo" class="h-10">
            <p class="font-bold pb-[2px] font-fredoka">HolaMundo Viajes</p>
          </a>
        </div>
      </div>
      <form action="<?= base_url('auth/register_post') ?>" method="post">
        <?= csrf_field() ?>
        <div class="mt-6">
          <input
            placeholder="Email"
            type="email"
            name="email"
            class="p-2 px-3 border-b-[2px] focus:border-blue-400 w-full outline-none bg-white transition duration-300" />
          <input
            placeholder="Contraseña"
            type="password"
            name="contraseña"
            class="p-2 px-3 mt-3 border-b-[2px] focus:border-blue-400 w-full outline-none bg-white transition duration-300" />
        </div>

        <button
          type="submit"
          class="bg-accent text-white text-sm h-10 w-[130px] rounded-md font-semibold mt-5 shadow-md hover:bg-primary transition duration-300 hover:scale-105">
          Registrarse
        </button>
        <div>
          <p>¿Ya tenés cuenta? <a class="font-semibold text-accent hover:underline" href="<?= base_url('auth/login') ?>">Inicia sesión</a></p>
        </div>
      </form>
    </div>
  </section>
</body>

</html>