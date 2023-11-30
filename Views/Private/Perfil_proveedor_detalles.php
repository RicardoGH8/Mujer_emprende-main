<?php
// Recuperar el ID del usuario desde el parámetro en la URL
$idUsuario = isset($_GET['id']) ? $_GET['id'] : null;

// Hacer una consulta a la base de datos para obtener los comentarios del usuario en historias
include('../../Conect.php');

$consultaComentariosHistorias = "SELECT * FROM Comentarios_historias WHERE Usuario_id = $idUsuario";
$resultadoComentariosHistorias = $Conexion->query($consultaComentariosHistorias);

$comentariosHistorias = [];

while ($rowComentarioHistoria = $resultadoComentariosHistorias->fetch_assoc()) {
    $comentariosHistorias[] = [
        'id' => $rowComentarioHistoria['Codigo_comentario_historias'],
        'contenido' => $rowComentarioHistoria['Comentario'],
        'publicacion_id' => $rowComentarioHistoria['Historias_id']
    ];
}

// Hacer una consulta a la base de datos para obtener los comentarios del usuario en productos
$consultaComentariosProductos = "SELECT * FROM Comentarios WHERE Usuario_id = $idUsuario";
$resultadoComentariosProductos = $Conexion->query($consultaComentariosProductos);

$comentariosProductos = [];

while ($rowComentarioProducto = $resultadoComentariosProductos->fetch_assoc()) {
    $comentariosProductos[] = [
        'id' => $rowComentarioProducto['Codigo_comentario'],
        'contenido' => $rowComentarioProducto['Contenido'],
        'producto_id' => $rowComentarioProducto['Productos_id']
    ];
}

// Hacer una consulta a la base de datos para obtener los productos del usuario
$consultaProductos = "SELECT * FROM Productos WHERE Usuario_id = $idUsuario";
$resultadoProductos = $Conexion->query($consultaProductos);

$productos = [];

while ($rowProducto = $resultadoProductos->fetch_assoc()) {
    $productos[] = [
        'id' => $rowProducto['Codigo_producto'],
        'titulo' => $rowProducto['Titulo_producto'],
        // Agrega aquí más columnas que desees mostrar
    ];
}

// Hacer una consulta a la base de datos para obtener las historias del usuario
$consultaHistorias = "SELECT * FROM Historias WHERE Usuario_id = $idUsuario";
$resultadoHistorias = $Conexion->query($consultaHistorias);

$historias = [];

while ($rowHistoria = $resultadoHistorias->fetch_assoc()) {
    $historias[] = [
        'id' => $rowHistoria['Codigo_historia'],
        'titulo' => $rowHistoria['Titulo_historia'],
        // Agrega aquí más columnas que desees mostrar
    ];
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
    <title>Detalles del perfil proveedor</title>
</head>
<body>
    <!-- Barra de navegación Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="./Dashboard.php">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <button type="submit" name="Atras"><a class="navbar-brand" href="./Dashboard.php">Atras</a> </button>
                </li>
            </ul>
        </div>
    </nav>
    <h1>Detalles del perfil del usuario con ID: <?php echo $idUsuario; ?></h1>

    <h2>Comentarios en historias:</h2>
    <ul>
        <?php foreach ($comentariosHistorias as $comentarioHistoria): ?>
            <li>
                <?php echo $comentarioHistoria['contenido']; ?>
                <form action="eliminar_comentario_historia.php" method="post">
                    <input type="hidden" name="comentario_id" value="<?php echo $comentarioHistoria['id']; ?>">
                    <button type="submit" name="eliminar">Eliminar</button>
                </form>
                <?php
                $historia_id = $comentarioHistoria['publicacion_id'];
                $consultaHistoria = "SELECT * FROM Historias WHERE Codigo_historia = $historia_id";
                $resultadoHistoria = $Conexion->query($consultaHistoria);

                if ($resultadoHistoria) {
                    $historia = $resultadoHistoria->fetch_assoc();
                    ?>
                    <p>Comentario en historia: <?php echo $historia['Titulo_historia']; ?></p>
                    <?php
                } else {
                    echo "Error en la consulta de la historia.";
                }
                ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Comentarios en productos:</h2>
    <ul>
        <?php foreach ($comentariosProductos as $comentarioProducto): ?>
            <li>
                <?php echo $comentarioProducto['contenido']; ?>
                <form action="eliminar_comentario_producto.php" method="post">
                    <input type="hidden" name="comentario_id" value="<?php echo $comentarioProducto['id']; ?>">
                    <button type="submit" name="eliminar">Eliminar</button>
                </form>
                <?php
                $producto_id = $comentarioProducto['producto_id'];
                $consultaProducto = "SELECT * FROM Productos WHERE Codigo_producto = $producto_id";
                $resultadoProducto = $Conexion->query($consultaProducto);

                if ($resultadoProducto) {
                    $producto = $resultadoProducto->fetch_assoc();
                    ?>
                    <p>Comentario en producto: <?php echo $producto['Titulo_producto']; ?></p>
                    <?php
                } else {
                    echo "Error en la consulta del producto.";
                }
                ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Productos publicados por el proveedor:</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Título del producto</th>
            <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?php echo $producto['id']; ?></td>
                <td><?php echo $producto['titulo']; ?></td>
                <td>
                    <!-- Botones de acción con íconos de FontAwesome -->
                    <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Historias publicadas por el proveedor:</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Título de la historia</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($historias as $historia): ?>
            <tr>
                <td><?php echo $historia['id']; ?></td>
                <td><?php echo $historia['titulo']; ?></td>
                <td>
                    <!-- Botones de acción con íconos de FontAwesome -->
                    <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Aquí puedes mostrar otros detalles del perfil, como historias, productos, etc. -->
</body>
</html>