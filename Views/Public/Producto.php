<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Styles.css">
    <title>Producto</title>
</head>
<body>
<!---------------------------- Header ----------------------------------->
<?php include('../Include/Header.html'); ?>

<!-- Historias -->
<section>
    <table>
        <tr>
            <th>Numero</th>
            <th>Usuario</th>
            <th>Fecha</th>
            <th>Contenido</th>
        </tr>

        <tbody>
        <?php
           include("../Conect.php");

           $Consulta = "SELECT c.Usuario_id, cu.Usuario, c.Fecha, c.Contenido FROM Comentarios c
           JOIN Cuenta cu ON c.Usuario_id = cu.Codigo";

            $Resultado = $Conexion->query($Consulta);

            while ($row = $Resultado->fetch_assoc()) { ?>
                 <tr>
                      <td> <?php echo $row['Usuario']; ?> </td>
                      <td> <?php echo $row['Fecha']; ?> </td>
                      <td> <?php echo $row['Contenido']; ?> </td>
                 </tr>
                 <?php
                  }
                 ?>

        </tbody>
    </table>
</section>
<!-- Footer -->
<?php include('../Include/Footer.html'); ?>
</body>

</html>  