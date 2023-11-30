<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/Styles.css" />
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/nosotros.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet" />
    <title>Mujer Emprende</title>

</head>

<body>
<?php include('../../Include/Login_header.html'); ?>



    <main>
        <section class="inicio">
            <div class="banner-container">
                <img src="../../Assets/Img/mujer emprende/Historia_maria.jpg" alt="Artesanías" class="banner-image">
                <div class="banner-text">
                    <h2>Artesanías</h2>
                    <p>PERFECTO PARA CADA OCASIÓN</p>
                    <div class="banner-price-action">
                        <span class="price">Precio: $320 mxn</span>
                        <a href="./Mercado.php" class="boton-comprar">Comprar</a>
                    </div>
                </div>
            </div>
        </section>
        <!--------------------------------- historias ---------------------------------->
    
        <section class="historias">
            <h2>Historias</h2>
            <div class="card-container">
                <div class="card">
                    <img src="../../Assets/Img/mujer emprende/Historia_maria.jpg" alt="Historia 1">
                    <div class="card-body">
                        <h3>Historia #1</h3>
                        <p>María una gran mujer originaria de...</p>
                        <a href="./Historias_exito.php" class="boton-ver-mas">Ver más...</a>
                    </div>
                </div>
                <div class="card">
                    <img src="../../Assets/Img/mujer emprende/historias/tepito.png" alt="Historia 2">
                    <div class="card-body">
                        <h3>Historia #2</h3>
                        <p>Valeria, una emprendedora originaria de...</p>
                        <a href="./Historias_exito.php" class="boton-ver-mas">Ver más...</a>
                    </div>
                </div>
                <div class="card">
                    <img src="../../Assets/Img/mujer emprende/historias/pexels-terry-agar-7119599.jpg" alt="Historia 3">
                    <div class="card-body">
                        <h3>Historia #3</h3>
                        <p>Doña Regina una mujer originaria de...</p>
                        <a href="./Historias_exito.php" class="boton-ver-mas">Ver más...</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- productos  -->
        <section class="productos">
            <h2>Productos</h2>
            <div class="card-container">
                <!-- Producto 1 -->
                <div class="card">
                    <img src="../../Assets/Img/Producto_guayabera.png" alt="Guayabera" />
                    <div class="card-body">
                        <h3>Guayabera</h3>
                        <p>Guayabera blanca Mediana. Valoración: 4.2</p>
                        <p>Precio: 320 mxn</p>
                        <a href="./Mercado.php" class="boton-comprar">Comprar</a>
                    </div>
                </div>
                <!-- Producto 2 -->
                <!-- Producto 1 -->
                <div class="card">
                    <img src="../../Assets/Img/Producto_guayabera.png" alt="Guayabera" />
                    <div class="card-body">
                        <h3>Guayabera</h3>
                        <p>Guayabera blanca Mediana. Valoración: 4.2</p>
                        <p>Precio: 320 mxn</p>
                        <a href="./Mercado.php" class="boton-comprar">Comprar</a>
                    </div>
                </div>

                <!-- Producto 1 -->
                <div class="card">
                    <img src="../../Assets/Img/Producto_guayabera.png" alt="Guayabera" />
                    <div class="card-body">
                        <h3>Guayabera</h3>
                        <p>Guayabera blanca Mediana. Valoración: 4.2</p>
                        <p>Precio: 320 mxn</p>
                        <a href="./Mercado.php" class="boton-comprar">Comprar</a>
                    </div>
                </div>

                <!-- Producto 1 -->
                <div class="card">
                    <img src="../../Assets/Img/Producto_guayabera.png" alt="Guayabera" />
                    <div class="card-body">
                        <h3>Guayabera</h3>
                        <p>Guayabera blanca Mediana. Valoración: 4.2</p>
                        <p>Precio: 320 mxn</p>
                        <a href="./Mercado.php" class="boton-comprar">Comprar</a>
                    </div>
                </div>

                <!-- Repetir estructura de 'div' con la clase 'card' para otros productos -->
            </div>
        </section>
<!-- nosotros -->
        <section class="nosotros">
            <div class="nosotros-container">
                <img src="../../Assets/Img/mujer emprende/portada.jpg" alt="Nosotros" class="nosotros-imagen" />
                <div class="nosotros-texto">
                    <h2>Nosotros</h2>
                    <p>"Mujer Emprende" es una plataforma online innovadora que impulsa el emprendimiento femenino. En busca de la equidad de género en los negocios, facilita a las usuarias compartir historias, evaluar productos y construir una red de apoyo. Diseñada para ser el recurso principal de mujeres empresarias, fomenta un ecosistema empresarial inclusivo y diverso. El diseño del sitio se enfoca en mejorar la experiencia del usuario, reflejando su misión de empoderamiento y crecimiento profesional femenino.</p>
                </div>
            </div>
        </section>
        
    </main>
<br style="height: 10%; margin: 0; padding: 0;"> <!-- Salto de línea de 1 pulgada -->
<?php include('../../Include/Footer.html'); ?>
</body>
</html>