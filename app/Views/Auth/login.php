<!DOCTYPE html>
<html lang="es-AR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?= base_url('favicon.ico') ?>" sizes="any">
  <link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a793e0e3dc.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= base_url() ?>css/styles.css">
  <title>Login - HolaMundo Viajes</title>
</head>

<body>
  <section class="min-h-screen flex flex-col items-center justify-center bg-gray-100 py-8 px-4">
    <div class="border border-gray-100 shadow w-full max-w-sm p-8 rounded-md bg-white">
      <div class="flex justify-between text-sm">
        <div class="flex items-center gap-2">
          <a class="flex items-center gap-2" href="<?= base_url() ?>">
            <img src="<?= base_url('uploads/logo2.svg') ?>" alt="Logo" class="h-10">
            <p class="font-bold font-fredoka text-lg">HolaMundo Viajes</p>
          </a>
        </div>
      </div>

      <div class="mt-5">
        <h1 class="text-2xl font-semibold">
          Saluda tus próximas aventuras
        </h1>
      </div>

      <p class="text-sm mt-4">
        Inicia sesión para acceder a la compra de paquetes y planificar tus próximos destinos.
      </p>

      <form action="<?= base_url('auth/valida_login') ?>" method="post">
        <?= csrf_field() ?>
        <div class="mt-6">
          <input
            placeholder="Email"
            type="text"
            name="email"
            class="p-2 px-3 border-b-[2px] focus:border-blue-400 w-full outline-none bg-white transition duration-300" />
          <input
            placeholder="Contraseña"
            type="password"
            name="contraseña"
            class="p-2 px-3 mt-3 border-b-[2px] focus:border-blue-400 w-full outline-none bg-white transition duration-300" />
        </div>
        <?php if (isset($error) && $error): ?>
          <p class="text-red-600"><?= esc($error) ?></p>
        <?php endif; ?>

        <button
          type="submit"
          class="bg-accent text-white text-sm h-10 w-[130px] rounded-md font-semibold mt-5 shadow-md hover:bg-primary transition duration-300 hover:scale-105">
          Iniciar Sesión
        </button>
        <div class="mt-5">
          <p>¿No tenés cuenta? <a class="font-semibold text-accent hover:underline" href="<?= base_url('auth/register') ?>">Registrate</a></p>
        </div>
      </form>
    </div>
    <div class="flex items-center justify-center mt-8 w-full max-w-6xl overflow-hidden">
      <img src="<?= base_url('uploads/undraw_clouds_bmtk.svg') ?>" alt="Ilustracion Nubes" class="w-1/3 h-auto object-contain max-h-96">
      <img src="<?= base_url('uploads/undraw_aircraft_usu4.svg') ?>" alt="Ilustracion Aeronave" class="w-2/4 h-auto object-contain max-h-96">
      <img src="<?= base_url('uploads/undraw_clouds_bmtk.svg') ?>" alt="Ilustracion Nubes" class="w-1/3 h-auto object-contain max-h-96">
    </div>
  </section>
</body>

</html>
