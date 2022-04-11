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
    <section class="portada3">
        <nav>
            <a href="index.html">
                <img src="images/logo.png">
            </a>
            <div class="nav-link" id="navlink">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="about-us.php">Universidad</a></li>
                    <li><a href="#">Cursos</a></li>
                    <li><a href="registrar.php">Registrarse</a></li>
                    <li><a href="">Iniciar sesión</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <h1>Cursos, Certificaciones & Programas online</h1>
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
    <section class="certification">
        <div class="row">
            <div class="certification-left">
                <img src="images/certificate.jpg">
                <h2>Certificaciones & programas online</h2>
                <p>
                    Se ofrece la opotunidad de realizar examenes de certificaciones, despues de haber completado nuestros cursos. Con ello se podra dar a conocer en el entoro laboral
                </p>
                <p>
                    Los programas de Certificación Profesional son una serie de cursos diseñados por los líderes de la industria y las mejores universidades para desarrollar y mejorar las habilidades profesionales necesarias para tener éxito en los ámbitos laborales más demandados actualmente.<br>
                    Los programas de Certificación Profesional se ofrecen en una variedad de ámbitos laborales demandados para ayudarte a progresar. En tu computadora, tablet o teléfono, los cursos en línea hacen que el aprendizaje sea flexible para adaptarse a tu ajetreada vida.
                </p>
                <p>
                    Muestra tus competencias clave y tus valiosos conocimientos.<br>Utiliza los conocimientos y habilidades que has aprendido para impactar en tu trabajo y avanzar en tu carrera profesional.
                </p>
                <div class="comentario">
                    <h3>Comentarios</h3>
                    <form class="form-comentario">
                        <input type="text" placeholder="Ingresa tu nombre">
                        <input type="email" placeholder="Ingresa tu correo electronico">
                        <textarea rows="5" placeholder="Comentario"></textarea>
                        <button type="submit" class="hero-btn btn">
                            Enviar
                        </button>
                    </form>
                </div>
            </div>
            <div class="certification-right">
                <h3>Categorias</h3>
                <div>
                    <span>Analisis de negocios</span>
                    <span>21</span>
                </div>
                <div>
                    <span>Ciencia de datos</span>
                    <span>28</span>
                </div>
                <div>
                    <span>Machine Learning</span>
                    <span>15</span>
                </div>
                <div>
                    <span>Sistemas computacionales</span>
                    <span>34</span>
                </div>
                <div>
                    <span>Virtualización</span>
                    <span>22</span>
                </div>
                <div>
                    <span>Networking</span>
                    <span>30</span>
                </div>
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