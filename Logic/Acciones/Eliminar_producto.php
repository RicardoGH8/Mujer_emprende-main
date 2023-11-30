<!-- Usando un DELETE FROM Y WHERE -->
<?php
include('../conec.php');

$codigoProducto = $_GET['id'];

//$eliminarProducto = "DELETE FROM producto WHERE codigo = '$codigoProducto'";
$eliminarProducto="CALL sp_eliminarProducto('$codigoProducto')";

$resultado = mysqli_query($conexion, $eliminarProducto);

header('Location: ../productos.php');

?>