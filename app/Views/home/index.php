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

    <section class="py-8 bg-gray-100 min-h-screen">
        <?php if (!empty($paquetes) && is_array($paquetes)): ?>
            <div class="container mx-auto px-4 py-8 grid grid-cols-2 gap-6 max-w-6xl">
                <?php foreach ($paquetes as $p): ?>
                    <div class="w-full">
                        <div class="flex rounded-xl shadow-lg border border-gray-200 bg-white overflow-hidden">
                            <div class="w-64 h-48 flex-shrink-0 bg-gray-100">
                                <?php if (!empty($p['imagen'])): ?>
                                    <img src="<?= base_url($p['imagen']) ?>" alt="<?= esc($p['destino']) ?>" class="w-full h-full object-cover" />
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/400x300?text=Sin+imagen" alt="Sin foto" class="w-full h-full object-cover" />
                                <?php endif; ?>
                            </div>

                            <div class="flex-1 p-4 min-w-0 h-48 flex flex-col overflow-hidden">
                                <div class="mb-2">
                                    <span class="inline-block px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded-full">
                                        <?= esc($p['categoria'] ?? 'Paquete') ?>
                                    </span>
                                </div>

                                <h3 class="text-xl font-bold text-gray-800 mb-2 truncate w-full">
                                    <?= esc($p['destino'] ?? '') ?>
                                </h3>

                                <div class="text-sm text-gray-600 mb-3">
                                    <div class="mb-1">
                                        <span class="font-medium"><?= esc($p['dias']) ?> días, <?= esc($p['dias'] - 1) ?> noches</span>
                                    </div>
                                    <div class="truncate w-full">
                                        <?= esc($p['transporte'] ?? '') ?> • <?= esc($p['hotel'] ?? '') ?>
                                    </div>
                                </div>

                                <div class="mt-auto">
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
    </section>
    <?= view('partials/_footer') ?>
</body>

</html>