<footer class="bg-white">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-8">
        <div class="flex justify-between">
            <div class="mb-0">
                <a href="<?= base_url() ?>" class="flex items-center">
                    <img src="<?= base_url('uploads/logo2.svg') ?>" alt="Logo HolaMundo Viajes" class="h-8 me-3" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap font-fredoka">HolaMundo Viajes</span>
                </a>
            </div>
            <div class="grid gap-4 grid-cols-3">
                <div>
                    <h2 class="mb-4 text-sm font-semibold text-gray-900 uppercase">HolaMundo</h2>
                    <ul class="text-gray-500 font-medium">
                        <li class="mb-2">
                            <a href="<?= base_url('ayuda/about') ?>" class="hover:underline">¿Quiénes Somos?</a>
                        </li>
                        <li class="mb-2">
                            <a href="<?= base_url('ayuda/faq') ?>" class="hover:underline">Preguntas Frecuentes</a>
                        </li>
                        <li class="mb-2">
                            <a href="<?= base_url('ayuda/contact') ?>" class="hover:underline">Contacto</a>
                        </li>
                        <li>
                            <a href="<?= base_url('ayuda') ?>" class="hover:underline">Ayuda</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-4 text-sm font-semibold text-gray-900 uppercase ">Recursos</h2>
                    <ul class="text-gray-500 font-medium">
                        <li class="mb-2">
                            <a href="https://tailwindcss.com/" class="hover:underline" target="_blank">Tailwind CSS</a>
                        </li>
                        <li class="mb-2">
                            <a href="https://flowbite.com/" class="hover:underline" target="_blank">Flowbite</a>
                        </li>
                        <li>
                            <a href="https://fontawesome.com/" class="hover:underline" target="_blank">FontAwesome</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-4 text-sm font-semibold text-gray-900 uppercase ">Legales</h2>
                    <ul class="text-gray-500 font-medium">
                        <li class="mb-2">
                            <a href="https://servicios.infoleg.gob.ar/infolegInternet/anexos/0-4999/638/texact.htm" class="hover:underline" target="_blank">Ley 24.240</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Términos y Condiciones</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 mx-auto" />
        <div class="flex items-center justify-between">
            <span class="text-sm text-gray-500 text-center">© 2025 <a href="<?= base_url() ?>" class="hover:underline">HolaMundo Viajes™</a>. Todos los derechos reservados.
            </span>
            <div class="flex mt-0 justify-center items-center gap-2 text-sm text-gray-500 text-center">
                <span>Seminario de Lenguajes PHP</span>
                <span>-</span>
                <a href="https://www.unla.edu.ar/">
                    <span class="hover:underline">Universidad Nacional de Lanús</span>
                </a>
                <a href="https://www.unla.edu.ar/">
                    <img src="<?= base_url('uploads/logo_Unla.svg') ?>" alt="Logo UNLA" class="size-12">
                </a>
            </div>
        </div>
    </div>
</footer>