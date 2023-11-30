<?php
include('../../Conect.php');

// Verificar si se proporcionó un código de comentario
if (isset($_POST['codigoComentario'])) {
    $codigoComentario = $_POST['codigoComentario'];

    // Lógica para eliminar el comentario en la base de datos
    $eliminarComentario = "DELETE FROM Comentarios WHERE Codigo_comentario = '$codigoComentario'";
    
    // Ejecutar la consulta
    $resultado = $Conexion->query($eliminarComentario);

    // Verificar si la consulta se ejecutó con éxito
    if ($resultado) {
        // Devolver una respuesta exitosa al cliente
        http_response_code(200);
        echo 'Comentario eliminado exitosamente';
    } else {
        // Devolver una respuesta de error al cliente
        http_response_code(500);
        echo 'Error al intentar eliminar el comentario: ' . $Conexion->error;
    }
} else {
    // Devolver una respuesta de error si no se proporcionó un código de comentario
    http_response_code(400);
    echo 'Código de comentario no especificado';
}
?>