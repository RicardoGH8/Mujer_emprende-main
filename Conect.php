<?php
/* validamos los datos del servidor */

$Hostname = 'localhost'; // 127.0.0.1
$Username = 'root'; /* el nombre de usuario */
$Password = ''; /* por si la base de datos está protegida con una contraseña*/
$Database = 'Mujer_emprende'; /* nombre de la base de datos que usaremos */

/* código para que se logre la conexión a la base de datos */

$Conexion = mysqli_connect($Hostname, $Username, $Password, $Database);

/* validación si se logró o no conectar  */

if (mysqli_connect_error()) {
    echo 'Conexión fallida. Por favor, asegúrese de tener los permisos o la conexión debida. Error: ' . mysqli_connect_error();
} else {
    echo 'Conexión exitosa';
}

?>
<!--------------------------------PRUEBA------------------------------------------->