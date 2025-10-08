<!DOCTYPE html>
<html lang="es-AR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>css/styles.css">
    <title>HolaMundo Viajes</title>
</head>

<body>
    <nav class="flex flex-col bg-primary">
        <ul class="flex gap-2 p-4 text-white">
            <li>
                <a href="<?= base_url() ?>" class="flex items-center gap-2">
                    <img src="<?= base_url('uploads/logo.svg') ?>" alt="Logo" class="h-10">
                    <p class="font-fredoka font-bold text-2xl">HolaMundo Viajes</p>
                </a>
            </li>
            <li>
                <a href="<?= base_url('paquetes') ?>" class="hover:rounded-md hover:bg-color-accent">Paquetes</a>
            </li>
            <li>
                <a href="<?= base_url('contacto') ?>">Contacto</a>
            </li>
            <li>
                <a href="<?= base_url('auth/login') ?>">Iniciar Sesión</a>
            </li>
        </ul>
    </nav>
    <h1 class="text-blue-500 text-lg">Bienvenidos!</h1>
    <p>Explora nuestros paquetes turísticos y disfruta de una experiencia inolvidable.</p>
</body>

</html>