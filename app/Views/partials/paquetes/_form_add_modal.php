<?php /* Modal: Agregar Paquete */ ?>
<div id="formContainer" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-900 font-fredoka">Agregar Nuevo Paquete</h2>
                <button onclick="toggleForm()" class="text-gray-400 hover:text-gray-600">
                    <i class="fa-solid fa-times text-xl"></i>
                </button>
            </div>
        </div>
        <div class="p-6">
            <form method="post" action="<?= site_url('paquetes/save') ?>" enctype="multipart/form-data" class="space-y-6">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="add_destino" class="block text-sm font-medium text-gray-700 mb-2">Destino</label>
                        <input id="add_destino" type="text" name="destino" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    <div>
                        <label for="add_categoria" class="block text-sm font-medium text-gray-700 mb-2">Categoría</label>
                        <select id="add_categoria" name="categoria" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option value="">Seleccionar categoría</option>
                            <option value="Familiar">Familiar</option>
                            <option value="Aventura">Aventura</option>
                            <option value="Crucero">Crucero</option>
                            <option value="Playa">Playa</option>
                            <option value="Montaña">Montaña</option>
                            <option value="Ciudad">Ciudad</option>
                            <option value="Safari">Safari</option>
                            <option value="Romántico">Romántico</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="add_hotel" class="block text-sm font-medium text-gray-700 mb-2">Hotel</label>
                        <input id="add_hotel" type="text" name="hotel" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    <div>
                        <label for="add_transporte" class="block text-sm font-medium text-gray-700 mb-2">Transporte</label>
                        <select id="add_transporte" name="transporte" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option value="">Seleccionar transporte</option>
                            <option value="Vuelo">Vuelo</option>
                            <option value="Micro">Micro</option>
                            <option value="Crucero">Crucero</option>
                            <option value="Tren">Tren</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-4 gap-6">
                    <div>
                        <label for="add_dias" class="block text-sm font-medium text-gray-700 mb-2">Días</label>
                        <input id="add_dias" type="number" name="dias" min="1" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    <div>
                        <label for="add_noches" class="block text-sm font-medium text-gray-700 mb-2">Noches</label>
                        <input id="add_noches" type="number" name="noches" min="0" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    <div>
                        <label for="add_stock" class="block text-sm font-medium text-gray-700 mb-2">Stock</label>
                        <input id="add_stock" type="number" name="stock" min="0" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    <div>
                        <label for="add_precio" class="block text-sm font-medium text-gray-700 mb-2">Precio</label>
                        <input id="add_precio" type="number" name="precio" min="0" step="0.01" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                </div>

                <div>
                    <label for="add_descripcion" class="block text-sm font-medium text-gray-700 mb-2">Descripción</label>
                    <textarea id="add_descripcion" name="descripcion" rows="4" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        placeholder="Describa los detalles del paquete turístico..."></textarea>
                </div>

                <!-- Sección de Ofertas -->
                <div class="border-t pt-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4 font-fredoka">Configuración de Oferta</h3>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="flex items-center">
                            <input id="add_es_oferta" type="checkbox" name="es_oferta" value="1"
                                class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded"
                                onchange="toggleDescuentoField('add')">
                            <label for="add_es_oferta" class="ml-2 block text-sm text-gray-700">
                                Marcar como oferta especial
                            </label>
                        </div>
                        <div>
                            <label for="add_descuento" class="block text-sm font-medium text-gray-700 mb-2">Descuento (%)</label>
                            <input id="add_descuento" type="number" name="descuento" min="0" max="100" value="0" disabled
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent disabled:bg-gray-100">
                            <p class="text-xs text-gray-500 mt-1">Solo se aplica si está marcado como oferta</p>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="imagen" class="block text-sm font-medium text-gray-700 mb-2">Imagen</label>
                    <div id="addDropzone" class="relative h-40 w-full border-2 border-dashed border-gray-300 rounded-lg bg-gray-50 flex items-center justify-center overflow-hidden hover:bg-gray-100">
                        <div id="addHint" class="text-center text-gray-500 pointer-events-none">
                            <i class="fa-solid fa-cloud-arrow-up text-2xl mb-2 block"></i>
                            <p class="text-sm"><span class="font-semibold">Click para subir</span> o arrastra la imagen</p>
                        </div>
                        <img id="addPreviewImg" class="hidden max-h-full max-w-full object-contain" alt="Vista previa">
                        <input id="imagen" name="imagen" type="file" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-200">
                    <button type="button" onclick="toggleForm()"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700">
                        <i class="fa-solid fa-plus mr-2"></i>
                        Crear Paquete
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>