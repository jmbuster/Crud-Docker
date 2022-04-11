<?php
require_once "../config.php";
 
$curso = $profesor = $hora = "";
$curso_err = $profesor_err = $hora_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_curso = trim($_POST["curso"]);
    if(empty($input_curso)){
        $curso_err = "Ingresar un curso";
    } elseif(!filter_var($input_curso, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $curso_err = "Ingresar curso valido";
    } else{
        $curso = $input_curso;
    }
    
    $input_profesor = trim($_POST["profesor"]);
    if(empty($input_profesor)){
        $profesor_err = "Ingresar su profesor";     
    } else{
        $profesor = $input_profesor;
    }
    
    $input_hora = trim($_POST["hora"]);
    if(empty($input_hora)){
        $hora_err = "Ingresar cantidad de horas";     
    } elseif(!ctype_digit($input_hora)){
        $hora_err = "No ingresar hora negativo";
    } else{
        $hora = $input_hora;
    }
    
    if(empty($curso_err) && empty($profesor_err) && empty($hora_err)){
        $sql = "INSERT INTO cursos (curso, profesor, hora) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_curso, $param_profesor, $param_hora);
            
            $param_curso = $curso;
            $param_profesor = $profesor;
            $param_hora = $hora;
            
            if(mysqli_stmt_execute($stmt)){
                header("location: ../info.php");
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
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nidia</title>
</head>
<body>
    <div class="inicio">
        <div class="navbar">
            <img src="images/logo.png" class="logo">
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="nosotros.php">Sobre nosotros</a></li>
                <li><a href="registrar.php">Registrar</a></li>
                <li><a href="iniciar.php">Iniciar sesión</a></li>
            </ul>
        </div>
    </div>  
        <div class="text-box">
        <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Agregar empleado</h2>
                    <p>Ingresa los siquientes datos para agregar a tu empleado</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Curso</label>
                            <select type="text" name="curso" class="form-control <?php echo (!empty($curso_err)) ? 'Invalido' : ''; ?>" value="<?php echo $curso; ?>"> 
                                <option value="">Curso...</option>
                                <option value="Analisis de negocios">Analisis de negocios</option>
                                <option value="Ciencia de datos">Ciencia de datos</option>
                                <option value="Machine Learning">Machine Learning</option>
                                <option value="Sistemas computacionales">Sistemas computacionales</option>
                                <option value="Virtualización">Virtualización</option>
                                <option value="Networking">Networking</option>
                            </select>
                            <span class="Invalido"><?php echo $curso_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Profesor</label>
                            <select name="profesor" class="form-control <?php echo (!empty($profesor_err)) ? 'Invalido' : ''; ?>"><?php echo $profesor; ?>
                                <option value="">Profesor...</option>
                                <option value="Robin Chaurasiya">Robin Chaurasiya</option>
                                <option value="Richard Johnson">Richard Johnson</option>
                                <option value="Michael Soskil">Michael Soskil</option>
                            </select>
                            <span class="Invalido"><?php echo $profesor_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Horas</label>
                            <input type="text" name="hora" class="form-control <?php echo (!empty($hora_err)) ? 'Invalido' : ''; ?>" value="<?php echo $hora; ?>">
                            <span class="Invalido"><?php echo $hora_err;?></span>
                        </div>
                        <input type="submit" class="hero-btn btn-primary" value="Submit">
                        <a href="../info.php" class="hero-btn btn-secondary ml-2">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
     </div>
        </div>
        </body>
<footer class="footer">
    <h4>Muchas gracias, por su visita</h4>
    <p>
        Natura trabaja con modelos de venta directa. 
    </p>
    <div class="social-media">
        <i class="fa fa-facebook"></i>
        <i class="fa fa-instagram"></i>
        <i class="fa fa-whatsapp"></i>
    </div>
    <p>Hecho por <i class="fa fa-child"></i> </p>
  </footer>
  
</html>