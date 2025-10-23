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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
    <title>Preguntas Frecuentes - HolaMundo Viajes</title>
</head>

<body>
    <?= view('partials/_nav') ?>
    <section class="bg-gray-100 min-h-screen">
        <div class="relative text-center">
            <img src="<?= base_url('uploads/pexels-diego-giron-464799823-31634404.jpg') ?>" alt="Playa de Florianopolis" class="w-full h-64 object-cover mb-6">
            <div class="flex flex-col absolute inset-0 items-center justify-center text-white bg-black bg-opacity-15">
                <span class="uppercase text-sm">Servicio al cliente</span>
                <h1 class="font-fredoka font-bold text-4xl">Hablá con nosotros</h1>
            </div>
            <ol class="absolute top-3 left-3 space-x-2 flex font-medium text-center text-white">
                <li class="flex items-center gap-2">
                    <a href="<?= base_url('ayuda') ?>" class="hover:underline">Ayuda</a>
                    <i class="fa-solid fa-arrow-right"></i>
                </li>
                <li class="flex items-center">
                    <a href="<?= base_url('ayuda/contact') ?>" class="hover:underline">Contacto</a>
                </li>
            </ol>
        </div>


        <form class="max-w-md mx-auto">
            <div class="grid grid-cols-2 gap-6">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="floating_first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:border-blue-500 focus:outline-none focus:ring-0 peer" placeholder=" " required />
                    <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Apellido</label>
                </div>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="email" name="floating_email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Correo Electrónico</label>
            </div>
            <div class="grid grid-cols-1 gap-6">
                <div class="relative z-0 w-full group">
                    <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="floating_phone" id="floating_phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="floating_phone" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Número de teléfono</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <textarea name="floating_company" id="floating_company" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required></textarea>
                    <label for="floating_company" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Deja un comentario...</label>
                </div>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Enviar</button>
        </form>

    </section>

    <?= view('partials/_footer') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>