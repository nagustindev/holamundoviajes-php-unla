<script>
    function openBuyModal(btn) {
        const modal = document.getElementById('buyModal');

        const id = btn.dataset.id || '';
        const destino = btn.dataset.destino || '';
        const categoria = btn.dataset.categoria || 'Paquete';
        const hotel = btn.dataset.hotel || '-';
        const transporte = btn.dataset.transporte || '-';
        const dias = parseInt(btn.dataset.dias || '0', 10) || 0;
        const stock = btn.dataset.stock || 'No especificado';
        const precio = btn.dataset.precio || '-';
        const imagenUrl = btn.dataset.imagenUrl || '';

        document.getElementById('modalDestino').textContent = destino;
        document.getElementById('modalCategoria').textContent = categoria;
        document.getElementById('modalHotel').textContent = hotel;
        document.getElementById('modalTransporte').textContent = transporte;
        document.getElementById('modalDias').textContent = dias;
        document.getElementById('modalNoches').textContent = Math.max(dias - 1, 0);
        document.getElementById('modalStock').textContent = stock;
        document.getElementById('modalPrecio').textContent = precio ? ('$' + precio) : '$-';
        document.getElementById('modalImagen').src = imagenUrl || 'https://via.placeholder.com/600x400?text=Sin+imagen';
        document.getElementById('modalImagen').alt = destino ? ('Imagen de ' + destino) : 'Imagen del destino';

        // RUTA LINK (IMPLEMENTAR)
        const base = modal.getAttribute('data-comprar-base') || '#';
        const buyLink = document.getElementById('modalComprarLink');
        buyLink.href = id ? (base + id) : '#';

        modal.classList.remove('hidden');

        document.addEventListener('keydown', escCloser);
    }

    function closeBuyModal() {
        const modal = document.getElementById('buyModal');
        modal.classList.add('hidden');
        document.removeEventListener('keydown', escCloser);
    }

    function escCloser(e) {
        if (e.key === 'Escape') closeBuyModal();
    }
</script>