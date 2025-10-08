<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>css/styles.css">
    <title>Editar Paquete</title>
</head>

<body>
    <h1>Editando paquete #<?= $paquete['id'] ?></h1>
    <form method="post" action="<?= site_url('/paquetes/update/' . $paquete['id']) ?>" enctype="multipart/form-data">
        <p>Destino: <input type="text" name="destino" value="<?= $paquete['destino'] ?>"></p>
        <p>Categoría:
            <select name="categoria" required>
                <option value="1" <?= $paquete['categoria'] == 1 ? 'selected' : '' ?>>Nacional</option>
                <option value="2" <?= $paquete['categoria'] == 2 ? 'selected' : '' ?>>Internacional</option>
                <option value="3" <?= $paquete['categoria'] == 3 ? 'selected' : '' ?>>Promocional</option>
            </select>
        </p>
        <p>Hotel: <input type="text" name="hotel" value="<?= $paquete['hotel'] ?>"></p>
        <p>Transporte: <input type="text" name="transporte" value="<?= $paquete['transporte'] ?>"></p>
        <p>Días: <input type="text" name="dias" value="<?= $paquete['dias'] ?>"></p>
        <p>Stock: <input type="text" name="stock" value="<?= $paquete['stock'] ?>"></p>
        <p>Imagen actual:</p>
        <?php if (!empty($paquete['imagen'])): ?>
            <img src="<?= base_url($paquete['imagen']) ?>" alt="<?= $paquete['nombre'] ?>" width="100"><br>
        <?php else: ?>
            Sin imagen<br>
        <?php endif; ?>
        <p>Nueva imagen: <input type="file" name="imagen"></p>
        <button type="submit">Editar</button>
    </form>
</body>

</html>