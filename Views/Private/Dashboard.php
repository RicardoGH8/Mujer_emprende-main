<?php
include('../../Conect.php');

// Recuperar usuarios de la tabla Cuenta
$consultaUsuarios = "SELECT Codigo, Usuario, Rol FROM Cuenta";
$resultadoUsuarios = $Conexion->query($consultaUsuarios);

// Listas para cada tipo de usuario
$usuarios = [];
$proveedores = [];
$administradores = [];

while ($row = $resultadoUsuarios->fetch_assoc()) {
    switch ($row['Rol']) {
        case 2:
            $usuarios[] = $row;
            break;
        case 3:
            $proveedores[] = $row;
            break;
        case 1:
            $administradores[] = $row;
            break;
        // Puedes agregar más casos según sea necesario
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Agregar la referencia de Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Agregar la referencia de FontAwesome para los íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/Styles.css">
    <title>Dashboard Administradores</title>
</head>
<body>

<!-- Barra de navegación  Bootstrap -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="./Dashboard.php">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <form action="../../cerrar_sesion.php" method="post">
                    <button type="submit" name="cerrar_sesion">Cerrar Sesión</button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<!-- Contenido principal -->
<div class="container mt-4">
    <!-- Lista de Usuarios -->
    <h2>Lista de Usuarios</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre de usuario</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario['Codigo']; ?></td>
                <td><?php echo $usuario['Usuario']; ?></td>
                <td>
                    <!-- Botones de acción con íconos de FontAwesome -->
                    <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Eliminar</a>
                    <a href="./Perfil_detalles.php?id=<?php echo $usuario['Codigo'] ; ?>" class="btn btn-info btn-sm"><i class="fas fa-chart-line"></i> Actividad</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Lista de Proveedores -->
    <h2>Lista de Proveedores</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre de proveedor</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($proveedores as $proveedor): ?>
            <tr>
                <td><?php echo $proveedor['Codigo']; ?></td>
                <td><?php echo $proveedor['Usuario']; ?></td>
                <td>
                    <!-- Botones de acción con íconos de FontAwesome -->
                    <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Eliminar</a>
                    <a href="./Perfil_proveedor_detalles.php?id=<?php echo $usuario['Codigo']; ?>" class="btn btn-info btn-sm"><i class="fas fa-chart-line"></i> Actividad</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Lista de Administradores -->
    <h2>Lista de Administradores</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre de administrador</th>
            <!-- Sin la columna de Acciones -->
        </tr>
        </thead>
        <tbody>
        <?php foreach ($administradores as $administrador): ?>
            <tr>
                <td><?php echo $administrador['Codigo']; ?></td>
                <td><?php echo $administrador['Usuario']; ?></td>
                <!-- Sin botones de acción en este caso -->
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- ...  Bootstrap ... -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>