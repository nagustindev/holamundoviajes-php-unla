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
            <li>
                <h1>Lista de paquetes</h1>
            </li>
            <li><a href="<?= site_url('paquetes/add') ?>">Agregar paquete</a></li>
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
            <th>Categoría</th>
        </tr>
        <?php foreach ($paquetes as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['destino'] ?></td>
                <td><?= $p['hotel'] ?></td>
                <td><?= $p['transporte'] ?></td>
                <td><?= $p['dias'] ?></td>
                <td><?= $p['stock'] ?></td>
                <td><?= $p['categoria'] ?></td>
                <td>
                    <?php if (!empty($p['imagen'])): ?>
                        <img src="<?= base_url($p['imagen']) ?>" alt="<?= $p['nombre'] ?>" width="100">
                    <?php else: ?>
                        Sin imagen
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= site_url('/paquetes/edit/' . $p['id']) ?>">Editar</a>
                    <a href="<?= site_url('/paquetes/delete/' . $p['id']) ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
