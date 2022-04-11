<?php
require_once "config.php";
 
$name = $lastname = $email = $pass = $confirm_password = "";
$name_err = $lastname_err = $email_err = $pass_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["name"]))){
        $name_err = "Ingresa un nombre";
    } elseif(!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Ingresa un nombre valido";
    } else{
        $name = trim($_POST["name"]);
    }

    if(empty(trim($_POST["lastname"]))){
        $lastname_err = "Ingresar apellidos";
    } elseif(!filter_var(trim($_POST["lastname"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $lastname_err = "Ingresa un apellido valido";
    } else{
        $lastname = trim($_POST["lastname"]);
    }
    
    if(empty(trim($_POST["email"]))){
        $email_err = "Ingresar un correo";     
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Validate password
    if(empty(trim($_POST["pass"]))){
        $pass_err = "Ingresa una contraseña";     
    } elseif(strlen(trim($_POST["pass"])) < 6){
        $pass_err = "Ingresar contraseña de minimo 6 digitos";
    } else{
        $pass = trim($_POST["pass"]);
    }

    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Confirma tu contraseña";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($pass != $confirm_password)){
            $confirm_password_err = "Contraseña no es igual";
        }
    }

    if(empty($name_err) && empty($email_err) && empty($lastname_err) && empty($pass_err) && empty($confirm_password_err)){
        $sql = "INSERT INTO usuarios (name, lastname, email, pass) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_lastname, $param_email, $param_pass);
            
            $param_name = $name;
            $param_lastname = $lastname;
            $param_email = $email;
            $param_pass = password_hash($pass, PASSWORD_DEFAULT);
            
            
            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($link);
}
?>

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
    <section class="registro">
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
                    <li><a href="#">Registrarse</a></li>
                    <li><a href="login.php">Iniciar sesión</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="wrapper"> 
            <div class="registrar">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="">
                        <label style="color: #fff;" >Nombre</label>
                        <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>" placeholder="Ingresar nombre" required>
                        <span class="invalid-feedback"><?php echo $name_err;?></span>
                    </div>
                    <div class="form-group">
                        <label style="color: #fff;">Apellidos</label>
                        <input type="text" name="lastname" class="form-control <?php echo (!empty($lastname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lastname; ?>" placeholder="Ingresar apellidos" required>
                        <span class="invalid-feedback"><?php echo $lastname_err;?></span>
                    </div>
                    <div class="form-group">
                        <label style="color: #fff;">Correo electronico</label>
                        <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" placeholder="Ingresar Correo electronico" required>
                        <span class="invalid-feedback"><?php echo $email_err;?></span>
                    </div>
                    <div class="form-group">
                        <label style="color: #fff;">Contraseña</label>
                        <input type="password" name="pass" class="form-control <?php echo (!empty($pass_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $pass; ?>" placeholder="Ingresar contraseña">
                        <span class="invalid-feedback"><?php echo $pass_err;?></span>
                    </div>
                    <div class="form-group">
                        <label style="color: #fff;">Confirmar</label>
                        <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" placeholder="Confirmar contraseña">
                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="form-group" style="align-items: center;">
                        <button type="submit" class="hero-btn">Registrar</button>
                        <a href="index.html" class="btn btn-secondary ml-2">Cancel</a>
                    </div>
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