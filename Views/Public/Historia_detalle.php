<?php
include("../../Conect.php");
session_start();

// Verificar si se proporcionó un ID de historia
if (isset($_GET['id'])) {
    $id_historia = $_GET['id'];

    // Consultar detalles de la historia
    $ConsultaHistoria = "SELECT * FROM Historias WHERE Codigo_historia = '$id_historia'";
    $ResultadoHistoria = $Conexion->query($ConsultaHistoria);

    // Verificar si se encontró la historia
    if ($rowHistoria = $ResultadoHistoria->fetch_assoc()) {
        $titulo = $rowHistoria['Titulo_historia'];
        $breve_descripcion = $rowHistoria['Breve_descripcion_historia'];
        $contenido = $rowHistoria['Contenido_historia'];
        $imagen = base64_encode($rowHistoria['Imagen']);
        // Puedes agregar más información según sea necesario
    } else {
        // Manejar el caso en que no se encuentre la historia
        echo "Historia no encontrada";
    }
} else {
    // Manejar el caso en que no se proporcionó un ID de historia
    echo "<br>Error MySQL: " . $Conexion->error;
    echo "Código de historia no especificado";
}
echo "ID de la Historia: " . $id_historia;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Mujer_emprende-main/comentarios.css">
    <title>Detalles de la Historia</title>
    <style>
        /* Estilos para la sección de detalles de la historia */
        .historia-details {
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
        }

        .historia-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .historia-card img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 15px;
        }

        .historia-card h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .historia-card p {
            margin-bottom: 15px;
        }

        /* Estilos para la sección de comentarios */
        .comments-section {
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
        }

        .comments-section h2 {
            font-size: 20px;
            margin-bottom: 15px;
        }

        .comment-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
        }

        .comment-card strong {
            font-weight: bold;
        }

        .comment-card .comment-card-content {
            margin-bottom: 5px;
        }

        .comment-card .comment-options {
            text-align: right;
        }

        .comment-card .edit-button,
        .comment-card .delete-button {
            padding: 5px 10px;
            margin-left: 5px;
            cursor: pointer;
            border: none;
            border-radius: 3px;
        }

        .comment-box {
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .comment-box h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .comment-box textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            resize: vertical;
        }

        .comment-box button {
            padding: 8px 15px;
            cursor: pointer;
            border: none;
            border-radius: 3px;
            background-color: #E68989;
            color: white;
        }
    </style>
</head>

<?php include('../../Include/Login_header.html'); ?>

<body>

    <section class="historia-details">
        <div class="historia-card">
            <img class="historia-image" src="data:image/<?php echo pathinfo($imagen, PATHINFO_EXTENSION); ?>;base64, <?php echo $imagen; ?>" alt="Historia">
            <h3><?php echo $titulo; ?></h3>
            <p><?php echo $breve_descripcion; ?></p>
            <p><?php echo $contenido; ?></p>
        </div>
    </section>

    <!-- Visualizar comentarios -->
    <section class="comments-section">
        <h2>Comentarios (<?php echo obtenerContadorComentarios($Conexion, $id_historia); ?>)</h2>

        <?php
        // Consulta para obtener comentarios asociados a esta historia con información de usuario
        $ConsultaComentarios = "SELECT Comentarios_historias.Codigo_comentario_historias, Cuenta.Usuario, Comentarios_historias.Comentario, Comentarios_historias.Fecha, Comentarios_historias.Usuario_id
                                FROM Comentarios_historias
                                INNER JOIN Cuenta ON Comentarios_historias.Usuario_id = Cuenta.Codigo
                                WHERE Comentarios_historias.Historias_id = '$id_historia'";
        $ResultadoComentarios = $Conexion->query($ConsultaComentarios);

        // Verificar si hay comentarios
        if ($ResultadoComentarios) {
            if ($ResultadoComentarios->num_rows > 0) {
                echo '<ul>';
                while ($rowComentario = $ResultadoComentarios->fetch_assoc()) {
                    echo '<li class="comment-card">';
                    echo '<div class="comment-card-content">';
                    echo '<strong>' . $rowComentario['Usuario'] . '</strong> - ' . date('F j, Y g:i a', strtotime($rowComentario['Fecha'])) . '<br>';
                    echo $rowComentario['Comentario'];
                    echo '</div>';
                    echo '<div class="comment-options">';
                    
                    // Verificar si el usuario actual es el autor del comentario
                    if (isset($_SESSION['id']) && $_SESSION['id'] == $rowComentario['Usuario_id']) {
                        echo '<button class="edit-button" onclick="editarComentario(' . $rowComentario['Codigo_comentario_historias'] . ')">Editar</button>';
                        echo '<button class="delete-button" onclick="eliminarComentario(' . $rowComentario['Codigo_comentario_historias'] . ')">Eliminar</button>';
                    }

                    echo '</div>';
                    echo '</li>';
                }
                echo '</ul>';
            } else {
                echo '<p>No hay comentarios aún.</p>';
            }
        } else {
            echo "Error en la consulta de comentarios: " . $Conexion->error;
        }

        function obtenerContadorComentarios($conexion, $id_historia)
        {
            $consultaContador = "SELECT COUNT(*) as total FROM Comentarios_historias WHERE Historias_id = '$id_historia'";
            $resultadoContador = $conexion->query($consultaContador);
            $contador = $resultadoContador->fetch_assoc()['total'];
            return $contador;
        }
        ?>
    </section>

    <section class="comment-box">
        <h3>Deja un comentario:</h3>
        <?php
        // Verificar si el usuario está autenticado
        if (isset($_SESSION['id'])) {
            // Si está autenticado, mostrar el formulario de comentarios
            echo '
        <form action="../../Logic/Publicar/Publicar_comentario_historia.php?id_historia=' . $id_historia . '" method="POST">
            <input type="hidden" name="id_historia" value="' . $id_historia . '">
            <textarea name="Comentario" id="Comentario" rows="4" cols="50" required></textarea>
            <br>
            <button type="submit" name="Publicar">Comentar</button>
        </form>';
        } else {
            // Si no está autenticado, mostrar un mensaje y un enlace de inicio de sesión
            echo '
        <p>Para comentar, por favor <a href="../Public/Login.php">inicia sesión</a>.</p>';
        }
        ?>
    </section>

    <script src="../javascript/Script.js"></script>

</body>

</html>