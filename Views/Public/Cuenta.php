<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/Styles.css">
    <title>Cuenta</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">   
</head>

<body>
    <!-- Header -->
    <header>
        <?php include('../../Include/Header.html'); ?>
    </header>

    <!-- Secciones de registro -->
    <section class="container mt-5">
        <div class="row justify-content-center">
            <!-- Tarjeta 1 -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Bienvenid@s</h5>
                        <p class="card-text">¿Tienes una cuenta? Inicia sesión</p>
                        <a href="../Public/Login.php" class="btn btn-primary custom-btn-color">Iniciar sesión</a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 2 -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">¿No tienes una cuenta?</h5>
                        <p class="card-text cuenta-gratis">Es 100% gratis</p>
                        <a href="../Public/Registro.php" class="btn btn-success custom-btn-color">Registrarse</a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 3 -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">¿Quieres ofrecer tus productos y publicar historias?</h5>
                        <br>
                        <a href="../Public/Registro_proveedora.php" class="btn btn-info custom-btn-color">Regístrate aquí</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tarjeta para Regístrate con Google -->
    <section class="container mt-5">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Regístrate con Google</h5>
                <!-- Puedes agregar contenido para el registro con Google si es necesario -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include('../../Include/Footer.html'); ?>

    <!-- Enlace a Bootstrap JS y jQuery (opcional, necesario para algunas funcionalidades de Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Estilos personalizados para los botones -->
    <style>
        .custom-btn-color {
            background-color: #02021D;
            border-color: #02021D;
        }
    </style>
</body>

</html>