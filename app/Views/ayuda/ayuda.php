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
    <link rel="stylesheet" href="<?= base_url() ?>css/styles.css">
    <script src="https://kit.fontawesome.com/a793e0e3dc.js" crossorigin="anonymous"></script>
    <title>Ayuda - HolaMundo Viajes</title>
</head>

<body class="bg-gray-100">
    <?= view('partials/_nav') ?>
    <div class="relative text-center">
        <img src="<?= base_url('uploads/pexels-juan-marcos-alvarez-305649751-21424675.jpg') ?>" alt="Playa de Florianopolis" class="w-full h-64 object-cover mb-6">
        <div class="flex flex-col absolute inset-0 items-center justify-center text-white bg-black bg-opacity-15">
            <span class="uppercase text-sm">Servicio al cliente</span>
            <h1 class="font-fredoka font-bold text-4xl">¿Cómo podemos ayudarte?</h1>
        </div>
    </div>
    <section class="max-w-2xl mx-auto">
        <p class="text-lg mb-4">HolaMundo es una empresa de viajes especializada en los mejores y más baratos viajes a cualquier destino. HolaMundo es parte de una gran compañía de viajes con mucha experiencia en ofrecer viajes a América, Europa, Asia y Oceanía. Le ofrecemos una buena relación calidad-precio y un servicio individual. Como especialista en viajes a estos países, por supuesto, ofrecemos mucha personalización, siempre puede contactar con nosotros para obtener más información u ofertas actuales. Además, trabajamos constantemente para ampliar la oferta en nuestro sitio web. </p>
        <div class="grid grid-cols-1 gap-6">
            <a href="<?= base_url('ayuda/about') ?>">
                <div class="relative rounded-xl shadow-lg border border-gray-200 bg-white overflow-hidden cursor-pointer hover:shadow-xl transition-shadow h-64 mb-3">
                    <img src="<?= base_url('uploads/pexels-alexpham-950210.jpg') ?>" alt="" class="w-full h-full object-cover">
                    <h2 class="absolute bottom-4 left-4 text-white text-xl font-bold bg-opacity-50 px-3 py-1 rounded">Acerca de nosotros</h2>
                </div>
            </a>
        </div>
        <div class="mx-auto">
            <div class="grid grid-cols-2 gap-4 mb-4">
                <a href="<?= base_url('ayuda/faq') ?>">
                    <div class="relative rounded-xl shadow-lg border border-gray-200 bg-white overflow-hidden cursor-pointer hover:shadow-xl transition-shadow h-64">
                        <img src="<?= base_url('uploads/pexels-diego-giron-464799823-31564538.jpg') ?>" alt="Jujuy foto" class="w-full h-full object-cover">
                        <h2 class="absolute bottom-4 left-4 text-white text-xl font-bold bg-opacity-50 px-3 py-1 rounded">Preguntas Frecuentes</h2>
                    </div>
                </a>
                <a href="<?= base_url('ayuda/contact') ?>">
                    <div class="relative rounded-xl shadow-lg border border-gray-200 bg-white overflow-hidden cursor-pointer hover:shadow-xl transition-shadow h-64">
                        <img src="<?= base_url('uploads/pexels-urlapovaanna-2957060.jpg') ?>" alt="Londres" class="w-full h-full object-cover">
                        <h2 class="absolute bottom-4 left-4 text-white text-xl font-bold bg-opacity-50 px-3 py-1 rounded">Contacto</h2>
                    </div>
                </a>
            </div>
        </div>
    </section>


    <?= view('partials/_footer') ?>
</body>

</html>