<?php
include('../../Conect.php');

session_start();

if (isset($_POST['Guardar'])) {
    $Titulo_producto = $_POST['Titulo_producto'];
    $Contenido_producto = $_POST['Contenido_producto'];
    $Precio_producto = $_POST['Precio'];
    $Cantidad = $_POST['Cantidad'];
    $Foto_producto = addslashes(file_get_contents($_FILES['Foto']['tmp_name']));//En la BD esta el campo IMG como BlOB
    //Se guarda (Binary Large Object) en la base de datos, estás guardando los datos binarios brutos de la imagen. 
    $Usuario_id = $_SESSION['id']; // Obtén el ID del usuario desde la sesión

    // Insertar la historia en la base de datos con la fecha actual
    $Insertar_producto = "INSERT INTO Productos (Titulo_producto, Contenido_producto, Cantidad, Precio_producto, Foto_producto, Usuario_id) VALUES ('$Titulo_producto', '$Contenido_producto', ' $Cantidad', '$Precio_producto', '$Foto_producto', '$Usuario_id')";
    $Resultado = mysqli_query($Conexion,$Insertar_producto);

    if  ($Resultado) {
        echo "<script> alert('$Titulo_producto Guardado con éxito'); window.location= '../../Views/Public/Mercado.php'</script>";
    } else {
        echo "<script> alert('Hubo un error al publicar el producto. Por favor, inténtelo de nuevo.'); window.location= '../../Views/Public/Mercado.php'</script>";
    }

}

mysqli_close($Conexion);
?>