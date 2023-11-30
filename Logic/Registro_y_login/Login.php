<?php
include('../../Conect.php');

if(isset($_POST['iniciar_sesion'])) {
    $Usuario = $_POST['Usuario'];
    $Password = $_POST['Contraseña'];

    // Obtén los datos del usuario de la base de datos
    $query = "SELECT * FROM Cuenta WHERE Usuario = '$Usuario'";
    $result = mysqli_query($Conexion, $query);

    if($result) {
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $stored_password = $row['Contraseña'];

            // Verifica la contraseña utilizando password_verify
            if(password_verify($Password, $stored_password)) {
                // Contraseña válida, iniciar sesión
                session_start();
                $_SESSION['id'] = $row['Codigo']; // Puedes almacenar más información en la sesión si es necesario
                $_SESSION['Usuario'] = $row['Usuario'];
                $_SESSION['Rol'] = $row['Rol'];

                // Redirecciona según el rol
                switch($row['Rol']) {
                    case 1:
                        echo "<script> alert('Bienvenido Aministrador: $Usuario'); window.location= '../../Views/Private/Dashboard.php'</script>";
                        break;
                    case 2:
                        echo "<script> alert('Bienvenido: $Usuario'); window.location= '../../Views/Public/Inicio.php'</script>";
                        break;
                    case 3:
                        echo "<script> alert('Bienvenido: $Usuario'); window.location= '../../Views/Public/Inicio.php'</script>";
                        break;
                    default:
                        // Manejar otro rol si es necesario
                        break;
                }
            } else {
                echo "<script> alert('Contraseña incorrecta. Por favor, inténtelo de nuevo.'); window.location= '../../Views/Public/Cuenta.php'</script>";
            }
        } else {
            echo "<script> alert('Usuario no encontrado. Por favor, registre una cuenta.'); window.location= '../../Views/Public/Registro.php'</script>";
        }
    } else {
        echo "Error en la consulta: " . mysqli_error($Conexion);
    }
}

mysqli_close($Conexion);
?>