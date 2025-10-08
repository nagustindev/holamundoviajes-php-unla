<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>css/styles.css">
    <title>Ventas</title>
</head>

<header>
    <nav>
        <ul>
            <li>
                <h1>Lista de ventas</h1>
            </li>
        </ul>
    </nav>
</header>

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>ID_USUARIO</th>
            <th>ID_PAQUETE</th>
            <th>Cantidad</th>
            <th>Fecha_venta</th>
        </tr>
        <?php foreach ($ventas as $v): ?>
            <tr>
                <td><?= $v['id'] ?></td>
                <td><?= $v['id_usuario'] ?></td>
                <td><?= $v['id_paquete'] ?></td>
                <td><?= $v['cantidad'] ?></td>
                <td><?= $v['fecha_venta'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>