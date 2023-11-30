<?php
// Inicia la sesión para acceder a la información del usuario
session_start();

// Verificar si el usuario está logeado y tiene rol 3
if (!isset($_SESSION['id']) || $_SESSION['Rol'] != 3) {
    // Redirigir a alguna página de error o a la página de inicio
    header("Location: ../../Views/Public/Inicio.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/Styles.css">
    <title>Historia</title>
</head>
<header>
    <!---------------------------- Header ----------------------------------->
    <?php include('../../Include/Header.html'); ?>
</header>
<body>
<h1>Publicar Historia</h1>
<form action="../../Logic/Publicar/Publicar_historia.php" method="POST" enctype="multipart/form-data">
    <label for="Titulo">Título:</label>
    <input type="text" name="Titulo" id="Titulo" required>
    
    <label for="Descripcion">Una breve descripción:</label>
    <input type="text" name="Descripcion" id="Descripcion" required>

    <label for="Contenido">Contenido:</label>
    <input type="text" name="Contenido" id="Contenido" required>

    <label for="img">Imagen</label>
    <input type="file" name="Imagen" id="Imagen" required>
    
    <button type="submit" name="Publicar">Publicar Historia</button>
</form>
<?php include('../../Include/Footer.html'); ?>
</body>
</html> 