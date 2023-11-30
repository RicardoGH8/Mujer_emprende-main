<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/Styles.css">
    <title>Login</title>
    <!-- Agregar enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Fondo de color claro */
            font-family: 'Arial', sans-serif;
        }

        section {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff; /* Fondo de color blanco */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #02021D; /* Color del texto oscuro */
            text-align: center;
        }

        input.form-control,
        button.button-block {
            margin-bottom: 15px;
        }

        /* Color del botón personalizado */
        button.button-block {
            background-color: #02021D;
            color: #ffffff; /* Texto del botón en color blanco */
            border: 1px solid #02021D;
            transition: background-color 0.3s;
        }

        /* Cambio de color al pasar el ratón sobre el botón */
        button.button-block:hover {
            background-color: #000000; /* Color más oscuro al pasar el ratón */
        }

        a {
            color: #02021D;
        }

        a:hover {
            color: #000000;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <?php include('../../Include/Header.html'); ?>

    <!-- Formulario de Login -->
    <section>
        <form action="../../Logic/Registro_y_login/Login.php" method="POST">
            <h1>Login</h1>
            <!-- Ingresar el email -->
            <input type="text" class="form-control" name="Usuario" required autocomplete="off" placeholder="Ingrese su usuario" />
            <!-- Ingresar la contraseña -->
            <input type="password" class="form-control" name="Contraseña" required autocomplete="off" placeholder="Ingrese su contraseña" />
            <!-- Diseño del botón -->
            <button type="submit" class="btn button-block" value="enviar" name="iniciar_sesion">Ingresar</button>
        </form>
        
        <!-- Enlace para recuperar la contraseña -->
        
    </section>
 <!-- Footer -->
 <?php include('../../Include/Footer.html'); ?>
    <!-- Agregar enlace a Bootstrap JS y jQuery (opcional, necesario para algunas funcionalidades de Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>