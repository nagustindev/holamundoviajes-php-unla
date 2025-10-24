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
            <img src="<?= base_url('uploads/pexels-flickr-155246.jpg') ?>" alt="Playa de Florianopolis" class="w-full h-64 object-cover mb-6">
            <div class="flex flex-col absolute inset-0 items-center justify-center text-white bg-black bg-opacity-15">
                <span class="uppercase text-sm">Servicio al cliente</span>
                <h1 class="font-fredoka font-bold text-4xl">Embarcate en una aventura inolvidable</h1>
            </div>
            <ol class="absolute top-3 left-3 space-x-2 flex font-medium text-center text-white">
                <li class="flex items-center gap-2">
                    <a href="<?= base_url('ayuda') ?>" class="hover:underline">Ayuda</a>
                    <i class="fa-solid fa-arrow-right"></i>
                </li>
                <li class="flex items-center">
                    <a href="<?= base_url('ayuda/faq') ?>" class="hover:underline">Preguntas Frecuentes</a>
                </li>
            </ol>
        </div>
        <div class="flex flex-col max-w-7xl mx-auto p-1 gap-6">
            <div id="accordion-flush" data-accordion="collapse" data-active-classes="text-gray-900" data-inactive-classes="text-gray-500">
                <!-- Primer accordion item -->
                <div class="bg-white rounded-xl mb-2">
                    <h2 id="accordion-flush-heading-1">
                        <button type="button" class="flex items-center justify-between w-full py-5 px-5 font-bold" data-accordion-target="#accordion-flush-body-1" aria-expanded="true" aria-controls="accordion-flush-body-1">
                            <span class="text-xl">¿Qué es HolaMundo?</span>
                            <i class="fa-solid fa-chevron-up shrink-0" data-accordion-icon aria-hidden="true"></i>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                        <div class="py-4 px-5">
                            <p class="text-lg">HolaMundo es una empresa de viajes especializada en los mejores y más baratos viajes a cualquier destino. HolaMundo es parte de una gran compañía de viajes con mucha experiencia en ofrecer viajes a América, Europa Asia y Oceanía. Le ofrecemos una buena relación calidad-precio y un servicio individual. Como especialista en viajes a estos países, por supuesto, ofrecemos mucha personalización, siempre puede contactar con nosotros para obtener más información u ofertas actuales. Además, trabajamos constantemente para ampliar la oferta en nuestro sitio web. </p>
                        </div>
                    </div>
                </div>

                <!-- Segundo accordion item -->
                <div class="bg-white rounded-xl mb-2">
                    <h2 id="accordion-flush-heading-2">
                        <button type="button" class="flex items-center justify-between w-full py-5 px-5 font-bold" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                            <span class="text-xl">¿Cómo reservo mi viaje en HolaMundo?</span>
                            <i class="fa-solid fa-chevron-up shrink-0" data-accordion-icon aria-hidden="true"></i>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                        <div class="py-4 px-5">
                            <p class="text-lg">Para reservar su viaje en HolaMundo, simplemente visite nuestro sitio web y elija el paquete que más le guste. Si quiere recurrir a una experiencia personalizada, se puede contactar con un asesor de viajes experto por correo electrónico, teléfono o a través del <a href="<?= base_url('ayuda/contact') ?>" class="hover:underline text-primary">formulario de contacto</a>. Por lo tanto, detrás de nuestro sitio web hay un equipo de especialistas que están encantados de ayudarle a armar y reservar su viaje.</p>
                        </div>
                    </div>
                </div>

                <!-- Tercer accordion item -->
                <div class="bg-white rounded-xl mb-2">
                    <h2 id="accordion-flush-heading-3">
                        <button type="button" class="flex items-center justify-between w-full py-5 px-5 font-bold" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                            <span class="text-xl">¿Cuánto tiempo antes debo estar en el aeropuerto?</span>
                            <i class="fa-solid fa-chevron-up shrink-0" data-accordion-icon aria-hidden="true"></i>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                        <div class="py-4 px-5">
                            <p class="text-lg">Se recomienda llegar al aeropuerto al menos 2 horas antes de un vuelo nacional y 3 horas antes de un vuelo internacional. En temporada alta, se sugiere llegar con aún más antelación debido a la mayor afluencia de pasajeros.</p>
                        </div>
                    </div>
                </div>
                <!-- Cuarto accordion item -->
                <div class="bg-white rounded-xl mb-2">
                    <h2 id="accordion-flush-heading-4">
                        <button type="button" class="flex items-center justify-between w-full py-5 px-5 font-bold" data-accordion-target="#accordion-flush-body-4" aria-expanded="false" aria-controls="accordion-flush-body-4">
                            <span class="text-xl">¿Qué formas de pago aceptan?</span>
                            <i class="fa-solid fa-chevron-up shrink-0" data-accordion-icon aria-hidden="true"></i>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-4">
                        <div class="py-4 px-5">
                            <p class="text-lg">Buscamos ofrecer diversas opciones de pago para su comodidad:</p>
                            <ul>
                                <li>
                                    • Tarjetas de débito.
                                </li>
                                <li>
                                    • Tarjetas de crédito.
                                </li>
                                <li>
                                    • Billeteras Virtuales (Mercado Pago, Cuenta DNI, etc).
                                </li>
                                <li>
                                    • Pago en destino.
                                </li>
                                <li>
                                    • Pago Fácil o RapiPago.
                                </li>
                                <li>
                                    • Transferencia bancaria.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                  <!-- Quinto accordion item -->
                <div class="bg-white rounded-xl mb-2">
                    <h2 id="accordion-flush-heading-5">
                        <button type="button" class="flex items-center justify-between w-full py-5 px-5 font-bold" data-accordion-target="#accordion-flush-body-5" aria-expanded="false" aria-controls="accordion-flush-body-5">
                            <span class="text-xl">¿Qué puedo llevar en mi equipaje de mano?</span>
                            <i class="fa-solid fa-chevron-up shrink-0" data-accordion-icon aria-hidden="true"></i>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-5" class="hidden" aria-labelledby="accordion-flush-heading-5">
                        <div class="py-4 px-5">
                            <p class="text-lg mb-2">Las reglas pueden variar según la aerolínea y el país de destino, pero generalmente los objetos permitidos y no permitidos son:</p>
                            <ul>
                                <li>
                                    <span class="font-bold">• Objetos permitidos:</span>
                                     Documentos de viaje, dispositivos electrónicos (como laptops y teléfonos móviles), artículos de tocador en envases de hasta 100 ml, medicamentos necesarios, ropa adicional. (Siempre verifica las recomendaciones de la aerolínea y del destino)
                                </li>
                                <li>
                                    <span class="font-bold">• Objetos no permitidos:</span> Líquidos en envases mayores a 100 ml, objetos punzocortantes (como cuchillos y tijeras), armas de fuego, explosivos, sustancias inflamables, productos químicos peligrosos.
                                </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?= view('partials/_footer') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>