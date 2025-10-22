<!DOCTYPE html>
<html lang="es-AR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('favicon.ico') ?>" sizes="any">
    <link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>css/styles.css">
    <script src="https://kit.fontawesome.com/a793e0e3dc.js" crossorigin="anonymous"></script>
    <title>Ayuda - HolaMundo Viajes</title>
</head>

<body>
    <?= view('partials/_nav') ?>
    <div class="mx-auto p-6 bg-accent">
        <div class=" justify-center flex flex-col items-center">
            <h1 class="text-3xl font-bold text-white">¿Cómo podemos ayudarte?</h1>
        </div>
    </div>
    <section class="bg-gray-100">
        <div class="grid grid-cols-2 gap-4">
            <div class="flex rounded-xl shadow-lg border border-gray-200 bg-white overflow-hidden cursor-pointer hover:shadow-xl transition-shadow items-center p-6">
                <i class="fas fa-question-circle"></i>
                <h2>Preguntas Frecuentes</h2>
            </div>
            <div class="flex rounded-xl shadow-lg border border-gray-200 bg-white overflow-hidden cursor-pointer hover:shadow-xl transition-shadow items-center p-6">
                <i class="fas fa-phone"></i>
                <h2>Contacto</h2>
            </div>
            <div class="flex rounded-xl shadow-lg border border-gray-200 bg-white overflow-hidden cursor-pointer hover:shadow-xl transition-shadow items-center p-6">
                <i class="fas fa-info-circle"></i>
                <h2>Acerca de Nosotros</h2>
            </div>
        </div>


    </section>
    <?= view('partials/_footer') ?>
</body>

</html>