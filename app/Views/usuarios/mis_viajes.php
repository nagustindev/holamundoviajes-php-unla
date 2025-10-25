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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a793e0e3dc.js" crossorigin="anonymous"></script>
    <title>Mis Viajes - HolaMundo Viajes</title>
</head>

<body>
    <?= view('partials/_nav') ?>

    <section class="bg-gray-100 py-8">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-gray-800 font-fredoka mb-2">Mis Viajes</h1>
                <p class="text-gray-600">Acá podés ver todos tus viajes reservados y próximas aventuras</p>
            </div>

            <?php if (empty($viajes)): ?>
                <div class="text-center py-16">
                    <div class="mb-6">
                        <i class="fas fa-suitcase-rolling text-6xl text-gray-300"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-600 mb-4">¡Aún no tenés viajes reservados!</h2>
                    <p class="text-gray-500 mb-6">Explorá nuestros destinos increíbles y reservá tu próxima aventura</p>
                    <a href="<?= base_url('/') ?>"
                        class="inline-flex items-center gap-2 bg-accent hover:bg-primary text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-search"></i>
                        Explorar Paquetes
                    </a>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($viajes as $viaje): ?>
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="relative h-48">
                                <?php if (!empty($viaje['imagen'])): ?>
                                    <img src="<?= base_url($viaje['imagen']) ?>" alt="<?= esc($viaje['destino']) ?>" class="block w-full h-full object-cover" />
                                <?php else: ?>
                                    <img src="https://dummyimage.com/600x400/ffffff/000000.jpg&text=Sin+Foto" alt="Sin foto" class="block w-full h-full object-cover" />
                                <?php endif; ?>
                                <div class="absolute top-4 right-4">
                                    <span class="bg-accent text-white px-3 py-1 rounded-full text-sm font-semibold">
                                        <?= $viaje['duracion'] ?> días
                                    </span>
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="mb-4">
                                    <h3 class="text-xl font-bold text-gray-800 mb-2"><?= esc($viaje['destino']) ?></h3>
                                    <div class="flex items-center text-gray-600 mb-3">
                                        <i class="fas fa-hotel text-accent mr-2"></i>
                                        <span class="text-sm"><?= esc($viaje['hotel']) ?></span>
                                    </div>
                                    <div class="flex items-center text-gray-600 mb-2">
                                        <i class="fas fa-plane text-accent mr-2"></i>
                                        <span class="text-sm"><?= esc($viaje['transporte']) ?></span>
                                    </div>
                                </div>

                                <div class="space-y-2 mb-4">
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-gray-600">Fecha de compra:</span>
                                        <span class="font-semibold"><?= date('d/m/Y', strtotime($viaje['fecha_compra'])) ?></span>
                                    </div>
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-gray-600">Cantidad:</span>
                                        <span class="font-semibold"><?= $viaje['cantidad'] ?> paquete<?= $viaje['cantidad'] > 1 ? 's' : '' ?></span>
                                    </div>
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-gray-600">Precio unitario:</span>
                                        <span class="font-semibold">$<?= number_format($viaje['precio'], 0, ',', '.') ?></span>
                                    </div>
                                    <div class="flex items-center justify-between text-sm border-t pt-2">
                                        <span class="text-gray-600 font-medium">Total pagado:</span>
                                        <span class="font-bold text-accent text-lg">$<?= number_format($viaje['precio'] * $viaje['cantidad'], 0, ',', '.') ?></span>
                                    </div>
                                </div>

                                <div class="bg-gray-50 rounded-lg p-3">
                                    <div class="flex items-center justify-center">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                            <i class="fas fa-shopping-cart mr-2"></i>
                                            Comprado
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-12 bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Resumen de tus Viajes</h2>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center p-4 bg-primary/10 rounded-lg">
                            <div class="text-3xl font-bold text-primary mb-2">
                                <?= array_sum(array_column($viajes, 'cantidad')) ?>
                            </div>
                            <div class="text-gray-600">Paquetes Comprados</div>
                        </div>
                        <div class="text-center p-4 bg-green-100 rounded-lg">
                            <div class="text-3xl font-bold text-green-600 mb-2">
                                $<?= number_format(array_sum(array_map(function ($viaje) {
                                        return $viaje['precio'] * $viaje['cantidad'];
                                    }, $viajes)), 0, ',', '.') ?>
                            </div>
                            <div class="text-gray-600">Total Invertido</div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?= view('partials/_footer') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>