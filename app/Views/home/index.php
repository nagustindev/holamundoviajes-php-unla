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
    <script src="https://kit.fontawesome.com/a793e0e3dc.js" crossorigin="anonymous"></script>
    <title>HolaMundo Viajes</title>
</head>

<body>
    <?= view('partials/nav') ?>

    <section>
        <?php if (!empty($paquetes) && is_array($paquetes)): ?>
            <div class="container mx-auto px-4 py-8 max-w-md">
                <?php foreach ($paquetes as $p): ?>
                    <div class="container mx-auto px-4 py-6">
                        <div class="relative flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-white">
                            <div class="bg-white grid place-items-center">
                                <?php if (!empty($p['imagen'])): ?>
                                    <img src="<?= base_url($p['imagen']) ?>" alt="<?= esc($p['destino']) ?>" class="rounded-xl object-cover" />
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/400x300?text=Sin+imagen" alt="Sin imagen" class="rounded-xl object-cover" />
                                <?php endif; ?>
                            </div>

                            <div class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3">
                                <div class="flex justify-between items-center">
                                    <p class="text-gray-500 font-medium hidden md:block"><?= esc($p['categoria'] ?? 'Paquete') ?></p>
                                </div>

                                <h3 class="font-black text-gray-800 md:text-3xl text-xl"><?= esc($p['destino']) ?></h3>
                                <div class="mt-2 flex items-center justify-between">
                                    <div class="text-sm text-gray-700">
                                        <span><strong><?= esc($p['dias']) ?> días, <?= esc($p['dias']-1) ?> noches</strong></span>
                                    </div>
                                </div>
                                <p class="md:text-lg text-gray-500 text-base"><?= esc($p['transporte'] ?? '') ?> + <?= esc($p['hotel'] ?? '') ?></p>
                                <p class="text-xl font-black text-gray-800">
                                    <?= isset($p['precio']) ? '$' . esc($p['precio']) : '$110' ?>
                                    <span class="font-normal text-gray-600 text-base">/por persona</span>
                                </p>
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
</body>

</html>