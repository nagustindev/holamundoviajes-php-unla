<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>css/styles.css">
    <title>Agregar Paquete</title>
</head>

<body>
    <h1>Formulario de creación</h1>
    <form method="post" action="<?= site_url('paquetes/save') ?>" enctype="multipart/form-data">
        <p>Destino: <input type="text" name="destino"></p>
        <p>Categoría:
            <select name="categoria" required>
                <option value="Familiar">Familiar</option>
                <option value="Aventura">Aventura</option>
                <option value="Crucero">Crucero</option>
                <option value="Playa">Playa</option>
                <option value="Montaña">Montaña</option>
                <option value="Ciudad">Ciudad</option>
                <option value="Safari">Safari</option>
                <option value="Romántico">Romántico</option>
            </select>
        </p>
        <p>Hotel: <input type="text" name="hotel"></p>
        <p>Transporte: <input type="text" name="transporte"></p>
        <p>Días: <input type="text" name="dias"></p>
        <p>Stock: <input type="text" name="stock"></p>
        <p>Imagen: <input type="file" name="imagen"></p>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>