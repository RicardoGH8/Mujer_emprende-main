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
    <title>Publicar producto</title>
</head>

<!---------------------------- Header ----------------------------------->
     <?php include('../../Include/Header.html'); ?>

<body>
<h1>Publicar productos</h1>
<form action="../../Logic/Publicar/Publicar_producto.php" method="POST" enctype="multipart/form-data">
    <label for="Titulo">Nombre del producto:</label>
    <input type="text" name="Titulo_producto" id="Titulo" required>
    
    <label for="Contenido_producto">Descripcion:</label>
    <input type="text" name="Contenido_producto" id="Contenido" required>

    <label for="Contenido_producto">Cantidad:</label>
    <input type="text" name="Cantidad" id="Contenido" required>

    <label for="precio">Precio:</label>
    <input type="number" name="Precio" id="Precio" required>

    <label for="img">Imagen</label>
    <input type="file" name="Foto" id="Foto" required>
    
    <button type="submit" name="Guardar">Publicar producto</button>
</form>
<?php include('../../Include/Footer.html'); ?>
</body>
</html> 