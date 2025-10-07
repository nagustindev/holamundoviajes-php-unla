<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>

<header>
    <nav>
        <ul>
            <li>
                <h1>Lista de usuarios</h1>
            </li>
        </ul>
    </nav>
</header>

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Contraseña</th>
            <th>Tipo de Usuario</th>
        </tr>
        <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= $u['nombre'] ?></td>
                <td><?= $u['email'] ?></td>
                <td><?= $u['contraseña'] ?></td>
                <td><?= $u['tipo_usuario'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>