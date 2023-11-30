<?php
include("../../Conect.php");
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['id'])) {
    header("Location: ./Login.php"); // Redirigir a la página de inicio de sesión si no está autenticado
    exit();
}

// Obtener el ID de usuario desde la sesión
$id_usuario = $_SESSION['id'];

// Consultar detalles del usuario
$ConsultaUsuario = "SELECT * FROM Cuenta WHERE Codigo = '$id_usuario'";
$ResultadoUsuario = $Conexion->query($ConsultaUsuario);

// Verificar si se encontró el usuario
if ($rowUsuario = $ResultadoUsuario->fetch_assoc()) {
    $nombre_usuario = $rowUsuario['Usuario'];
    $correo = $rowUsuario['Correo'];
    // Puedes agregar más información según sea necesario
} else {
    // Manejar el caso en que no se encuentre el usuario
    echo "Usuario no encontrado";
}

// Cerrar la conexión
$Conexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
    
    <title>Perfil</title>
    <?php include('../../Include/Login_header.html'); ?>
    <style>
        body {
            display: flex;
            font-family: 'Holtwood One SC', sans-serif;
            margin: 0;
        }

        .profile-container {
            flex: 1;
            padding: 20px;
        }

        .menu-container {
            width: 200px;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .menu-item {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="profile-container">
        <!-- Información del perfil del usuario -->
        <h1>Perfil de Usuario</h1>
        <p>Usuario: <?php echo $nombre_usuario; ?></p>
        <p>Correo: <?php echo $correo; ?></p>

        <!-- Botones para cambiar la contraseña, usuario o correo -->
        <button onclick="cambiarContraseña()">Cambiar Contraseña</button>
        <button onclick="cambiarUsuario()">Cambiar Usuario</button>
        <button onclick="cambiarCorreo()">Cambiar Correo</button>
    </div>

    <div class="menu-container">
        <!-- Menú de opciones -->
        <div class="menu-item">Configuración</div>
        <div class="menu-item">Historial de Pedidos</div>
        <form action="../../cerrar_sesion.php" method="post">
      <button type="submit" name="cerrar_sesion">Cerrar Sesión</button>
    </div>

    <!-- Aquí puedes incluir scripts JavaScript si es necesario -->

</body>
</html>