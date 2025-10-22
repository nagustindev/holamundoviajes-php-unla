<nav class="bg-primary border-gray-200 ">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <a href="<?= base_url() ?>" class="flex items-center gap-2">
            <img src="<?= base_url('uploads/logo.svg') ?>" alt="Logo" class="h-10">
            <p class="font-fredoka font-bold text-2xl text-white">HolaMundo Viajes</p>
        </a>
        <div class="flex items-center space-x-6 rtl:space-x-reverse">
            <a href="tel:5541251234" class="text-sm  text-gray-500 dark:text-white hover:underline">(555) 412-1234</a>
            <div class="flex gap-2 items-center text-white">
                <ul>
                    <li>
                        <?php if (session()->get('user_id')): ?>
                            <a href="<?= base_url('auth/logout') ?>" class="flex items-center gap-2">
                                <i class="fa-solid fa-sign-out-alt"></i>
                                <p>Cerrar Sesión</p>
                            </a>
                        <?php else: ?>
                            <a href="<?= base_url('auth/login') ?>" class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-user"></i>
                                <p>Iniciar Sesión</p>
                            </a>
                        <?php endif; ?>
                    </li>
                    <?php if (session()->get('tipo_usuario') === 'admin'): ?>
                        <li>
                            <a href="<?= base_url('auth/admin') ?>" class="flex items-center gap-2">
                                <i class="fa-solid fa-user-shield"></i>
                                <p>Panel de Admin</p>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</nav>
<nav class="bg-primary text-white">
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center">
            <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-lg">
                <li>
                    <?php
                    $request = \Config\Services::request();
                    $uri = $request->getUri();
                    $segment = $uri->getSegment(1); // Obtener el primer segmento de la URL
                    $isHome = empty($segment); // Si no hay segmento, estamos en home
                    $homeClasses = $isHome ? 'flex items-center gap-2 bg-white/20 px-3 py-2 rounded-lg' : 'flex items-center gap-2 hover:bg-white/10 px-3 py-2 rounded-lg transition-colors';
                    ?>
                    <a href="<?= base_url('') ?>" class="<?= $homeClasses ?>" <?= $isHome ? 'aria-current="page"' : '' ?>>
                        <i class="fa-solid fa-suitcase-rolling"></i>
                        <p>Paquetes</p>
                    </a>
                </li>
                <li>
                    <?php
                    $isAyuda = ($segment === 'ayuda');
                    $ayudaClasses = $isAyuda ? 'flex items-center gap-2 bg-white/20 px-3 py-2 rounded-lg' : 'flex items-center gap-2 hover:bg-white/10 px-3 py-2 rounded-lg transition-colors';
                    ?>
                    <a href="<?= base_url('ayuda') ?>" class="<?= $ayudaClasses ?>" <?= $isAyuda ? 'aria-current="page"' : '' ?>>
                        <i class="fa-solid fa-circle-question"></i>
                        <p>Ayuda</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>