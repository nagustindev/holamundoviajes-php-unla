<nav class="flex flex-col bg-primary">
    <ul class="flex gap-2 p-4 text-white items-center">
        <li>
            <a href="<?= base_url() ?>" class="flex items-center gap-2">
                <img src="<?= base_url('uploads/logo.svg') ?>" alt="Logo" class="h-10">
                <p class="font-fredoka font-bold text-2xl">HolaMundo Viajes</p>
            </a>
        </li>
        <li>
            <a href="<?= base_url('') ?>" class="flex items-center gap-2">
                <i class="fa-solid fa-suitcase-rolling"></i>
                <p>Paquetes</p>
            </a>
        </li>
        <li>
            <a href="<?= base_url('') ?>" class="flex items-center gap-2">
                <i class="fa-solid fa-phone"></i>
                <p>Contacto</p>
            </a>
        </li>
        <li>
            <a href="<?= base_url('auth/login') ?>" class="flex items-center gap-2">
                <i class="fa-solid fa-circle-user"></i>
                <p>Iniciar Sesión</p>
            </a>
        </li>
        <?php if (session()->get('tipo_usuario') === 'admin'): ?>
        <li>
            <a href="<?= base_url('auth/admin') ?>" class="flex items-center gap-2">
                <i class="fa-solid fa-user-shield"></i>
                <p>Panel de Admin</p>
            </a>
        </li>
        <?php endif;?>
        
    </ul>
</nav>
