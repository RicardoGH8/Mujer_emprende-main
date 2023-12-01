<?php
include("../../Conect.php");
session_start();

// Verificar si se proporcionó un ID de producto
if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];

    // Consultar detalles del producto
    $ConsultaProducto = "SELECT * FROM Productos WHERE Codigo_producto = '$id_producto'";
    $ResultadoProducto = $Conexion->query($ConsultaProducto);

    // Verificar si se encontró el producto
    if ($rowProducto = $ResultadoProducto->fetch_assoc()) {
        $titulo = $rowProducto['Titulo_producto'];
        $contenido = $rowProducto['Contenido_producto'];
        $precio = $rowProducto['Precio_producto'];
        $foto = base64_encode($rowProducto['Foto_producto']);
        // Puedes agregar más información según sea necesario
    } else {
        // Manejar el caso en que no se encuentre el producto
        echo "Producto no encontrado";
    }

    // Lógica para manejar la eliminación cuando se envía el formulario
if (isset($_POST['eliminarComentario'])) {
    $id_comentario_eliminar = $_POST['id_comentario_eliminar'];

    $eliminarComentarioQuery = "DELETE FROM Comentarios WHERE Codigo_comentario = '$id_comentario_eliminar'";
    $resultadoEliminarComentario = $Conexion->query($eliminarComentarioQuery);

    if ($resultadoEliminarComentario) {
        echo "Comentario eliminado correctamente.";
    } else {
        echo "Error al intentar eliminar el comentario: " . $Conexion->error;
    }
}


} else {
    // Manejar el caso en que no se proporcionó un ID de producto
    echo "<br>Error MySQL: " . $Conexion->error;
    echo "Código de producto no especificado";
}
echo "ID del Producto: " . $id_producto;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Styles.css">
    <title>Detalles del Producto</title>
    <style>
    /* Estilo para el botón de eliminar */
    .delete-button {
        background-color: #FF6347; /* Color de fondo */
        color: #fff; /* Color del texto */
        padding: 8px 15px; /* Espaciado interno del botón */
        border: none; /* Sin borde */
        border-radius: 3px; /* Bordes redondeados */
        cursor: pointer; /* Cursor de apuntar */
    }

    .delete-button:hover {
        background-color: #FF4737; /* Cambiar el color de fondo al pasar el mouse */
    }
</style>
</head>

<?php include('../../Include/Login_header.html'); ?>

<body>

    <section class="product-details">
        <div class="product-card">
            <img class="product-image" src="data:image/<?php echo pathinfo($foto, PATHINFO_EXTENSION); ?>;base64, <?php echo $foto; ?>" alt="Producto">
            <h3><?php echo $titulo; ?></h3>
            <p><?php echo $contenido; ?></p>
            <p>Precio: <?php echo $precio; ?></p>
            <button class="buy-button" onclick="comprarProducto()">Comprar</button>
        </div>
    </section>
    <!-- Visualizar comentarios -->
    <section class="comments-section">
        <h2>Comentarios (<?php echo obtenerContadorComentarios($Conexion, $id_producto); ?>)</h2>

        <?php
        // Consulta para obtener comentarios asociados a este producto con información de usuario
        $ConsultaComentarios = "SELECT Comentarios.Codigo_comentario, Cuenta.Usuario, Comentarios.Contenido, Comentarios.Fecha, Comentarios.Usuario_id
                                FROM Comentarios 
                                INNER JOIN Cuenta ON Comentarios.Usuario_id = Codigo
                                WHERE Comentarios.Productos_id = '$id_producto'";
        $ResultadoComentarios = $Conexion->query($ConsultaComentarios);

        // Verificar si hay comentarios
        if ($ResultadoComentarios) {
            if ($ResultadoComentarios->num_rows > 0) {
                echo '<ul>';
                while ($rowComentario = $ResultadoComentarios->fetch_assoc()) {
                    echo '<li class="comment-card">';
                    echo '<div class="comment-card-content">';
                    echo '<strong>' . $rowComentario['Usuario'] . '</strong> - ' . date('F j, Y g:i a', strtotime($rowComentario['Fecha'])) . '<br>';
                    echo $rowComentario['Contenido'];
                    echo '</div>';
                    echo '<div class="comment-options">';
                    
                    // Verificar si el usuario actual es el autor del comentario
                    if (isset($_SESSION['id']) && $_SESSION['id'] == $rowComentario['Usuario_id']) {
                        echo '<form method="POST" action="">
                                <input type="hidden" name="id_comentario_eliminar" value="' . $rowComentario['Codigo_comentario'] . '">
                                <button type="submit" class="delete-button" name="eliminarComentario">Eliminar</button>
                            </form>';
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

        function obtenerContadorComentarios($conexion, $id_producto)
        {
            $consultaContador = "SELECT COUNT(*) as total FROM Comentarios WHERE Productos_id = '$id_producto'";
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
        <form action="../../Logic/Publicar/Publicar_comentario.php?id_producto=' . $id_producto . '" method="POST">
            <input type="hidden" name="id_producto" value="' . $id_producto . '">
            <textarea name="Contenido" id="Contenido" rows="4" cols="50" required></textarea>
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

    <script src="../../javascript/Script.js"></script>
    <script>
        // Función para comprar producto
        function comprarProducto() {
            // Verificar si el usuario está autenticado
            <?php if (isset($_SESSION['id'])) { ?>
                // Si está autenticado, redirigir a carrito.php
                window.location.href = './Carrito.php';
            <?php } else { ?>
                // Si no está autenticado, redirigir a login.php
                window.location.href = './Login.php';
            <?php } ?>
        }

        // Función para editar comentario
        function editarComentario(codigoComentario) {
            // Lógica para editar comentario
            alert('Editar comentario con código ' + codigoComentario);
        }

        // Función para eliminar comentario
        function eliminarComentario(codigoComentario) {
        // Confirmar con el usuario antes de eliminar
        if (confirm('¿Estás seguro de que quieres eliminar este comentario?')) {
            // Hacer una solicitud AJAX para eliminar el comentario
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../../Logic/Eliminar_comentario.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            // Manejar la respuesta del servidor
            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 300) {
                    // Actualizar la interfaz de usuario después de la eliminación
                    alert('Comentario eliminado exitosamente');
                    // Puedes recargar la página o actualizar la interfaz de usuario de alguna otra manera
                    // Por ejemplo, podrías eliminar el comentario de la lista sin recargar toda la página
                } else {
                    // Manejar errores si es necesario
                    alert('Error al intentar eliminar el comentario');
                }
            };

            // Enviar la solicitud al servidor
            xhr.send('codigoComentario=' + codigoComentario);
        }
    }
    </script>
</body>

</html>