<!DOCTYPE html>
<html lang="es-AR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
    <link rel="icon" href="<?= base_url('favicon.ico') ?>" sizes="any">
    <link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>css/styles.css">
    <script src="https://kit.fontawesome.com/a793e0e3dc.js" crossorigin="anonymous"></script>
    <title>Panel Admin - HolaMundo Viajes</title>
</head>

<body>
    <?= view('partials/_nav') ?>

    <!-- Encabezado -->
    <div class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-4 py-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <i class="fa-solid fa-shield-halved text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 font-fredoka">Panel de Administrador</h1>
                    </div>
                    <ul class="flex gap-4 p-6">
                        <li>
                            <button class="cursor-pointer transition-all bg-blue-500 text-white px-6 py-2 rounded-lg border-blue-600 border-b-[4px] hover:brightness-110 hover:-translate-y-[1px] hover:border-b-[6px] active:border-b-[2px] active:brightness-90 active:translate-y-[2px] w-48  h-14"
                                type="button"
                                onclick="window.location.href='<?= base_url('usuarios') ?>'">
                                Gestionar Usuarios
                            </button>
                        </li>
                        <li>
                            <button class="cursor-pointer transition-all bg-blue-500 text-white px-6 py-2 rounded-lg border-blue-600 border-b-[4px] hover:brightness-110 hover:-translate-y-[1px] hover:border-b-[6px] active:border-b-[2px] active:brightness-90 active:translate-y-[2px] w-48 h-14"
                                type="button"
                                onclick="window.location.href='<?= base_url('ventas') ?>'">
                                Ver ventas
                            </button>
                        </li>
                        <li>
                            <button
                                class="bg-red-600 text-center w-48 rounded-2xl h-14 relative text-black text-xl font-semibold group"
                                type="button"
                                onclick="window.location.href='<?= base_url('auth/logout') ?>'">
                                <div
                                    class="bg-red-700 rounded-xl h-12 w-1/4 flex items-center justify-center absolute left-1 top-[4px] group-hover:w-[184px] z-10 duration-500">
                                    <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i>
                                </div>
                                <p class="translate-x-2 text-sm text-white">Cerrar Sesión</p>
                            </button>
                        </li>
                        <li>
                            <button
                                class="bg-green-600 text-center w-56 rounded-2xl h-14 relative text-black text-xl font-semibold group"
                                type="button"
                                onclick="toggleForm()">
                                <div
                                    class="bg-green-700 rounded-xl h-12 w-1/4 flex items-center justify-center absolute left-1 top-[4px] group-hover:w-[216px] z-10 duration-500">
                                    <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                                </div>
                                <p class="translate-x-2 text-sm text-white">Agregar Paquete</p>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modales (parciales) -->
    <?= view('partials/paquetes/_form_add_modal') ?>
    <section class="py-8 bg-gray-100 min-h-screen">
        <?php if (!empty($paquetes) && is_array($paquetes)): ?>
            <div class="container mx-auto px-4 py-8 grid grid-cols-2 gap-6 max-w-6xl">
                <?php foreach ($paquetes as $p): ?>
                    <div class="w-full">
                        <div class="flex rounded-xl shadow-lg border border-gray-200 bg-white overflow-hidden">
                            <div class="w-64 flex-shrink-0 bg-gray-100">
                                <?php if (!empty($p['imagen'])): ?>
                                    <img src="<?= base_url($p['imagen']) ?>" alt="<?= esc($p['destino']) ?>" class="block w-full h-full object-cover" />
                                <?php else: ?>
                                    <img src="https://dummyimage.com/400x400/ffffff/000000.jpg&text=Sin+Foto" alt="Sin foto" class="block w-full h-full object-cover" />
                                <?php endif; ?>
                            </div>

                            <div class="flex-1 p-4 min-w-0 flex flex-col">
                                <div class="mb-2 flex-shrink-0">
                                    <span class="inline-block px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded-full">
                                        <?= esc($p['categoria'] ?? 'Paquete') ?>
                                    </span>
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
                                    <p class="text-sm text-gray-600">Stock: <?= esc($p['stock'] ?? 'No especificado') ?></p>
                                    <div class="mt-3 flex gap-2 flex-nowrap overflow-x-auto">
                                        <button type="button"
                                            class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700"
                                            onclick="openEditForm(this)"
                                            data-id="<?= $p['id'] ?>"
                                            data-destino="<?= esc($p['destino']) ?>"
                                            data-categoria="<?= esc($p['categoria'] ?? '') ?>"
                                            data-hotel="<?= esc($p['hotel'] ?? '') ?>"
                                            data-transporte="<?= esc($p['transporte'] ?? '') ?>"
                                            data-dias="<?= esc($p['dias'] ?? '') ?>"
                                            data-stock="<?= esc($p['stock'] ?? '') ?>"
                                            data-precio="<?= esc($p['precio'] ?? '') ?>"
                                            data-imagen="<?= esc($p['imagen'] ?? '') ?>">
                                            Editar
                                        </button>
                                        <a href="<?= site_url('/paquetes/delete/' . $p['id']) ?>" onclick="return confirm('¿Eliminar paquete?')" class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700">Eliminar</a>
                                    </div>
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
    <?= view('partials/paquetes/_form_edit_modal') ?>
    <?= view('partials/paquetes/_forms_scripts') ?>

    <?= view('partials/_footer') ?>
</body>

</html>