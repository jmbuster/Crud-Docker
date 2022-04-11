<?php
if(isset($_POST["id"]) && !empty($_POST["id"])){
    require_once "../config.php";
    
    $sql = "DELETE FROM cursos WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        $param_id = trim($_POST["id"]);
        
        if(mysqli_stmt_execute($stmt)){
            header("location: ../info.php");
            exit();
        } else{
            echo "Intentalo más tarde";
        }
    }
     
    mysqli_stmt_close($stmt);
    
    mysqli_close($link);
} else{
    if(empty(trim($_GET["id"]))){
        header("location: ../info.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../style/style.css">
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
            <a href="index.php">
                <img src="../images/logo.png">
            </a>
            <div class="nav-link" id="navlink">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a  href="../logout.php">Cerrar sesion</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
        <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Eliminar curso</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>¿Estas seguro de querer eliminar tu curso?</p>
                            <p>
                                <input type="submit" value="Si" class="hero-btn btn-danger">
                                <a href="../info.php" class="hero-btn btn-secondary">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
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