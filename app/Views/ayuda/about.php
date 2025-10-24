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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>css/styles.css">
    <script src="https://kit.fontawesome.com/a793e0e3dc.js" crossorigin="anonymous"></script>
    <title>Acerca de Nosotros - HolaMundo Viajes</title>
</head>

<body>
    <?= view('partials/_nav') ?>
    <section class="bg-gray-100 pb-8">
        <div class="relative text-center">
            <img src="<?= base_url('uploads/pexels-maximiliano-pezzali-1095126733-26988244.jpg') ?>" alt="Perito moreno" class="w-full h-64 object-cover mb-6">
            <div class="flex flex-col absolute inset-0 items-center justify-center text-white bg-black bg-opacity-15">
                <span class="uppercase text-sm">HolaMundo</span>
                <h1 class="font-fredoka font-bold text-4xl">Embarcate en una aventura inolvidable</h1>
            </div>
            <ol class="absolute top-3 left-3 space-x-2 flex font-medium text-center text-white">
                <li class="flex items-center gap-2">
                    <a href="<?= base_url('ayuda') ?>" class="hover:underline">Ayuda</a>
                    <i class="fa-solid fa-arrow-right"></i>
                </li>
                <li class="flex items-center">
                    <a href="<?= base_url('ayuda/about') ?>" class="hover:underline">Acerca de Nosotros</a>
                </li>
            </ol>
        </div>
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center gap-8 mb-8">
                <div class="relative flex-shrink-0">
                    <img src="<?= base_url('uploads/pexels-isis-petroni-280715053-13142809.jpg') ?>" alt="Perito moreno" class="rounded-xl w-80 h-96 object-cover">
                    <img src="<?= base_url('uploads/pexels-denner-trindade-1570398-17821556.jpg') ?>" alt="Perito moreno" class="absolute -bottom-6 -right-6 rounded-xl w-48 h-64 object-cover">
                </div>
                <div class="flex flex-col justify-center p-6">
                    <h2 class="text-4xl font-bold mb-4 text-gray-800">Un mundo de <span class="text-accent">inspiración</span></h2>
                    <p class="mb-6 leading-relaxed text-gray-700">HolaMundo Viajes es una agencia de viajes dedicada a ofrecer experiencias inolvidables a nuestros clientes. Fundada en 2025, nuestra misión es conectar a las personas con destinos increíbles alrededor del mundo, brindando un servicio personalizado y de alta calidad.</p>
                    <button
                        class="bg-primary text-center w-56 rounded-2xl h-14 relative text-xl font-semibold group"
                        type="button"
                        onclick="window.location.href='<?= base_url('/') ?>'">
                        <div
                            class="bg-accent rounded-xl h-12 w-1/4 flex items-center justify-center absolute left-1 top-[4px] group-hover:w-[216px] z-10 duration-500">
                            <i class="fa-solid fa-plane-departure" style="color: #ffffff;"></i>
                        </div>
                        <p class="translate-x-2 text-sm text-white">Encontrá tu viaje</p>
                    </button>
                </div>
            </div>
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Valoramos a nuestros clientes</h1>
            <div class="grid grid-cols-3 gap-6">
                <div class="flex gap-4 items-center">
                    <div class="flex items-center justify-center w-16 h-16 rounded-full bg-blue-100 text-primary flex-shrink-0">
                        <i class="fa-solid fa-dollar-sign text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg mb-2 text-gray-800">Ofrecemos el mejor precio</h3>
                        <p class="text-gray-700">Nos aseguramos de que nuestros precios sean competitivos y justos, sin comprometer la calidad de nuestros servicios.</p>
                    </div>
                </div>
                <div class="flex gap-4 items-center">
                    <div class="flex items-center justify-center w-16 h-16 rounded-full bg-blue-100 text-primary flex-shrink-0">
                        <i class="fa-solid fa-credit-card text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg mb-2 text-gray-800">Comprá sin preocupaciones</h3>
                        <p class="text-gray-700">Contamos con múltiples opciones de pago seguras y confiables para que puedas reservar tu viaje con total tranquilidad.</p>
                    </div>
                </div>
                <div class="flex gap-4 items-center">
                    <div class="flex items-center justify-center w-16 h-16 rounded-full bg-blue-100 text-primary flex-shrink-0">
                        <i class="fa-solid fa-person-hiking text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg mb-2 text-gray-800">Elegí el paquete que más te guste</h3>
                        <p class="text-gray-700">Contamos con una variedad de paquetes para que puedas encontrar la opción perfecta para tus necesidades.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
    <?= view('partials/_footer') ?>
</body>

</html>