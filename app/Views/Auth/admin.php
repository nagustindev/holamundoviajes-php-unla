<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>css/styles.css">
    <script src="https://kit.fontawesome.com/a793e0e3dc.js" crossorigin="anonymous"></script>
    <title>Panel Admin</title>
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
                                class="bg-green-600 text-center w-48 rounded-2xl h-14 relative text-black text-xl font-semibold group"
                                type="button"
                                onclick="toggleForm()">
                                <div
                                    class="bg-green-700 rounded-xl h-12 w-1/4 flex items-center justify-center absolute left-1 top-[4px] group-hover:w-[184px] z-10 duration-500">
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
                                    <img src="https://via.placeholder.com/400x300?text=Sin+imagen" alt="Sin foto" class="rounded-xl object-cover" />
                                <?php endif; ?>
                            </div>

                            <div class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3">
                                <div class="flex justify-between items-center">
                                    <p class="text-gray-500 font-medium hidden md:block"><?= esc($p['categoria'] ?? 'Paquete') ?></p>
                                </div>

                                <h3 class="font-black text-gray-800 md:text-3xl text-xl"><?= esc($p['destino']) ?></h3>
                                <div class="mt-2 flex items-center justify-between">
                                    <div class="text-sm text-gray-700">
                                        <span><strong><?= esc($p['dias']) ?> días, <?= esc(($p['dias'] ?? 0) - 1) ?> noches</strong></span>
                                    </div>
                                </div>
                                <p class="md:text-lg text-gray-500 text-base"><?= esc($p['transporte'] ?? '') ?> + <?= esc($p['hotel'] ?? '') ?></p>
                                <p class="text-xl font-black text-gray-800">
                                    <?= isset($p['precio']) ? '$' . esc($p['precio']) : '$110' ?>
                                    <span class="font-normal text-gray-600 text-base">/por persona</span>
                                </p>
                                <div class="flex gap-2">
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
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center py-8 text-gray-600">No hay paquetes disponibles.</p>
        <?php endif; ?>
    </section>

    <?= view('partials/paquetes/_form_edit_modal') ?>

    <?= view('partials/paquetes/_forms_scripts') ?>
</body>

</html>