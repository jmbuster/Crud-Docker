<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: info.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$email= $pass = "";
$email_err = $pass_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Ingresar correo electronico";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["pass"]))){
        $pass_err = "Ingresar contraseña";
    } else{
        $pass = trim($_POST["pass"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($pass_err)){
        // Prepare a select statement
        $sql = "SELECT id, email, pass FROM usuarios WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($pass, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;                            
                            
                            // Redirect user to welcome page
                            header("location: info.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
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
                    <li><a href="registrar.php">Registrarse</a></li>
                    <li><a href="#">Iniciar sesión</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="">
                <form name="f1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">  
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
                    <div class="form-group" style="align-items: center;">
                        <button type="submit" class="hero-btn">Registrar</button>
                    </div>
            </form>
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