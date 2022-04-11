<?php
require_once "../config.php";
 
$curso = $profesor = $hora = "";
$curso_err = $profesor_err = $hora_err = "";
 
if(isset($_POST["id"]) && !empty($_POST["id"])){
    $id = $_POST["id"];
    
    $input_curso = trim($_POST["curso"]);
    if(empty($input_curso)){
        $curso_err = "Ingresa un curso valido";
    } elseif(!filter_var($input_curso, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $curso_err = "Ingresa un curso valido";
    } else{
        $curso = $input_curso;
    }
    
    $input_profesor = trim($_POST["profesor"]);
    if(empty($input_profesor)){
        $profesor_err = "Ingresa un profesor valido";     
    } else{
        $profesor = $input_profesor;
    }
    
    $input_hora = trim($_POST["hora"]);
    if(empty($input_hora)){
        $hora_err = "Ingresa una hora valido";     
    } elseif(!ctype_digit($input_hora)){
        $hora_err = "Ingresa una hora valido";
    } else{
        $hora = $input_hora;
    }
    
    if(empty($curso_err) && empty($profesor_err) && empty($hora_err)){
        $sql = "UPDATE cursos SET curso=?, profesor=?, hora=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sssi", $param_curso, $param_profesor, $param_hora, $param_id);
            
            $param_curso = $curso;
            $param_profesor = $profesor;
            $param_hora = $hora;
            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                header("location: ../info.php");
                exit();
            } else{
                echo "Intentalo más tarde";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($link);
} else{
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        $id =  trim($_GET["id"]);
        
        $sql = "SELECT * FROM cursos WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    $curso = $row["curso"];
                    $profesor = $row["profesor"];
                    $hora = $row["hora"];
                } else{
                    header("location: ../info.php");
                    exit();
                }
                
            } else{
                echo "Intentalo más tarde";
            }
        }
        
        mysqli_stmt_close($stmt);
        
        mysqli_close($link);
    }  else{
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
                    <h2 class="mt-5">Actualizar información</h2>
                    <p>Editar el curso</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group">
                            <label>Curso</label>
                            <select type="text" name="curso" class="form-control <?php echo (!empty($curso_err)) ? 'Invalido' : ''; ?>" value="<?php echo $curso; ?>"> 
                                <option value="<?php echo $curso; ?>"><?php echo $curso; ?></option>
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
                                <option value="<?php echo $profesor; ?>"><?php echo $profesor; ?></option>
                                <option value="Robin Chaurasiya">Robin Chaurasiya</option>
                                <option value="Richard Johnson">Richard Johnson</option>
                                <option value="Michael Soskil">Michael Soskil</option>
                            </select>
                            <span class="Invalido"><?php echo $profesor_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>hora</label>
                            <input type="text" name="hora" class="form-control <?php echo (!empty($hora_err)) ? 'Invalido' : ''; ?>" value="<?php echo $hora; ?>">
                            <span class="Invalido"><?php echo $hora_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="hero-btn btn-primary" value="Submit">
                        <a href="../info.php" class="hero-btn btn-secondary ml-2">Cancelar</a>
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