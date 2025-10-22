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

    <title>HolaMundo Viajes</title>
</head>

<body>
    <?= view('partials/_nav') ?>

    <!-- Hero Carousel Section -->
    <section>
        <!-- Embla Carousel -->
        <div class="embla w-full relative">
            <div class="embla__viewport overflow-hidden">
                <div class="embla__container flex">
                    <div class="embla__slide flex-none w-full min-w-0">
                        <div class="h-96 bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white text-4xl font-bold">
                            Image 1
                        </div>
                    </div>
                    <div class="embla__slide flex-none w-full min-w-0">
                        <div class="h-96 bg-gradient-to-br from-green-500 to-blue-600 flex items-center justify-center text-white text-4xl font-bold">
                            Image 2
                        </div>
                    </div>
                    <div class="embla__slide flex-none w-full min-w-0">
                        <div class="h-96 bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center text-white text-4xl font-bold">
                            Image 3
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Botones de navegación superpuestos -->
            <button class="embla__button embla__button--prev absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/80 backdrop-blur-sm border border-gray-300 rounded-full w-12 h-12 flex items-center justify-center cursor-pointer transition-all duration-200 shadow-lg hover:bg-white hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed z-10" type="button">
                <i class="fa-solid fa-chevron-left text-gray-700"></i>
            </button>
            
            <button class="embla__button embla__button--next absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/80 backdrop-blur-sm border border-gray-300 rounded-full w-12 h-12 flex items-center justify-center cursor-pointer transition-all duration-200 shadow-lg hover:bg-white hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed z-10" type="button">
                <i class="fa-solid fa-chevron-right text-gray-700"></i>
            </button>
            
            <!-- Dots superpuestos en la parte inferior -->
            <div class="embla__dots absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2 items-center z-10"></div>
        </div>


        </div>
    </section>

    <!-- Mensajes de éxito/error -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mx-4 mt-4">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mx-4 mt-4">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <?= view('partials/paquetes/_package_detail_modal') ?>

    <section class="py-8 bg-gray-100 min-h-screen">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-gray-800 font-bold text-3xl font-[Fredoka] mb-8">Paquetes turísticos para todos los gustos</h2>
            <?php if (!empty($paquetes) && is_array($paquetes)): ?>
                <div class="grid grid-cols-2 gap-6">
                <?php foreach ($paquetes as $p): ?>
                    <?php $isAgotado = !empty($p['estados']) && in_array('agotado', $p['estados']); ?>
                    <div class="w-full">
                        <div class="flex rounded-xl shadow-lg border border-gray-200 bg-white overflow-hidden <?= $isAgotado ? 'opacity-60 cursor-not-allowed' : 'cursor-pointer hover:shadow-xl' ?> transition-shadow"
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
                            data-stock="<?= esc($p['stock'] ?? '') ?>"
                            data-precio="<?= esc($p['precio'] ?? '') ?>"
                            data-imagen="<?= esc($p['imagen'] ?? '') ?>"
                            data-imagen-url="<?= !empty($p['imagen']) ? base_url($p['imagen']) : '' ?>">
                            <div class="w-64 flex-shrink-0 bg-gray-100">
                                <?php if (!empty($p['imagen'])): ?>
                                    <img src="<?= base_url($p['imagen']) ?>" alt="<?= esc($p['destino']) ?>" class="block w-full h-full object-cover" />
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/400x300?text=Sin+imagen" alt="Sin foto" class="block w-full h-full object-cover" />
                                <?php endif; ?>
                            </div>

                            <div class="flex-1 p-4 min-w-0 flex flex-col">
                                <div class="mb-2 flex-shrink-0 flex flex-wrap gap-1">
                                    <span class="inline-block px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded-full">
                                        <?= esc($p['categoria'] ?? 'Paquete') ?>
                                    </span>

                                    <!-- Mensajes de estado -->
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
                                        <span class="font-medium"><?= esc($p['dias']) ?> días, <?= esc($p['dias'] - 1) ?> noches</span>
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
        </div>
    </section>
    <?= view('partials/_footer') ?>

    <!-- Embla Carousel JS -->
    <script src="https://unpkg.com/embla-carousel/embla-carousel.umd.js"></script>
    <script src="https://unpkg.com/embla-carousel-autoplay/embla-carousel-autoplay.umd.js"></script>
    
    <!-- Embla Carousel Initialization -->
    <script src="<?= base_url('js/embla-carousel-init.js') ?>"></script>

    <?= view('partials/paquetes/_detail_scripts') ?>
</body>

</html>