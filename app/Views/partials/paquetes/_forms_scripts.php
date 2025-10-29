<?php ?>
<script>
    function toggleForm() {
        const formContainer = document.getElementById('formContainer');
        if (!formContainer) return;

        if (formContainer.classList.contains('hidden')) {
            formContainer.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        } else {
            formContainer.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }
    document.addEventListener('click', function(e) {
        const c = document.getElementById('formContainer');
        if (!c) return;
        if (!c.classList.contains('hidden') && e.target === c) {
            toggleForm();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const c = document.getElementById('formContainer');
            if (c && !c.classList.contains('hidden')) toggleForm();
        }
    });

    (function () {
        const input = document.getElementById('imagen');
        const hint  = document.getElementById('addHint');
        const img   = document.getElementById('addPreviewImg');
        const dz    = document.getElementById('addDropzone');
        if (!input || !hint || !img || !dz) return;

        function showPreview(file) {
            const reader = new FileReader();
            reader.onload = function (ev) {
                img.src = ev.target.result;
                img.classList.remove('hidden');
                hint.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }

        input.addEventListener('change', function (e) {
            const file = e.target.files && e.target.files[0];
            if (!file) {
                img.src = '';
                img.classList.add('hidden');
                hint.classList.remove('hidden');
                return;
            }
            showPreview(file);
        });

        ['dragenter','dragover','dragleave','drop'].forEach(ev => {
            dz.addEventListener(ev, e => { e.preventDefault(); e.stopPropagation(); }, false);
        });
        dz.addEventListener('drop', e => {
            const files = e.dataTransfer.files;
            if (files && files[0]) {
                const dt = new DataTransfer();
                dt.items.add(files[0]);
                input.files = dt.files;
                input.dispatchEvent(new Event('change'));
            }
        });
    })();

    function toggleDescuentoField(formType) {
        const checkbox = document.getElementById(formType + '_es_oferta');
        const descuentoInput = document.getElementById(formType + '_descuento');
        
        if (checkbox && descuentoInput) {
            if (checkbox.checked) {
                descuentoInput.disabled = false;
                descuentoInput.classList.remove('bg-gray-100');
            } else {
                descuentoInput.disabled = true;
                descuentoInput.value = '0';
                descuentoInput.classList.add('bg-gray-100');
            }
        }
    }
    // -----------------------------
    // Sección: Modal de EDICIÓN (Editar paquete)
    // -----------------------------
    (function () {
        const input = document.getElementById('edit_imagen');
        const hint  = document.getElementById('editHint');
        const img   = document.getElementById('editPreviewImg');
        const dz    = document.getElementById('editDropzone');
        if (!input || !hint || !img || !dz) return;

        function showPreview(file) {
            const reader = new FileReader();
            reader.onload = function (ev) {
                img.src = ev.target.result;
                img.classList.remove('hidden');
                hint.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }

        input.addEventListener('change', function (e) {
            const file = e.target.files && e.target.files[0];
            if (!file) {
                img.src = '';
                img.classList.add('hidden');
                hint.classList.remove('hidden');
                return;
            }
            showPreview(file);
        });

        ['dragenter','dragover','dragleave','drop'].forEach(ev => {
            dz.addEventListener(ev, e => { e.preventDefault(); e.stopPropagation(); }, false);
        });
        dz.addEventListener('drop', e => {
            const files = e.dataTransfer.files;
            if (files && files[0]) {
                const dt = new DataTransfer();
                dt.items.add(files[0]);
                input.files = dt.files;
                input.dispatchEvent(new Event('change'));
            }
        });
    })();

    function toggleEditForm() {
        const c = document.getElementById('editFormContainer');
        if (!c) return;
        if (c.classList.contains('hidden')) {
            c.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        } else {
            c.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }

    function openEditForm(btn) {
        const id         = btn.dataset.id;
        const destino    = btn.dataset.destino || '';
        const categoria  = btn.dataset.categoria || '';
        const hotel      = btn.dataset.hotel || '';
        const transporte = btn.dataset.transporte || '';
        const dias       = btn.dataset.dias || '';
        const noches     = btn.dataset.noches || '';
        const stock      = btn.dataset.stock || '';
        const precio     = btn.dataset.precio || '';
        const imagen     = btn.dataset.imagen || '';
        const descuento  = btn.dataset.descuento || '0';
        const esOferta   = btn.dataset.esOferta === '1' || btn.dataset.esOferta === 'true';
        const descripcion = btn.dataset.descripcion || '';

        document.getElementById('edit_id').value          = id;
        document.getElementById('edit_destino').value     = destino;
        document.getElementById('edit_hotel').value       = hotel;
        document.getElementById('edit_dias').value        = dias;
        document.getElementById('edit_noches').value      = noches;
        document.getElementById('edit_stock').value       = stock;
        document.getElementById('edit_precio').value      = precio;
        document.getElementById('edit_descuento').value   = descuento;
        document.getElementById('edit_es_oferta').checked = esOferta;
        document.getElementById('edit_descripcion').value = descripcion;
        
        const categoriaSelect = document.getElementById('edit_categoria');
        const transporteSelect = document.getElementById('edit_transporte');
        
        if (categoriaSelect) {
            categoriaSelect.value = categoria;
        }
        
        if (transporteSelect) {
            transporteSelect.value = transporte;
        }

        const hint  = document.getElementById('editHint');
        const img   = document.getElementById('editPreviewImg');
        const input = document.getElementById('edit_imagen');
        
        if (imagen && hint && img) {
            img.src = '<?= base_url() ?>' + imagen;
            img.classList.remove('hidden');
            hint.classList.add('hidden');
        } else if (hint && img) {
            img.src = '';
            img.classList.add('hidden');
            hint.classList.remove('hidden');
        }

        if (input) input.value = '';

        const editForm = document.getElementById('editForm');
        editForm.action = '<?= site_url('paquetes/update') ?>/' + id;

        toggleDescuentoField('edit');

        toggleEditForm();
    }

    document.addEventListener('click', function(e) {
        const c = document.getElementById('editFormContainer');
        if (!c) return;
        if (!c.classList.contains('hidden') && e.target === c) {
            toggleEditForm();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const c = document.getElementById('editFormContainer');
            if (c && !c.classList.contains('hidden')) toggleEditForm();
        }
    });
</script>
