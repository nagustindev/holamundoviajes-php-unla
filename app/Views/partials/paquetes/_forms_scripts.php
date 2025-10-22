<?php /* Scripts para formularios de paquetes (alta y edición). */ ?>
<script>
    // -----------------------------
    // Sección: Modal de ALTA (Agregar paquete)
    // -----------------------------

    /**
     * Abre o cierra el modal de alta.
     * - Quita/Agrega la clase 'hidden' para mostrar/ocultar el modal.
     * - Deshabilita el scroll del body cuando el modal está abierto.
     */
    function toggleForm() {
        const formContainer = document.getElementById('formContainer');
        if (!formContainer) return; // Si el modal no existe en esta página, volver.

        if (formContainer.classList.contains('hidden')) {
            formContainer.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Evita que la página de fondo se desplace.
        } else {
            formContainer.classList.add('hidden');
            document.body.style.overflow = 'auto'; // Restablece el scroll del body.
        }
    }

    // Cerrar el modal de alta si el usuario hace clic en el fondo oscuro (fuera del formulario)
    document.addEventListener('click', function(e) {
        const c = document.getElementById('formContainer');
        if (!c) return;
        // Si el modal está visible y el clic fue EXACTAMENTE sobre el contenedor (no sobre el formulario), lo cerramos
        if (!c.classList.contains('hidden') && e.target === c) {
            toggleForm();
        }
    });

    // Cerrar el modal de alta al presionar la tecla Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const c = document.getElementById('formContainer');
            if (c && !c.classList.contains('hidden')) toggleForm();
        }
    });

    /**
     * Vista previa de imagen en el formulario de ALTA.
     * - Cuando el usuario selecciona o arrastra una imagen, se muestra en el cuadro (dropzone).
     */
    (function () {
        const input = document.getElementById('imagen');           // <input type="file"> de alta
        const hint  = document.getElementById('addHint');           // Texto de ayuda dentro del dropzone
        const img   = document.getElementById('addPreviewImg');     // <img> donde se ve la previsualización
        const dz    = document.getElementById('addDropzone');       // Contenedor estilo "dropzone"
        if (!input || !hint || !img || !dz) return; // Esta sección solo corre si existen estos elementos

        // Lee el archivo y lo convierte en Data URL para mostrarlo en <img>
        function showPreview(file) {
            const reader = new FileReader();
            reader.onload = function (ev) {
                img.src = ev.target.result;          // Data URL de la imagen
                img.classList.remove('hidden');       // Mostramos la imagen
                hint.classList.add('hidden');         // Ocultamos el texto de ayuda
            };
            reader.readAsDataURL(file);
        }

        // Al seleccionar una imagen desde el explorador de archivos
        input.addEventListener('change', function (e) {
            const file = e.target.files && e.target.files[0];
            if (!file) {
                // Si el usuario cancela la selección
                img.src = '';
                img.classList.add('hidden');
                hint.classList.remove('hidden');
                return;
            }
            showPreview(file);
        });

        // Habilitamos arrastrar y soltar (drag & drop) de una imagen sobre el dropzone
        ['dragenter','dragover','dragleave','drop'].forEach(ev => {
            dz.addEventListener(ev, e => { e.preventDefault(); e.stopPropagation(); }, false);
        });
        dz.addEventListener('drop', e => {
            const files = e.dataTransfer.files;
            if (files && files[0]) {
                // Asignamos el archivo arrastrado al <input type="file"> y disparamos el evento 'change'
                const dt = new DataTransfer();
                dt.items.add(files[0]);
                input.files = dt.files;
                input.dispatchEvent(new Event('change'));
            }
        });
    })();

    // -----------------------------
    // Sección: Modal de EDICIÓN (Editar paquete)
    // -----------------------------

    /**
     * Vista previa de imagen en el formulario de EDICIÓN.
     * Es casi igual a la de ALTA, pero con elementos 'edit_*'.
     */
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

    /**
     * Abre/Cierra el modal de EDICIÓN.
     * Funciona igual que toggleForm, pero para el modal de edición.
     */
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

    /**
     * Rellena el formulario de EDICIÓN con los datos del paquete y abre el modal.
     * - "btn" es el botón "Editar" que trae datos en data-atributos (data-id, data-destino, etc.).
     * - También carga la imagen existente (si hay) y setea la acción del formulario hacia paquetes/update/{id}.
     */
    function openEditForm(btn) {
        // 1) Tomamos todos los valores que vienen "pegados" al botón en sus data-*
        const id         = btn.dataset.id;
        const destino    = btn.dataset.destino || '';
        const categoria  = btn.dataset.categoria || '';
        const hotel      = btn.dataset.hotel || '';
        const transporte = btn.dataset.transporte || '';
        const dias       = btn.dataset.dias || '';
        const stock      = btn.dataset.stock || '';
        const precio     = btn.dataset.precio || '';
        const imagen     = btn.dataset.imagen || '';

        // 2) Volcamos esos datos dentro de los inputs del formulario
        document.getElementById('edit_id').value          = id;
        document.getElementById('edit_destino').value     = destino;
        document.getElementById('edit_hotel').value       = hotel;
        document.getElementById('edit_dias').value        = dias;
        document.getElementById('edit_stock').value       = stock;
        document.getElementById('edit_precio').value      = precio;
        
        // 2.1) Mostrar correctamente las opciones seleccionadas en los selects
        const categoriaSelect = document.getElementById('edit_categoria');
        const transporteSelect = document.getElementById('edit_transporte');
        
        if (categoriaSelect) {
            categoriaSelect.value = categoria;
        }
        
        if (transporteSelect) {
            transporteSelect.value = transporte;
        }

        // 3) Manejo de la vista previa de imagen actual del paquete (si existe)
        const hint  = document.getElementById('editHint');
        const img   = document.getElementById('editPreviewImg');
        const input = document.getElementById('edit_imagen');
        
        if (imagen && hint && img) {
            // base_url() viene desde PHP y devuelve, por ejemplo, "http://localhost/holamundo_tp/public/"
            img.src = '<?= base_url() ?>' + imagen; // Se concatena para formar la URL completa de la imagen
            img.classList.remove('hidden');
            hint.classList.add('hidden');
        } else if (hint && img) {
            // Si no hay imagen, mostramos el texto de ayuda
            img.src = '';
            img.classList.add('hidden');
            hint.classList.remove('hidden');
        }

        // 4) Se limpia el input file para que, si el usuario no cambia la imagen, no se envíe nada nuevo
        if (input) input.value = '';

        // 5) Se actualiza la acción del formulario: paquetes/update/{id}
        const editForm = document.getElementById('editForm');
        editForm.action = '<?= site_url('paquetes/update') ?>/' + id; // site_url lo genera PHP

        // 6) Abrir el modal
        toggleEditForm();
    }

    // Cerrar el modal de EDICIÓN haciendo clic fuera del contenido
    document.addEventListener('click', function(e) {
        const c = document.getElementById('editFormContainer');
        if (!c) return;
        if (!c.classList.contains('hidden') && e.target === c) {
            toggleEditForm();
        }
    });

    // Cerrar el modal de EDICIÓN con la tecla Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const c = document.getElementById('editFormContainer');
            if (c && !c.classList.contains('hidden')) toggleEditForm();
        }
    });
</script>
