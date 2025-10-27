<div id="buyModal"
    class="fixed inset-0 z-50 hidden"
    role="dialog" aria-modal="true"
    data-comprar-base="<?= site_url('/paquetes/comprar/') ?>">
    <div class="absolute inset-0 bg-black/50" onclick="closeBuyModal()"></div>
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="relative w-[95%] max-w-3xl bg-white rounded-xl shadow-xl overflow-hidden">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2 bg-gray-100">
                    <img id="modalImagen" src="" alt="Imagen del destino" class="w-full h-64 md:h-full object-cover">
                </div>
                <div class="md:w-1/2 p-5">
                    <div class="mb-2">
                        <span id="modalCategoria" class="inline-block px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded-full">Paquete</span>
                    </div>
                    <h3 id="modalDestino" class="text-2xl font-bold text-gray-800 mb-2">Destino</h3>

                    <ul class="text-sm text-gray-700 space-y-1 mb-4">
                        <li><strong>Días/Noches:</strong> <span id="modalDias">-</span> días, <span id="modalNoches">-</span> noches</li>
                        <li><strong>Transporte:</strong> <span id="modalTransporte">-</span></li>
                        <li><strong>Hotel:</strong> <span id="modalHotel">-</span></li>
                    </ul>

                    <div class="mb-4">
                        <h4 class="text-sm font-semibold text-gray-800 mb-2">Descripción:</h4>
                        <p id="modalDescripcion" class="text-sm text-gray-600 leading-relaxed">-</p>
                    </div>

                    <p class="text-2xl font-bold text-gray-900 mb-4">
                        <span id="modalPrecio">$-</span>
                        <span class="text-base font-normal text-gray-600">/por persona</span>
                    </p>

                    <div class="flex items-center gap-2">
                        <button type="button"
                            class="px-4 py-2 rounded bg-gray-200 text-gray-800 hover:bg-gray-300"
                            onclick="closeBuyModal()">
                            Cerrar
                        </button>
                        <a id="modalComprarLink"
                            href="#"
                            class="px-4 py-2 rounded bg-green-600 text-white hover:bg-green-700">
                            Comprar
                        </a>
                    </div>
                </div>
            </div>

            <button type="button" class="absolute top-2 right-2 p-2 text-gray-600 hover:text-gray-800"
                aria-label="Cerrar" onclick="closeBuyModal()">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>
    </div>
</div>