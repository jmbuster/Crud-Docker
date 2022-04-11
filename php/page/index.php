<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diseño de Sitio web</title>
</head>
<body>
    <section class="portada">
        <nav>
            <a href="index.html">
                <img src="images/logo.png">
            </a>
            <div class="nav-link" id="navlink">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="about-us.php">Universidad</a></li>
                    <li><a href="cursos.php">Cursos</a></li>
                    <li><a href="registrar.php">Registrarse</a></li>
                    <li><a href="login.php">Iniciar sesión</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <h1>La mejor Universidad de Durango</h1>
            <p>
                Somos una INSTITUCIÓN PÚBLICA DE CALIDAD, con alto compromiso social, que imparte estudios de educación superior; comprometida con la formación integral de profesionistas con valores, liderazgo y visión emprendedora; mediante un modelo educativo de vanguardia basado en competencias y orientado a contribuir al desarrollo regional sustentable.
            </p>
            <a href="about-us.html" class="hero-btn">Conocer más</a>
        </div>
    </section>
    <section class="cursos">
        <h1>Cursos</h1>
        <p>Se ofrecen varios cursos para inscribirse</p>
        <div class="row">
            <div class="columna-cursos">
                <h3>Principiante</h3>
                <p></p>
            </div>
            <div class="columna-cursos">
                <h3>Intermedio</h3>
                <p></p>
            </div>
            <div class="columna-cursos">
                <h3>Avanzado</h3>
                <p></p>
            </div>
        </div>
    </section>
    <section class="instalacion">
        <h1>Nuestra instalaciones</h1>
        <p>Nuestra instalaciones son de la más alta calidad</p>
        <div class="row">
            <div class="columna-instalacion">
                <img src="images/library.png">
                <h3>Libreria</h3>
                <p></p>
            </div>
            <div class="columna-instalacion">
                <img src="images/cafeteria.png">
                <h3>Cafeteria</h3>
                <p></p>
            </div>
            <div class="columna-instalacion">
                <img src="images/basketball.png">
                <h3>Canchas deportivas</h3>
                <p></p>
            </div>
        </div>
    </section>

    <section class="enrol">
        <h1>Inscribete a nuestros cursos online<br> desde cualquier parte del mundo</h1>
        <a href="" class="hero-btn">Inscribirse</a>
    </section>


    <!--Scripts para mostrar el menu -->
    <script>
        var navlink = document.getElementById("navlink")
        function showMenu(){
            navlink.style.right = "0";
        }
        function hideMenu(){
            navlink.style.right = "-200px";
        }
    </script>
</body>
<footer class="footer">
    <h4><a href="about-us.html">Sobre nosotros</a></h4>
    <p>
        Ser una INSTITUCIÓN PÚBLICA RECONOCIDA en el ámbito nacional e internacional, con programas académicos acreditados y procesos de gestión certificados.
    </p>
    <div class="social-media">
        <i class="fa fa-facebook"></i>
        <i class="fa fa-twitter"></i>
        <i class="fa fa-instagram"></i>
        <i class="fa fa-whatsapp"></i>
    </div>
    <p>Hecho por <i class="fa fa-child"></i> Jesus Manuel Burgos Moreno</p>
</footer>
</html>