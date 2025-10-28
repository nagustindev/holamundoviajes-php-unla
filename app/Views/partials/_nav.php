<nav class="bg-primary border-gray-200 ">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <a href="<?= base_url() ?>" class="flex items-center gap-2">
            <img src="<?= base_url('uploads/logo.svg') ?>" alt="Logo" class="h-10">
            <p class="font-fredoka font-bold text-2xl text-white">HolaMundo Viajes</p>
        </a>
        <div class="flex items-center space-x-6 rtl:space-x-reverse text-white">
            <span class="text-sm uppercase ">Ventas</span>
            <a href="#" class="text-sm hover:underline gap-2">
                <i class="fa-solid fa-phone"></i>
                <span>0810.220.1031</span>
            </a>
            <a href="#" class="text-sm hover:underline gap-2">
                <i class="fa-brands fa-whatsapp"></i>
                <span>+54 911 5832.0805</span>
            </a>

            <?php if (session()->get('user_id')): ?>
                <button class="flex items-center gap-2 hover:bg-white/10 px-3 py-2 rounded-lg transition-colors" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start">
                    <i class="fa-solid fa-user cursor-pointer" type="button" ></i>
                    <span>Perfil</span>
                </button>

                <div id="userDropdown" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44">
                    <div class="px-4 py-3 text-sm text-gray-900">
                        <div class="font-medium">¡Hola!</div>
                        <div class="text-gray-500 truncate"><?= session()->get('email') ?? 'usuario@email.com' ?></div>
                    </div>
                    <ul class="py-2 text-sm text-gray-700">
                        <li>
                            <a href="<?= base_url('usuarios/mis_viajes') ?>" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100">
                                <i class="fa-solid fa-suitcase"></i>
                                Mis viajes
                            </a>
                        </li>
                        <?php if (session()->get('tipo_usuario') === 'admin'): ?>
                            <li>
                                <a href="<?= base_url('auth/admin') ?>" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100">
                                    <i class="fa-solid fa-user-shield"></i>
                                    Panel de Admin
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <div class="py-1">
                        <a href="<?= base_url('auth/logout') ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fa-solid fa-sign-out-alt"></i>
                            Cerrar Sesión
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <a href="<?= base_url('auth/login') ?>" class="flex items-center gap-2 hover:bg-white/10 px-3 py-2 rounded-lg transition-colors">
                    <i class="fa-solid fa-user"></i>
                    <span>Iniciar Sesión</span>
                </a>
            <?php endif; ?>
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
                    $segment = $uri->getSegment(1);
                    $isHome = empty($segment);
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
