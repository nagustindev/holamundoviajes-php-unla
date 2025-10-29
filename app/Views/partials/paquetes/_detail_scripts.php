<script>
    let precioUnitario = 0;
    let descuentoPorcentaje = 0;
    let esOferta = false;

    function openBuyModal(btn) {
        const modal = document.getElementById('buyModal');

        const id = btn.dataset.id || '';
        const destino = btn.dataset.destino || '';
        const categoria = btn.dataset.categoria || 'Paquete';
        const hotel = btn.dataset.hotel || '-';
        const transporte = btn.dataset.transporte || '-';
        const dias = parseInt(btn.dataset.dias || '0', 10) || 0;
        const noches = parseInt(btn.dataset.noches || '0', 10) || 0;
        const precio = btn.dataset.precio || '-';
        const imagenUrl = btn.dataset.imagenUrl || '';
        const descripcion = btn.dataset.descripcion || 'Sin descripción disponible';

        const descuento = parseInt(btn.dataset.descuento || '0', 10);
        const oferta = btn.dataset.esOferta === '1' || btn.dataset.esOferta === 'true';

        precioUnitario = parseFloat(precio) || 0;
        descuentoPorcentaje = descuento;
        esOferta = oferta && descuento > 0;

        document.getElementById('modalDestino').textContent = destino;
        document.getElementById('modalCategoria').textContent = categoria;
        document.getElementById('modalHotel').textContent = hotel;
        document.getElementById('modalTransporte').textContent = transporte;
        document.getElementById('modalDias').textContent = dias;
        document.getElementById('modalNoches').textContent = noches;
        document.getElementById('modalDescripcion').textContent = descripcion;
        document.getElementById('modalImagen').src = imagenUrl || 'https://via.placeholder.com/600x400?text=Sin+imagen';
        document.getElementById('modalImagen').alt = destino ? ('Imagen de ' + destino) : 'Imagen del destino';
        document.getElementById('cantidadPersonas').value = 1;

        const transporteIcon = document.getElementById('modalTransporteIcon');
        if (transporteIcon) {
            transporteIcon.className = 'fas text-green-600';

            switch (transporte.toLowerCase()) {
                case 'vuelo':
                    transporteIcon.classList.add('fa-plane');
                    break;
                case 'micro':
                    transporteIcon.classList.add('fa-bus');
                    break;
                case 'crucero':
                    transporteIcon.classList.add('fa-ship');
                    break;
                default:
                    transporteIcon.classList.add('fa-plane');
            }
        }

        const base = modal.getAttribute('data-comprar-base') || '#';
        const buyLink = document.getElementById('modalComprarLink');
        buyLink.href = id ? (base + id) : '#';

        updateTotal();

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';

        const modalContent = modal.querySelector('.pointer-events-auto');
        if (modalContent) {
            modalContent.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        }

        document.addEventListener('keydown', escCloser);
    }

    function closeBuyModal() {
        console.log('Cerrando modal...');
        const modal = document.getElementById('buyModal');

        modal.classList.add('hidden');
        document.body.style.overflow = '';

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
        const totalSinDescuento = precioUnitario * cantidad;
        const buyLink = document.getElementById('modalComprarLink');
        const currentHref = buyLink.href.split('?')[0];
        buyLink.href = currentHref + '?cantidad=' + cantidad;

        console.log('Enlace actualizado:', buyLink.href);

        const infoDescuento = document.getElementById('infoDescuento');
        if (esOferta && descuentoPorcentaje > 0) {
            const descuentoAmount = totalSinDescuento * (descuentoPorcentaje / 100);
            const totalConDescuento = totalSinDescuento - descuentoAmount;
            const precioUnitarioConDescuento = precioUnitario - (precioUnitario * (descuentoPorcentaje / 100));

            document.getElementById('modalPrecio').textContent = '$' + formatPrice(precioUnitarioConDescuento);

            document.getElementById('totalPrecio').textContent = '$' + formatPrice(totalConDescuento);

            infoDescuento.classList.remove('hidden');
            document.getElementById('precioAnterior').textContent = '$' + formatPrice(totalSinDescuento);
            document.getElementById('porcentajeDescuento').textContent = descuentoPorcentaje;
            document.getElementById('ahorroTotal').textContent = '$' + formatPrice(descuentoAmount);
        } else {
            document.getElementById('modalPrecio').textContent = '$' + formatPrice(precioUnitario);
            document.getElementById('totalPrecio').textContent = '$' + formatPrice(totalSinDescuento);
            infoDescuento.classList.add('hidden');
        }
    }

    function formatPrice(price) {
        return parseFloat(price).toLocaleString('es-AR', {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        });
    }
</script>