<!-- Usando un UPDATE, SET Y WHERE -->
<?php
include('../conec.php');
$codigoFabricante=$_POST['id'];
$nombreFabricante = $_POST['nombre'];

//$editarFabricante="UPDATE fabricante SET nombre='$nombreFabricante' WHERE codigo = '$codigoFabricante'";
$editarFabricante="CALL sp_editarFabricante('$nombreFabricante','$codigoFabricante')";
$resultado=mysqli_query($conexion, $editarFabricante);

header('Location: ../fabricantes.php');
?>