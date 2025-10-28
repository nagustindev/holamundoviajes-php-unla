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

    <title>HolaMundo Viajes</title>
</head>

<body>
    <?= view('partials/_nav') ?>



    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-96 overflow-hidden">
            <!-- Item 1 -->
            <div class="duration-300 ease-in-out" data-carousel-item="active">
                <img src="<?= base_url('/uploads/pexels-dreamlensproduction-2450296.jpg') ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="HolaMundo Viajes">
                <div class="flex flex-col absolute inset-0 items-center justify-center text-white bg-black bg-opacity-25">
                    <div class="text-center px-4 py-8 rounded-2xl bg-white bg-opacity-20 backdrop-blur-sm border border-white border-opacity-20">
                        <h1 class="font-fredoka font-bold text-5xl md:text-6xl mb-4 text-white drop-shadow-2xl leading-tight">
                            <span class="bg-gradient-to-r from-white to-gray-200 bg-clip-text text-transparent">HolaMundo</span>
                            <span class="text-accent drop-shadow-lg">Viajes</span>
                        </h1>
                        <span class="uppercase text-lg md:text-xl font-semibold tracking-wider text-white drop-shadow-lg opacity-90">
                            Descubrí el mundo con nosotros
                        </span>
                    </div>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-300 ease-in-out" data-carousel-item>
                <img src="<?= base_url('/uploads/pexels-john-tekeridis-21837-28505400.jpg') ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Explorá nuevos destinos">
                <div class="flex flex-col absolute inset-0 items-center justify-center text-white bg-black bg-opacity-10">
                    <div class="text-center px-4 py-8 rounded-2xl bg-white bg-opacity-20 backdrop-blur-sm border border-white border-opacity-20">
                        <h1 class="font-fredoka font-bold text-5xl md:text-6xl mb-4 text-white drop-shadow-2xl leading-tight">
                            <span class="bg-gradient-to-r from-white to-gray-200 bg-clip-text text-transparent">Explorá</span>
                            <span class="text-accent drop-shadow-lg">nuevos destinos</span>
                        </h1>
                        <span class="uppercase text-lg md:text-xl font-semibold tracking-wider text-white drop-shadow-lg opacity-90">
                            Tu aventura comienza acá
                        </span>
                    </div>
                </div>
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-300 ease-in-out" data-carousel-item>
                <img src="<?= base_url('/uploads/pexels-kampus-8623328.jpg') ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Viajá con confianza">
                <div class="flex flex-col absolute inset-0 items-center justify-center text-white bg-black bg-opacity-10">
                    <div class="text-center px-4 py-8 rounded-2xl bg-white bg-opacity-20 backdrop-blur-sm border border-white border-opacity-20">
                        <h1 class="font-fredoka font-bold text-5xl md:text-6xl mb-4 text-white drop-shadow-2xl leading-tight">
                            <span class="bg-gradient-to-r from-white to-gray-200 bg-clip-text text-transparent">Viajá con</span>
                            <span class="text-accent drop-shadow-lg">confianza</span>
                        </h1>
                        <span class="uppercase text-lg md:text-xl font-semibold tracking-wider text-white drop-shadow-lg opacity-90">
                            Experiencias inolvidables te esperan
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <?= view('partials/paquetes/_package_detail_modal') ?>

    <!-- Toasts Container -->
    <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-4">
        <!-- Toast de Éxito -->
        <?php if (session()->getFlashdata('success')): ?>
            <div id="toast-success" class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow-lg" role="alert">
                <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-sm font-normal"><?= session()->getFlashdata('success') ?></div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" onclick="closeToast('toast-success')" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        <?php endif; ?>

        <!-- Toast de Error -->
        <?php if (session()->getFlashdata('error')): ?>
            <div id="toast-danger" class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow-lg" role="alert">
                <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-sm font-normal"><?= session()->getFlashdata('error') ?></div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" onclick="closeToast('toast-danger')" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>

    <section class="py-8 bg-gray-100 min-h-screen">

        <div class="container mx-auto px-4 max-w-6xl">
            <!-- Encabezado de Paquetes -->
            <div class="text-left mb-12">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 font-fredoka mb-4">
                    Viajes Únicos para<br>
                    Todos los Gustos
                </h2>
            </div>
            
            <?php if (!empty($paquetes) && is_array($paquetes)): ?>
                <div class="grid grid-cols-2 gap-6">
                    <?php foreach ($paquetes as $p): ?>
                        <?php $isAgotado = !empty($p['estados']) && in_array('agotado', $p['estados']); ?>
                        <div class="w-full h-56">
                            <div class="flex h-full rounded-xl shadow-lg border border-gray-200 bg-white overflow-hidden <?= $isAgotado ? 'opacity-60 cursor-not-allowed' : 'cursor-pointer hover:shadow-xl' ?> transition-shadow"
                                <?php if (!$isAgotado): ?>
                                role="button"
                                tabindex="0"
                                onclick="openBuyModal(this)"
                                onkeydown="if(event.key === 'Enter' || event.key === ' ') { event.preventDefault(); openBuyModal(this); }"
                                <?php endif; ?>
                                data-id="<?= $p['id'] ?>"
                                data-destino="<?= esc($p['destino']) ?>"
                                data-categoria="<?= esc($p['categoria'] ?? 'Paquete') ?>"
                                data-hotel="<?= esc($p['hotel'] ?? '') ?>"
                                data-transporte="<?= esc($p['transporte'] ?? '') ?>"
                                data-dias="<?= esc($p['dias'] ?? '') ?>"
                                data-noches="<?= esc($p['noches'] ?? '') ?>"
                                data-precio="<?= esc($p['precio'] ?? '') ?>"
                                data-imagen="<?= esc($p['imagen'] ?? '') ?>"
                                data-imagen-url="<?= !empty($p['imagen']) ? base_url($p['imagen']) : '' ?>"
                                data-descripcion="<?= esc($p['descripcion'] ?? '') ?>">
                                <div class="w-52 flex-shrink-0 bg-gray-100">
                                    <?php if (!empty($p['imagen'])): ?>
                                        <img src="<?= base_url($p['imagen']) ?>" alt="<?= esc($p['destino']) ?>" class="block w-full h-full object-cover" />
                                    <?php else: ?>
                                        <img src="https://dummyimage.com/600x400/ffffff/000000.jpg&text=Sin+Foto" alt="Sin foto" class="block w-full h-full object-cover" />
                                    <?php endif; ?>
                                </div>

                                <div class="flex-1 p-4 min-w-0 flex flex-col">
                                    <div class="mb-2 flex-shrink-0 flex flex-wrap gap-1">
                                        <span class="inline-block px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded-full">
                                            <?= esc($p['categoria'] ?? 'Paquete') ?>
                                        </span>

                                        <?php if (!empty($p['estados'])): ?>
                                            <?php foreach ($p['estados'] as $estado): ?>
                                                <?php
                                                $clases = [
                                                    'agotado' => 'bg-red-100 text-red-800',
                                                    'pocas_plazas' => 'bg-yellow-100 text-yellow-800',
                                                    'cliente_frecuente' => 'bg-purple-100 text-purple-800',
                                                    'destino_preferido' => 'bg-green-100 text-green-800'
                                                ];
                                                $textos = [
                                                    'agotado' => 'Agotado',
                                                    'pocas_plazas' => 'Pocas plazas',
                                                    'cliente_frecuente' => 'Cliente frecuente',
                                                    'destino_preferido' => 'Destino preferido'
                                                ];
                                                ?>
                                                <span class="inline-block px-2 py-1 text-xs rounded-full <?= $clases[$estado] ?? 'bg-gray-100 text-gray-800' ?>">
                                                    <?= $textos[$estado] ?? ucfirst($estado) ?>
                                                </span>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>

                                    <h3 class="text-xl font-bold text-gray-800 mb-2 block truncate w-full flex-shrink-0">
                                        <?= esc($p['destino'] ?? '') ?>
                                    </h3>

                                    <div class="text-sm text-gray-600 mb-3 flex-shrink-0">
                                        <div class="mb-1">
                                            <span class="font-medium"><?= esc($p['dias']) ?> días, <?= esc($p['noches'] ?? ($p['dias'] - 1)) ?> noches</span>
                                        </div>
                                        <div class="truncate w-full">
                                            <?= esc($p['transporte'] ?? '') ?> • <?= esc($p['hotel'] ?? '') ?>
                                        </div>
                                    </div>

                                    <div class="mt-auto min-h-0">
                                        <p class="text-2xl font-bold text-gray-800">
                                            <?= isset($p['precio']) ? '$' . esc($p['precio']) : '$110' ?>
                                            <span class="text-base font-normal text-gray-600">/por persona</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-center py-8 text-gray-600">No hay paquetes disponibles.</p>
            <?php endif; ?>

            <div class="mt-16">
                <div class="text-left mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 font-fredoka mb-4">
                        Oportunidades Únicas<br>
                        para Viajar Más por Menos
                    </h2>
                </div>

                <?php if (!empty($ofertas) && is_array($ofertas)): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    <?php foreach ($ofertas as $oferta): ?>
                        <?php 
                            $precioOriginal = $oferta['precio'];
                            $precioConDescuento = $precioOriginal - ($precioOriginal * $oferta['descuento'] / 100);
                        ?>
                        <div class="group relative overflow-hidden rounded-2xl shadow-lg bg-white transition-all duration-300 transform hover:-translate-y-2 hover:shadow-2xl cursor-pointer"
                             role="button"
                             tabindex="0"
                             onclick="openBuyModal(this)"
                             onkeydown="if(event.key === 'Enter' || event.key === ' ') { event.preventDefault(); openBuyModal(this); }"
                             data-id="<?= $oferta['id'] ?>"
                             data-destino="<?= esc($oferta['destino']) ?>"
                             data-categoria="<?= esc($oferta['categoria'] ?? 'Paquete') ?>"
                             data-hotel="<?= esc($oferta['hotel'] ?? '') ?>"
                             data-transporte="<?= esc($oferta['transporte'] ?? '') ?>"
                             data-dias="<?= esc($oferta['dias'] ?? '') ?>"
                             data-noches="<?= esc($oferta['noches'] ?? '') ?>"
                             data-stock="<?= esc($oferta['stock'] ?? '') ?>"
                             data-precio="<?= esc($precioConDescuento) ?>"
                             data-imagen="<?= esc($oferta['imagen'] ?? '') ?>"
                             data-imagen-url="<?= !empty($oferta['imagen']) ? base_url($oferta['imagen']) : '' ?>"
                             data-descripcion="<?= esc($oferta['descripcion'] ?? '') ?>">
                            
                            <div class="aspect-[4/3] overflow-hidden relative">
                                <?php if (!empty($oferta['imagen'])): ?>
                                    <img src="<?= base_url($oferta['imagen']) ?>"
                                        alt="<?= esc($oferta['destino']) ?>"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                <?php else: ?>
                                    <img src="https://dummyimage.com/600x400/ffffff/000000.jpg&text=Sin+Foto"
                                        alt="Sin foto"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                <?php endif; ?>
                                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-60"></div>
                                
                                <div class="absolute top-4 left-4">
                                    <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                                        -<?= esc($oferta['descuento']) ?>%
                                    </span>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 p-4">
                                    <div class="bg-white bg-opacity-20 backdrop-blur-sm border border-white border-opacity-30 rounded-2xl p-4 text-center text-white">
                                        <h3 class="text-lg font-bold mb-2 drop-shadow"><?= esc($oferta['destino']) ?></h3>
                                        
                                        <div class="flex items-center justify-center gap-2 mb-2">
                                            <span class="text-xs opacity-80 line-through">$<?= number_format($precioOriginal, 0) ?></span>
                                            <span class="text-xl font-bold text-primary">$<?= number_format($precioConDescuento, 0) ?></span>
                                            <span>/por persona</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="text-center py-12">
                    <i class="fas fa-tag text-6xl text-gray-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-600 mb-2">No hay ofertas disponibles</h3>
                    <p class="text-gray-500">¡Mantenete atento para las próximas ofertas especiales!</p>
                </div>
            <?php endif; ?>
                </div>
            </div>

            <div class="mt-16">
                <div class="container mx-auto px-4 max-w-6xl">
                    <div class="text-left mb-12">
                        <h2 class="text-4xl md:text-5xl font-bold text-gray-800 font-fredoka mb-4">
                            Unite a Cientos de<br>
                            Clientes Satisfechos!
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                    <div class="bg-white rounded-2xl p-6 hover:shadow-lg transition-shadow duration-300 flex flex-col min-h-[280px]">
                        <div class="flex-1">
                            <svg class="w-6 h-6 text-gray-300 mb-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14,17H17L19,13V7H13V13H16M6,17H9L11,13V7H5V13H8L6,17Z" />
                            </svg>
                            <p class="text-gray-700 leading-relaxed text-sm mb-4">
                                "Viajar con ellos es realmente genial. Excelente servicio al cliente, asequible, y momentos inolvidables."
                            </p>
                        </div>
                        <div class="mt-auto">
                            <div class="flex items-center gap-1 mb-3">
                                <?php for($i = 0; $i < 5; $i++): ?>
                                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                                <?php endfor; ?>
                                <span class="text-gray-500 text-xs ml-1">5.0</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <img src="<?= base_url('uploads/ben-den-engelsen-zNWlX5Sw9a4-unsplash.jpg') ?>"
                                     alt="Verónica Rucci"
                                     class="w-10 h-10 rounded-full object-cover">
                                <span class="font-medium text-gray-800 text-sm">Verónica Rucci</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 hover:shadow-lg transition-shadow duration-300 flex flex-col min-h-[280px]">
                        <div class="flex-1">
                            <svg class="w-6 h-6 text-gray-300 mb-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14,17H17L19,13V7H13V13H16M6,17H9L11,13V7H5V13H8L6,17Z" />
                            </svg>
                            <p class="text-gray-700 leading-relaxed text-sm mb-4">
                                "Itinerario cuidadoso, guías locales experimentados, excelente relación calidad-precio. Mi aventura no solo fue libre de estrés."
                            </p>
                        </div>
                        <div class="mt-auto">
                            <div class="flex items-center gap-1 mb-3">
                                <?php for($i = 0; $i < 5; $i++): ?>
                                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                                <?php endfor; ?>
                                <span class="text-gray-500 text-xs ml-1">5.0</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <img src="<?= base_url('uploads/ben-den-engelsen-YUu9UAcOKZ4-unsplash.jpg') ?>"
                                     alt="Roberto Oliva"
                                     class="w-10 h-10 rounded-full object-cover">
                                <span class="font-medium text-gray-800 text-sm">Roberto Oliva</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 hover:shadow-lg transition-shadow duration-300 flex flex-col min-h-[280px]">
                        <div class="flex-1">
                            <svg class="w-6 h-6 text-gray-300 mb-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14,17H17L19,13V7H13V13H16M6,17H9L11,13V7H5V13H8L6,17Z" />
                            </svg>
                            <p class="text-gray-700 leading-relaxed text-sm mb-4">
                                "Las vacaciones familiares perfectas! Personal atento, miembros cálidos del servicio, y recuerdos maravillosos."
                            </p>
                        </div>
                        <div class="mt-auto">
                            <div class="flex items-center gap-1 mb-3">
                                <?php for($i = 0; $i < 5; $i++): ?>
                                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                                <?php endfor; ?>
                                <span class="text-gray-500 text-xs ml-1">5.0</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <img src="<?= base_url('uploads/roth-melinda-JuDowpAjLXo-unsplash.jpg') ?>"
                                     alt="Patricia Santos"
                                     class="w-10 h-10 rounded-full object-cover">
                                <span class="font-medium text-gray-800 text-sm">Patricia Santos</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 hover:shadow-lg transition-shadow duration-300 flex flex-col min-h-[280px]">
                        <div class="flex-1">
                            <svg class="w-6 h-6 text-gray-300 mb-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14,17H17L19,13V7H13V13H16M6,17H9L11,13V7H5V13H8L6,17Z" />
                            </svg>
                            <p class="text-gray-700 leading-relaxed text-sm mb-4">
                                "Nuestras vacaciones familiares fueron increíbles! El servicio fue excepcional y las guías locales hicieron nuestra experiencia inolvidable."
                            </p>
                        </div>
                        <div class="mt-auto">
                            <div class="flex items-center gap-1 mb-3">
                                <?php for($i = 0; $i < 5; $i++): ?>
                                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                                <?php endfor; ?>
                                <span class="text-gray-500 text-xs ml-1">5.0</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <img src="<?= base_url('uploads/podmatch-CgCH4V4cNGk-unsplash.jpg') ?>"
                                     alt="Alejandro Gambón"
                                     class="w-10 h-10 rounded-full object-cover">
                                <span class="font-medium text-gray-800 text-sm">Alejandro Gambón</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </section>    <?= view('partials/_footer') ?>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

    <!-- Toast Scripts -->
    <script>
        function closeToast(toastId) {
            const toast = document.getElementById(toastId);
            if (toast) {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    toast.remove();
                }, 300);
            }
        }

        // Auto-hide toasts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const toasts = document.querySelectorAll('[id^="toast-"]');
            toasts.forEach(toast => {
                // Add animation on load
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(100%)';
                toast.style.transition = 'all 0.3s ease';
                
                setTimeout(() => {
                    toast.style.opacity = '1';
                    toast.style.transform = 'translateX(0)';
                }, 100);

                // Auto hide after 5 seconds
                setTimeout(() => {
                    closeToast(toast.id);
                }, 5000);
            });
        });
    </script>

    <?= view('partials/paquetes/_detail_scripts') ?>
</body>

</html>