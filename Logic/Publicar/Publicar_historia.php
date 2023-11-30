<?php
include('../../Conect.php');

session_start();

if(isset($_POST['Publicar'])) {
    $Titulo = $_POST['Titulo'];
    $Breve_descripcion = $_POST['Descripcion'];
    $Contenido = $_POST['Contenido'];
    $Imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));//En la BD esta el campo IMG como BlOB
    //Se guarda (Binary Large Object) en la base de datos, estás guardando los datos binarios brutos de la imagen. 
    $Usuario_id = $_SESSION['id']; // Obtén el ID del usuario desde la sesión

    // Insertar la historia en la base de datos con el titulo, contenido, imagen, el uusario que inicio sesión y fecha actual
    $Insertar_historia = "INSERT INTO Historias (Titulo_historia, Breve_descripcion_historia, Contenido_historia, Imagen, Usuario_id, Fecha) VALUES ('$Titulo', '$Breve_descripcion','$Contenido', '$Imagen', '$Usuario_id', NOW())";
    $Resultado = mysqli_query($Conexion,$Insertar_historia);

    if($Resultado) {
        echo "<script> alert('Historia publicada con éxito'); window.location= '../../Views/Public/Historias_exito.php'</script>";
    } else {
        echo "<script> alert('Hubo un error la historia . Por favor, inténtelo de nuevo.'); window.location= '../../Views/Public/Historias_exito.php'</script>";
    }
}

mysqli_close($Conexion);
?>