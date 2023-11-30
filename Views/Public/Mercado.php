<?php
include("../../Conect.php");
session_start();
include('../../include/Header.html');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/Styles.css">
    <title>Mercado</title>
    <style>
           .Fondo_mercado {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        @media screen and (max-width: 768px) {
            .Fondo_mercado {
                width: 80%; /* Tamaño más pequeño en tabletas */
            }
        }

        @media screen and (max-width: 480px) {
            .Fondo_mercado {
                width: 100%; /* Tamaño completo en dispositivos móviles */
            }
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        .card {
            border: 1px solid #000;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 10px;
            width: calc(25% - 20px); /* 4 tarjetas por fila */
            text-align: center;
            background-color: #fff;
        }

        .product-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .buy-button {
            background-color: #E68989;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        @media screen and (max-width: 768px) {
            .card {
                width: calc(50% - 20px); /* 2 tarjetas por fila en tabletas */
            }
        }

        @media screen and (max-width: 480px) {
            .card {
                width: calc(100% - 20px); /* 1 tarjeta por fila en dispositivos móviles */
            }
        }
    </style>
</head>
<body>

<section>
    <img class="Fondo_mercado" src="../../Assets/Img/Fondo_mercado.png" alt="Fondo_mercado">
</section>

<section class="card-container">
    <?php
    $Consulta = "SELECT Codigo_producto, Titulo_producto, Contenido_producto, Precio_producto, Foto_producto FROM Productos";
    $Resultado = $Conexion->query($Consulta);

    while($row = $Resultado->fetch_assoc()) { ?>
        <div class="card">
            <img class="product-image" src="data:image/<?php echo pathinfo($row['Foto_producto'], PATHINFO_EXTENSION); ?>;base64, <?php echo base64_encode($row['Foto_producto']); ?>" alt="Producto">
            <h3><?php echo $row['Titulo_producto']; ?></h3>
            <p><?php echo $row['Contenido_producto']; ?></p>
            <p>Precio: <?php echo $row['Precio_producto']; ?></p>
            <a class="buy-button" href="./Producto_detalles.php?id=<?php echo $row['Codigo_producto']; ?>">Comprar</a>
        </div>
    <?php } ?>
</section>

<!-- Agregar un botón para que lo redirija al formulario para publicar una historia (solo si está logeado y es proveedor) -->
<div>
    <?php
    if (isset($_SESSION['id']) && $_SESSION['Rol'] == 3) {
        echo '<button type="button"><a href="../Views_publicar/Vista_producto.php">Publicar producto</a></button>';
    }
    ?>
</div>

<!-- Footer -->
<?php include('../../Include/Footer.html'); ?>
</body>
</html>
