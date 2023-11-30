<!-- Recibimos los datos que fueron mandados con el metodo POST desde el formulario en Cuenta/Registro.php 
encriptamos la contraseña y seguido de esto lo capturamos en la BD -->
<?php

include('../../Conect.php');

if(isset($_POST['enviar'])) {
    $Rol = isset($_POST['Rol']) ? $_POST['Rol'] : 2; //Rol 2 Es para mujeres que puden comentar, comprar, ver las historias,etc
    $Nombre = $_POST['Nombre'];
    $Correo = $_POST['Correo'];
    $Password = $_POST['Contraseña'];
    $Usuario = $_POST['Usuario'];

    // Verificar si el usuario ya está registrado
    $Verificar_usuario = mysqli_query($Conexion, "SELECT * FROM Cuenta WHERE Usuario = ('$Usuario')");
    $Comprobacion = mysqli_num_rows($Verificar_usuario);

    if ($Comprobacion == 0) {
        // Encriptamos la contraseña antes de almacenarla en la BD
        $Password_encriptado = password_hash($Password, PASSWORD_DEFAULT);

        $Insertarcuenta = "INSERT INTO Cuenta (Rol, Nombre, Correo, Contraseña, Usuario) 
                            VALUE ('$Rol','$Nombre',' $Correo','$Password_encriptado','$Usuario')";

        if(mysqli_query($Conexion, $Insertarcuenta)) {
            echo "<script> alert('Bienvenido: $Usuario, gracias por registrarse');window.location= '../../Views/Public/Cuenta.php' </script>";
        } else {
            echo "<script> alert('Hubo un error en el registro. Por favor, inténtelo de nuevo.'); window.location= '../../Views/Public/Cuenta.php'</script>";
        }
    } else {
        echo "<script> alert('No puedes registrar a este usuario: $Usuario porque ya esta registrado. Por favor, intenta con otro usuario.'); window.location= '../../Views/Public/Cuenta.php'</script>";
    }
}


mysqli_close($Conexion);
?>