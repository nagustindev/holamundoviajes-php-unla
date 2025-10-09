<?php /* Scripts para formularios de paquetes (add/edit) */ ?>
<script>
    function toggleForm() {
        const formContainer = document.getElementById('formContainer');
        if (formContainer.classList.contains('hidden')) {
            formContainer.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevenir scroll del body
        } else {
            formContainer.classList.add('hidden');
            document.body.style.overflow = 'auto'; // Restaurar scroll del body
        }
    }

    // Cerrar modal de alta al hacer clic fuera del formulario
    document.addEventListener('click', function(e) {
        const c = document.getElementById('formContainer');
        if (!c) return;
        if (!c.classList.contains('hidden') && e.target === c) {
            toggleForm();
        }
    });

    // Cerrar modal de alta con la tecla Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const c = document.getElementById('formContainer');
            if (c && !c.classList.contains('hidden')) toggleForm();
        }
    });

    // Preview imagen (Agregar): centrada dentro del dropzone
    (function () {
        const input = document.getElementById('imagen');
        const hint = document.getElementById('addHint');
        const img = document.getElementById('addPreviewImg');
        const dz = document.getElementById('addDropzone');
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

        // Drag & drop (opcional)
        ['dragenter','dragover','dragleave','drop'].forEach(ev => {
            dz.addEventListener(ev, e => { e.preventDefault(); e.stopPropagation(); }, false);
        });
        dz.addEventListener('drop', e => {
            const files = e.dataTransfer.files;
            if (files && files[0]) {
                // asignar al input y disparar change
                const dt = new DataTransfer();
                dt.items.add(files[0]);
                input.files = dt.files;
                input.dispatchEvent(new Event('change'));
            }
        });
    })();

    // Preview imagen (Edición)
    (function () {
        const input = document.getElementById('edit_imagen');
        const hint = document.getElementById('editHint');
        const img = document.getElementById('editPreviewImg');
        const dz = document.getElementById('editDropzone');
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

    // Edit modal helpers
    function toggleEditForm() {
        const c = document.getElementById('editFormContainer');
        if (c.classList.contains('hidden')) {
            c.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        } else {
            c.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }

    function openEditForm(btn) {
        const id = btn.dataset.id;
        const destino = btn.dataset.destino || '';
        const categoria = btn.dataset.categoria || '';
        const hotel = btn.dataset.hotel || '';
        const transporte = btn.dataset.transporte || '';
        const dias = btn.dataset.dias || '';
        const stock = btn.dataset.stock || '';
        const precio = btn.dataset.precio || '';
        const imagen = btn.dataset.imagen || '';

        // Populate fields
        document.getElementById('edit_id').value = id;
        document.getElementById('edit_destino').value = destino;
        document.getElementById('edit_categoria').value = categoria;
        document.getElementById('edit_hotel').value = hotel;
        document.getElementById('edit_transporte').value = transporte;
        document.getElementById('edit_dias').value = dias;
        document.getElementById('edit_stock').value = stock;
        document.getElementById('edit_precio').value = precio;

        // Mostrar imagen existente si hay una
        const hint = document.getElementById('editHint');
        const img = document.getElementById('editPreviewImg');
        const input = document.getElementById('edit_imagen');
        
        if (imagen && hint && img) {
            img.src = '<?= base_url() ?>' + imagen;
            img.classList.remove('hidden');
            hint.classList.add('hidden');
        } else if (hint && img) {
            // Si no hay imagen, mostrar hint
            img.src = '';
            img.classList.add('hidden');
            hint.classList.remove('hidden');
        }

        // Limpiar input file
        if (input) input.value = '';

        // Set action to update/{id}
        const editForm = document.getElementById('editForm');
        editForm.action = '<?= site_url('paquetes/update') ?>/' + id;

        toggleEditForm();
    }

    // Cerrar modal de edición al hacer clic fuera
    document.addEventListener('click', function(e) {
        const c = document.getElementById('editFormContainer');
        if (!c) return;
        if (!c.classList.contains('hidden') && e.target === c) {
            toggleEditForm();
        }
    });

    // Cerrar modal de edición con Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const c = document.getElementById('editFormContainer');
            if (c && !c.classList.contains('hidden')) toggleEditForm();
        }
    });
</script>
