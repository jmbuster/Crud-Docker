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
    <section class="portada2">
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
                    <li><a href="">Iniciar sesión</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <h1>Sobre nosotros</h1>
            <p>
                Ser una INSTITUCIÓN PÚBLICA RECONOCIDA en el ámbito nacional e internacional, con programas académicos acreditados y procesos de gestión certificados; profesores con alto perfil académico y profesional, cuerpos académicos consolidados y proyectos de investigación aplicados en áreas estratégicas que satisfagan las necesidades sociales. Distinguida por formar profesionales de excelencia académica con competencias para la vida y el trabajo que les permitan insertarse de manera exitosa en la sociedad.
            </p>
            <a href="cursos.html" class="hero-btn">Nuestros cursos</a>
        </div>
    </section>
    <section class="about-us">
        <div class="row">
            <div class="columna-about">
                <h1>Una de las mejores instituciones</h1>
                <p>
                    Ofrecemos los mejores cursos para mejorar su educación y permitirles obtener certificaciones de todo tipo para crecer y estar preparados para el ambiente laboral 
                </p>
                <a href="cursos.html" class="hero-btn btn">Explorar</a>
            </div>
            <div class="columna-about">
                <img src="images/about.jpg">
            </div>
        </div>
    </section>
    <section class="contacto">
        <div class="row">
            <div class="columna-contacto">
                <div>
                    <i class="fa fa-home"></i>
                    <span>
                        <h5>Edicio B</h5>
                        <p>Durango, México</p>
                    </span>
                </div>
                <div>
                    <i class="fa fa-phone"></i>
                    <span>
                        <h5>+52 6182341342</h5>
                        <p>Lunes a Viernes, 7AM a 9AM</p>
                    </span>
                </div>
                <div>
                    <i class="fa fa-envelope-o"></i>
                    <span>
                        <h5>uni@mamlo.com</h5>
                        <p>Envia mensaje al correo</p>
                    </span>
                </div>
            </div>
            <div class="columna-contacto">
                <form action="">
                    <input type="text" placeholder="Ingresar nombre" required>
                    <input type="email" placeholder="Ingresar correo electronico" required>
                    <input type="text" placeholder="Ingresar asunto" required>
                    <textarea rows="5" placeholder="Mensaje" required></textarea>
                    <button type="submit" class="hero-btn btn">Enviar mensaje</button>
                </form>
            </div>
        </div>
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
        Ser una INSTITUCIÓN PÚBLICA RECONOCIDA en el ámbito nacional e internacional, con programas académicos acreditados y procesos de gestión certificados; profesores con alto perfil académico y profesional, cuerpos académicos consolidados y proyectos de investigación aplicados en áreas estratégicas que satisfagan las necesidades sociales. Distinguida por formar profesionales de excelencia académica con competencias para la vida y el trabajo que les permitan insertarse de manera exitosa en la sociedad.
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