<?php
include('../../Conect.php');
session_start();

if (isset($_POST['Publicar'])) {
    $Comentario = $_POST['Comentario'];
    $Usuario_id = $_SESSION['id'];

    // Obtén el id_historia de la URL
    if (isset($_GET['id_historia'])) {
        $id_historia = $_GET['id_historia'];

        // Insertar el comentario en la base de datos con la fecha actual y el id_historia
        $Insertar_comentario_historias = "INSERT INTO Comentarios_historias (Comentario, Fecha, Usuario_id, Historias_id) VALUES ('$Comentario', NOW(), '$Usuario_id', '$id_historia')";

        if (mysqli_query($Conexion, $Insertar_comentario_historias)) {
            echo "<script> alert('Comentario publicado con éxito'); window.location= '../../Views/Public/Historias_exito.php?id=$id_historia'</script>";
        } else {
            echo "<script> alert('Hubo un error al publicar el comentario. Por favor, inténtelo de nuevo.'); window.location= '../../Views/Public/Historias_exito.php'</script>";
        }
    } else {
        echo "<script> alert('No se proporcionó el ID de la historia. Por favor, vuelve a la página de Historias de éxito'); window.location= '../../Views/Public/Historias_exito.php'</script>";
    }
}

mysqli_close($Conexion);
?>