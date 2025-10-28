<div id="buyModal"
    class="fixed inset-0 z-50 hidden"
    role="dialog" aria-modal="true"
    data-comprar-base="<?= site_url('/paquetes/comprar/') ?>">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeBuyModal()"></div>
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="relative w-[90%] max-w-4xl bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all">
            <!-- Header del Modal -->
            <div class="relative">
                <div class="aspect-[16/5] overflow-hidden">
                    <img id="modalImagen" src="" alt="Imagen del destino" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                </div>
                
                <!-- Botón cerrar -->
                <button type="button" class="absolute top-4 right-4 p-3 bg-white/90 backdrop-blur-sm rounded-full text-gray-800 hover:bg-white hover:scale-110 transition-all duration-200 shadow-lg z-10"
                    aria-label="Cerrar" onclick="closeBuyModal()">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
                
                <!-- Título superpuesto -->
                <div class="absolute bottom-6 left-6 text-white">
                    <div class="mb-2">
                        <span id="modalCategoria" class="inline-block px-3 py-1 text-sm bg-white/20 backdrop-blur-sm text-white rounded-full border border-white/30">
                            Paquete
                        </span>
                    </div>
                    <h3 id="modalDestino" class="text-4xl font-bold font-fredoka drop-shadow-lg">Destino</h3>
                </div>
            </div>

            <!-- Contenido Principal -->
            <div class="p-6">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    <!-- Columna Izquierda - Detalles del Viaje -->
                    <div class="lg:col-span-2 space-y-4">
                        <!-- Información del Paquete -->
                        <div class="bg-gray-50 rounded-xl p-4">
                            <h4 class="text-lg font-bold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-info-circle text-primary mr-2"></i>
                                Detalles del Viaje
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-calendar text-blue-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Duración</p>
                                        <p class="font-semibold text-gray-800">
                                            <span id="modalDias">-</span> días, <span id="modalNoches">-</span> noches
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-plane text-green-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Transporte</p>
                                        <p id="modalTransporte" class="font-semibold text-gray-800">-</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-bed text-purple-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Alojamiento</p>
                                        <p id="modalHotel" class="font-semibold text-gray-800">-</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-users text-orange-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Por persona</p>
                                        <p class="font-semibold text-gray-800">Precio individual</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div class="bg-white border-2 border-gray-100 rounded-xl p-4">
                            <h4 class="text-lg font-bold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-file-text text-primary mr-2"></i>
                                Sobre este Viaje
                            </h4>
                            <p id="modalDescripcion" class="text-gray-700 leading-relaxed text-sm">-</p>
                        </div>

                        <!-- Características incluidas -->
                        <div class="bg-gradient-to-br from-primary/5 to-accent/5 border border-primary/20 rounded-xl p-4">
                            <h4 class="text-lg font-bold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-check-circle text-primary mr-2"></i>
                                ¿Qué incluye?
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-check text-green-600 text-sm"></i>
                                    <span class="text-gray-700">Transporte incluido</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-check text-green-600 text-sm"></i>
                                    <span class="text-gray-700">Alojamiento confirmado</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-check text-green-600 text-sm"></i>
                                    <span class="text-gray-700">Guía turística</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-check text-green-600 text-sm"></i>
                                    <span class="text-gray-700">Asistencia 24/7</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Columna Derecha - Resumen de Compra -->
                    <div class="lg:col-span-1">
                        <div class="bg-white border-2 border-gray-200 rounded-xl p-4 sticky top-4 shadow-lg">
                            <h4 class="text-lg font-bold text-gray-800 mb-4 text-center">Reservar Ahora</h4>
                            
                            <!-- Precio destacado -->
                            <div class="text-center mb-4">
                                <div class="inline-block bg-gradient-to-r from-primary to-accent text-white px-4 py-3 rounded-xl">
                                    <p class="text-2xl font-bold">
                                        <span id="modalPrecio">$-</span>
                                    </p>
                                    <p class="text-xs opacity-90">por persona</p>
                                </div>
                            </div>

                            <!-- Formulario de cantidad -->
                            <div class="mb-4">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Cantidad de Personas</label>
                                <div class="flex items-center justify-center gap-3">
                                    <button type="button" class="w-10 h-10 rounded-full border-2 border-gray-300 flex items-center justify-center hover:bg-gray-100" onclick="decrementQuantity()">
                                        <i class="fas fa-minus text-gray-600"></i>
                                    </button>
                                    <input id="cantidadPersonas" type="number" value="1" min="1" max="10" 
                                           class="w-16 text-center text-xl font-bold border-0 bg-transparent" readonly>
                                    <button type="button" class="w-10 h-10 rounded-full border-2 border-gray-300 flex items-center justify-center hover:bg-gray-100" onclick="incrementQuantity()">
                                        <i class="fas fa-plus text-gray-600"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Total -->
                            <div class="mb-4 p-3 bg-gray-50 rounded-lg">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-700">Total:</span>
                                    <span id="totalPrecio" class="text-xl font-bold text-gray-900">$-</span>
                                </div>
                            </div>

                            <!-- Botones de acción -->
                            <div class="space-y-2">
                                <a id="modalComprarLink" href="#" 
                                   class="w-full block text-center px-4 py-3 bg-gradient-to-r from-primary to-accent text-white font-bold rounded-lg hover:shadow-lg transform hover:-translate-y-1 transition-all duration-200">
                                    <i class="fas fa-credit-card mr-2"></i>
                                    Reservar Viaje
                                </a>
                                
                                <button type="button" onclick="closeBuyModal()" 
                                        class="w-full px-4 py-2 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition-colors">
                                    Cerrar
                                </button>
                            </div>

                            <!-- Garantía -->
                            <div class="mt-4 text-center">
                                <div class="flex items-center justify-center gap-2 text-sm text-gray-600 mb-2">
                                    <i class="fas fa-shield-alt text-green-600"></i>
                                    <span>Compra 100% segura</span>
                                </div>
                                <div class="flex items-center justify-center gap-2 text-sm text-gray-600">
                                    <i class="fas fa-undo text-blue-600"></i>
                                    <span>Cancelación gratuita</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>