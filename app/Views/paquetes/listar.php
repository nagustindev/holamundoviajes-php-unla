<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paquetes</title>
</head>

<header>
    <nav>
        <ul>
            <li><a href="#"><img src="<?= base_url('uploads/f1_logo.png') ?>" alt="logo f1"></a></li>
            <li>
                <h1>Lista de paquetes</h1>
            </li>
            <li><a href="<?= site_url('paquete/add') ?>">Agregar paquete</a></li>
        </ul>
    </nav>
</header>

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Destino</th>
            <th>Hotel</th>
            <th>Transporte</th>
            <th>Días</th>
            <th>Stock</th>
            <th>Imagen</th>
        </tr>
        <?php foreach ($paquetes as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['destino'] ?></td>
                <td><?= $p['hotel'] ?></td>
                <td><?= $p['transporte'] ?></td>
                <td><?= $p['dias'] ?></td>
                <td><?= $p['stock'] ?></td>
                <td>
                    <?php if (!empty($p['imagen'])): ?>
                        <img src="<?= base_url($p['imagen']) ?>" alt="Imagen de <?= $p['nombre'] ?>" width="100">
                    <?php else: ?>
                        Sin imagen
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= site_url('/paquete/edit/' . $p['id']) ?>">Editar</a>
                    <a href="<?= site_url('/paquete/delete/' . $p['id']) ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>