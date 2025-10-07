<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Paquete</title>
</head>

<body>
    <h1>Formulario de creación</h1>
    <form method="post" action="<?= site_url('paquete/save') ?>" enctype="multipart/form-data">
        <p>Destino: <input type="text" name="destino"></p>
        <p>Hotel: <input type="text" name="hotel"></p>
        <p>Transporte: <input type="text" name="transporte"></p>
        <p>Días: <input type="text" name="dias"></p>
        <p>Stock: <input type="text" name="stock"></p>
        <p>Imagen: <input type="file" name="imagen"></p>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>