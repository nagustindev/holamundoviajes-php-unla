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
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="<?= base_url('/uploads/1760054039_ebed9a812928007cbc27.jpg') ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="<?= base_url('/uploads/1760054039_ebed9a812928007cbc27.jpg') ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="<?= base_url('/uploads/1760054039_ebed9a812928007cbc27.jpg') ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="<?= base_url('/uploads/1760054039_ebed9a812928007cbc27.jpg') ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="<?= base_url('/uploads/1760054039_ebed9a812928007cbc27.jpg') ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
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

    <section class="py-8 bg-gray-100 min-h-screen">
        <!-- Mensajes de éxito/error -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
                <i class="fa-solid fa-circle-check"></i>
                <div>
                    <?= session()->getFlashdata('success') ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class=" flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                <i class="fa-solid fa-circle-exclamation"></i>
                <div>
                    <?= session()->getFlashdata('error') ?>
                </div>
            </div>
        <?php endif; ?>

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
                                        <img src="https://dummyimage.com/600x400/ffffff/000000.jpg&text=Sin+Foto" alt="Sin foto" class="block w-full h-full object-cover" />
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

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

    <?= view('partials/paquetes/_detail_scripts') ?>
</body>

</html>