<script>
    let precioUnitario = 0;

    function openBuyModal(btn) {
        const modal = document.getElementById('buyModal');

        const id = btn.dataset.id || '';
        const destino = btn.dataset.destino || '';
        const categoria = btn.dataset.categoria || 'Paquete';
        const hotel = btn.dataset.hotel || '-';
        const transporte = btn.dataset.transporte || '-';
        const dias = parseInt(btn.dataset.dias || '0', 10) || 0;
        const noches = parseInt(btn.dataset.noches || '0', 10) || Math.max(dias - 1, 0);
        const precio = btn.dataset.precio || '-';
        const imagenUrl = btn.dataset.imagenUrl || '';
        const descripcion = btn.dataset.descripcion || 'Sin descripción disponible';

        // Guardar precio unitario para cálculos
        precioUnitario = parseFloat(precio) || 0;

        document.getElementById('modalDestino').textContent = destino;
        document.getElementById('modalCategoria').textContent = categoria;
        document.getElementById('modalHotel').textContent = hotel;
        document.getElementById('modalTransporte').textContent = transporte;
        document.getElementById('modalDias').textContent = dias;
        document.getElementById('modalNoches').textContent = noches;
        document.getElementById('modalPrecio').textContent = precio ? ('$' + formatPrice(precio)) : '$-';
        document.getElementById('modalDescripcion').textContent = descripcion;
        document.getElementById('modalImagen').src = imagenUrl || 'https://via.placeholder.com/600x400?text=Sin+imagen';
        document.getElementById('modalImagen').alt = destino ? ('Imagen de ' + destino) : 'Imagen del destino';

        // Resetear cantidad a 1
        document.getElementById('cantidadPersonas').value = 1;
        updateTotal();

        // RUTA LINK (IMPLEMENTAR)
        const base = modal.getAttribute('data-comprar-base') || '#';
        const buyLink = document.getElementById('modalComprarLink');
        buyLink.href = id ? (base + id) : '#';

        // Mostrar modal sin animaciones problemáticas
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevenir scroll del body

        // Prevenir que los clics dentro del contenido cierren el modal
        const modalContent = modal.querySelector('.pointer-events-auto');
        if (modalContent) {
            modalContent.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        }

        document.addEventListener('keydown', escCloser);
    }

    function closeBuyModal() {
        console.log('Cerrando modal...'); // Debug
        const modal = document.getElementById('buyModal');
        
        // Ocultar modal y restaurar scroll inmediatamente
        modal.classList.add('hidden');
        document.body.style.overflow = ''; // Restaurar scroll del body
        
        document.removeEventListener('keydown', escCloser);
    }

    function escCloser(e) {
        if (e.key === 'Escape') closeBuyModal();
    }

    function incrementQuantity() {
        const input = document.getElementById('cantidadPersonas');
        const currentValue = parseInt(input.value);
        input.value = currentValue + 1;
        updateTotal();
    }

    function decrementQuantity() {
        const input = document.getElementById('cantidadPersonas');
        const currentValue = parseInt(input.value);
        if (currentValue > 1) {
            input.value = currentValue - 1;
            updateTotal();
        }
    }

    function updateTotal() {
        const cantidad = parseInt(document.getElementById('cantidadPersonas').value);
        const total = precioUnitario * cantidad;
        document.getElementById('totalPrecio').textContent = '$' + formatPrice(total);
        
        // Actualizar el enlace de compra con la cantidad
        const buyLink = document.getElementById('modalComprarLink');
        const currentHref = buyLink.href.split('?')[0]; // Remover parámetros existentes
        buyLink.href = currentHref + '?cantidad=' + cantidad;
        
        // Debug: console log para verificar el enlace
        console.log('Enlace actualizado:', buyLink.href);
    }

    function formatPrice(price) {
        return parseFloat(price).toLocaleString('es-AR', {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        });
    }
</script>