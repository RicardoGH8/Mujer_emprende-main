<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/Styles.css">
    <title>Registro Proveedor@s</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* Agrega esta regla de estilo para cambiar el color del botón */
        .btn-primary {
            background-color: #02021D;
            border-color: #02021D;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <?php include('../../Include/Header.html'); ?>
    </header>

    <!-- Sección de registro -->
    <section class="container mt-5">
        <form action="../../Logic/Registro_y_login/Registro_proveedora.php" method="POST">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Registro proveedor@s</h1>
                    <div class="form-group">
                        <h2>Ingresar su nombre(s)</h2>
                        <input type="text" class="form-control" placeholder="Nombre" required autocomplete="off" name="Nombre" />
                    </div>
                    <!-- Campo para ingresar el correo -->
                    <!-- Campo para ingresar el nombre(s) -->
<div class="form-group">
    <h2>Ingresar su nombre(s)</h2>
    <input type="text" class="form-control" placeholder="Nombre" required autocomplete="off" name="Nombre" pattern=".*\S+.*">
</div>

<!-- Campo para ingresar el correo -->
<div class="form-group">
    <h2>Ingresar su correo</h2>
    <input type="email" class="form-control" placeholder="Correo" required autocomplete="off" name="Correo" pattern=".*\S+.*">
</div>

<!-- Campo para ingresar la contraseña -->
<div class="form-group">
    <h2>Ingresar su contraseña</h2>
    <input type="password" class="form-control" placeholder="Contraseña" required autocomplete="off" name="Contraseña" pattern=".*\S+.*">
</div>

<!-- Campo para ingresar el nombre de usuario -->
<div class="form-group">
    <h2>Ingresar su nombre de usuario</h2>
    <input type="text" class="form-control" placeholder="Usuario" required autocomplete="off" name="Usuario" pattern=".*\S+.*">
</div>

                    <!-- Botón de registro con color personalizado -->
                    <button type="submit" class="btn btn-primary btn-block" value="$Insertarcuenta" name="enviar">Registrarme</button>
                </div>
            </div>
        </form>
    </section>
 <!-- Footer -->
 <?php include('../../Include/Footer.html'); ?>
    <!-- Enlace a Bootstrap JS y jQuery (opcional, necesario para algunas funcionalidades de Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>